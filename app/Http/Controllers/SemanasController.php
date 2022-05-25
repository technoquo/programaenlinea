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

    public function ListaPlanPorNivel(Request $request)
    {
       
        
        
        $arr['data'] = Semana::where('id_nivel', '=', $request->id_nivel)->orderBy('semana', 'ASC')->get();
                

            echo json_encode($arr);
            exit;
    }

  


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
     * @param  int  $id_semana
     * @return \Illuminate\Http\Response
     */
    public function edit($id_semana)
    {
        
        
        return view('semana.edit')->with('plan', Semana::where('id_semana', $id_semana)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id_semana
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_semana)
    {
        
        $request->validate([
            'wysiwyg-editor' => 'required',         
            'codigo' => 'required'         
        ]);

          Semana::where('id_semana',$id_semana)
                 ->update([
                    'contenido' => $request->input('wysiwyg-editor'),                    
                    'semana' =>  $request->input('numero_semana'),  
                    'codigo_video' =>  $request->input('codigo'),                   
                   // 'user_id'  => auth()->user()->id,
            
        ]);

        return redirect('/home')
                ->with('message', '¡Tu plan ha sido actualizada!');
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
