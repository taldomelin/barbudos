<?php

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProfissionalController;
use App\Http\Controllers\ServicoController;
use App\Http\Requests\ProfissionalFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
//serviço
Route::post('servico/criar', [ServicoController::class, 'criarServico']);
Route::post('servico/pesquisarNome',[ServicoController::class, 'pesquisaPorNome']);
Route::delete('servico/deletar/{id}',[ServicoController::class, 'excluir']);
Route::put('servico/atualizar', [ServicoController::class, 'update']);
Route::get('servico/retornarTodos', [ServicoController::class, 'retornarTodos']);
Route::get('servico/pesquisarID/{id}', [ServicoController::class, 'pesquisarIdServico']);
//cliente
Route::post('cliente/criar', [ClienteController::class, 'criarCliente']);
Route::post('cliente/pesquisarPorNome',[ClienteController::class, 'pesquisaPorNome']);
Route::get('cliente/pesquisarCelular',[ClienteController::class, 'pesquisaCelular']);
Route::get('cliente/pesquisarPorCPF',[ClienteController::class, 'pesquisaCPF']);
Route::get('cliente/pesquisaPorEmail',[ClienteController::class, 'pesquisaEmail']);
Route::delete('cliente/delete/{id}',[ClienteController::class, 'exclui']);
Route::put('cliente/update', [ClienteController::class, 'update']);
Route::put('cliente/esqueciSenha/{id}',[ClienteController::class, 'esqueciSenha']);
Route::get('cliente/retornarTudo', [ClienteController::class, 'retornarTudo']);
Route::get('cliente/pesquisaId/{id}', [ClienteController::class, 'pesquisaId']);

//profissionais
Route::post('profissional/criar', [ProfissionalController::class, 'criarProfissional']);
Route::post('profissional/pesquisarNome',[ProfissionalController::class, 'pesquisaPorNome']);
Route::get('profissional/pesquisaCelular',[ProfissionalController::class, 'pesquisaCelular']);
Route::get('profissional/pesquisarCPF',[ProfissionalController::class, 'pesquisaCPF']);
Route::get('profissional/pesquisarEmail',[ProfissionalController::class, 'pesquisaEmail']);
Route::delete('profissional/deletar/{id}',[ProfissionalController::class, 'exclui']);
Route::put('profissional/atualizar', [ProfissionalController::class, 'update']);
Route::get('profissional/retornarTodos', [ProfissionalController::class, 'retornartodosProfissionais']);
Route::get('profissional/pesquisaId/{id}', [ProfissionalController::class, 'pesquisaPorId']);
Route::put('profissional/esqueciSenha/{id}',[ProfissionalController::class, 'esqueciSenha']);

//agenda
Route::post('agenda/criar', [AgendaController::class, 'criarAgenda']);
Route::post('agenda/pesquisaDataHora',[AgendaController::class, 'pesquisaPorDataHora']);
Route::get('agenda/retornaTodos', [AgendaController::class, 'retornarTudo']);
Route::delete('agenda/delete/{id}',[AgendaController::class, 'excluiAgenda']);
Route::put('agenda/update', [AgendaController::class, 'updateAgenda']);