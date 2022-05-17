<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreSemanaRequest;
use App\Http\Requests\UpdateSemanaRequest;
use App\Models\Semana;

class SemanasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('semanas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSemanaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSemanaRequest $request)
    {
      
    }

    public function AgregarPlan(Request $request)
    {
       
        
          Semana::create([
                
                'id_nivel' => $request->id_nivel,
                'contenido' => $request->contenido,
                'semana' => $request->semana,
                'codigo_video' => $request->codigo_video                
                
            ]);

            $data = array('message'=>'success');
        

            echo json_encode($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Semana  $semana
     * @return \Illuminate\Http\Response
     */
    public function show(Semana $semana)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Semana  $semana
     * @return \Illuminate\Http\Response
     */
    public function edit(Semana $semana)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSemanaRequest  $request
     * @param  \App\Models\Semana  $semana
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSemanaRequest $request, Semana $semana)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Semana  $semana
     * @return \Illuminate\Http\Response
     */
    public function destroy(Semana $semana)
    {
        //
    }
}
