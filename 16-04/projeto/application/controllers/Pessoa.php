<?php
require_once('../helpers/geral_helper.php');

class Pessoa extends CI_Controller {
    private $id = 0;
    private $name = null;
    private $cpf = null;
    private $estatus = null;

    public function get_id(): int {
        return $this->id;
    }

    public function set_id(int $new_id): void {
        $this->id = $new_id;
    }

    public function get_name(): string {
        return $this->name;
    }

    public function set_name(string $new_name): void {
        $this->name = $new_name;
    }

    public function get_cpf(): string {
        return $this->cpf;
    }

    public function set_cpf(string $new_cpf): void {
        $this->cpf = $new_cpf;
    }

    public function get_estatus(): string {
        return $this->estatus;
    }

    public function set_estatus(string $new_estatus): void {
        $this->estatus = $new_estatus;
    }

    public function insert_user() {
        $json = file_get_contents('php://input');
        $result = json_decode($json);

        $list = array("name" => '0', "cpf" => '0', "estatus" => '0');

        if (verificarParam($result, $list) == 1) {
            $this->set_name($result->name);
            $this->set_cpf($result->cpf);
            $this->set_estatus($result->estatus);

            if (trim($this->get_name()) == "") {
                $return = array('codigo' => 3, 'msg' => 'Nome não informado.');
            } 
            elseif ($this->get_estatus() != "D" && $this->get_estatus() != "") {
                $return = array('codigo' => 4, 'msg' => 'Status não condiz com o permitido');
            } 
            else {
                $this->load->model('M_curso');
                $return = $this->M_curso->insert_user(
                    $this->get_name(),
                    $this->get_cpf(),
                    $this->get_estatus()
                );
            }
        } else {
            $return = array('codigo' => 99, 'msg' => 'Os campos do FrontEnd não representam método de inserção. Verifique.');
        }

        echo json_encode($return);
    }
}
?>
