<!-- Estilos css-->
<link rel="stylesheet" href="{{ asset('css/vis-network.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

<!-- scripts -->
<script src="{{ asset('js/vis.min.js') }}"></script>
<script src="{{ asset('js/vue.js') }}"></script>
<div class="col-sm-12" id="app">
    <!-- Caja izquierda para el mantenimiento de los nodos -->
    <div class="col-md-6">
        <div class="box box-warning">
            {{-- ENCABEZADO DE LA CAJA PARA MANTENIMIENTO DEOS NODOS --}}
            <div class="box-header with-border">
                <h3 class="box-title">Mantenimiento para los nodos</h3>
                <div class="box-tools pull-right">
                    <div class="btn-group">
                        <button type="button" class="btn btn-info btn-xs" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
            </div>
            {{-- FIN DEL ENCABEZADO --}}

            {{-- CUERPO PARA EL MANTENIMIENTO DE LOS NODOS --}}
            <div class="box-body">
                <div class="col-md-6 form-group">
                    <label for="node-id">ID:</label>
                    <input id="node-id" v-model="idNodo" class="form-control" {{--readonly="readonly"--}} placeholder="Aqui el ID del nodo">
                </div>
                <div class="col-md-6 form-group">
                    <label for="node-label">Nombre:</label>
                    <input id="node-label" v-model="etiquetaNodo" class="form-control" placeholder="Ingrese el nombre">
                </div>
            </div>
            {{-- FIN DEL CUERPO DEL MANTENIMIENTO --}}

            {{-- PIE DE LA CAJA PARA EL MANTENIMIENTO DE NODOS --}}
            <div class="box-footer">
                <button @click="addNode()" class="btn btn-success pull-left">Agregar</button>
                <button @click="updateNode()" class="btn btn-primary">Modificar</button>
                <button @click="removeNode()" class="btn btn-danger pull-right">Eliminar</button>
            </div>
            {{-- FIN DEL PIE DEL MANTENIMIENTO DE NODOS --}}
        </div>
    </div>
    <!-- Termina la caja izquierda -->

    <!-- Caja derecha para el mantenimiento de las aristas -->
    <div class="col-md-6">
        <div class="box box-warning">
            {{-- ENCABEZADO DEL MANTENIMIENTO DE LAS ARISTAS --}}
            <div class="box-header with-border">
                <h3 class="box-title">Mantenimiento para las aristas</h3>
                <div class="box-tools pull-right">
                    <div class="btn-group">
                        <button type="button" class="btn btn-info btn-xs" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
            </div>
            {{-- FIN DELENCABEZADO --}}

            {{-- CUERPO DEL MANTENIMIENTO DE ARISTAS --}}
            <div class="box-body">
                <div class="col-md-6 form-group">
                    <label for="edge-id">ID: </label>
                    <input id="edge-id" type="number" v-model="idEdge" class="form-control" placeholder="ID">
                </div>
                <div class="col-md-6 form-group">
                    <label for="edge-from">Desde el nodo: {{--@{{nombreDelNodoDesde}}--}}</label>
                    <input id="edge-from" type="number" v-model="nodeFrom" class="form-control" placeholder="Desde">
                </div>
                <div class="col-md-6 form-group">
                    <label for="edge-to">Hasta el nodo: {{--@{{nombreDelNodoHasta}}--}}</label>
                    <input id="edge-to" type="number" v-model="nodeTo" class="form-control" placeholder="Hasta">
                </div>
                <div class="col-md-6 form-group">
                    <label for="edge-weight">Peso de la arista: {{--@{{pesoArista}}--}}</label>
                    <input id="edge-weight" type="number" v-model="pesoEdge" class="form-control" placeholder="Peso">
                </div>
            </div>
            {{-- FIN DEL CUERPO DEL MANTENIMIENTO DE ARISTAS --}}

            {{-- PIE DEL MANTENIMIENTO DE LAS ARISTAS --}}
            <div class="box-footer">
                <button @click="addEdge()" class="btn btn-success">Agregar</button>
                <button @click="updateEdge()" class="btn btn-primary">Modificar</button>
                <button @click="removeEdge()" class="btn btn-danger">Eliminar</button>
            </div>
            {{-- FIN DEL PIE DEL MATENIMIENTO DE ARISTAS --}}
        </div>
    </div>
    <!-- Termina la caja derecha -->

    {{-- Aca se almacenan los nodos y aristas en formato json --}}
    <pre class="hide" id="nodes"></pre>
    <pre class="hide" id="edges"></pre>
    <pre class="hide" id="problem"></pre>
</div>

{{-- CAJA PARA EL GRAFO --}}
<div class="network">
    <div class="vis-network col-md-12 box box-warning" id="network" style="height: 600px"></div>
</div>
{{-- FIN DE LA CAJA DEL GRAFO --}}

@section('scripts')

