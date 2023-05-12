<html>
   <head>
   <link href="estilos.css" rel="stylesheet">
      <title>LIBRERIA JFR</title>
   </head>
   <body>
      <h1><u>Ver datos de un libro</u></h1>
      <br>
      <table id="bookstore_bd" border="1">
         <tr>
            <th>PORTADA</th>
            <th>ISBN</th>
            <th>TÍTULO</th>
            <th>DESCRIPCIÓN</th>
            <th>Nº PÁGINAS</th>
            <th>EDITORIAL</th>
            <th>PRECIO</th>
         </tr>
         <tr>
         <td><img src=<?=$ruta.$libro['portada']; ?> width="115px" height="175px"></td>
            <td><?php echo $libro['isbn'] ?></td>
            <td><?php echo $libro['titulo'] ?></td>
            <td><?php echo $libro['descripcion'] ?></td>
            <td><?php echo $libro['n_pags'] ?></td>
            <td><?php echo $libro['editorial'] ?></td>
            <td><?php echo number_format($libro['precio'],2)?></td>
         </tr>
      </table>
      <br><br><br><br>
      <td><a class="button" href="index.php">Volver</a></td>
   </body>
</html>  