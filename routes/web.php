<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BaseArticleController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PartnerController;
use App\Http\Tools\FileManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pruebas', function () {
    return view('pruebas');
});
Route::post('/pruebas-post', function (Request $request) {
    $manager = new FileManager();
    if ($request->hasFile('file')) {
        $filepath = $manager->storeImage($request->file('file'));
        echo '<h1>' . $filepath . '</h1>';
        echo $manager->getImage($filepath, ['codec' => '']);
    }

    echo '<hr>';
    //echo '<h1>' . $manager->storeImage($_POST['file']) . '</h1>';
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

/**
 * Devuelve la página del usuario especificado
 */
Route::get('/ver/{user}', function ($user) {
    return "<h1>Buscando al usuario $user</h1>";
});

/**
 * Devuelve un aplicacion especificada
 *
 * Requiere autorización
 */
Route::middleware(['auth'])->group(function () {

    /**
     * Devuelve la ruta que gestiona pedidos
     */
    Route::resource('pedidos', OrderController::class);
    /**
     * Devuelve la aplicación de creadores
     */
    Route::prefix('creador')->group(function () {
        Route::get('/', function () {
            return "<h1>Hola " . Auth::user()->name . " estas en la pagina de creadores</h1>";
        });
    });

    /**
     * Devuelve la aplicación de socios
     */
    Route::prefix('socios')->middleware(['auth.partner'])->group(function () {
        Route::prefix('pedidos')->group(function () {
            Route::get('/', [OrderController::class, 'index']);
            Route::get('/{id}', [OrderController::class, 'show']);
            Route::get('/{id}/edit', [OrderController::class, 'edit']);
            Route::post('/{id}', [OrderController::class, 'update']);
        });

    });

    /**
     * Devuelve el core de la aplicación
     */
    Route::prefix('core')->middleware(['auth.core'])->group(function () {
        Route::get('/', function () {
            return '<h1>Página de Incio</h1>';
        });
        Route::resource('socios', PartnerController::class);
        Route::resource('articulos', ArticleController::class);
        Route::resource('articulos-base', BaseArticleController::class);
    });
});

require __DIR__ . '/auth.php';
