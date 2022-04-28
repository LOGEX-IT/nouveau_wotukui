<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// method: "get",
//                 data: {_token: '{{ csrf_token() }}'},
//                 dataType: "json",

Route::get('/accueil', 'AccueilController@index');
Route::get('/detail/{id}', 'AccueilController@detail');
Route::get('/categorie/{id}', 'CategorieController@index');
Route::get('/', 'AccueilController@index');
Route::get('/articles', 'ProductsController@index');


Route::get('/contact', function () {
    return view('contact');
});

Route::get('/condition', function () {
    return view('Condition');
});

Route::get('/mesure', function () {
    return view('SurMesure');
});

Route::post('/surmesure', 'CommandeController@mesure')->name("surmesure");



Route::get('cart2', 'ProductsController@cart');

Route::post('add-to-cart', 'ProductsController@addToCart');
Route::get('add-to-cart', 'AccueilController@index');

Route::patch('update-cart', 'ProductsController@update');

Route::post('remove', 'ProductsController@remove');
Route::get('remove', 'ProductsController@cart');

Route::post('removeAll', 'ProductsController@removeAll');
Route::get('removeAll', 'ProductsController@cart');

Route::post('update', 'ProductsController@update');
Route::get('update', 'ProductsController@cart');

Route::delete('remove-from-cart', 'ProductsController@remove');

Route::post('/cart', 'CommandeController@store')->name("commande.store");

Route::post('/chercher', 'CategorieController@search');

Route::post('/chercher2', 'CategorieController@search2');


// Authentication routes...
// Route::get('login', 'Auth\AuthController@getLogin');
// Route::get('/login', function () {
//     return view('auth/login');
// });
// Route::get('/register', function () {
//     return view('auth/register');
// });

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/home', 'AccueilController@index')->name('home');

// ADMIN ROUTING
Route::get('/agbana-admin', 'RootController@tableauDeBord')->name('tableauDeBord');

// gracia_essai_
Route::get('/liste_commande', 'RootController@liste_commande')->name('liste_commande');
Route::post('commande/{id}/update', 'RootController@change');

Route::get('/liste_produit', 'RootController@liste_produit')->name('liste_produits');
Route::get('/liste_commandeSurMesure', 'RootController@afficher')->name('listeCommandeSurMesure');

Route::get('/update_{id}', 'RootController@modif')->name('modification');
Route::post('/update_{id}', 'RootController@modifier')->name('modif');
Route::post('Delete_{id}', 'RootController@deleteProduit');
Route::get('/detail_{idP}', 'AccueilController@Information');
Route::get('/ajoute', 'RootController@ajoutPath');
Route::post('/ajoute', 'RootController@ajouter')->name('ajout_produit');
Route::get('/logout', 'RootController@deconnexion');


// Route::get('/produit_{IdLigne}', 'AccueilController@takeP');
// Route::post('/produit_{IdLigne}', 'AccueilController@updateProduit');


//fin_gracia_essai

Route::get('/detailC/{id}', 'RootController@details_commande');
Route::post('/validerCommande/', 'RootController@valid_commande')->name('valid_commande');
Route::post('/validC/', 'RootController@annuler_commande')->name('annuler_commande');

