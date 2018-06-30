<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\conexiones;
use App\Models\nodos;
use DB;

class grafoController extends Controller
{
    // {id:id, shape:forma, image:imagen, label:etiqueta} => NODOS
    // {from:origen, to:destino, label:etiqueta} => ARISTAS

    //
    public function index() {
        // //Obtiene todos los ids de los nodos de la base de datos
        // $ids_nodos = nodos::select('id')
        //         ->whereNull('deleted_at')
        //         ->get();

        // // Se crea un array para meter los valores de cada id
        // $arrayIdsNodos = array();
        // $tamanio_array = sizeof($ids_nodos);

        // //Se recorre el resultado de la BD para guardarlo en el arreglo.
        // for ($indice=0; $indice < $tamanio_array; $indice++) { 
        //     array_push($arrayIdsNodos, $ids_nodos[$indice]->id);
        // }

        // //Obtiene todos los nombres de los nodos de la base de datos
        // $nombres_nodos = nodos::select('nombre_nodo')
        //         ->whereNull('deleted_at')
        //         ->get();

        // // Se crea un array para meter los valores de cada nombre
        // $arrayNombresNodos = array();
        // $tamanio_array = sizeof($ids_nodos);

        // //Se recorre el resultado de la BD para guardarlo en el arreglo.
        // for ($indice=0; $indice < $tamanio_array; $indice++) { 
        //     array_push($arrayNombresNodos, $nombres_nodos[$indice]->nombre_nodo);
        // }

        // //Obtiene todos los ids desde de cada nodo de la base de datos
        // $ids_from = conexiones::select('id_from')
        //     ->whereNull('deleted_at')
        //     ->get();

        // // Se crea un array para meter los valores de cada id desde cada nodo
        // $arrayIdFrom = array();
        // $tamanio_array = sizeof($ids_from);

        // //Se recorre el resultado de la BD para guardarlo en el arreglo.
        // for ($indice=0; $indice < $tamanio_array; $indice++) { 
        //     array_push($arrayIdFrom, $ids_from[$indice]->id_from);
        // }

        // //Obtiene todos los ids hasta de cada nodo de la base de datos
        // $ids_to = conexiones::select('id_to')
        //     ->whereNull('deleted_at')
        //     ->get();

        // // Se crea un array para meter los valores de cada id hasta cada nodo
        // $arrayIdTo = array();
        // $tamanio_array = sizeof($ids_to);

        // //Se recorre el resultado de la BD para guardarlo en el arreglo.
        // for ($indice=0; $indice < $tamanio_array; $indice++) { 
        //     array_push($arrayIdTo, $ids_to[$indice]->id_to);
        // }

        // $figuraNodo = "circularImage";
        $nodos = nodos::select('id', DB::raw("concat('circularImage') as shape"), 'url_imagen as image', DB::raw("concat(id, ':', nombre_nodo) as label"))
        ->whereNull('deleted_at')
        ->get();

        // "arrows": "to" => flechas 

        $conexionesNodos = conexiones::select('id', 'id_from as from', 'id_to as to', DB::raw("cast(peso_arista as char) as label"), DB::raw("concat('to') as arrows"))
        ->whereNull('deleted_at')
        ->get();
        
        // dd(json_encode($nodos, JSON_UNESCAPED_SLASHES), json_encode($conexionesNodos));
        
        return view('grafo.index')
            // ->with('conexiones', ['ids_from'=>$arrayIdFrom, 'ids_to'=>$arrayIdTo])
            // ->with('ids_nodos', $arrayIdsNodos)
            // ->with('nombres', $arrayNombresNodos)
            ->with('nodos', json_encode($nodos, JSON_UNESCAPED_SLASHES))
            ->with('conexionesNodos', json_encode($conexionesNodos));
            // ->with('conexiones', ['ids_from'=>$ids_from, 'ids_to'=>$ids_to])
            // ->with('ids_nodos', $ids_nodos)
            // ->with('nombres', $nombres_nodos);
    }
}
