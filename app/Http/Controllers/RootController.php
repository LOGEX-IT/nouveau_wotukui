<?php

use Gloudemans\Shoppingcart\Facades\Cart; 

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\products;
use App\Product;
use App\Commande;
// use Illuminate\Support\Facades\Storage;
// use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager;
use Image;

use Illuminate\Http\Request;

class RootController extends Controller
{

    // Gracia!!
    public function afficher(){
        $mesure = DB::table('surmesure')
        ->select('surmesure.*')
        ->get();
        return view('root.liste_commande_sur_mesure', compact('mesure'));
    }
    public function liste_commande()
    { 
        
        $client = DB::table('client')->where('IdClient', '1')->first();


        // dd($commande2);

        $commande3 = DB::table('commande') 
        ->select('commande.*', 'commande.created_at as dateCreation')
        ->orderBy('commande.IdCommande', 'desc')
        ->get();

        return view('root.liste_commande', compact('client','commande3'));


    }
    public function liste_produit()
    {
        $products2 = DB::table('products')
        ->join('categories','categories.IdCategorie','=','products.IdCategorie')
        ->select('products.*', 'products.id as idP', 'categories.LibelleCategorie', 'LibelleCategorie as categorie')
        ->get();
        $client = DB::table('client')->where('IdClient', '1')->first();

        return view('root.liste_produit', compact('products2','client'));
    }
    public function deleteProduit($id){
        $data= products::find($id)
        ->delete();
        return redirect('root.liste_produit');
    }
     
    public function modif($id){  
        $take = products::select('id')->where('id','=', $id)->first();

        $product = DB::table('products')
        ->join('categories','categories.IdCategorie','=','products.IdCategorie')
        ->select('products.*', 'categories.LibelleCategorie', 'LibelleCategorie as categorie')
        ->where('products.id','=', $id)
        ->first();

        // dd($product);
   
        return view('root.modification_produit', compact('product','take'));
    }
    public function modifier(Request $request){  
        if ($request->hasFile('trainerAvatar') AND $request->file('trainerAvatar')->isValid()) {
             $destinationPath = public_path('Images/Modifier/');
             $nom1="Images/Modifier/".$request->file('trainerAvatar')->getClientOriginalName();                     
             $request->file('trainerAvatar')->move($destinationPath, $request->file('trainerAvatar')->getClientOriginalName());
             
             $data=products::
             where('id','=',$request->idproduit)
             ->update(
                 [
                     'nameP' => $request->libelle ,
                     'description' => $request->description ,
                     'price' => $request->prix ,
                     'echeance' => $request->echeance ,
                      'photo' => $nom1,
                      'InfosVendeur' => $request->infosvendeur
                 ]
             );


            } else {

                $data=products::
                where('id','=',$request->idproduit)
                ->update(
                    [
                        'nameP' => $request->libelle ,
                        'description' => $request->description ,
                        'price' => $request->prix ,
                        'echeance' => $request->echeance,
                        'InfosVendeur' => $request->infosvendeur 
                    ]
                );

            }


        

        $products2 = DB::table('products')
        ->join('categories','categories.IdCategorie','=','products.IdCategorie')
        ->select('products.*', 'products.id as idP', 'categories.LibelleCategorie', 'LibelleCategorie as categorie')
        ->get();
        return view('root.liste_produit', compact('products2'));
    } 
    public function ajoutPath(){
        $categorie= DB::table('categories')->select('categories.*')->get();
        return view('root.ajout_produit', compact('categorie'));
    }
    public function ajouter(Request $request){ 
        $created_at = date("Y-m-d H:i:s");
        $updated_at = date("Y-m-d H:i:s");
        if ($request->hasFile('libelle') AND $request->file('libelle')->isValid()) {
            return redirect()->back();            
        } else {  
            $destinationPath = public_path('Images/Ajout/');
            $nom2="Images/Ajout/".$request->file('trainerAvatar')->getClientOriginalName();                     
            $request->file('trainerAvatar')->move($destinationPath, $request->file('trainerAvatar')->getClientOriginalName());
                
            $categorie= DB::table('categories')->select('categories.*')->get();
            if($request->categorie == 'Meubles de maison' ){
                $cat=1;
            }elseif($request->categorie == 'Meubles de bureau'){
            $cat=2;
            }elseif($request->categorie == 'Electroménager'){
                $cat=3;
            }elseif($request->categorie == 'Auto-moto'){
                $cat=4;
            }elseif($request->categorie == 'TIC'){
                $cat=5;
            }else{
                $cat=6;
            }
            DB::insert('insert into products 
                (nameP, description, price, echeance, photo, InfosVendeur, IdCategorie, created_at, updated_at) 
                    values (?, ?, ?, ?, ?, ?, ?, ?, ?)', 
            [   $request->libelle ,
                $request->description,
                $request->prix,
                $request->echeance ,
                $nom2,
                $request->infosvendeur, $cat, $created_at, $updated_at
            ]);
        } $success=1;

        return view('root.ajout_produit', 
            compact('categorie','success'));
    }

