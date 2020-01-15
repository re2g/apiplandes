<?php

namespace App\Http\Controllers;

use App\Proposiciones;
use App\Http\Resources\Proposiciones as ProposicionesResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $path = null;
        if($request->hasFile("attach")){
            $file = $request->attach;
            $path = $file->getClientOriginalName();
            $path=Storage::disk('s3')->putFile($path, $request->attach);
            $path=Storage::disk('s3')->url($path);
        }
        $proposicion = new Proposiciones();
        $proposicion->ejes = $request->get('ejes');
        $proposicion->problema = $request->get('problema');
        $proposicion->solucion = $request->get('solucion');
        $proposicion->video = $path;
        $proposicion->save();
        
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
        $ruta = Proposiciones::findOrFail($id);
        $ruta->identificacion = $request->get("identificacion");
        $ruta->nombre = $request->get("nombre");
        $ruta->email = $request->get("email");
        $ruta->telefono = $request->get("telefono");
        $ruta->save();
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