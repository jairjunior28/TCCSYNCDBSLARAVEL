<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Configuraco;
use App\Parametro;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class ParametrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $parametros = Parametro::paginate(15);

        return view('admin.parametros.index', compact('parametros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        $configuracoes=new Configuraco;
        return view('admin.parametros.create',compact('configuracoes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['id_configuracao' => 'required', 'host' => 'required', 'usuario' => 'required', 'banco' => 'required', ]);

        Parametro::create($request->all());

        Session::flash('flash_message', 'Parametro added!');


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
        $parametro = Parametro::findOrFail($id);

        return view('admin.parametros.show', compact('parametro'));
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
        $parametro = Parametro::findOrFail($id);
        $configuracoes=new Configuraco;
        return view('admin.parametros.edit', compact('parametro','configuracoes'));
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
        $this->validate($request, ['id_configuracao' => 'required', 'host' => 'required', 'usuario' => 'required', 'banco' => 'required', ]);

        $parametro = Parametro::findOrFail($id);
        $parametro->update($request->all());

        Session::flash('flash_message', 'Parametro updated!');

        return redirect('admin/parametros');
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
        Parametro::destroy($id);

        Session::flash('flash_message', 'Parametro deleted!');

        return redirect('admin/parametros');
    }
}
