<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="estilos.css" rel="stylesheet">
</head>
<body>
 
        <?php

        foreach ($hayerrores as $error){
            echo $error ."<BR>";
            
        }

        ?>
        <br><br>
        <a href="javascript:history.back()"> Volver Atrás</a>


</body>
</html>