{{-- CODIGO JAVASCRIPT --}}
<script>
    var nodoSeleccionado = null;

    function draw(datosNodos, datosAristas) {
        //create an array with nodes
        nodes = new vis.DataSet(datosNodos);
        nodes.on('*', function(){
            // document.getElementById('nodes').innerHTML = JSON.stringify(nodes.get(),null,4);
            $('#nodes').html(JSON.stringify(nodes.get(),null,4))
        });

        edges = new vis.DataSet(datosAristas);
        edges.on('*', function() {
            // document.getElementById('edges').innerHTML = JSON.stringify(edges.get(), null, 4);
            $('#edges').html(JSON.stringify(edges.get(), null, 4));
        });

        //create a network
        // var container = document.getElementById('network');
        var container = $('#network')[0];
        var data = {
            nodes: nodes,
            edges: edges
        };
        var options = {};
        network = new vis.Network(container, data, options);

        network.on('click', function(propiedades){
            // console.log(propiedades.nodes);
            nodoSeleccionado = propiedades.nodes;
            console.log(nodoSeleccionado[0]);
        });
    }

    //Datos que vienen desde el controlador, cargados desde la Base de Datos.
    var nodos = <?php echo $nodes; ?>;
    var aristas = <?php echo $edges; ?>;

    window.onload = draw(nodos, aristas); //Carga el grafo cuando la ventana carga
</script>

{{-- CODIGO VUE --}}
<script>
    var app = new Vue({
        'el':'#app',
        data(){
            return {
                idNodo: nodes.length > 0 ? (nodes.max('id').id + 1) : 1,
                etiquetaNodo: '',
                idEdge: edges.length > 0 ? (edges.max('id').id + 1) : 1,
                nodeFrom: '',
                nodeTo: '',
                pesoEdge: '',
                selectedNode: 'algo',
                selectedEdge: ''
            }
        },
        methods: {
            addNode() {
                if(this.idNodo=='') {
                    alert('Debe ingresar un ID');
                }
                else {
                    if(this.etiquetaNodo=='') {
                        alert('Debe ingresar un nombre para el nodo');
                    }
                    else {
                        try {
                            nodes.add({
                                id:parseInt(this.idNodo), 
                                label:this.etiquetaNodo, 
                                title: parseInt(this.idNodo)
                            });

                            this.idNodo = nodes.length > 0 ? (nodes.max('id').id + 1) : 1;
                            this.etiquetaNodo = '';
                        } 
                        catch (error) {
                            alert(error);
                        }
                    }
                }
            },
            updateNode() {
                if(this.idNodo=='') {
                    alert('Debe ingresar un numero de ID.');
                }
                else {
                    if(this.etiquetaNodo=='') {
                        alert('Debe ingresar un nombre para el nodo.');
                    }
                    else {
                        if(nodes.get(parseInt(this.idNodo)) == null) {
                            alert('El nodo ' + this.idNodo + ' no existe');
                        }
                        else {
                            try {
                                nodes.update({
                                    id: parseInt(this.idNodo),
                                    label: this.etiquetaNodo,
                                    title: parseInt(this.idNodo)
                                });
                            } 
                            catch (error) {
                                alert(error);
                            }
                        }
                    }
                }
            },
            removeNode() {
                if(this.idNodo=='') {
                    alert('Debe ingresar el ID del nodo a eliminar');
                }
                else {
                    var _node = nodes.get(parseInt(this.idNodo));
                    if(_node == null) {
                        alert('El nodo ' + this.idNodo + ' no existe.');
                    }
                    else {
                        try {
                            var idNodoRemover = parseInt(this.idNodo);
                            var idsEgdes = edges.getIds();
                            var _edge = null;

                            //Seeliminan todas las conexiones que tenga el nodo
                            for(i=0; i<idsEgdes.length; i++){
                                if(idNodoRemover == edges.get(idsEgdes[i]).from || idNodoRemover == edges.get(idsEgdes[i]).to) {
                                    _edge = edges.get(idsEgdes[i]);
                                    edges.remove(_edge.id);
                                }
                            }
                            nodes.remove({id:this.idNodo});
                        }
                        catch (error) {
                            alert(error);
                        }
                    }
                }
            },
            addEdge() {
                try {
                    edges.add({
                        id: parseInt(this.idEdge),
                        from: parseInt(this.nodeFrom),
                        to: parseInt(this.nodeTo),
                        label: this.pesoEdge
                    });
                    this.idEdge = edges.length > 0 ? (edges.max('id').id + 1) : 1;
                    this.nodeFrom = '';
                    this.nodeTo = '';
                    this.pesoEdge = '';
                } 
                catch (error) {
                    alert(error);
                }
            },
            updateEdge() {
                try {
                    edges.update({
                        id: parseInt(this.idEdge),
                        from: parseInt(this.nodeFrom),
                        to: parseInt(this.nodeTo),
                        label: this.pesoEdge
                    });   
                } 
                catch (error) {
                    alert(error);
                }
            },
            removeEdge() {
                try {
                    edges.remove({id:this.idEdge});    
                } 
                catch (error) {
                    alert(error);
                }
            }
        },
        watch: {
            // nodoSeleccionado() {
            //     this.idNodo = nodoSeleccionado[0];
            //     this.selectedNode = this.idNodo;
            // }
        }
    });
</script>
@endsection