    public function deconnexion(){
        auth()->logout();
        return redirect('/');
    }

    // Gracia!!
 



    public function tableauDeBord()
    {
    	if(Auth::user()){

            $id = Auth::id();

        $products =  Product::join('users', 'users.id', '=', 'products.IdUser')
        ->select('products.*', 'users.*', 'products.id as idP')
        ->where('products.IdUser', $id)
        ->get();
        $client = DB::table('client')->where('IdClient', '1')->first();
        $id = Auth::id();
        $users = DB::table('users')->where('id', '=', $id)->first();
        // dd($users);
        $products2 = DB::table('products')
        ->join('categories','categories.IdCategorie','=','products.IdCategorie')
        ->select('products.*', 'products.id as idP', 'categories.LibelleCategorie', 'LibelleCategorie as categorie')
        ->get();
        return view('root.liste_produit', compact('products','client','products2','id','users'));


        }else{
			return view('auth.login');     
		}
    }

    public function ajout()
    {
    	if(Auth::user()){

        $products = Product::all();
        $client = DB::table('client')->where('IdClient', '1')->first();
        $id = Auth::id();
        $users = DB::table('users')->where('id', '=', $id)->first();
         // dd($users);

        return view('root.ajout_produit', compact('products','client','id','users'));

        }else{
			return view('auth.login');     
		}
    }

