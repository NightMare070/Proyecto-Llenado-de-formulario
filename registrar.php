<?php
    include("con_db.php");

    /* if ($conex) {
        echo "Se establecio conexión con la base de datos";
    } else {
        echo "No se logro conectar a la base de datos";
    } */

    if (isset($_POST['register'])) {
        if (strlen($_POST['nombre']) >= 1 && strlen($_POST['organo']) >= 1 && strlen($_POST['banco']) >= 1 && strlen($_POST['cuenta']) >= 1 && strlen($_POST['clabe']) >= 1) {
            $nombre = trim($_POST['nombre']);
            $organo = trim($_POST['organo']);
            $banco = trim($_POST['banco']);
            $cuenta = trim($_POST['cuenta']);
            $clabe = trim($_POST['clabe']);
            $consulta = "INSERT INTO datos(nombre, organo, banco, cuenta, clabe) VALUES ('$nombre','$organo','$banco','$cuenta','$clabe')";
            $resultado = mysqli_query($conex,$consulta);
            /* if ($resultado) {
                ?>
                <h3>Te has registrado correctamente</h3>
                <?php
            } else {
                ?>
                <h3>El registro no fue exitoso</h3>
                <?php
            } */
        } else {
            /* ?>
            <h3>Por favor, complete los campos</h3>
            <?php */
        }
    }
?>
