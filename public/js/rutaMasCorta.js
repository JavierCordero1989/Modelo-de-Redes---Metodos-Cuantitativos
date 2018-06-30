var nodos = [];
var grafo = []; //Es para mantener la idea
var rutaMasCorta;
var longitudMasCorta;
var listos = null;


//Construye el grafo con cada identificador
function generarGrafo(serieDeNodos) {
    for(i=0; i<serieDeNodos.length; i++) {
        nodos.push(serieDeNodos[i]);
    }
    for(j=0; j<serieDeNodos.length; j++) {
        grafo.push(arrayCeros(serieDeNodos));
    }

    agregarRuta(1,2,3);
    agregarRuta(1,5,6);
    agregarRuta(1,6,10);
    agregarRuta(2,3,5);
    agregarRuta(2,5,2);
    agregarRuta(3,4,8);
    agregarRuta(3,5,9);
    agregarRuta(3,6,7);
    agregarRuta(4,5,4);
    agregarRuta(5,6,4);

    console.log(encontrarRutaMinimaDijkstra(1,4));
}

//Genera una fila para la matriz vacia
function arrayCeros(serieDeNodos) {
    var array = [];

    for(i=0; i<serieDeNodos.length; i++) {
        array.push(0);
    }

    return array;
}

//retorna la posicion en el arreglo de un nodo especifico
function agregarRuta(origen, destino, distancia) {
    var n1 = posicionNodo(origen);
    var n2 = posicionNodo(destino);
    grafo[n1][n2] = distancia;
    grafo[n2][n1] = distancia;
}

function posicionNodo(nodo) {
    for (i = 0; i < nodos.length; i++) {
        // console.log(nodos[i] + ":" + nodo);
        if(nodos[i] == nodo) {
            return i;
        }
    }
    return -1;
}

function estaTerminado(j) {
    var tmp = new Nodo(nodos[j].from, 0, 0);
    return listos.contains(tmp);
}

//encuentra la ruta mas corta desde un nodo origen a un nodo destino
function encontrarRutaMinimaDijkstra(inicio, fin) {
    //calcula la ruta mas corta del inicio a los demas nodos
    encontrarRutaMinima(inicio);
    //recupera el nodo final de la lista de terminados
    var tmp = new Nodo(fin, 0, 0);

    if(!listos.contains(tmp)) {
        alert("Error, nodo no alcanzable");
        return "Bye";
    }

    tmp = listos.get(listos.indexOf(tmp));
    // console.log(tmp);

    var distancia = tmp.peso;

    //crea una pila para almacenar la ruta desde el nodo final al origen 
    var pila = new Pila();

    var variableControl = 0;

    while(tmp != undefined) {
        pila.agregar(tmp);
        tmp = new Nodo(tmp.to, 0, 0);

        if(variableControl >= 5000) {
            console.log("Se detuvo el proceso, se llego a las 5000 iteraciones. while(87)");
            break;
        }
        variableControl++;
    }

    var ruta = "";

    variableControl = 0;

    //recorre la pila para armar la ruta en el orden correcto
    while(!pila.isEmpty()) {
        ruta += (pila.quitar().from + " ");

        if(variableControl >= 5000) {
            console.log("Se detuvo el proceso, se llego a las 5000 iteraciones. while(103)");
            break;
        }
        variableControl++;
    }

    return distancia + ": " + ruta;
}

function encontrarRutaMinima(inicio) {
    var cola = new Cola(); //Cola de prioridad
    var ni = new Nodo(inicio, 0, 0); //Nodo inicial

    listos = new Lista(); //Lista de nodos ya revisados

    cola.agregar(ni); //agrega el nodo inicial a la cola de prioridad

    console.log(cola.imprimirValores());

    var variableControl = 0;

    while(!cola.isEmpty()) {
        var tmp = cola.quitar(); //saca el primer elemento
        console.log("Nodo quitado de la cola: ");
        console.log(tmp);
        listos.agregar(tmp); //lo manda a la lista de terminados

        var p = posicionNodo(tmp.from); 

        // console.log("Aqui se cae, valor de p: " + p);

        for(j=0; j<grafo[p].length; j++) {
            if(grafo[p][j] == 0) { //Si no hay conexion no lo evalua
                continue;
            }
            if(estaTerminado(j)) { //Si ya fue agregado a la lista de teminados
                continue;
            }

            var nod = new Nodo(nodos[j], tmp.to, tmp.peso+grafo[p][j]);

            //Si no esta en la cola de prioridad lo agrega
            if(!cola.contains(nod)) {
                cola.agregar(nod);
                continue;
            }

            //Si ya esta en la cola de prioridad actualiza la distancia menor
            // cola.cola.forEach(function(element) {
            //     //Si la distancia es la cola es mayor que la distancia calculada
            //     if(element.from == nod.from && element.peso > nod.peso) {
            //         cola.remover(element.from); //remueve el nodo de la cola
            //         cola.agregar(nod); //agrega el nodo con la nueva distancia
            //         break; //no sigue avanzando
            //     }
            // }); 

            for(i=0; i<cola.cola.length; i++) {
                if(cola.cola[i].from == nod.from && cola.cola[i].peso > nod.peso) {
                    cola.remover(cola.cola[i].from); //remueve el nodo de la cola
                    cola.agregar(nod); //agrega el nodo con la nueva distancia
                    break; //no sigue avanzando
                }
            }
        }

        if(variableControl >= 5000) {
            console.log("Se detuvo el proceso, se llego a las 5000 iteraciones. while(128)");
            break;
        }
        variableControl++;
    }
}



