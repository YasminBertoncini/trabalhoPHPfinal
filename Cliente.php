<?php

// cria o obj Cliente que é utlizado para fazer o cadastro
class Cliente {
    private $nome;
    private $email;
    private $cpf;
    private $endereco;

    public function __construct($nome, $email, $cpf, $endereco) {
        $this->nome = $nome;
        $this->email = $email;
        $this->cpf = $cpf;
        $this->endereco = $endereco;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function getEndereco() {
        return $this->endereco;
    }
}
?>
