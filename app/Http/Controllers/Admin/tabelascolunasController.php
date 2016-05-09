<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\tabelascoluna;
use App\Vinculotabela;
use App\Parametro;
use App\Tabela;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use Session;
use PDO;

class tabelascolunasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $tabelascolunas = tabelascoluna::paginate(15);
        $vinculotabela = tabelascoluna::paginate(15);

        return view('admin.tabelascolunas.index', compact('tabelascolunas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        $idvinculotabela=$_GET['idvtabela'];
        $vinctabela=new Vinculotabela;
        $tabela=$vinctabela->find($idvinculotabela);


        $tabelas=new Tabela();

        $parametros=new Parametro();
        $colunas1=array();        $colunas2=array();
        $tipo=array();        $tabela=array();
        $tabelaid=array();        $x=0;
        foreach($tabelas->all() as $item)
        {
            $b=$parametros->all()->where('id',$item->id_parametro);
            foreach ($b as $row)
            {
                $pdo = new PDO('mysql:host='.$row->host.';dbname='.$row->banco, $row->usuario, '');
                $query = "SHOW COLUMNS FROM " . $item->nome;
                $result = $pdo->query($query);
                $tabela[]=$item->nome;
                while ($a = $result->fetch())
                {
                      if($x==0) {
                          $colunas1[] = $a['Field'];
                          $idtabela1=$item->id;
                      }
                      else
                      {
                            $colunas2[] = $a['Field'];
                          $idtabela2=$item->id;
                      }

                        $tipo[]=$a['Type'];
                }
                $x++;
            }
        }
        return view('admin.tabelascolunas.create',compact('tabelas','parametros','colunas1','colunas2','tabela','tabelaid','idtabela1','idtabela2'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {


        $qtd=$request->get('qtd');

        $col=array();
        $campo=array();
        for($x=0;$x<$qtd;$x++)
        {

            if(!empty($request->get('campo'.$x))&& $request->get('campo'.$x) !='0')
                DB::insert('insert into tabelascolunas (id_tabela1,id_tabela2,coluna1,coluna2) values (?, ?,?,?)',
                [$request->get('idtabela1'.$x),$request->get('idtabela2'.$x),$request->get('col'.$x),$request->get('campo'.$x)]);


        }
        $i=0;
        foreach($campo as $item)
        {
            if($i==0)
                $campos=$item;
            else
                $campos.=','.$item;
        }




        Session::flash('flash_message', 'Sucesso!');

        return redirect('admin/tabelascolunas');
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
        $tabelascoluna = tabelascoluna::findOrFail($id);

        return view('admin.tabelascolunas.show', compact('tabelascoluna'));
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
        $tabelascoluna = tabelascoluna::findOrFail($id);

        return view('admin.tabelascolunas.edit', compact('tabelascoluna'));
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
        $this->validate($request, ['id_coluna1' => 'required', 'id_coluna2' => 'required', ]);

        $tabelascoluna = tabelascoluna::findOrFail($id);
        $tabelascoluna->update($request->all());

        Session::flash('flash_message', 'tabelascoluna updated!');

        return redirect('admin/tabelascolunas');
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
        tabelascoluna::destroy($id);

        Session::flash('flash_message', 'tabelascoluna deleted!');

        return redirect('admin/tabelascolunas');
    }
}
