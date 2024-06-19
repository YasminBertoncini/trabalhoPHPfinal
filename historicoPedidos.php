<?php
require 'conectaBanco.php';



$nomeUsuario = $_POST['nomeUsuario'] ?? null;
$senha = $_POST['senha'] ?? null;

// valida as infos do adm, se for validado mostra as informaçoes se não for não mostra
if ($nomeUsuario && $senha) {
    $sql = "SELECT * FROM login WHERE nomeUsuario = '$nomeUsuario' AND senha = '$senha'";
    $result = $banco->query($sql);

    if ($result->num_rows > 0) {
        include 'navbar.php';
        ?>


<div class="container mt-4">
    <h2 class="text-center">Lista de Pedidos Detalhados</h2>

    <?php
    // Consulta para obter os dados da tabela pedidos_detalhes
    $sql = "SELECT pedido_id, cpf FROM pedidos_detalhes";
    $resultado = $banco->query($sql);

    if ($resultado->num_rows > 0) {
        echo "<table class='table  mt-4'>";
        echo "<thead class='thead-dark'>";
        echo "<tr>";
        echo "<th>ID do Pedido</th>";
        echo "<th>CPF do Cliente</th>";
        echo "<th>Ações</th>"; // Nova coluna para os botões de ação
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        // mostra os pedidos
        while ($linha = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $linha['pedido_id'] . "</td>";
            echo "<td>" . $linha['cpf'] . "</td>";
            echo "<td><form method='post' action='excluirPedidoDetalhado.php'><input type='hidden' name='pedido_id' value='" . $linha['pedido_id'] . "'><button type='submit' class='btn btn-danger'>Excluir</button></form></td>"; // Botão de exclusão
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
    } else {
        echo "<div class='alert alert-info' role='alert'>Nenhum pedido encontrado.</div>";
    }

    
    ?>
</div>





     

<div class="container mt-5">
    <h1 class="mb-4">Lista de Clientes</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>CPF</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Endereço</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT cpf, nome, email, endereco FROM cadastro";
            $result = $banco->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row["cpf"] . "</td>
                            <td>" . $row["nome"] . "</td>
                            <td>" . $row["email"] . "</td>
                            <td>" . $row["endereco"] . "</td>
                            <td>
                                <form method='POST' action='excluirCliente.php'>
                                    <input type='hidden' name='cpf' value='" . $row["cpf"] . "'>
                                    <button type='submit' class='btn btn-danger'>Excluir</button>
                                </form>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Nenhum cliente encontrado</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>


        <div class="container mt-5">
    <h1 class="mb-4">Lista de Pedidos</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Sabor</th>
                <th>Tamanho</th>
                <th>Bebida</th>
                <th>Ações</th> 
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT id, sabor, tamanho, bebida FROM pedidos";
            $result = $banco->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row["id"] . "</td>
                            <td>" . $row["sabor"] . "</td>
                            <td>" . $row["tamanho"] . "</td>
                            <td>" . $row["bebida"] . "</td>
                            <td>
                                <form action='excluirPedido.php' method='post'>
                                    <input type='hidden' name='pedido_id' value='" . $row["id"] . "'>
                                    <button type='submit' class='btn btn-danger'>Excluir</button>
                                </form>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Nenhum pedido encontrado</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>


        <div class="container mt-5">
            <h1 class="mb-4">Lista de Preços</h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Tipo</th>
                        <th>Preço (R$)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT item, tipo, preco FROM precos";
                    $result = $banco->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>" . $row["item"] . "</td>
                                    <td>" . $row["tipo"] . "</td>
                                    <td>" . $row["preco"]. "</td>
                                  </tr>";
                        }
                    } else {
                        echo "Nenhum preço encontrado";
                    }
                    $banco->close();
                    ?>
                </tbody>
            </table>
        </div>

        </body>
        </html>

        <?php
    } else {
        echo "Nome de usuário ou senha incorretos.";
    }
} 

?>
