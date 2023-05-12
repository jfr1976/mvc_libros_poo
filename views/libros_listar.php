<html>
   <head>
   <link href="estilos.css" rel="stylesheet">
      <title>LIBRERIA JFR</title>
      <?php

//Includes es el directorio donde estaría header.php. Puedes darle el nombre que quieras
include("header.php");

?>
      
   </head>
   <body>
   
   
      <h1><u>Nuestro listado de libros</u></h1>
      
      <br><br>
               
      <table id="bookstore_bd" border="1">
         <tr>
            
            <th>PORTADA</th>   
            <th>ISBN</th>
            <th>TÍTULO</th>
            <th>DESCRIPCIÓN</th>
            <th>Nº PÁGINAS</th>
            <th>EDITORIAL</th>
            <th>PRECIO</th>
            <th>ACCIONES</th>

         </tr>
         <?php foreach ($libros as $libro): ?>
            
            <tr>
               
               <td><img src=<?=$ruta.$libro['portada']; ?> width="115px" height="175px"></td>
               <td><?php echo $libro['isbn'] ?></td>
               <td><?php echo $libro['titulo'] ?></td>
               <td><?php echo $libro['descripcion'] ?></td>
               <td><?php echo $libro['n_pags'] ?></td>
               <td><?php echo $libro['editorial'] ?></td>
               <td><?php echo number_format($libro['precio'],2)." €" ?></td>


               
               <td><a href="index.php?controller=libros&action=ver&id=<?php echo $libro['id'];?>">Ver</a>
               <a href="index.php?controller=libros&action=editar&id=<?php echo $libro['id'];?>">Editar</a>
               <a href="index.php?controller=libros&action=borrar&id=<?php echo $libro['id'];?>">Eliminar</a></td>
               

            </tr>
         <?php endforeach; ?>
      </table>
      <br><br><br><br>
      
      <?php

//Includes es el directorio donde estaría header.php. Puedes darle el nombre que quieras
include("footer.php");

?>
   </body>
</html>