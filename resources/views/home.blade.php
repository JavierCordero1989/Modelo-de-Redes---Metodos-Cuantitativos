@extends('layouts.app')

@section('content')


{{-- <div class="container">
    <div class="row"> --}}
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    
</head>
<body>

<div class="startcontent">
    
  <!--HEADER-->
<header>
  <div class="container">
    
    {{-- <div class="row">
      <div class="twelve columns">
        <nav>
          <ul>
              <li><a href="#">Acerca de</a></li>
              <li><a href="#">Work</a></li>
              <li><a href="#">Writing</a></li>
              <li><a href="#">Contáctenos</a></li>
          </ul>
        </nav>   
      </div> 
    </div> --}}

    <div class="row">    
      <div class="twelve columns">
          <h1>- Crear Educar Diseñar Crecer -</h1>
          <h4>Con cálidad y compromiso</h4>        
        <a href="#aboutsystem" class="btn">Alliance Systems</a> 
        <a href="#" class="btn block">Visit </a>
      </div>
    </div>
    
    <section class="services">
      <div class="row">
        <div class="twelve columns">
            <h3>Áreas de experiencia</h3>
        </div>
      </div>
      <div class="row">
        <div class="one-half column">
          <a href="#">
              <h4>Objetivo General del proyecto</h4>
            <span class="fa fa-picture-o"></span>
            <p>Explicar la teoría de modelos de redes, utilizando la técnica de la ruta más corta, mediante el desarrollo de un programa que lo implementa.</p>
          </a>
        </div>
        <div class="one-half column">
          <a href="#">
              <h4>Objetivos Específicos</h4>
            <span class="fa fa-leaf"></span>
            <p>Desarrollar un sistema que interactivamente muestre, la técnica de la ruta más corta, implementando una interfaz amigable para el usuario. </p>
            <p>Describir en qué consiste el modelo de redes, utilizando como base un ejemplo implementado con el algoritmo de la ruta más corta.</p>
        
          </a>
        </div>
      </div><!--end of .row-->
    </section><!--end of section-->
  </div><!--end of .container-->
</header><!--end of header-->

