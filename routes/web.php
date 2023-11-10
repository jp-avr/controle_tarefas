<?php

use App\Mail\MensagemTesteMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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

Auth::routes(['verify' => true]);

Route::group(['middleware' => ['verified']], function() {
    // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('tarefa/exportacao/xlsx', 'App\Http\Controllers\TarefaController@exportXLSX')->name('tarefa.exportacao.xlsx');
    Route::get('tarefa/exportacao/csv', 'App\Http\Controllers\TarefaController@exportCSV')->name('tarefa.exportacao.csv');
    Route::get('tarefa/exportacao/pdf', 'App\Http\Controllers\TarefaController@exportPDF')->name('tarefa.exportacao.pdf');

    Route::resource('tarefa','App\Http\Controllers\TarefaController');
});





Route::get('mensagem-teste', function() {
    return new MensagemTesteMail();
    // Mail::to('doritossantos3@gmail.com')->send(new MensagemTesteMail());
    // return 'Email enviado com sucesso';
});
