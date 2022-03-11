<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\IndustryController;
use App\Http\Controllers\WeeklyBillingController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\Controller;
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
Route::get('/sign-up', [LoginController::class, 'signup'])->name('signup');
Route::get('/signup-chart', [LoginController::class, 'signupChart'])->name('signup.chart');
Route::post('/agent-loadmore-signup', [LoginController::class, 'signupChart'])->name('signup.chart.loadmore');

//AGENT BACKEND
Route::get('/agent-backend', [AgentController::class, 'agentBackend'])->name('agent.backend');
Route::get('/agent-frontend', [AgentController::class, 'agentFrontend'])->name('agent.frontend');

//INDUSTRY
Route::get('/industry', [IndustryController::class, 'industry'])->name('industry');
Route::get('/industry-chart/{id}', [IndustryController::class, 'industryChart'])->name('industry.chart');
Route::post('/agent-loadmore-industry', [IndustryController::class, 'load_agents_industry'])->name('industry.chart.billing');
Route::post('/agent-submit-industry', [IndustryController::class, 'submit_agents_industry'])->name('industry.chart.submit');

// Weekly Billing
Route::get('/bill-form', [WeeklyBillingController::class, 'billForm'])->name('bill.form');
Route::get('/bill-chart', [WeeklyBillingController::class, 'billChart'])->name('bill.chart');
Route::post('/agent-loadmore-biling', [WeeklyBillingController::class, 'load_agents_billing'])->name('bill.chart.billing');
Route::post('/agent-submit-billing', [WeeklyBillingController::class, 'submit_agents_billing'])->name('bill.chart.submit');

//METTING
Route::get('/meeting-chart', [MeetingController::class, 'meetingChart'])->name('meetign.chart');
