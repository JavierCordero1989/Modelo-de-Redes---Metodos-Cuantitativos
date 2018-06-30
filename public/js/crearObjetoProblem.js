var nodos = []; //Nodos extraidos de la base de datos
var conexiones = []; //Conexiones entre nodos y pesos, extraidos de la BD
var listaObjetosConexion = [];
var problem = {};


//from, to, peso

// problem = {
//     1: { 2: 3, 3: 8 },
//     2: { 4: 6, 5: 1 },
//     3: { 4: 2, 7: 8 },
//     4: { 5: 4, 6: 4, 7: 4 },
//     5: { 6: 2, 8: 3, 10: 6 },
//     6: { 7: 7, 8: 7, 9: 8 },
//     7: { 9: 3 },
//     8: { 10: 2 },
//     9: { 10: 6 },
//     10: {}
// };