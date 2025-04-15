<?php
    class Usuario {
        private $id = 0;
        private $nome = null;
        private $senha = null;

        public function set_nome($nome) {
            $this->nome = $nome;
        }

        public function get_nome() {
            return $this->nome;
        }

        public function set_senha($senha) {
            $this->senha = $senha;
        }

        public function get_senha() {
            return $this->senha;
        }
    }
?>