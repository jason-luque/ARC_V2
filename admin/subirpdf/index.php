<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include_once 'config.inc.php';
if (isset($_POST['subir'])) {
    $nombre = $_FILES['archivo']['name'];
    $tipo = $_FILES['archivo']['type'];
    $tamanio = $_FILES['archivo']['size'];
    $ruta = $_FILES['archivo']['tmp_name'];
    $destino = "archivos/" . $nombre;
    if ($nombre != "") {
        if (copy($ruta, $destino)) {
            $titulo= $_POST['titulo'];
            $descri= $_POST['descripcion'];
            $db=new Conect_MySql();
            $sql = "INSERT INTO tbl_documentos(titulo,descripcion,tamanio,tipo,nombre_archivo) VALUES('$titulo','$descri','$tamanio','$tipo','$nombre')";
            $query = $db->execute($sql);
            if($query){
            echo '<img src="images/check.png" width="30" height="30" alt="icon" />';
            echo '<p style="color: green;">Se guardo correctamente!</p>';



            }
        } else {
            echo "Error";
        }
    }
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Panel de archivos</title>
        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="../../assets/plugins/materialize/css/materialize.min.css"/>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="../../assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">        
        <link href="../../assets/css/alpha.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../assets/css/custom.css" rel="stylesheet" type="text/css"/>
    </head>
    </head>
    <body background="../../images/logoCole.jpg">
        <br></br>
        <div style="width: 500px;margin: auto;border: 2px solid black;padding: 10px;">
            <center>
            <h4>Panel de control</h4>
             </center>
            <form method="post" action="" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td><label>Título</label></td>
                        <td><input type="text" name="titulo"></td>
                    </tr>
                    <tr>
                        <td><label>Descripción</label></td>
                        <td><textarea name="descripcion"></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="file" name="archivo"></td>
                    <tr>

                        <td><input type="submit" value="Subir" name="subir"></td>
                        <center>
                        <a class="btn btn-primary" href="lista.php" role="button">Ver mis archivo</a>
                    </center>
                    </tr>
                </table>
            </form>            
        </div>
    </body>
</html>
