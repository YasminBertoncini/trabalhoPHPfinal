<?php
    $banco = new mysqli("localhost", "root", "","pizzariaBertoncini",3306);
    if($banco->connect_errno){
        echo "Erro ao conectar no banco de dados";
    }else{
        echo "";
    }

?>