<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{

    // Kategori oluşturma view'ini göster
    public function create()
    {
        // Tüm üst kategorileri getirin
        $categories = Category::whereNull('parent_id')->get();
        return view('category.create', compact('categories'));
    }

    // Yeni kategori kaydetme
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:categories,id'
        ]);

        Category::create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
        ]);

        return redirect()->route('courses.create')->with('success', 'Kategori başarıyla oluşturuldu.');
    }

    // Kategorileri listeleme
    public function index()
    {
        $categories = Category::with('children')->whereNull('parent_id')->get();
        return view('category.index', compact('categories'));
    }


    public function search(Request $request)
    {
        $term = $request->get('term');

        $categorys = Category::where('name', 'LIKE', '%' . $term . '%')->get();

        return response()->json($categorys);
    }
}
