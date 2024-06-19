<?php
require 'conectaBanco.php'; // Arquivo de conexão com o banco de dados

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['pedido_id'])) {
    $pedido_id = $_POST['pedido_id'];

    // Query para excluir o pedido
    $sql = "DELETE FROM pedidos WHERE id = $pedido_id";

    if ($banco->query($sql) === TRUE) {
        echo "Pedido excluído com sucesso.";
    } else {
        echo "Erro ao excluir pedido: " . $banco->error . "</div>";
    }

    $banco->close();
}
?>
