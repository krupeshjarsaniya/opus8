<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\IndustryController;
use App\Http\Controllers\WeeklyBillingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
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

// SIGNUP
Route::get('/signup', [LoginController::class, 'signup'])->name('signup');



//AGENT BACKEND

Route::get('/agent_backend', [AgentController::class, 'agentBackend'])->name('agent.backend');
Route::get('/agent_frontend', [AgentController::class, 'agentFrontend'])->name('agent.frontend');

//INDUSTRY

Route::get('/industry', [IndustryController::class, 'industry'])->name('industry');
Route::get('/industry_chart', [IndustryController::class, 'industryChart'])->name('industry.chart');

// Weekly Billing

Route::get('/bill_form', [WeeklyBillingController::class, 'billForm'])->name('bill.form');