<!--ABOUT-->
<section class="about">    
  <div class="container">      
    <div class="row">
      <div class="twelve columns">
      </div>
    </div><!--end of .row-->
    <div class="row bottom">
      <div class="two-thirds column">
          <h3>Teoría de modelos de redes y modelo a implementar</h3>
          <p> Las redes sirven para modelar una amplia gama de problemas, dentro del desarrollo del tema, se presentan tres problemas de redes. 
            </p>
          <p>El primero de ellos es, el del árbol de expansión mínima el cual se encarga de determinar el camino a través de la red que conecta todos los puntos, al mismo tiempo se encarga de minimizar la distancia total.</p>
          <p>Esta es muy útil para determinar la mejor forma encontrar una manera de   que reduzca la cantidad de cableado.
            </p>
          <p>El segundo, es el problema de flujo máximo, el cual se encarga de encontrar el máximo flujo de cualquier cantidad o sustancia que llegara a 
            pasar por la red. Ejemplo; se puede saber la cantidad de carros que pasan por una carretera.</p>
            <P>
            El último de ellos, es el problema de la ruta más corta, el cual consiste en calcular la trayectoria  más corta a 
            través de la red, como decir encontrar la ruta más corta para llegar a una ciudad.    
            </P>
        </div>
      <div class="one-third column">
          <h3>Descripción del problema</h3>
        <P>La red de la figura siguiente ilustra las carreteras y las ciudades cercanas a Leadville, 
            Colorado. Hernán Jiménez, un fabricante de cascos para bicicleta, debe transportar sus artículos a un distribuidor en Dillon, 
            Colorado. Para hacerlo, tiene que pasar por varias ciudades. Hernán quiere encontrar la ruta más corta para ir de Leadville a Dillon. 
            ¿Qué le recomendaría?
          </P>
            <div class="imgexample">
            </div>
          <br>
          <h3> Solución</h3>
        <p>El problema se resuelve con la técnica de la ruta más corta. El nodo más cercano al origen (nodo 1) es el nodo 2. La distancia 
            de 8 se coloca en un cuadro junto al nodo 2. Después, considere los nodos 3, 4 y 5, ya que hay un arco a cada uno desde el nodo 1 o el 2,
            y ambos tienen sus distancias establecidas. El nodo más cercano al origen es el nodo 3,
            por lo que la distancia que se coloca en un cuadro al lado del nodo 3 es 14 (8 + 6).
        </p>
        <p>
            Entonces, considere los nodos 4, 5 y 6. El nodo más cercano al origen es el nodo 4, con una distancia de 18 (directamente del nodo 1). 
            Luego, considere los nodos 5 y 6. El nodo con la menor distancia desde el origen es el nodo 5 (que pasa por el nodo 2) y esta distancia es 22. 
            Ahora vea los nodos 6 y 7 y se selecciona el nodo 6, ya que la distancia es 26 (pasando por el nodo 3). 
        </p>
        <p>
            Por último, se toma en cuenta el nodo 7 y la distancia más corta desde el origen es 32 (pasando por el nodo 6). 
            La ruta que da la distancia más corta es 1 - 2 - 3 - 6 - 7 y la distancia es 32. Véase la solución en la siguiente
            figura.
        </p>
          <div class="imgsolution">

          </div>
      </div>
    </div><!--end of .row-->
    <div class="row">
        <section id="aboutsystem">
      <div class="twelve columns" >

            <h4 class="center">Descripción del sistema</h4>
            <p>
                El sistema que se realizará, permitirá la posibilidad de representar el modelos de redes, 
                en específico el de la ruta más corta, dicho sistema será de manera web, y el mismo funcionara 
                de la siguiente manera, se tendrá una vista en la cual se pedirá el número de nodos que se desean 
                agregar y de acuerdo a este número se colocará una igual cantidad en pantalla.
            </p>
            <p>
                Una vez los nodos son colocados se dará la posibilidad de unir los nodos, esto se logrará gracias 
                a la funcionalidad del sistema, en la que se tendrán dos casillas en donde se colocaran unos datos, 
                uno de ellos se denominara “De” en el cual se agregara el nodo de origen o de inicio de un camino, 
                el otro campo se denominará “hasta” el cual será el nodo destino.
              </p>
              <p>
                  Una vez se hayan colocado los dos datos se presiona un botón el cual tiene el propósito de tomar dicha 
                  información colocada en pantalla y trasladarlo de maner visual en el grafo, esto se va a ir realizando 
                  con cada uno de los nodos que se  halla colocado hasta que el nodo sea terminado. 
              </p>

      </div>
    </section>
    </div><!--end of .row-->
    <div class="row">
      <div class="twelve columns">
        <a href="#" class="btn block">Visit </a>
      </div>
    </div><!--end of .row-->
  </div><!--end of .container-->
</section>

<!--CONTACT-->
<section class="contact">
  <div class="container">
    <div class="row">
      <div class="twelve columns">
      </div>
    </div><!--end of .row-->
    <div class="row">
      <div class="offset-by-two eight columns">
        <ul>
          <li><a href="#" title=""><span class="fa fa-facebook"></span></a></li>
          <li><a href="#" title=""><span class="fa fa-twitter"></span></a></li>
          <li><a href="#" title=""><span class="fa fa-dribbble"></span></a></li>
          <li><a href="#" title=""><span class="fa fa-linkedin"></span></a></li>
          <li><a href="#" title=""><span class="fa fa-github"></span></a></li>
        </ul>
      </div>
    </div><!--end of .row-->
    <div class="row">
      {{-- <div class="twelve columns">
        <a href="#" class="btn block btn-blue">Contácenos</a>
      </div> --}}
    </div><!--end of .row-->
    <div class="row">
      <div class="twelve columns">
        {{-- <p class="creator">A demo by George Martsoukos. <a href="http://www.sitepoint.com/getting-started-with-skeleton-simple-css-boilerplate">See article</a>.</p> --}}
      </div>
    </div><!--end of .row-->
  </div><!--end of .container-->
</section>
    </div>
</div>
</div> <!--end of .startcontent-->
</body>
</html>
@endsection
