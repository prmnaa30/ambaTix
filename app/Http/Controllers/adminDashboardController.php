<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\User;
use Illuminate\Http\Request;

class adminDashboardController extends Controller
{
    public function index(Request $request)
    {
        $eventTotal = Event::count();
        $ticketSold = Transaction::where('status', 'success')->sum('total_quantity');
        $transactionTotal = Transaction::where('status', 'success')->count();

        $selectedYear = $request->input('year');
        $selectedMonth = $request->input('month');

        $query = Transaction::selectRaw('COUNT(*) as total');
        if ($selectedYear) {
            $query->whereYear('created_at', $selectedYear);
        }
        if ($selectedMonth) {
            $query->whereMonth('created_at', $selectedMonth);
        }
        if ($selectedYear && $selectedMonth) {
            $query->selectRaw('DATE(created_at) as date')
                  ->groupBy('date')
                  ->orderBy('date');
        } elseif ($selectedYear) {
            $query->selectRaw('EXTRACT(MONTH FROM created_at) as month, COUNT(*) as total')
                  ->groupBy('month')
                  ->orderBy('month', 'asc');
        } else {
            $query->selectRaw('EXTRACT(YEAR FROM created_at) as year, COUNT(*) as total')
                  ->groupBy('year')
                  ->orderBy('year', 'asc');
        }
        $transactionTrends = $query->get();

        $monthNames = [
            '1' => 'Januari',
            '2' => 'Februari',
            '3' => 'Maret',
            '4' => 'April',
            '5' => 'Mei',
            '6' => 'Juni',
            '7' => 'Juli',
            '8' => 'Agustus',
            '9' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember'
        ];

        $userTotal = User::where('role', 'user')->count();
        $profit = 0;
        foreach (Transaction::all() as $transaction) {
            $profit += $transaction->total_price;
        }

        // dd($transactionTrends->pluck('date'));

        return view('admin.dashboard', compact('eventTotal', 'ticketSold', 'transactionTotal', 'transactionTrends', 'monthNames', 'userTotal', 'profit', 'selectedYear', 'selectedMonth'));
    }

    public function userData()
    {
        $users = User::orderBy('created_at', 'desc')->get();
        return view('admin.user.index', compact('users'));
    }
}
