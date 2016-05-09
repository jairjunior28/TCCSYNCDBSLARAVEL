<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Configuraco;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use DB;
use PDO;

class ConfiguracoesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $configuracoes = Configuraco::paginate(15);

        return view('admin.configuracoes.index', compact('configuracoes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('admin.configuracoes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['titulo' => 'required', ]);

        Configuraco::create($request->all());

        Session::flash('flash_message', 'Configuraco added!');

        return redirect('admin/parametros');
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
        $configuraco = Configuraco::findOrFail($id);
        $tabelas1=DB::select("select * from vtabelas1 where id_configuracao=?",[$id]);
        $tabelas2=DB::select("select * from vtabelas2 where id_configuracao=?",[$id]);
        $parametros1=DB::select("select * from vparametros1 where id_configuracao = ? limit 1",[$id]);
        $parametros2=DB::select("select * from vparametros2 where id_configuracao=? limit 1",[$id]);
        $colunas2=array();
        foreach($tabelas1 as $item)
        {
            $colunas1[]=$item->coluna1;

            $table1=$item->nome;
        }
        foreach($tabelas2 as $item)
        {
            $colunas2[]=$item->coluna2;
            $table2=$item->nome;
        }

        foreach($parametros1 as $row) {
            $conexao1 = new PDO('mysql:host=' . $row->host . ';dbname=' . $row->banco, $row->usuario, '');

        }
        foreach($parametros2 as $row)
            $conexao2=new PDO('mysql:host='.$row->host.';dbname='.$row->banco,$row->usuario,'');
        $x=0;
        foreach($colunas1 as $row)
        {
            if($x==0)
                $col1=$row;
            else
                $col1.=','.$row;

        }
        $x=0;
        foreach($colunas2 as $row)
        {
            if($x==0)
                $col2=$row;
            else
                $col2.=','.$row;

        }
        $result1=$conexao1->query('select '.$col1.' from '.$table1);
        $result2=$conexao2->query('select '.$col2.' from '.$table2);
        while ($res1=$result1->fetch())
        {
            while ($res2=$result2->fetch())
            {

            }

        }


        return view('admin.configuracoes.show', compact('configuraco'));
    }

    /**
     * Show tenho the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function edit($id)
    {
        $configuraco = Configuraco::findOrFail($id);

        return view('admin.configuracoes.edit', compact('configuraco'));
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
        $this->validate($request, ['titulo' => 'required', ]);

        $configuraco = Configuraco::findOrFail($id);
        $configuraco->update($request->all());

        Session::flash('flash_message', 'Configuraco updated!');

        return redirect('admin/configuracoes');
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
        Configuraco::destroy($id);

        Session::flash('flash_message', 'Configuraco deleted!');

        return redirect('admin/configuracoes');
    }
}
