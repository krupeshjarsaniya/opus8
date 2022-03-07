<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
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

/* START Add by Dhaval */
Route::get('/sign-up-bar', [HomeController::class, 'signUpBar'])->name('sign.up.bar');
/* END Add by Dhaval */

$appRoutes = function () {

    Auth::routes();

    Route::get('/', [HomeController::class, 'agent_zoho_preview'])->name('agent.preview');
    // Route::post('/', [HomeController::class, 'agent_zoho_preview'])->name('agent.preview');

    Route::middleware(['auth'])->group(function () {
        Route::post('/agent-loadmore', [AgentController::class, 'load_agents']);
        Route::resources(['agent' => AgentController::class]);
        Route::post('/agent/{id}/update', [AgentController::class, 'update'])->name('agent.update');
        Route::delete('/agent/{agent_id}/songs/{song_id}', [AgentController::class, 'deleteSong'])->name('agent.song.delete');
    });
};

Route::group(['prefix' => '/', 'namespace' => ''], $appRoutes);

