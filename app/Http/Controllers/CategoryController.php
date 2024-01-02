<?php

namespace App\Http\Controllers;
use App\Category;
use App\Product;
use App\Systemsetting;
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

    public function search(Request $request){
            $searchTerm = $request->search;
            $query = Product::query();
            $data['system'] = Systemsetting::find(1);
            $_SESSION['setting'] = $data['system'];
            if($searchTerm){
               $query->where('name','LIKE','%'.$searchTerm.'%')
                       ->orWhere('price','LIKE','%'.$searchTerm.'%')
                       ->orWhere('description','LIKE','%'.$searchTerm.'%');
                       $data['products'] = $query->get();   
                    return view('frontend.result', $data);        
            }else{
                return redirect()->back();
            }
    }
}
