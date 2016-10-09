<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Symfony\Component\Console\Helper\ProgressBar;
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
        $parametros1=DB::select("select * from vparametros1 where id = ? limit 1",[$id]);
        $colunas2=array();
        $qtdcolunas1=0;
        $qtdcolunas2=0;
        $idparam;
        foreach($tabelas1 as $item)
        {
            $colunas1[]=$item->coluna1;
            $qtdcolunas1++;
            $table1=$item->nome;
        }
        foreach($tabelas2 as $item)
        {
            $colunas2[]=$item->coluna2;
            $table2=$item->nome;
            $idparam=$item->id_parametro;
            $qtdcolunas2++;
        }
        $parametros2=DB::select("select * from vparametros2 where id=? limit 1",[$idparam]);
        foreach($parametros1 as $row) {
            $conexao1 = new PDO('mysql:host=' . $row->host . ';dbname=' . $row->banco, $row->usuario, '');
             //echo $row->host.$row->banco;
        }
        foreach($parametros2 as $row){
            $conexao2=new PDO('mysql:host='.$row->host.';dbname='.$row->banco,$row->usuario,'');}
        $x=0;
        $query1='select ';
        $nomecampo1=null;
        foreach($colunas1 as $row)
        {
            $coluna1[$x]=$row;
            $col1 =null;
            $col1 = $x == 0 ?  $row : $col1 . ',' . $row;
            $x++;
            $query1.= $col1;
            $nomecampo1.=$col1;
        }
        $query1.=' from '.$table1;
        $y=0;
        $query2='select ';
        $nomecampo2=null;
        foreach($colunas2 as $row)
        {
            $coluna2[$y]=$row;
            $col2=null;
            $col2 = $y == 0 ?  $row : $col2 . ',' . $row;
            $y++;
            $query2.= $col2;
            $nomecampo2.=$col2;
        }
        $query2.=' from '.$table2;
        $insertbase1=0;
        $insertbase2=0;
        $result1=$conexao1->prepare($query1);
        $result2=$conexao2->prepare($query2);
        $valores1=null;
        $queryinsert1=null;
        $valores2=null;
        $values1=null;
        $queryinsert2=null;
        $result1->execute();
        $result2->execute();
        $val1=null;
        $val2=null;
        $aux1=0;
        $aux2=0;
        while ($res1=$result1->fetch())
        {

         for($j=0;$j<$qtdcolunas1;$j++)
         {
             if ($j == 0) {


                 $valores2 =  "'".$res1[$coluna1[$j]]."'";
                 $val1[$aux1][$j]=   $res1[$coluna1[$j]];

             } else {

                 $valores2 .= ",'" . $res1[$coluna1[$j]]."'";
                 $val1[$aux1][$j]=   $res1[$coluna1[$j]];

             }
         }

            $queryinsert2="insert into ".$table2." (".$nomecampo2.") values (".$valores2.")";

            if($conexao2->query($queryinsert2))
            {
                $insertbase1++;
                echo $insertbase1;
            }
            else
            {

                $aux1++;

            }

        }

        while ($res2=$result2->fetch())
        {
            for ($j = 0; $j < $qtdcolunas2; $j++) {
                if ($j == 0) {


                    $valores1 = "'" . $res2[$coluna2[$j]]."'";
                    $val2[$aux2][$j]=   $res2[$coluna2[$j]];
                } else {

                    $valores1 .= ",'" . $res2[$coluna2[$j]]."'";
                    $val2[$aux2][$j]=   $res2[$coluna2[$j]];
                }
            }
            $queryinsert1[$aux1++] = "insert into ".$table1." (".$nomecampo1.") values (".$valores1.")";

            $conexao1->query($queryinsert1[$aux1-1]);
            if ($conexao1->query($queryinsert1[$aux1-1])) {
                $insertbase2++;
            }
            else{$aux2++;}
        }

        $selectbase2="select * from ".$table2;
        $selectbase1="select * from ".$table1;
        //echo $selectbase2;
        $result2=$conexao2->query($selectbase2);
        $result1=$conexao1->query($selectbase1);

        while($res2=$result2->fetch())
        {
            while($res=$result1->fetch()) {
                if ($res2['updated_at'] < $res['updated_at']){
                   // echo $res2['updated_at']." = " .$res['updated_at'] ."-mais velho";
                    $sql2='update '.$table2.' set ';
                    for($auxj=0;$auxj<$qtdcolunas2;$auxj++)
                    {
                        if($auxj==0)
                            $sql2.=$colunas2[$auxj]."='".$res[$colunas1[$auxj]]."'";
                        else
                            $sql2.=",".$colunas2[$auxj]."='".$res[$colunas1[$auxj]]."'";
                    }
                    $sql2.=" where ".$colunas2[0]."='".$res[$colunas1[0]]."'";
                    //echo $sql2;
                    $resultado2=$conexao2->prepare($sql2);
                    $resultado2->execute();

                    if($resultado2->rowCount())
                        echo 'ok';
                    else
                        echo 'erro' .$table2;




                }

                else
                {
                    //echo $res2['updated_at']."= " .$res['updated_at']."-mais novo";
                    $sql1='update '.$table1.' set ';
                    for($auxj=0;$auxj<$qtdcolunas1;$auxj++)
                    {
                        if($auxj==0)
                            $sql1.=$colunas1[$auxj]."='".$res2[$colunas2[$auxj]]."'";
                        else
                            $sql1.=",".$colunas1[$auxj]."='".$res2[$colunas2[$auxj]]."'";
                    }
                    $sql1.=" where ".$colunas1[0]."='".$res2[$colunas2[0]]."'";
                    //echo $sql1;
                    $resultado1=$conexao1->prepare($sql1);
                    $resultado1->execute();
                    if($resultado1->rowCount() )
                        echo 'ok';
                    else
                        echo 'erro';
                }

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

        Session::flash('flash_message', 'Configuracao atualizada!');

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

        Session::flash('flash_message', 'Configuracao apagada!');

        return redirect('admin/configuracoes');
    }
}
