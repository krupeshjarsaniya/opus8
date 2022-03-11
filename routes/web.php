<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\IndustryController;
use App\Http\Controllers\WeeklyBillingController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PslsController;
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

// /* START Add by Dhaval */
// Route::get('/sign-up-bar', [HomeController::class, 'signUpBar'])->name('sign.up.bar');
// /* END Add by Dhaval */

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
Route::get('/signup-chart', [LoginController::class, 'signupChart'])->name('signup.chart');

//Psls
Route::prefix('/psls')->group(function () {
    Route::get('/', [PslsController::class, 'psls'])->name('psls');
    Route::post('/store', [PslsController::class, 'pslsStore'])->name('psls.store');
    Route::get('/agent-chart/{agentId}', [PslsController::class, 'pslsAgentChart'])->name('agent.chart');
});

//INDUSTRY
Route::get('/industry', [IndustryController::class, 'industry'])->name('industry');
Route::get('/industry-chart', [IndustryController::class, 'industryChart'])->name('industry.chart');

// Weekly Billing
Route::get('/bill-form', [WeeklyBillingController::class, 'billForm'])->name('bill.form');
Route::get('/bill-chart', [WeeklyBillingController::class, 'billChart'])->name('bill.chart');

//METTING
Route::get('/meeting-chart', [MeetingController::class, 'meetingChart'])->name('meetign.chart');
