<?php

namespace App\Http\Controllers;

use App\Proposiciones;
use App\Http\Resources\Proposiciones as ProposicionesResource;
use Illuminate\Http\Request;

class ProposicionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ProposicionesModel = new Proposiciones;

            $respuesta = $ProposicionesModel::all();

            if ($respuesta->isEmpty()) {
                // return response()->json(['error' => 'No se encontró información con los datos ingresados!'], 200);
                return array(['error' => 'No se encontró información. Verifique la conexión e intente nuevamente!']);
            }else {
                ProposicionesResource::withoutWrapping();
                return new ProposicionesResource($respuesta);
            }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $proposicion = Proposiciones::create([
            'identificacion' => $request->input('identificacion'),
            'nombre' => $request->input('nombre'),
            'email' => $request->input('email'),
            'telefono' => $request->input('telefono'),
            'ejes' => $request->input('ejes'),
            'problema' => $request->input('problema'),
            'solucion' => $request->input('solucion'),
            'video' => $request->input('video'),
        ]);

        ProposicionesResource::withoutWrapping();
        return new ProposicionesResource($proposicion);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ruta = Proposiciones::whereId($id)->update([
            'identificacion' => $request->input('identificacion'),
            'nombre' => $request->input('nombre'),
            'email' => $request->input('email'),
            'telefono' => $request->input('telefono'),
            'ejes' => $request->input('ejes'),
            'problema' => $request->input('problema'),
            'solucion' => $request->input('solucion'),
            'video' => $request->input('video'),
            ]);

            ProposicionesResource::withoutWrapping();
            return (new ProposicionesResource($request))->response()->setStatusCode(201);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
