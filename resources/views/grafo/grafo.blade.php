<script>
    var conexiones = <?php echo json_encode($conexiones); ?>;
    var ids_nodos = <?php echo json_encode($ids_nodos); ?>; //ID's obtenidos de la BD
    var nombres_nodos = <?php echo json_encode($nombres); ?>; //Nombres de los nodos obtenidos e la BD

    //Relaciones desde y hasta de los nodos para realizar las conexiones
    var from = <?php echo json_encode($conexiones['ids_from']); ?>;
    var to = <?php echo json_encode($conexiones['ids_to']); ?>;
</script>
<script src="{{ asset('js/vis.min.js') }}"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script> -->
<script src="{{ asset('js/vue.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

<div class="col-sm-6 col-md-offset-3" id="app">
    <div class="col-sm-12" style="padding: 25px 0px 25px 0px;">
        <ul>
            <div class="col-sm-12">
                ID:<input v-model="id_nodo" class="form-control" readonly="readonly">
                Nombre: <input v-model="nombre" class="form-control" placeholder="Ingrese el nombre">
                <button @click="addNodes(id_nodo, nombre)" class="btn btn-success">Add Node</button>
            </div>
        </ul>
    </div>

    <div class="col-sm-12" style="padding: 25px 0px 25px 0px;">
        <ul>
            <div class="col-sm-12">
                From:<input v-model="from" class="form-control" placeholder="Desde">
                To:<input v-model="to" class="form-control" placeholder="Hasta">
                <button @click="add(from, to)" class="btn btn-success">Add Egde</button>
            </div>
        </ul>
    </div>

</div>

<!-- Grafico con nodos en imagen -->
<div class="col-sm-10 col-md-offset-1" id="grafo_img" style="height: 400px; border: 1px solid black;"></div>

<script>
    
    // create people.
    // value corresponds with the age of the person
    // var imagen = 'https://cdn.pixabay.com/photo/2017/01/13/01/22/hotel-1976102_960_720.png';
    var imagen = 'http://resizer.123inventatuweb.com/acens110017/image/icono-edificios.png?w=960';
    // var ids_nodos = <?php //echo json_encode($idsNodos); ?>; //ID's obtenidos de la BD
    // var nombres_nodos = <?php //echo json_encode($nombresNodos); ?>; //Nombres de los nodos obtenidos e la BD

    nodes = []; //nodos para agregar a la red

    //Se agregan los nodos de la BD a la red
    for (index = 0; index < ids_nodos.length; index++) {
        nodes.push({id:ids_nodos[index].id, shape:'circularImage', image:imagen, label:(ids_nodos[index].id + ":" + nombres_nodos[index].nombre_nodo)});  ;
    }

    //Relaciones desde y hasta de los nodos para realizar las conexiones
    // var from = <?php //echo json_encode($var_from); ?>;
    // var to = <?php //echo json_encode($var_to); ?>;

    //Aristas de la red, conexiones entre nodos
    edges = [];

    //Se agregan las conexiones de la BD a la red
    for (index = 0; index < from.length; index++) {
        edges.push({from:from[index].id_from, to:to[index].id_to});
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

    network.on( 'click', function(properties) {
        console.log('clicked node ' + properties.nodes);
    });

    
var app = new Vue({
    'el': '#app',
    data(){
        return {
            id_nodo: parseInt(nodes[nodes.length-1].id)+1,
            nombre: '',
            from: '',
            to: '',
            edges: edges,
            nodes: nodes
        }
    },
    methods: {
        add() {
            this.edges.push({from:'', to:''})
        },
        add(from, to){
            this.edges.push({from:this.from, to:this.to})
            network.setData({nodes: this.nodes, edges: this.edges})
            this.from = ''
            this.to = ''
        },
        addNodes(id){
            this.nodes.push({id:id, shape: 'circularImage', image: imagen})
        },
        addNodes(id, nombre){
            this.nodes.push({id:id, shape: 'circularImage', image: imagen, label:(id+":"+nombre)})
            network.setData({nodes: this.nodes, edges: this.edges})
            this.id_nodo = parseInt(nodes[nodes.length-1].id)+1
            this.nombre = ''
        },
        update(){
            network.setData({nodes: this.nodes, edges: this.edges})
        }
    },
    // watch: {
    //     edges: {
    //         handler(){
    //             this.update()
    //         },
    //         deep: true
    //     },
    //     nodes() {
    //         this.update()
    //     }
    // }
})
</script>