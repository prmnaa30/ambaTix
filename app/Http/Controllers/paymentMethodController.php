<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethod;
use App\Services\SupabaseStorageService;
use Illuminate\Http\Request;

class paymentMethodController extends Controller
{
    protected $supabaseStorageService;

    public function __construct(SupabaseStorageService $supabaseStorageService)
    {
        $this->supabaseStorageService = $supabaseStorageService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paymentMethods = PaymentMethod::all();
        return view('admin.payment-method.index', compact('paymentMethods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.payment-method.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'method_name' => 'string|required',
            'method_image' => 'file|mimetypes:image/webp,image/png|required',
            'account_number' => 'string|required',
        ]);

        $file = $request->file('method_image');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->getPathName();

        $uploadResponse = $this->supabaseStorageService->uploadFile($filePath, $fileName);

        if (isset($uploadResponse['error'])) {
            return response()->json(['error' => $uploadResponse['error']], 500);
        }

        $imageUrl = $this->supabaseStorageService->getPublicUrl($fileName);

        PaymentMethod::create([
            'method_name' => $request->method_name,
            'method_image_url' => $imageUrl,
            'account_number' => $request->account_number,
        ]);

        return redirect()->route('payment-method.index')->with('success', 'Payment method created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $paymentMethod = PaymentMethod::find($id);
        return view('admin.payment-method.edit', compact('paymentMethod'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'method_name' => 'string|required',
            'method_image' => 'file|mimetypes:image/webp,image/png',
            'account_number' => 'string|required',
        ]);

        $paymentMethod = PaymentMethod::find($id);

        if ($request->hasFile('method_image')) {
            $file = $request->file('method_image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->getPathName();

            $existingImage = basename($paymentMethod->method_image_url);
            $this->supabaseStorageService->deleteFile($existingImage);

            $uploadResponse = $this->supabaseStorageService->uploadFile($filePath, $fileName);

            if (isset($uploadResponse['error'])) {
                return response()->json(['error' => $uploadResponse['error']], 500);
            }

            $imageUrl = $this->supabaseStorageService->getPublicUrl($fileName);
            $paymentMethod->method_image_url = $imageUrl;
        }

        $paymentMethod->method_name = $request->method_name;
        $paymentMethod->account_number = $request->account_number;
        $paymentMethod->save();

        return redirect()->route('payment-method.index')->with('success', 'Payment method updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $paymentMethod = PaymentMethod::find($id);

        $existingImage = basename($paymentMethod->method_image_url);
        $this->supabaseStorageService->deleteFile($existingImage);

        $paymentMethod->delete();

        return redirect()->route('payment-method.index')->with('success', 'Payment method deleted successfully!');
    }
}
