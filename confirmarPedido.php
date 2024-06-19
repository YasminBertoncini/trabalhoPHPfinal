<?php 
include 'navbar.php'; 
require 'conectaBanco.php'; 
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['confirmar_pedido']) && isset($_POST['sabor']) && isset($_POST['tamanho']) && isset($_POST['bebida'])) {
    $cpf = $_SESSION['cpf'];
    $sabor = $_POST['sabor'];
    $tamanho = $_POST['tamanho'];
    $bebida = $_POST['bebida'];

    $total = 0;
    $precoSabor = 0;
    $precoTamanho = 0;
    $precoBebida = 0;

    // Calcula o valor do sabor
    $sql = "SELECT preco FROM precos WHERE item = '$sabor' AND tipo = 'sabor'";
    $resultado = $banco->query($sql);
    if ($resultado->num_rows > 0) {
        $linha = $resultado->fetch_assoc();
        $precoSabor = $linha['preco'];
        $total += $precoSabor;
    }

    // Calcula o preço do tamanho
    $sql = "SELECT preco FROM precos WHERE item = '$tamanho' AND tipo = 'tamanho'";
    $resultado = $banco->query($sql);
    if ($resultado->num_rows > 0) {
        $linha = $resultado->fetch_assoc();
        $precoTamanho = $linha['preco'];
        $total += $precoTamanho;
    }

    // Calcula o valor da bebida
    if ($bebida != "Sem bebida") {
        $sql = "SELECT preco FROM precos WHERE item = '$bebida' AND tipo = 'bebida'";
        $resultado = $banco->query($sql);
        if ($resultado->num_rows > 0) {
            $linha = $resultado->fetch_assoc();
            $precoBebida = $linha['preco'];
            $total += $precoBebida;
        }
    }

    // add o pedido na tabela pedidos
    $sql = "INSERT INTO pedidos (sabor, tamanho, bebida) VALUES ('$sabor', '$tamanho', '$bebida')";
    if ($banco->query($sql) === TRUE) {
        // Obtém o ID do pedido recém-criado
        $pedidoId = $banco->insert_id;

        // add o registro na tabela pedidos_detalhes
        $sqlDetalhes = "INSERT INTO pedidos_detalhes (pedido_id, cpf) VALUES ('$pedidoId', '$cpf')";
        if ($banco->query($sqlDetalhes) === TRUE) {
            $_SESSION['pedido_id'] = $pedidoId;
            $_SESSION['total'] = $total;
            $_SESSION['precoSabor'] = $precoSabor;
            $_SESSION['precoTamanho'] = $precoTamanho;
            $_SESSION['precoBebida'] = $precoBebida;
            $_SESSION['sabor'] = $sabor;
            $_SESSION['tamanho'] = $tamanho;
            $_SESSION['bebida'] = $bebida;

           
        } else {
            echo "<div class='alert alert-danger' role='alert'>Erro ao associar pedido ao cliente: " . $banco->error . "</div>";
        }
    } else {
        echo "<div class='alert alert-danger' role='alert'>Erro ao cadastrar pedido: " . $banco->error . "</div>";
    }

    $banco->close();
}
?>



<?php
if (isset($_SESSION['pedido_id'])) {
    $pedido_id = $_SESSION['pedido_id'];
    $cpf = $_SESSION['cpf'];
    $sabor = $_SESSION['sabor'];
    $tamanho = $_SESSION['tamanho'];
    $bebida = $_SESSION['bebida'];
    $total = $_SESSION['total'];
    $precoSabor = $_SESSION['precoSabor'];
    $precoTamanho = $_SESSION['precoTamanho'];
    $precoBebida = $_SESSION['precoBebida'];

    echo "<div class='container'>";
    echo "<h2>Resumo do Pedido</h2>";
    echo "<p>Sabor: $sabor - R$ $precoSabor</p>";
    echo "<p>Tamanho: $tamanho pedaços - R$ $precoTamanho</p>";
    if ($bebida != "Sem bebida") {
        echo "<p>Bebida: $bebida - R$ $precoBebida</p>";
    }
    echo "<h3>Total: R$ $total</h3>";
    echo "<h3>ID do Pedido: $pedido_id</h3>";
    echo "<h3>CPF do Cliente: $cpf</h3>";

    echo "<form action='pedidoConfirmado.php' method='post'>";
    echo "<button type='submit' class='btn btn-danger'>Confirmar Pedido</button>";
    echo "</form>";
    echo "</div>";

    

   
} else {
    echo "<div class='alert alert-danger' role='alert'>Nenhum pedido encontrado. Por favor, faça um pedido primeiro.</div>";
}
?>
