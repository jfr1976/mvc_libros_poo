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
   
  
      <h1><u>Listado Editoriales</u></h1>
      
      <br><br>
               
      <table id="bookstore_bd" border="1">
         <tr>
            
            <th>LOGO</th>
            <th>NOMBRE</th>   
            <th>DIRECCIÓN</th>
            <th>TELEFONO</th>


         </tr>
         <?php foreach ($editoriales as $editorial): ?>
            
            <tr>
               
               
               <td><img src=<?=$ruta.$editorial['logo']; ?> width="200px" height="200px"></td>
               <td><?php echo $editorial['nombre'] ?></td>
               <td><?php echo $editorial['direccion'] ?></td>
               <td><?php echo $editorial['telefono'] ?></td>


               

            </tr>
         <?php endforeach; ?>
      </table>
      <br><br><br><br>
      
    <?php

        include("footer.php");

    ?>
   </body>
</html>