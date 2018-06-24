<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\conexiones;
use App\Models\nodos;

class grafoController extends Controller
{
    //
    public function index() {
        $ids_nodos = nodos::select('id')
                ->whereNull('deleted_at')
                ->get()
                ->toArray();

        $nombres_nodos = nodos::select('nombre_nodo')
                ->whereNull('deleted_at')
                ->get()
                ->toArray();

        $ids_from = conexiones::select('id_from')
            ->whereNull('deleted_at')
            ->get()
            ->toArray();

        $ids_to = conexiones::select('id_to')
            ->whereNull('deleted_at')
            ->get()
            ->toArray();

        // dd($datos_conexiones);

        return view('grafo.index')
            ->with('conexiones', ['ids_from'=>$ids_from, 'ids_to'=>$ids_to])
            ->with('ids_nodos', $ids_nodos)
            ->with('nombres', $nombres_nodos);
    }
}
