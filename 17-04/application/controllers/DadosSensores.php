<?php

defined('BASEPATH') or exit('No direct script access allowed');

class DadosSensores extends CI_Controller {
    private int $id_leitura;
    private float $temperatura;
    private int $umidade;
    private string $luminosidade;
    private $data_leitura;

    public function get_id_leitura(): int {
        return $this->id_leitura;
    }   

    public function set_id_leitura(int $id_leitura): void {
        $this->id_leitura = $id_leitura;
    }

    public function get_temperatura(): float {
        return $this->temperatura;
    }

    public function set_temperatura(float $temperatura): void {
        $this->temperatura = $temperatura;
    }

    public function get_umidade(): int {
        return $this->umidade;
    }

    public function set_umidade(int $umidade): void {
        $this->umidade = $umidade;
    }

    public function get_luminosidade(): string {
        return $this->luminosidade;
    }

    public function set_luminosidade(string $luminosidade): void {
        $this->luminosidade = $luminosidade;
    }

    public function get_data_leitura() {
        return $this->data_leitura;
    }

    public function set_data_leitura($data_leitura): void {
        $this->data_leitura = $data_leitura;
    }

    public function insert_new_reading() {
        try {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $this->set_temperatura($_POST["temperatura"]);
                $this->set_umidade($_POST["umidade"]);
                $this->set_luminosidade($_POST["luminosidade"]);

                if ($this->get_temperatura() == null || $this->get_umidade() == null || $this->get_luminosidade() == null) {
                    $return = array("Code" => 300, "Message" => "Dados não informados");
                } 

                elseif ($this->get_temperatura() < -50 || $this->get_temperatura() > 50) {
                    $return = array("Code" => 400, "Message" => "Temperatura fora do intervalo permitido");
                }

                elseif ($this->get_umidade() < 0 || $this->get_umidade() > 100) {
                    $return = array("Code" => 400, "Message" => "Umidade fora do intervalo permitido");
                }

                elseif ($this->get_luminosidade() != "Baixa" && $this->get_luminosidade() != "Média" && $this->get_luminosidade() != "Alta") {
                    $return = array("Code" => 400, "Message" => "Luminosidade fora do intervalo permitido");
                }

                else {
                    $this->load->model('DadosSensoresModel');
                    $this->DadosSensoresModel->insert_new_reading_model($this->get_temperatura(), $this->get_umidade(), $this->get_luminosidade());
                    
                    $return = array("Code" => 200, "Message" => "Leitura inserida com sucesso");
                }
            } 

            else {
                $return = array("Code" => 500, "Message" => "Requisição inválida");
            }
        } catch (Exception $e) {
            $return = (array("Code" => 500, "Message" => "Erro ao inserir leitura: " . $e->getMessage()));
        }

        echo json_encode($return);

    }
}

?>