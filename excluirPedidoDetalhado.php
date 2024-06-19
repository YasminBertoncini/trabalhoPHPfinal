<?php
include 'conectaBanco.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['pedido_id'])) {
    $pedido_id = $_POST['pedido_id'];

    //  excluir o pedido da tabela pedidos_detalhes
    $sql = "DELETE FROM pedidos_detalhes WHERE pedido_id = $pedido_id";

    if ($banco->query($sql) === TRUE) {
        echo "Pedido excluído com sucesso.";
    } else {
        echo "Erro ao excluir o pedido: " . $banco->error;
    }
} else {
    echo "Pedido não especificado.";
}

$banco->close(); 
?>
