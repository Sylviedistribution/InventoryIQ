<?php

use App\Http\Controllers\ApproController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VenteController;
use App\Models\Approvisionnement;
use App\Models\Fournisseur;
use App\Models\Produit;
use App\Models\Vente;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('index');
});

Route::get('/create20Product', function () {
    Produit::factory()->count(20)->create();
});

Route::get('/create5Fournisseurs', function () {
    Fournisseur::factory()->count(10)->create();
});

Route::prefix('inventoryIQ')->group(function () {


    Route::middleware('auth')->group(function () {
        Route::get('/index', function () {
            $produits = Produit::count();
            $fournisseurs = Fournisseur::count();
            $appros = Approvisionnement::count();
            $ventes = Vente::count();
            return view('index',compact('produits','fournisseurs','appros','ventes'));
        })->name('index');

        Route::prefix('/appro')->controller(ApproController::class)->group(function () {
            Route::get('/list', 'index')->name('appro.list');
            Route::get('/search', 'filter')->name('appro.filter');

            Route::get('/make', 'create')->name('appro.create');
            Route::post('/store', 'store')->name('appro.store');
            Route::get('/delete/{a}', 'delete')->name('appro.delete');

        });

        Route::prefix('vente')->controller(VenteController::class)->group(function () {
            Route::get('/list', 'index')->name('vente.list');
            Route::get('/make', 'create')->name('vente.create');
            Route::post('/store', 'store')->name('vente.store');
            Route::get('/show/{v}s', 'show')->name('vente.show');
        });

        Route::prefix('produit')->controller(ProduitController::class)->group(function () {
            Route::get('/list', 'index')->name('produit.list');
            Route::get('/search', 'filter')->name('produit.filter');
            Route::get('/make', 'create')->name('produit.create');
            Route::get('/edit/{p}', 'edit')->name('produit.edit');
            Route::get('/delete/{p}', 'delete')->name('produit.delete');

            Route::post('/update/{p}', 'update')->name('produit.update');
            Route::post('/store', 'store')->name('produit.store');

        });

            Route::prefix('fournisseur')->controller(FournisseurController::class)->group(function () {
            Route::get('/list', 'index')->name('fournisseur.list');
                Route::get('/make', 'create')->name('fournisseur.create');
                Route::get('/delete/{f}', 'delete')->name('fournisseur.delete');
            Route::post('/store', 'store')->name('fournisseur.store');
        });

            Route::prefix('user')->controller(FournisseurController::class)->group(function () {
            Route::get('/list', 'index')->name('user.list');
            Route::get('/make', 'create')->name('user.create');
            Route::post('/store', 'store')->name('user.store');
        });

    });
    // AUTHENTIFICATION
    Route::controller(AuthController::class)->group(function () {
        Route::middleware('guest2')->group(function () {
            Route::post('/loginAction', 'loginAction')->name('login.action');
            Route::post('/registerSave', 'registerSave')->name('register.save');
            Route::get('/login', 'login')->name('login');
            Route::get('/register', 'register')->name('register');
            Route::get('/forgotPassword', 'forgotPassword')->name('forgotPassword');
        });
        Route::get('/logout', 'logout')->name('logout')->middleware('auth');
    });

});
