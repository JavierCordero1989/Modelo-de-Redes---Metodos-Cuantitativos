<script>
    // Se obtienen los datos desde el controlador y se almacenan en variables de javascript
    var ids_nodos = <?php echo json_encode($ids_nodos); ?>; //ID's obtenidos de la BD
    var nombres_nodos = <?php echo json_encode($nombres); ?>; //Nombres de los nodos obtenidos e la BD

    //Relaciones desde y hasta de los nodos para realizar las conexiones
    var _from = <?php echo json_encode($conexiones['ids_from']); ?>;
    var _to = <?php echo json_encode($conexiones['ids_to']); ?>;
</script>
<script src="{{ asset('js/vis.min.js') }}"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script> -->
<script src="{{ asset('js/vue.js') }}"></script>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

<!-- Caja que contiene los campos para mantenimientos -->
<div class="col-sm-12" id="app">
    <!-- Caja izquierda para el mantenimiento de los nodos -->
    <div class="col-md-6">
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Mantenimiento para los nodos</h3>
            </div>

            <div class="box-body">
                <div class="form-group">
                    <label for="">ID:</label>
                    <input v-model="id_nodo" class="form-control" readonly="readonly" placeholder="Aqui el ID del nodo">
                </div>
                <div class="form-group">
                    <label for="">Nombre:</label>
                    <input v-model="nombre" class="form-control" placeholder="Ingrese el nombre">
                </div>
            </div>
            <div class="box-footer">
                <button @click="addNodes(id_nodo, nombre)" class="btn btn-success pull-left">Agregar Nodo</button>
                <button id="btn_eliminar_nodo" class="btn btn-danger pull-right hide">Eliminar Nodo</button>
            </div>
        </div>
    </div>
    <!-- Termina la caja izquierda -->

    <!-- Caja derecha para el mantenimiento de las aristas -->
    <div class="col-md-6">
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Mantenimiento para las aristas</h3>
            </div>

            <div class="box-body">
                <div class="form-group">
                    <label for="">Desde el nodo: @{{nombreDelNodoDesde}}</label>
                    <input type="number" v-model="from" class="form-control" placeholder="Desde">
                </div>
                <div class="form-group">
                    <label for="">Hasta el nodo: @{{nombreDelNodoHasta}}</label>
                    <input type="number" v-model="to" class="form-control" placeholder="Hasta">
                </div>
            </div>
            <div class="box-footer">
                <button @click="addEdges(from, to)" class="btn btn-success pull-left">Agregar Arista</button>
                <button id="btn_eliminar_arista" class="btn btn-danger pull-right hide">Eliminar Arista</button>
            </div>
        </div>
    </div>
    <!-- Termina la caja derecha -->
</div>
<!-- Termina la caja que contiene los mantenimientos -->

<!-- Grafico con nodos en imagen -->
<div class="col-sm-10 col-md-offset-1" id="grafo_img" style="height: 400px; border: 1px solid black;"></div>

<script>
    //Arreglo vacio para los cambios.
    var id_nodos_nuevos = [];
    var nombre_nodos_nuevos = [];
    var id_from_nuevo = [];
    var id_to_nuevo = [];

    //Imagen para lso nodos
    var imagen = "{{ asset('img/icono-edificios.png') }}";

    nodes = []; //nodos para agregar a la red

    //Se agregan los nodos de la BD a la red
    for (index = 0; index < ids_nodos.length; index++) {
        nodes.push({id:ids_nodos[index], shape:'circularImage', image:imagen, label:(ids_nodos[index] + ":" + nombres_nodos[index])});  ;
    }

    //Aristas de la red, conexiones entre nodos
    edges = [];

    //Se agregan las conexiones de la BD a la red
    for (index = 0; index < _from.length; index++) {
        edges.push({from:_from[index], to:_to[index]});
    }

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

    network = new vis.Network(container, data, options);

    var id_nodo = null;
    var id_arista = null;
    // var index = array.indexOf(5);
    //Evento de la red, para los nodos
    network.on( 'click', function(properties) {
        console.log('Nodo: ' + properties.nodes);
        console.log('Arista: ' + properties.edges);
        
        id_arista = null;
        id_nodo = null;

        id_arista = properties.edges; //Guarda los ids de las aristas seleccionadas
        id_nodo = properties.nodes; //Guarda los ids de los nodos seleccionados

        if(properties.nodes == '') {
            //Oculta el boton de borrar nodo
            $('#btn_eliminar_nodo').removeClass("show");
        }
        else {
            //Muestra el boton de borrar nodo
            $('#btn_eliminar_nodo').addClass("show");
        }

        if(properties.edges == '') {
            $('#btn_eliminar_arista').removeClass("show");
        }
        else {
            $('#btn_eliminar_arista').addClass("show");
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
            nombresNodos: nombres_nodos,
            nombreDelNodoDesde: '',
            nombreDelNodoHasta: ''
        }
    },
    methods: {
        addEdges(from, to){
            this.edges.push({from:this.from, to:this.to}) //Agrega la conexion entre dos nodos

            _from.push(parseInt(from)) //Agrega el nuevo ID desde al arreglo
            id_from_nuevo.push(parseInt(from)) //Agrega el nuevo ID desde al arreglo para conservar los cambios
            _to.push(parseInt(to)) //Agrega el nuevo ID hasta al arreglo
            id_to_nuevo.push(parseInt(to)) //Agrega el nuevo ID hasta al arreglo para conservar los cambios

            network.setData({nodes: this.nodes, edges: this.edges}) //Actualiza el grafo
            this.from = '' //Vacia el campo para la arista desde
            this.to = '' //Vacia el campo para la arista hasta
        },
        addNodes(id, nombre){
            this.nodes.push({id:id, shape: 'circularImage', image: imagen, label:(id+":"+nombre)})

            ids_nodos.push(id) //Agrega el id del nuevo nodo a los id ya guardados
            nombres_nodos.push(nombre) //Agrega el nombre del nuevo nodo a los ya guardados

            id_nodos_nuevos.push(id) //Agrega el nuevo ID al arreglo para mantener los nuevos cambios
            nombre_nodos_nuevos.push(nombre) // Agrega el nuevo nombre al arreglo para mantener los nuevos cambios

            network.setData({nodes: this.nodes, edges: this.edges}) //Actualiza el grafo

            this.id_nodo = parseInt(nodes[nodes.length-1].id)+1 //Actualiza el ID siguiente
            this.nombre = '' //Pone en blanco el campo del nombre del nodo
        },
        update(){
            network.setData({nodes: this.nodes, edges: this.edges})
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
                this.nombreDelNodoDesde = this.nombresNodos[parseInt(this.from)-1];
            }
        },
        to() {
            // Va a comparar que lo que se ingresa en el campo de texto sea un dato numerico, y que ademas, no 
            // sea mayor que la cantidad de elementos del arreglo de nodos.
            if(this.to === '' || parseInt(this.to) > nodes.length) {
                this.nombreDelNodoHasta = '';
            }
            else {
                this.nombreDelNodoHasta = this.nombresNodos[parseInt(this.to)-1];
            }
        }
        // edges: {
        //     handler(){
        //         this.update()
        //     },
        //     deep: true
        // },
        // nodes() {
        //     this.update()
        // }
    }
})
</script>