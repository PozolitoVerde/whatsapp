<?php

include_once 'conexion.php';

if(isset($_GET['id'])){

    $id = $_GET['id'];

    $sql = "SELECT * FROM contacto where id_contacto='$id'";

    $resultado = mysqli_query($con, $sql);

    if($fila = mysqli_fetch_assoc($resultado)){
        //envio los valores al formulario

    }

        
}

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $dir = $_POST['dir'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $cel = $_POST['cel'];
    $wha = $_POST['whats'];

    $sql = "update contacto set nombre_suc = '$nombre',
                                    direccion = '$dir',
                                     email = '$email',
                                      tel = '$tel',
                                       cel = '$cel',
                                        whatsapp = '$wha'
                                         where 
                                         id_contacto = '$id'";
    $resultado = mysqli_query($con, $sql);

    if($resultado){
        echo "<script>
                alert('¡Contacto correctamente actaulizado!');

                location.href='administrar.php'
            </script>";
    }else{
        echo "<script>
                alert('¡Ha ocurrido un error!');

                
            </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Contacto</title>
</head>
<body>
    <br>
    <h3><a href="administrar.php">Contacto->Administrar</a></h3>
    <center>
        <h1>Actualizar Contacto</h1>
        <hr>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <label for="nombre">Nombre</label>
                <br>
                <input type="text" name="nombre" value="<?php echo $fila['nombre_suc'];?>" require>
                <br>
                <label for="direccion">Direccion</label>
                <br>
                <input type="text" name="dir" value="<?php echo $fila['direccion'];?>" require>
                <br>
                <label for="email">Email</label>
                <br>
                <input type="email" name="email" value="<?php echo $fila['email'];?>" require>
                <br>
                <label for="tel">Telefono</label>
                <br>
                <input type="tel" name="tel" value="<?php echo $fila['tel'];?>" require>
                <br>
                <label for="cel">Celular</label>
                <br>
                <input type="tel" name="cel" value="<?php echo $fila['cel'];?>" require>
                <br>
                <label for="whatssap">Whatssap</label>
                <br>
                <input type="text" name="whats" value="<?php echo $fila['whatsapp'];?>" require>
                <input type="hidden" name="id" value="<?php echo $fila['id_contacto'];?>">
                <br>
                <input type="submit" name="enviar" value="Guardar">
            </form>
        
        <hr>
    </center>
</body>
</html>