<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|unique:categories,name']);

        $category = Category::create([
            'name' => $request->name
        ]);

        return response()->json(['success' => true, 'category' => $category]);
    }
}
