<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Tabela;
use App\Parametro;
use App\Configuraco;
use Illuminate\Http\Request;
use Carbon\Carbon;
use PDO;
use Session;

class TabelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $tabelas = Tabela::paginate(15);

        return view('admin.tabelas.index', compact('tabelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        $configuracoes= new Configuraco;
        $parametros=new Parametro;



//                $host=$parametros->host;
//                $usuario=$parametros->usuario;
//                $senha=$parametros->senha;
  //              $banco=$parametros->banco;
                //$pdo = new PDO('mysql:host='.$host.';dbname='.$banco,$usuario, '');
/*                $pdo = new PDO('mysql:host=localhost;dbname=tcc','root', '');
                $sql = 'SHOW TABLES';

                $query = $pdo->query('SHOW TABLES');
                $query->fetchAll();




        //}
        $tabelas=$query;

*/
        return view('admin.tabelas.create',compact('configuracoes','parametros'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['id_configuracao' => 'required', 'id_parametro' => 'required', ]);

        Tabela::create($request->all());

        Session::flash('flash_message', 'Tabela added!');

        return redirect('admin/tabelas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function show($id)
    {
        $tabela = Tabela::findOrFail($id);

        return view('admin.tabelas.show', compact('tabela'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function edit($id)
    {
        $configuracoes= new Configuraco;
        $parametros=new Parametro;
        $tabela = Tabela::findOrFail($id);

        return view('admin.tabelas.edit', compact('tabela','configuracoes','parametros'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function update($id, Request $request)
    {
        $this->validate($request, ['id_configuracao' => 'required', 'id_parametro' => 'required' ]);

        $tabela = Tabela::findOrFail($id);
        $tabela->update($request->all());

        Session::flash('flash_message', 'Tabela updated!');

        return redirect('admin/tabelas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function destroy($id)
    {
        Tabela::destroy($id);

        Session::flash('flash_message', 'Tabela deleted!');

        return redirect('admin/tabelas');
    }
}
