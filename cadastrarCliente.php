<?php
require 'conectaBanco.php';
require 'Cliente.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nome']) && isset($_POST['cpf'])) {
    $cliente = new Cliente($_POST['nome'], $_POST['email'], $_POST['cpf'], $_POST['endereco']);
    $nome = $cliente->getNome();
    $email = $cliente->getEmail();
    $cpf = $cliente->getCpf();
    $endereco = $cliente->getEndereco();

    // Verificar se o CPF ja existe
    $sql = "SELECT cpf FROM cadastro WHERE cpf = '$cpf'";
    $result = $banco->query($sql);

    if ($result->num_rows > 0) {
        echo "Erro: O CPF já está cadastrado.";
    } else {
        // Inserir o novo cliente em cadastro
        $sql = "INSERT INTO cadastro (nome, email, cpf, endereco) VALUES ('$nome', '$email', '$cpf', '$endereco')";
        if ($banco->query($sql) === TRUE) {
            echo "Cliente cadastrado com sucesso.";
        } else {
            echo "Erro ao cadastrar cliente: " . $banco->error . "</div>";
        }
    }

    $banco->close();
}
?>