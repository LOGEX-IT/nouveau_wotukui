<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart; 
use Session;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CommandeController extends Controller
{
    public function store(Request $request)
    {
        //dd($request);

             //dd(Cart::content());

        	// $commande = new Commande();
        	// $commande->EtatCommande = 'passé';
    	// dd(Cart::subtotal());
        	$prixtotal = Cart::subtotal();
        	$created_at = date("Y-m-d H:i:s");
        	$updated_at = date("Y-m-d H:i:s");


        	$idcommande = DB::table('commande')->insertGetId(
            ['PrixTotal' => $prixtotal, 'created_at' => $created_at, 'updated_at' => $updated_at, 'Nom' => $request->nom, 'Prenom' => $request->prenom, 'Telephone' => $request->numero, 'Adresse' => $request->adresse, 'EtatCommande' => 'En attente de validation' ]
            );




        	// $commande = Commande::find($id);

        	// $idcommande = DB::table('commande')
        	// ->where('name', 'John')
        	// ->orderBy('commande.IdCommande', 'desc')
        	// ->first();

        	

            // DB::table('users')
            // ->updateOrInsert(
            // ['email' => 'john@example.com', 'name' => 'John'],
            // ['votes' => '2']
            // );

        	


            foreach(Cart::content() as $produit) {

               DB::table('ligne_commande')
               ->updateOrInsert(
               ['QteProd' => $produit->qty, 'IdProduit' => $produit->id, 'IdCommande' => $idcommande, 'EtatCommande' => 'En attente de validation', 'created_at' => $created_at, 'updated_at' => $updated_at ]
              );

                //dd($article);
                // $commande = new Commande();
                // $commande->id_article = $produit->id;
                // $commande->id_client = $article->model->clients_id;
                // $commande->etat = false;
                // $commande->nom_acheteur = $request->nom;
                // $commande->prenom_acheteur = $request->prenom;
                // $commande->numero_acheteur = $request->numero;
                // $commande->prix = $article->price;
                // $commande->quantite = $article->qty;
                // $commande->save();
                //dd($commande);
            }
            Cart::destroy();


                    $message = '<h2>Informations fournis par le client :</h2>
                               <p><b>Nom:</b> '.$request->nom.'</p>
                               <p><b>Prenom:</b> '.$request->prenom.'</p>
                               <p><b>Adresse:</b> '.$request->adresse.'</p>
                               <p><b>Telephone:</b> '.$request->numero.'</p>';
                    
                    
                    $objet = "Nouvelle commande WOTUKUI";

                        $destinataire = "infos@logexit.com";

                        $headers  = 'MIME-Version: 1.0' . "\r\n";
                        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                        $headers .= 'From: commande@wotukui.com' . "\r\n";
                            if ( mail($destinataire, $objet, $message, $headers) ) // On envoie l'e-mail.
                            {
                        
                            $test="OK";
                            }

                    
              
            


            // return redirect('/')->with('success',"Votre commande a été enrégistré!!!");

            $success=1;

        return view('cart2', compact('success'));
        

    }

    public function mesure(Request $request){

        $created_at = date("Y-m-d H:i:s");
        $updated_at = date("Y-m-d H:i:s");
        if ($request->hasFile('myfile') AND $request->file('myfile')->isValid()) {
        
        $destinationPath = public_path('Images/Modele');
        $nom2="Images/Modele".$request->file('myfile')->getClientOriginalName();                     
        $request->file('myfile')->move($destinationPath, $request->file('myfile')->getClientOriginalName());
 
        $idMesure = DB::table('surmesure')->insertGetId(
            ['created_at' => $created_at, 'update_at' => $updated_at, 'Nom' => $request->nom,
             'Numéro' => $request->numero, 'Description' => $request->description, 
             'Photo'=> $nom2 ]
            ); 
    } else {
        $idMesure = DB::table('surmesure')->insertGetId(
            ['created_at' => $created_at, 'update_at' => $updated_at, 'Nom' => $request->nom,
             'Numéro' => $request->numero, 'Description' => $request->description ]
            ); 
    }
        $success=1;

        return view('SurMesure', compact('success'));

    }
    

}
