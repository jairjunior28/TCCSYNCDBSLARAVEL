<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Vinculotabela;
use App\Tabela;
use App\Parametro;
use App\tabelascoluna;
use Illuminate\Http\Request;
use Carbon\Carbon;
use PDO;
use Session;

class VinculotabelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $vinculotabelas = Vinculotabela::paginate(15);

        return view('admin.vinculotabelas.index', compact('vinculotabelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {

        $tabela=new \App\Tabela();


        return view('admin.vinculotabelas.create',compact('tabela'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['id_tabela1' => 'required', 'id_tabela2' => 'required', ]);
        $tabela1=$request->get('id_tabela1');
        $tabela2=$request->get('id_tabela2');
        $table1 = Tabela::findOrFail($tabela1);
        $id_parametro1=$table1->id_parametro;
        $parametro1=Parametro::findOrFail($id_parametro1);
        $conexao1=new PDO('mysql:host=' . $parametro1->host . ';dbname=' . $parametro1->banco, $parametro1->usuario, $parametro1->senha);
        $table2=Tabela::findOrFail($tabela2);
        $parametro2=Parametro::findOrFail($table2->id_parametro);
        $conexao2=new PDO('mysql:host=' . $parametro2->host . ';dbname=' . $parametro2->banco, $parametro2->usuario, $parametro2->senha);
        $sql1="alter table ".$table1->nome." add updated_at TIMESTAMP NOT NULL 
        DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP";
        $conexao1->query($sql1);
        $sql2="alter table ".$table2->nome." add updated_at TIMESTAMP NOT NULL 
        DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP";
        $conexao2->query($sql2);

            Vinculotabela::create($request->all());
            Session::flash('flash_message', 'Vinculo tabela adicionado!');

        return redirect('admin/vinculotabelas');
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
        $vinculotabela = Vinculotabela::findOrFail($id);

        return view('admin.vinculotabelas.show', compact('vinculotabela'));
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
        $vinculotabela = Vinculotabela::findOrFail($id);
        $tabela=new \App\Tabela();

        return view('admin.vinculotabelas.edit', compact('vinculotabela','tabela'));
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
        $this->validate($request, ['id_tabela1' => 'required', 'id_tabela2' => 'required', ]);

        $vinculotabela = Vinculotabela::findOrFail($id);
        $vinculotabela->update($request->all());

        Session::flash('flash_message', 'Vinculotabela updated!');

        return redirect('admin/vinculotabelas');
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
        Vinculotabela::destroy($id);

        Session::flash('flash_message', 'Vinculotabela deleted!');

        return redirect('admin/vinculotabelas');
    }
}
