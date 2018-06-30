<script>
    // color: {color:'red', highlight:'red'} //Para cambiarle el color a la arista
    // edges[0].color = {color:'blue', highlight:'blue'} //Se le cambia el color a la arista
    
    var nodos_json = <?php echo $nodos; ?>;
    var conexiones_json = <?php echo $conexionesNodos; ?>;
    var conexionesNuevas_json = <?php echo $conexionesNuevas_json?>;
    // Se obtienen los datos desde el controlador y se almacenan en variables de javascript
    // var ids_nodos = <?php //echo json_encode($ids_nodos); ?>; //ID's obtenidos de la BD
    // var nombres_nodos = <?php //echo json_encode($nombres); ?>; //Nombres de los nodos obtenidos e la BD

    //Relaciones desde y hasta de los nodos para realizar las conexiones
    // var _from = <?php //echo json_encode($conexiones['ids_from']); ?>;
    // var _to = <?php //echo json_encode($conexiones['ids_to']); ?>;
</script>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/vis.min.js') }}"></script>
<script src="{{ asset('js/vue.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
{{--<script src="{{ asset('js/rutaMasCorta.js') }}"></script>--}}
{{--<script src="{{ asset('js/Stack.js') }}"></script>--}}
{{--<script src="{{ asset('js/Queue.js') }}"></script>--}}
<script src="{{ asset('js/dijkstra.js') }}"></script>
{{--<script src="{{ asset('js/crearObjetoProblem.js') }}"></script>--}}

<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

<!-- Caja que contiene los campos para mantenimientos -->
<div class="col-sm-12" id="app">
    <!-- Caja izquierda para el mantenimiento de los nodos -->
    <div class="col-md-6">
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Mantenimiento para los nodos</h3>
                <div class="box-tools pull-right">
                    <div class="btn-group">
                        <button type="button" class="btn btn-info btn-xs" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
            </div>

            <div class="box-body">
                <div class="col-md-6 form-group">
                    <label for="">ID:</label>
                    <input v-model="id_nodo" class="form-control" readonly="readonly" placeholder="Aqui el ID del nodo">
                </div>
                <div class="col-md-6 form-group">
                    <label for="">Nombre:</label>
                    <input v-model="nombre" class="form-control" placeholder="Ingrese el nombre">
                </div>
            </div>
            <div class="box-footer">
                <button @click="addNodes(id_nodo, nombre)" class="btn btn-success pull-left">Agregar Nodo</button>
                <button id="btn_eliminar_nodo" @click="removeSelectedNode()" class="btn btn-danger pull-right hide">Eliminar Nodo</button>
            </div>
        </div>
    </div>
    <!-- Termina la caja izquierda -->

    <!-- Caja derecha para el mantenimiento de las aristas -->
    <div class="col-md-6">
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Mantenimiento para las aristas</h3>
                <div class="box-tools pull-right">
                    <div class="btn-group">
                        <button type="button" class="btn btn-info btn-xs" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
            </div>

            <div class="box-body">
                <div class="col-md-6 form-group">
                    <label for="">Desde el nodo: @{{nombreDelNodoDesde}}</label>
                    <input type="number" v-model="from" class="form-control" placeholder="Desde">
                </div>
                <div class="col-md-6 form-group">
                    <label for="">Hasta el nodo: @{{nombreDelNodoHasta}}</label>
                    <input type="number" v-model="to" class="form-control" placeholder="Hasta">
                </div>
            </div>
            <div class="box-footer">
                <button @click="addEdges(from, to)" class="btn btn-success pull-left">Agregar Arista</button>
                <button id="btn_eliminar_arista" @click="removeSelectedEdge()" class="btn btn-danger pull-right hide">Eliminar Arista</button>
            </div>
        </div>
    </div>
    <!-- Termina la caja derecha -->

    <div class="box box-primary col-md-12">
        <button @click="rutaMasCorta()" class="btn btn-success pull-left" style="margin: 15px auto;">
            Mostrar ruta mas corta
        </button>
    </div>
</div>
<!-- Termina la caja que contiene los mantenimientos -->

    <div class="network">
        <div class="vis-network col-md-12 box box-warning" id="grafo_img" style="height: 400px"></div>
    </div>

