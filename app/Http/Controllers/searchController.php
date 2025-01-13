<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventCategory;
use Illuminate\Http\Request;

class searchController extends Controller
{
    public function searchEvent(Request $request)
    {
        $request->validate([
            'search' => 'string',
            'id_kategori' => 'numeric',
        ]);

        $query = $request->search;
        $id_kategori = $request->query('id_kategori');

        $events = Event::when($id_kategori, function ($queryBuilder) use ($id_kategori) {
            $queryBuilder->where('event_categories_id', $id_kategori);
        })
        ->when($query, function ($queryBuilder) use ($query) {
            $queryBuilder->where('name', 'like', '%' . $query . '%');
        })
        ->get();

        $categories = EventCategory::all(); // mengambil untuk dropdown
        $category = EventCategory::find($id_kategori);
        
        $layout = auth()->check() ? 'layouts.app' : 'layouts.guest';
        
        return view('home.search', compact('layout', 'query', 'events', 'categories', 'category'));
    }
}
