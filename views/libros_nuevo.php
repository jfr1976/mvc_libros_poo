<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Libro</title>
    <?php


        include("header.php");

    ?>
    <link href="estilos.css" rel="stylesheet">
</head>
<body>


<br><br>
<form id="miform" name="miform" method="POST" action="index.php?controller=libros&action=guardar" enctype="multipart/form-data">

    <label>ISBN:</label>
    <input type="text" name="isbn" id="isbn" required>
    <br><br>
    <label>Título:</label>
    <input type="text" name="titulo" id="titulo" required>
    <br><br>
    <label>Descripción:</label>
    <input type="text" name="descripcion" id="descripcion" required>
    <br><br>
    <label>Nº Páginas:</label>
    <input type="text" name="n_pags" id="n_pags" required>
    <br><br>
    <label>Editorial:</label>
    <select name="editorial" id="editorial">
    <option disabled selected>-- Seleccionar --</option>
    <br><br>
    <?php foreach($editoriales as $clave => $valor){?>
        
        <option value ="<?= $valor['id']; ?>"><?= $valor['id']." ".$valor['nombre'];?> </option>
        
        <?php }
        ?>
    </select>
    <br><br>
    <label>Precio:</label>
    <input type="text" name="precio" id="precio" required>
    <br><br>
    <label>Portada:</label>
    <br><br>
    <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
    <input type="file" style="font-size:x-large" name="file_upload">
    <br><br>
    <input class="button" name="envio" type="Submit" value="Enviar" />
</form>

<br><br><br><br><br><br><br><br><br><br><br>

<?php


        include("footer.php");

    ?>
    
</body>
</html>