<script>
    var colorEdge = <?php echo json_encode(['color'=>'red', 'highlight'=>'red']); ?>;
    var colorNode = <?php echo json_encode(['border'=>'blue', 'background'=>'blue', 'highlight'=>'pink']); ?>;

    //Actualiza el grafo
    // function update(){
    //     dibujarGrafo();
    //     // network.setData({nodes: this.nodes, edges: this.edges})
    // }

    /** Este metodo permite obtener el nombre del nodo */
    function nombreDelNodo(id) {
        var nombre;
        var cadena;

        for(i=0; i<nodes.length; i++) {

            cadena = (nodes[i].label).split(":"); //Divide la cadena para solo imprimir el nombre en la vista

            if(nodes[i].id == id) {
                nombre = cadena[1];
                break;
            }
        }
        return nombre;    
    }

    function dibujarGrafo() {
        network = new vis.Network(container, data, options);
    }

    //Imagen para los nodos
    // var imagen = "{{ asset('img/icono-edificios.png') }}";

    nodes = nodos_json;

    edges = conexiones_json;

    // create a network
    var container = document.getElementById('grafo_img');
    var data = {
        nodes: nodes,
        edges: edges
    };

    var options = {
        nodes: {
            borderWidth:4, //borde alrededor del nodo
            size:30, //amaño de la bola del nodo
            color: {
                border: '#222222', //Color de borde del nodo y de la arista
                background: '#666666'
            },
            font:{color:'#000000'} //Color de la etiqueta del nodo
        },
        edges: {
            width: 3, //Grosor de la linea del nodo
            color: 'lightgray'
        }
    };


    // network = new vis.Network(container, data, options);
    dibujarGrafo();

    var id_nodo = null; //
    var id_arista = null;

    // var index = array.indexOf(5);
    //Evento de la red, para los nodos cuando se seleccionan
    network.on( 'click', function(properties) {
        console.log('Nodo: ' + properties.nodes);
        console.log('Arista: ' + properties.edges);
        
        id_arista = null; //Reinicia la variable
        id_nodo = null; //Reinicia la variable

        id_arista = properties.edges; //Guarda los ids de las aristas seleccionadas
        id_nodo = properties.nodes; //Guarda los ids de los nodos seleccionados
        
        if(properties.nodes == '') {
            //Oculta el boton de borrar nodo
            $('#btn_eliminar_nodo').removeClass("show");
        }
        else {
            //Muestra el boton de borrar nodo
            $('#btn_eliminar_nodo').addClass("show");

            //Mostrar el nodo, asi como las aristas seleccionadas
            console.log('Nodo: ' + id_nodo);
            console.log('Aristas ' + id_arista);
        }

        if(properties.edges == '') {
            $('#btn_eliminar_arista').removeClass("show");
        }
        else {
            if(properties.nodes == '') {
                $('#btn_eliminar_arista').addClass("show");
            }
            else {
                $('#btn_eliminar_arista').removeClass("show");
            }
        }
    });

    
