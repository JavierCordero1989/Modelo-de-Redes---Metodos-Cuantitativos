<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\conexiones;
use App\Models\nodos;
use DB;

class grafoController extends Controller
{
    // {id:id, shape:forma, image:imagen, label:etiqueta, title:titulo_de_pop} => NODOS
    // {id:id, from:origen, to:destino, label:etiqueta} => ARISTAS

    //
    public function index() {
        // $figuraNodo = "circularImage";
        $nodos = nodos::select('id', DB::raw("concat('circularImage') as shape"), 'url_imagen as image', DB::raw("concat(id, ':', nombre_nodo) as label"))
        ->whereNull('deleted_at')
        ->get();

        // "arrows": "to" => flechas 

        $conexionesNodos = conexiones::select('id', 'id_from as from', 'id_to as to', DB::raw("cast(peso_arista as char) as label"), DB::raw("concat('to') as arrows"))
        ->whereNull('deleted_at')
        ->get();
        
        $nodosConexion = nodos::select('id')
        ->whereNull('deleted_at')
        ->get()
        ->toArray();

        $conexionesGrafo = conexiones::select('id_from', 'id_to', 'peso_arista')
        ->whereNull('deleted_at')
        ->get()
        ->toArray();

        // dd(json_encode($conexionesGrafo[0]));

        $tamanio = sizeOf($nodosConexion); //Tamano del arreglo de las conexiones
        $cons = "{";

        for($i=0; $i<$tamanio; $i++) {
            $cons .= $nodosConexion[$i]['id'] . ':' . self::arregloNodosConectados($i+1);

            if($i < $tamanio-1) {
                $cons .= ',';
            }
        }

        $cons .= '}';

        return view('grafo.index')
            ->with('nodos', json_encode($nodos, JSON_UNESCAPED_SLASHES))
            ->with('conexionesNodos', json_encode($conexionesNodos))
            ->with('conexionesNuevas_json', $cons);
    }

    protected function arregloNodosConectados($from) {
        $valoresEncontrados = conexiones::select('id_from', 'id_to', 'peso_arista')
            ->where('id_from', '=', $from)
            ->whereNull('deleted_at')
            ->get()
            ->toArray();

        $tamanio = sizeOf($valoresEncontrados);

        $json = '{';

        for($indice=0;$indice<$tamanio;$indice++) {
            $json .= $valoresEncontrados[$indice]['id_to'] .':'.$valoresEncontrados[$indice]['peso_arista'];
            if($indice < $tamanio-1) {
                $json .= ',';
            }
        }

        $json .= '}';

        // dd(json_encode($arregloConexionesNodos));

        return $json;
    }

    public function save() {
        $input = $request->all();

        $nodos = $this->nodosRepository->create($input);

        Flash::success('Nodos saved successfully.');

        return redirect(route('grafo.grafo'));
    }

    public function indexNuevo() {
        $nodes = nodos::select('id', 'nombre_nodo as label', 'id as title')->get();
        $edges = conexiones::select('id', 'id_from as from', 'id_to as to', DB::raw('CAST(peso_arista as CHAR) as label'))->get();
        // dd(json_encode($nodes), json_encode($edges));

        return view('grafo.grafo_nuevo')
        ->with('nodes', $nodes)
        ->with('edges', $edges);
    }
}
