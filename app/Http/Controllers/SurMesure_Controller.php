<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\surmesure;

class SurMesure_Controller extends Controller
{
    public function afficher()
    {
    	if(Auth::user()){

            $id = Auth::id();

        $products =  surmesure::join('users', 'users.id', '=', 'surmesure.Id_User')
        ->select('products.*', 'users.*', 'products.id as idP')
        ->where('products.IdUser', $id)
        ->where('products.visible', 0)
        ->get();
        // $products2 = DB::table('products')->where('IdUser', '=', $id)->get();
        $products2 = Product::join('users', 'users.id', '=', 'products.IdUser')
        ->select('products.*', 'users.*', 'products.id as idP')
        ->where('products.visible', 0)
        ->get();
        $client = DB::table('client')->where('IdClient', '1')->first();
        
        $users = DB::table('users')->where('id', '=', $id)->first();
         // dd($users);

        return view('root.liste_produit', compact('products','products2','client','id','users'));

        }else{
			return view('auth.login');     
		}
    }
}
