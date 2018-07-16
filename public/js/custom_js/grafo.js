//Antes de usar este archivo javascript, se debe llamar a JQUERY y VIS
function dibujarGrafo(nodos, aristas) {

    nodes = new vis.DataSet(nodos);
    edges = new vis.DataSet(aristas);

    nodes.on('*', function() {
        $('#nodes').html(JSON.stringify(nodes.get(), null, 4))
    });

    edges.on('*', function() {
        $('#edges').html(JSON.stringify(edges.get(), null, 4));
    });

    var contenedorGrafo = $('#network')[0];
    var datosGrafo = {
        nodes: nodes,
        edges: edges
    };
    var options = {};

    network = new vis.Network(contenedorGrafo, datosGrafo, options);
}