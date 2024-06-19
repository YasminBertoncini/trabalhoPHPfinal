<?php 
include 'navbar.php'; 
require 'conectaBanco.php'; 
session_start();
?>

<div class="container m-3">
    <h3 class="text-danger-emphasis">Verificar CPF do Cliente</h3>
    <form action="" method="post">
        <div class="m-3 col-8">
            <label class="form-label" for="cpf">CPF:</label>
            <input class="form-control" type="text" name="cpf" id="cpf" required>
        </div>
        <button class="btn btn-danger m-3" type="submit">Verificar</button>
    </form>
</div>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['cpf'])) {
    $cpf = $_POST['cpf'];
    $_SESSION['cpf'] = $cpf;

    $sql = "SELECT * FROM cadastro WHERE cpf = '$cpf'";
    $resultado = $banco->query($sql);

    if ($resultado->num_rows > 0) {
        echo "<div class='container'>";
        echo "<h3 class='text-success'>CPF encontrado! Por favor, preencha o pedido abaixo:</h3>";

        echo '<form action="confirmarPedido.php" method="post">
            <input type="hidden" name="cpf" value="' . $cpf . '">
            <div class="col-6">
                <label for="sabor" class="form-label lead">Escolha o sabor da sua pizza</label>
                <select name="sabor" class="form-select" required>
                    <option value="frango">Frango e bacon</option>
                    <option value="calabresa">Calabresa</option>
                    <option value="portuguesa">Portuguesa</option>
                    <option value="chocolate">Chocolate</option>
                </select>
            </div>
            <div class="col-6 m-3">
                <h5>Escolha o tamanho da pizza</h5>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="tamanho" id="4" value="4" checked>
                    <label class="form-check-label" for="4">4 pedaços</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="tamanho" id="8" value="8">
                    <label class="form-check-label" for="8">8 pedaços</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="tamanho" id="12" value="12">
                    <label class="form-check-label" for="12">12 pedaços</label>
                </div>
            </div>
            <div class="col-6 m-3">
                <h5>Escolha a sua bebida</h5>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="bebida" id="semBebida" value="Sem bebida" checked>
                    <label class="form-check-label" for="semBebida">Sem bebida</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="bebida" id="coca" value="Coca-Cola">
                    <label class="form-check-label" for="coca">Coca-Cola</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="bebida" id="guarana" value="Guarana">
                    <label class="form-check-label" for="guarana">Guaraná</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="bebida" id="fanta" value="Fanta">
                    <label class="form-check-label" for="fanta">Fanta</label>
                </div>
            </div>
            <input type="submit" name="confirmar_pedido" value="Fazer pedido" class="btn btn-danger">
        </form>';

        echo "</div>";
    } else {
        echo "<div class='alert alert-danger' role='alert'>CPF não encontrado. Por favor, cadastre o cliente primeiro.</div>";
        include 'cadastrarCliente.php';
    }
}
?>
