<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart; 
use Session;        

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all(); 

        return view('article', compact('products'));
    }

    
    public function addToCart(Request $request)
    {
         $id = $request->produit_id;
         $qte = $request->qtybutton;
        // $qte = intval($qte);
         $product = Product::find($id);

        // $cart[$request->id]["quantity"] = $request->quantity;
         // $prix = number_format($product->price, 2);

           for ($i=0; $i < $request->qtybutton; $i++) {
            // $request->session()->push('cart', Product::find($request->id));
            Cart::add(['id' => $product->id, 'name' => $product->nameP, 'price' => $product->price, 'qty' => 1, 'options' => ['photo' => $product->photo]]);
            
           }

           // dd($product);

         

          

         //   $products = Product::all();

         // return view('accueil', compact('products'));


         

         // $htmlCart = view('_menu')->render();

             // return response()->json(['msg' => 'Produit ajouté avec succès', 'data' => $htmlCart]);
           
           return back();


         

       

        // $cart = session()->get('cart');

        // if cart is empty then this the first product
        // if(!$cart) {

            // $cart = [
            //     $id => [
            //         "name" => $product->name,
            //         "quantity" => $qte,
            //         "price" => $product->price,
            //         "photo" => $product->photo,
            //         "qte" => $qte
            //     ]
            // ];

            // session()->put('cart', $cart);

            // $htmlCart = view('_menu')->render();

            // return response()->json(['msg' => 'Produit ajouté avec succès', 'data' => $htmlCart]);

            //return redirect()->back()->with('success', 'Product added to cart successfully!');
        // }

        // if cart not empty then check if this product exist then increment quantity
        // if(isset($cart[$id])) {

            // $cart[$id]['quantity']++;

            // session()->put('cart', $cart);

            // $htmlCart = view('_menu')->render();

            // return response()->json(['msg' => 'Produit ajouté avec succès!', 'data' => $htmlCart]);

            //return redirect()->back()->with('success', 'Product added to cart successfully!');

        // }

        // if item not exist in cart then add to cart with quantity = 1
        // $cart[$id] = [
        //     "name" => $product->name,
        //     "quantity" => $qte,
        //     "price" => $product->price,
        //     "photo" => $product->photo,
        //     "qte" => $qte
        // ];

        // session()->put('cart', $cart);

        // $htmlCart = view('_menu')->render();

        // return response()->json(['msg' => 'Produit ajouté avec succès!', 'data' => $htmlCart]);

        //return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function cart(){ 
        // $orders = session()->get('cart');
        // $customer = session()->get('customerData')[0];
        // $orderCounter = array();
        // if(!is_null($orders)) {
        //     foreach ($orders as $key => $val) {
        //         if (!isset($orderCounter[$val['id']])) {
        //             $orderCounter[$val['id']] = array(
        //                 'id' => $val['id'],
        //                 'quantity' => 0
        //             );
        //         }
        //         $orderCounter[$val['id']]['quantity']++;
        //     }

        //     $orderCounter = array_values($orderCounter);

        //     return view('cart')
        //         ->withOrders($orders != null ? array_unique($orders) : null)
        //         ->withQuantities($orderCounter);
        // }

        // return $this->getHomeView();
        //Cart::destroy();
        // foreach (Cart::content() as $key) {
             $a = Cart::content();
             //dd($a['1fa0b5ff917951cb8547d58f75ee932d']);    
             // dd(Cart::content());

        // }
         return view('cart2');
    }




    public function update(Request $request)
    {

        // dd($request->qty);
        
        
       
         Cart::update($request->rowId, $request->qtybutton);

        return back();

    
    }

    public function remove(Request $request)
    {
        // dd($request);
        //dd($item);
        $rowId = $request->rowId;

        Cart::remove($request->rowId);
         // return view('cart');
        return back();

    }

    public function removeAll(Request $request)
    {

        foreach(Cart::content() as $article) {
            Cart::remove($article->rowId);

        }
        return back();

    }

    


    /**
     * getCartTotal
     *
     *
     * @return float|int
     */
   
}
