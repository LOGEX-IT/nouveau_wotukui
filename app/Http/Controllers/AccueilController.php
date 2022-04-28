<?php

namespace App\Http\Controllers;

use App\Product;

use Illuminate\Http\Request;
use DB;

class AccueilController extends Controller
{
    public function index()
    {
        $products = Product::all(); 

        $meublemaison = DB::table('products')
        ->where('products.IdCategorie', 1)
        ->orderByDesc('products.id')
        ->get();  

        $meublebureau = DB::table('products')
        ->where('products.IdCategorie', 2)
        ->orderByDesc('products.id')
        ->get();  

        $electro = DB::table('products')
        ->where('products.IdCategorie', 3)
        ->orderByDesc('products.id')
        ->get(); 

        $auto = DB::table('products')
        ->where('products.IdCategorie', 4)
        ->orderByDesc('products.id')
        ->get(); 

        $ordi = DB::table('products')
        ->where('products.IdCategorie', 5)
        ->orderByDesc('products.id')
        ->get(); 

        $africa = DB::table('products')
        ->where('products.IdCategorie', 6)
        ->orderByDesc('products.id')
        ->get();   

        return view('accueil', compact('products', 'meublemaison', 'meublebureau', 'electro', 'auto', 'ordi', 'africa'));
    }
    public function detail($id){
        $detail_produit = DB::table('products')
        ->where('products.id', $id)
        ->first();

        $dat = date("Y-m-d");

        // $bonus = DB::table('promotion')
        // ->join('products', 'products.id', '=', 'promotion.IdProduct')
        // ->join('bonus', 'bonus.IdBonus', '=', 'promotion.IdBonus') 
        // ->where('promotion.DateDebut', '<=', $dat)
        // ->where('promotion.DateFin', '>=', $dat)
        // ->where('products.visible', 0)
        // ->get();

        $similaire = DB::table('products')
        ->where('products.IdCategorie', $detail_produit->IdCategorie)
        ->where('products.visible', 0)
        ->orderByDesc('products.id')
        ->get();


    	return view('detail', compact('detail_produit', 'similaire'));
    }

    public function Information($idP){
        $detail_produit = DB::table('products')
        ->select('products.*')
        ->where('products.id','=', $idP)
        ->first();

        $dat = date("Y-m-d");
        
    	return view('root.detail', compact('detail_produit'));
    }
    
    
}


// public function takeP($idLigne){ 
//     $commande2 = DB::table('ligne_commande')
//     ->select('ligne_commande.*','commande.*','products.*', 'products.id as idP', 'ligne_commande.created_at as dateCreation')
//     ->join('commande','commande.IdCommande','=','ligne_commande.IdCommande')
//     ->join('products','products.id','=','ligne_commande.IdProduit')
//     ->where('ligne_commande.IdLigne','=', $idLigne)
//     ->get();
    
//     return view('root.updateProduit', compact('commande2'));
// }
// public function updateProduit(Request $request){
//     $commande2 = DB::table('ligne_commande')
//     ->select('ligne_commande.*','commande.*','products.*', 'products.id as idP', 'ligne_commande.created_at as dateCreation')
//     ->join('commande','commande.IdCommande','=','ligne_commande.IdCommande')
//     ->join('products','products.id','=','ligne_commande.IdProduit')
//     ->where('ligne_commande.IdLigne','=', '$id')
//     ->get();

//     $etat=ligne_commande::
//     where('id','=',$request->idproduit)
//     ->update(
//         [
//             'EtatCommande' => $request->libelle
//         ]
//     );

//     return view('root.liste_commande', compact('commande2','etat'));

// }

