<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $data['categories'] = Category::paginate(5);
        return view('backend.category.index', $data);
    }

    public function create(Request  $request){

        // $request->validate([
        //     'cat'
        // ]);

        $data = [
            'category_name' =>$request->name,
            'type' =>$request->type,
            'status' =>$request->status,
        ];

        Category::insert($data);

        return redirect()->route('category.index');

    }
}
