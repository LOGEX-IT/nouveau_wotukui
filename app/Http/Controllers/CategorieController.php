<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index($id){
        $categories = DB::table('products')
        ->join('categories','categories.IdCategorie','=','products.IdCategorie')
        ->where('products.IdCategorie', $id)
        ->where('products.visible', 1)
        ->orderByDesc('products.id') 
        ->Paginate(9);


        $category = DB::table('categories')
        ->where('categories.IdCategorie', $id)
        ->first();

        $recherche = DB::table('products')
        ->join('categories','categories.IdCategorie','=','products.IdCategorie')
        ->where('products.IdCategorie', $id)
        ->where('products.visible', 1)
        ->orderByDesc('products.id') 
        ->Paginate(9);

        $view = view('_recherche', compact('recherche'));

        $page_recherche = $view->render();



    	return view('category', compact('category', 'categories', 'page_recherche'));
    }

    public function search(Request $request){
        $recherche = DB::table('products')
        ->join('categories','categories.IdCategorie','=','products.IdCategorie')
        ->where('products.nameP', 'like', '%'.$request->search.'%')
        ->where('products.visible', 1)
        ->orderByDesc('products.id') 
        ->Paginate(9);


        $page_recherche = view('_recherche', compact('recherche'))->render(); 
        return response()->json(['data' => $page_recherche, 'number' => 1]);



    }

    public function search2(Request $request){
        $recherche = DB::table('products')
        ->join('categories','categories.IdCategorie','=','products.IdCategorie')
        ->where('products.nameP', 'like', '%'.$request->search.'%')
        ->where('products.visible', 1)
        ->orderByDesc('products.id') 
        ->limit(2)
        ->get();


        $page_recherche = view('_recherche2', compact('recherche'))->render(); 
        return response()->json(['data' => $page_recherche, 'number' => 1]);



    }



}
