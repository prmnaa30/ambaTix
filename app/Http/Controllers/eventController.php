<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventCategory;
use App\Services\SupabaseStorageService;
use Illuminate\Http\Request;

class eventController extends Controller
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
        $events = Event::with('category')->get();
        return view('admin.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = EventCategory::all();
        return view('admin.events.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'string|max:120|required',
            'description' => 'string|required',
            'location' => 'string|max:255|required',
            'date' => 'date|required',
            'organizer_name' => 'string|max:100|required',
            'event_categories_id' => 'numeric|required',
            'imageInput' => 'file|mimetypes:image/webp,image/png|required',
        ]);

        $file = $request->file('imageInput');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->getPathName();

        $uploadResponse = $this->supabaseStorageService->uploadFile($filePath, $fileName);

        if (isset($uploadResponse['error'])) {
            return response()->json(['error' => $uploadResponse['error']], 500);
        }

        $imageUrl = $this->supabaseStorageService->getPublicUrl($fileName);

        $event_category_id = $request->event_categories_id;
        $event = Event::create([
            'name' => $request->name,
            'description' => $request->description,
            'location' => $request->location,
            'date' => $request->date,
            'organizer_name' => $request->organizer_name,
            'event_categories_id' => $event_category_id,
            'image_url' => $imageUrl
        ]);

        if (!$event) {
            return response()->json(['error' => 'Failed to create event'], 500);
        }

        $event->save();

        return redirect()->route('events.index')->with('success', 'Event created successfully!');
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
        $event = Event::findOrFail($id);
        $categories = EventCategory::all();
        return view('admin.events.edit', compact('event', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'string|max:120|required',
            'description' => 'string|required',
            'location' => 'string|max:255|required',
            'date' => 'date|required',
            'organizer_name' => 'string|max:100|required',
            'event_categories_id' => 'numeric|required',
            'imageInput' => 'file|mimetypes:image/webp,image/png',
        ]);

        $eventId = (int) $id;

        $event = Event::findOrFail($eventId);

        $event->update([
            'name' => $request->name,
            'description' => $request->description,
            'location' => $request->location,
            'date' => $request->date,
            'organizer_name' => $request->organizer_name,
            'event_categories_id' => $request->event_categories_id,
        ]);

        if ($request->hasFile('imageInput')) {
            $existingImage = basename($event->image_url);
            $this->supabaseStorageService->deleteFile($existingImage);

            $file = $request->file('imageInput');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->getPathName();

            $uploadResponse = $this->supabaseStorageService->uploadFile($filePath, $fileName);

            if (isset($uploadResponse['error'])) {
                return response()->json(['error' => $uploadResponse['error']], 500);
            }

            $imageUrl = $this->supabaseStorageService->getPublicUrl($fileName);
        } else {
            $imageUrl = $event->image_url;
        }

        $event->update([
            'image_url' => $imageUrl
        ]);

        return redirect()->route('events.index')->with('success', 'Event updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::find($id);

        $existingImage = basename($event->image_url);
        $this->supabaseStorageService->deleteFile($existingImage);

        $event->delete();

        return redirect()->route('events.index')->with('success', 'Event deleted successfully!');
    }
}