//Objeto Nodo
function Nodo(from, to, peso) {
    this.from = from;
    this.to = to;
    this.peso = peso;

    // this.verDatos = verDatos;
}

// function verDatos() {
//     console.log(this.from + " - " + this.to + " - " + this.peso);
// }

Nodo.prototype.verDatos = function() {
    alert(this.from + " - " + this.to + " - " + this.peso);
}
//Fin del objeto Nodo



//Objeto Cola
function Cola() {
    this.cola = [];
    // this.cola.push(new Nodo(1,2,3));
    // this.cola.push(new Nodo(4,5,6));
    // this.cola.push(new Nodo(7,8,9));
    // this.cola.push(new Nodo(0,1,2));

    // this.agregar = agregar;
    // this.quitar = quitar;
    // this.remover = remover;
    // this.isEmpty = isEmpty;
    // this.contains = contains;
    // this.imprimirValores = imprimirValores;
}

Cola.prototype.agregar = function(nodoNuevo) {
    this.cola.push(nodoNuevo);
    return "AGREGADO CON EXITO";
}
// function agregar(nodoNuevo) {
//     this.cola.push(nodoNuevo);
//     return "AGREGADO CON EXITO";
// }

// Quita el primer elemento de la cola
Cola.prototype.quitar = function() {
    var nodo = this.cola.splice(0,1);
    
    return nodo[0];
}
// function quitar() {
//     console.log("Tamaño de la cola: " + this.cola.length);
//     var nodo = this.cola.splice(0,1);
//     console.log(nodo);
//     console.log(nodo[0].from + ":" + nodo[0].to + ":" + nodo[0].peso);
//     return nodo[0];
// }

// Elimina un elemento por su ID
Cola.prototype.remover = function(id) {
    for(i=0; i<this.cola.length; i++) {
        if(this.cola[i].from == id) {
            this.cola.splice(i, 1);
        }
    }
}

// function remover(id) {
//     for(i=0; i<this.cola.length; i++) {
//         if(this.cola[i].from == id) {
//             this.cola.splice(i, 1);
//         }
//     }
// }

Cola.prototype.isEmpty = function() {
    return this.cola.length <= 0;
}

// function isEmpty() {
//     return this.cola.length <= 0;
// }

Cola.prototype.contains = function(nodo) {
    for(i=0; i<this.cola.length; i++) {
        if(nodo.from == this.cola[i].from) {
            return true;
        }
    }

    return false;
}

// function contains(nodo) {
//     for(i=0; i<this.cola.length; i++) {
//         if(nodo.from == this.cola[i].from) {
//             return true;
//         }
//     }

//     return false;
// }

Cola.prototype.imprimirValores = function() {
    var valores = "";

    for(i=0; i<this.cola.length; i++) {
        valores += this.cola[i].from + " - ";
    }

    return valores;
}
// function imprimirValores() {
//     var valores = "";

//     for(i=0; i<this.cola.length; i++) {
//         valores += this.cola[i].from + " - ";
//     }

//     return valores;
// }

//Fin del objeto cola



//Objeto Pila
function Pila() {
    this.pila = [];
    // this.pila.push(new Nodo(1,2,3));
    // this.pila.push(new Nodo(4,5,6));
    // this.pila.push(new Nodo(7,8,9));
    // this.pila.push(new Nodo(0,1,2));
}

Pila.prototype.agregar = function(nodoNuevo) {
    this.pila.push(nodoNuevo);
    return "AGREGADO CON EXITO";
}

Pila.prototype.quitar = function() {
    var nodo = this.pila.splice(this.pila.length-1, 1);
    return nodo;
}

Pila.prototype.remover = function(id) {
    for(i=0; i<this.pila.length; i++) {
        if(this.pila[i].from == id) {
            this.pila.splice(i, 1);
        }
    }
}

Pila.prototype.contains = function(nodo) {
    for(i=0; i<this.pila.length; i++) {
        if(nodo.from == this.pila[i].from) {
            return true;
        }
    }

    return false;
}

Pila.prototype.isEmpty = function() {
    return this.pila.length <= 0;
}
//Fin del objeto pila



//Cola de prioridad
function Lista() {
    this.lista = [];
    // this.pila.push(new Nodo(1,2,3));
    // this.pila.push(new Nodo(4,5,6));
    // this.pila.push(new Nodo(7,8,9));
    // this.pila.push(new Nodo(0,1,2));
}

Lista.prototype.agregar = function(nuevoNodo) {
    this.lista.push(nuevoNodo);
    return "AGREGADO CON EXITO"
}

Lista.prototype.remover = function(id) {
    for(i=0; i<this.lista.length; i++) {
        if(this,lista[0].from == id) {
            this.lista.splice(i, 1);
        }
    }
}

Lista.prototype.isEmpty = function() {
    return this.lista.length <= 0;
}

Lista.prototype.contains = function(nodo) {
    for(i=0; i<this.lista.length; i++) {
        if(nodo.from == this.lista[i].from) {
            return true;
        }
    }

    return false;
}

Lista.prototype.get = function(indice) {
    var nodo = this.lista[indice];
    console.log(nodo);
    return nodo;
}

Lista.prototype.indexOf = function(nodo) {
    for(i=0; i<this.lista.length; i++) {
        if(this.lista[i].from == nodo.from) {
            return i;
        }
    }

    return -1;
}