<?php
use App\Parametro;
Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware' => ['web']], function () {
	Route::resource('admin/configuracoes', 'Admin\\ConfiguracoesController');
});
Route::group(['middleware' => ['web']], function () {
	Route::resource('admin/parametros', 'Admin\\ParametrosController');
});
Route::group(['middleware' => ['web']], function () {
	Route::resource('admin/tabelas', 'Admin\\TabelasController');
});
Route::get('/ajax-tabela',function(){
	$id_parametro=$_GET['id_parametro'];
	$parametro= new App\Parametro;
	$conf=$parametro->find($id_parametro);
	$pdo= new PDO('mysql:host='.$conf->host.';dbname='.$conf->banco,$conf->usuario, '');
	$query = $pdo->query('SHOW TABLES');
	$tabelas= $query->fetchAll();
	return Response::json($tabelas);
});
Route::group(['middleware' => ['web']], function () {
	Route::resource('admin/vinculotabelas', 'Admin\\VinculotabelasController');
});
Route::group(['middleware' => ['web']], function () {
	Route::resource('admin/tabelascolunas', 'Admin\\tabelascolunasController');
});
Route::group(['middleware' => ['web']], function () {
	Route::resource('admin/taferas', 'Admin\\tarefasController');
});