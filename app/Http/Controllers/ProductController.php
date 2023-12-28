<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
class ProductController extends Controller
{
  public function index(){
        $data['categories'] = Category::where('status',1)->get();
        return view('backend.product.create', $data);

  }
}
