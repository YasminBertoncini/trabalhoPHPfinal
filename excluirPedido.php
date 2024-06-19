<?php
require 'conectaBanco.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['pedido_id'])) {
    $pedido_id = $_POST['pedido_id'];

    
    $sql = "DELETE FROM pedidos WHERE id = $pedido_id";

    if ($banco->query($sql) === TRUE) {
        echo "Pedido excluído com sucesso.";
    } else {
        echo "Erro ao excluir pedido: " . $banco->error . "</div>";
    }

    $banco->close();
}
?>
