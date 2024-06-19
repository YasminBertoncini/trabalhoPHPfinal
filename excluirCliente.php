<?php
require 'conectaBanco.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['cpf'])) {
    $cpf = $_POST['cpf'];
    $consulta = "SELECT * FROM cadastro WHERE cpf = '$cpf'";
    $resultado = $banco->query($consulta);

    if ($resultado->num_rows > 0) {
        $sql = "DELETE FROM cadastro WHERE cpf = '$cpf'";
        if ($banco->query($sql) === TRUE) {
            echo "<div class='alert alert-success' role='alert'>Cliente excluído com sucesso.</div>";
        } else {
            echo "<div class='alert alert-danger' role='alert'>Erro ao excluir cliente: </div>";
        }
    } else {
        echo "<div class='alert alert-warning' role='alert'>CPF não cadastrado.</div>";
    }

    $banco->close();
}
?>