var app = new Vue({
    'el': '#app',
    data(){
        return {
            id_nodo: nodes.length <= 0 ? 1 : parseInt(nodes[nodes.length-1].id)+1,
            nombre: '',
            from: '',
            to: '',
            edges: edges,
            nodes: nodes,
            // nombresNodos: nombres_nodos,
            nombreDelNodoDesde: '',
            nombreDelNodoHasta: ''
        }
    },
    methods: {
        addEdges(from, to){
            if(from == '' || to == '') {
                console.log('No agrega ninguna arista porque esta el FROM o el TO estan en blanco...');
            }
            else {
                // edges.add({from:this.from, to:this.to, label: '8'});
                this.edges.push({from:this.from, to:this.to, label: '8', arrows: 'to', color: colorEdge}) //Agrega la conexion entre dos nodos

                // _from.push(parseInt(from)) //Agrega el nuevo ID desde al arreglo
                // id_from_nuevo.push(parseInt(from)) //Agrega el nuevo ID desde al arreglo para conservar los cambios
                // _to.push(parseInt(to)) //Agrega el nuevo ID hasta al arreglo
                // id_to_nuevo.push(parseInt(to)) //Agrega el nuevo ID hasta al arreglo para conservar los cambios

                // network.setData({nodes: this.nodes, edges: this.edges}) //Actualiza el grafo
                dibujarGrafo();
                // network.redraw();
                this.from = '' //Vacia el campo para la arista desde
                this.to = '' //Vacia el campo para la arista hasta
            }
        },
        addNodes(id, nombre){
            if( nombre == '') {
                console.log('No agrega el nodo, ya que el nombre esta vacio...');
            }
            else {
                // nodes.add({id:id, shape: 'circularImage', image: 'img/icono-edificios.png', label:(id+":"+nombre)});
                this.nodes.push({id:id, shape: 'circularImage', image: 'img/icono-edificios.png', label:(id+":"+nombre), color: colorNode})

                dibujarGrafo();

                this.id_nodo = nodes.length <= 0 ? 1 : parseInt(nodes[nodes.length-1].id)+1 //Actualiza el ID siguiente
                this.nombre = '' //Pone en blanco el campo del nombre del nodo
            }
        },
        removeSelectedNode() {
            var findIndex = 0;

            //Elimina todas las aristas conectadas al nodo del arreglo edges
            for(i=0; i<id_arista.length; i++) {
                for(j=0; j<edges.length; j++) {
                    if(edges[j].id == id_arista[i]) {
                        findIndex = j;
                        break;
                    }
                }
                
                edges.splice(findIndex, 1);
            }

            for(i=0; i<id_nodo.length; i++) {
                for(j=0; j<nodes.length; j++) {
                    if(nodes[j].id == id_nodo[i]) {
                        findIndex = j;
                        break;
                    }
                }
                nodes.splice(findIndex, 1);
            }
            // network.setData({nodes: this.nodes, edges: this.edges}) //Actualiza el grafo
            dibujarGrafo();
            this.id_nodo = nodes.length <= 0 ? 1 : parseInt(nodes[nodes.length-1].id)+1
        },
        removeSelectedEdge() {
            var findIndex = 0;

            //Elimina todas las aristas conectadas al nodo del arreglo edges
            for(i=0; i<id_arista.length; i++) {
                for(j=0; j<edges.length; j++) {
                    if(edges[j].id == id_arista[i]) {
                        findIndex = j;
                        break;
                    }
                }
                
                edges.splice(findIndex, 1);
            }

            dibujarGrafo();
        },
        rutaMasCorta() {
            var resultadoAlgoritmo = dijkstra(problem, "1", "6");
            console.log(resultadoAlgoritmo);

            var tamanioResultado = resultadoAlgoritmo.path.length;

            for(i=0; i<tamanioResultado; i++) {
                for(j=0;j<nodes.length;j++) {
                    if(resultadoAlgoritmo.path[i] == nodes[j].id) {
                        nodes[j].color={background:'red'};
                    }
                }
            }

            for(i=0; i<tamanioResultado-1; i++) {
                for(j=0;j<edges.length;j++) {
                    if(resultadoAlgoritmo.path[i] == edges[j].from && resultadoAlgoritmo.path[i+1] == edges[j].to) {
                        edges[j].color = {color:'red',highlight:'red'};
                    }
                }
            }

            dibujarGrafo();
        }
    },
    watch: {
        from() {
            // Va a comparar que lo que se ingresa en el campo de texto sea un dato numerico, y que ademas, no 
            // sea mayor que la cantidad de elementos del arreglo de nodos.
            if(this.from === '' || parseInt(this.from) > nodes.length) {
                this.nombreDelNodoDesde = '';
            }
            else {
                this.nombreDelNodoDesde = nombreDelNodo(parseInt(this.from));
            }
        },
        to() {
            // Va a comparar que lo que se ingresa en el campo de texto sea un dato numerico, y que ademas, no 
            // sea mayor que la cantidad de elementos del arreglo de nodos.
            if(this.to === '' || parseInt(this.to) > nodes.length) {
                this.nombreDelNodoHasta = '';
            }
            else {
                this.nombreDelNodoHasta = nombreDelNodo(parseInt(this.to));
            }
        }
    }
})
</script>