    public function liste()
    {
    	if(Auth::user()){

            $id = Auth::id();

        $products =  Product::join('users', 'users.id', '=', 'products.IdUser')
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

    public function ajout_produit(Request $request){
        // $hashids = new Hashids('', 10);
        if(Product::where('nameP', $request->libelle)->count() == 0){
            $product = new Product();
            // $product->idProductSubCat = $hashids->decode($request->idProductSubCat)[0];
            $product->nameP = $request->libelle;
            $product->description = $request->description;
            $product->price = $request->prix;
            $product->echeance = $request->echeance;
            $product->IdUser = $request->idclient;

            if ($request->hasFile('trainerAvatar') AND $request->file('trainerAvatar')->isValid()) {
                $destinationPath = public_path('assets/img/top-products');
                            
                // $request->file('productItemCover')->store('farmProducts', 'public');
                // $image = Image::make($request->picture);
                // $image->resize(120, 80);
        
                $product->photo =$request->file('trainerAvatar')->hashName();
                $request->file('trainerAvatar')->move($destinationPath, $product->photo);
            }

            return $product->save()?1:0;
        } else{
            return -1; 
        }
    }
    public function modification_produit($id){


        $products = Product::where('id', $id)->first();

        $client = DB::table('client')->where('IdClient', '1')->first();
        $users = DB::table('users')->where('id', '=', $id)->first();
            // dd($users);

        return view('root.modification_produit', compact('products','client','id','users'));
                        

    }

    public function modif_produit(Request $request)
    {
        //dd(Crypt::decrypt($id));

       
        
        //dd($nombreCommandes);

        

        

            if ($request->hasFile('trainerAvatar') AND $request->file('trainerAvatar')->isValid()) {
                    $destinationPath = public_path('assets/img/top-products');
                                
                 $request->file('trainerAvatar')->move($destinationPath, $request->file('trainerAvatar')->hashName());

                 DB::table('products')->where('id', $request->idproduit)->update(['nameP' => $request->libelle, 'description' => $request->description, 'price' => $request->prix, 'echeance' => $request->echeance, 'photo' => $request->file('trainerAvatar')->hashName()]);
                 return 1; 


                } else {

                    DB::table('products')->where('id', $request->idproduit)->update(['nameP' => $request->libelle, 'description' => $request->description, 'price' => $request->prix, 'echeance' => $request->echeance]);
                    return 1; 
                    

                }
            
            
        

    }  


        public function details_commande($idC){



                    if(Auth::user()){

                        $id = Auth::id(); 

                    $commande = DB::table('ligne_commande')
                    ->join('commande','commande.IdCommande','=','ligne_commande.IdCommande')
                    ->join('products','products.id','=','ligne_commande.IdProduit')
                    ->select('ligne_commande.*','commande.*','products.*', 'products.id as idP')
                    ->where('ligne_commande.IdCommande','=', $idC)
                    ->get();

                     // dd($commande);
                    

                    
                    
                    $client = DB::table('client')->where('IdClient', '1')->first();
                    
                    $users = DB::table('users')->where('id', '=', $id)->first();
                     // dd($users);

                    $comm = $idC;

                    $commande2 = DB::table('commande')
                    ->where('commande.IdCommande','=', $idC)
                    ->first();

                    return view('root.details_commande', compact('commande','client','id','users','commande2','comm'));

                    }else{
                        return view('auth.login');     
                    }
            
        }

        public function valid_commande(Request $request)
        {


                       $datepaiement = date("Y-m-d H:i:s");
                       $datj=date("Y-m-d");
                       $id = Auth::id();

                       DB::table('paiement')
                       ->Insert(['MontantPaiement' => $request->montantremis, 'DatePaiement' => $datj, 'IdCommande' => $request->idcmd, 'IdUser' => $id ]);

                       
                           $paiement = DB::table('paiement')
                           ->where('paiement.IdCommande','=', $request->idcmd)
                           ->get();
                           $s=0;
                        
                        foreach($paiement as $somme) {
                            $s=$s+$somme->MontantPaiement; 
                        }

                        
                        

                        if ($s >= $request->ttcmd) {
                            $etat = "Validée";
                        } else {
                            $etat = "Paiement en cours";
                        }

                       DB::table('ligne_commande')->where('IdCommande', $request->idcmd)->update(['EtatCommande' => $etat]);

                       DB::table('commande')->where('IdCommande', $request->idcmd)->update(['EtatCommande' => $etat]);





                       $commande = DB::table('ligne_commande')
                       ->join('commande','commande.IdCommande','=','ligne_commande.IdCommande')
                       ->join('products','products.id','=','ligne_commande.IdProduit')
                       ->select('ligne_commande.*','commande.*','products.*', 'products.id as idP')
                       ->where('ligne_commande.IdCommande','=', $request->idcmd)
                       ->get();

                        // dd($commande);
                       

                       
                       
                       $client = DB::table('client')->where('IdClient', '1')->first();
                       
                       $users = DB::table('users')->where('id', '=', $id)->first();
                        // dd($users);

                       $comm = $request->idcmd;

                       $commande2 = DB::table('commande')
                       ->where('commande.IdCommande','=', $request->idcmd)
                       ->first();

                       return view('root.details_commande', compact('commande','client','id','users','commande2','comm'));




                    
            
            
        }



        public function annuler_commande(Request $request)
        {
            
                if ($request->etat2 == "Annulée") {
                    DB::table('ligne_commande')->where('IdLigne', $request->idligne)->update(['EtatCommande' => $request->etat2]);
                    return 1; 
                } else {

                    return $request->etat2; 

                }         
            
            
        }
        public function supprimer_produit(Request $request)
        {

             if ($request->idproduit != 0) {
                    DB::table('products')->where('id', $request->idproduit)->update(['visible' => 1]);
                    return 1; 
                } else {

                    return -1; 
                }   
        }


}
