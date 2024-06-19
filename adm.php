<?php
include 'navbar.php';

?>

<form method="post" action="historicoPedidos.php">

<div class="m-3 col-8">
    <label class="form-label" for="nomeUsuario">Nome de Usuario:</label>
     <input class="form-control" type="text" name="nomeUsuario" id="nomeUsuario" required>
        </div>
    <div class="m-3 col-8">
    
    <label class="form-label" for="senha">Senha:</label>
    <input class="form-control" type="password" name="senha" id="senha" required>
    </div>

        
        
    <div class="m-3 col-8">
        <input type="submit" class="btn btn-danger" value="Login">
    </div>
    </form>