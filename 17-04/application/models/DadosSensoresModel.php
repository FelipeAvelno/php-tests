<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DadosSensoresModel extends CI_Model {
    public function insert_new_reading_model($temperatura, $umidade, $luminosidade) {
        try {
            $this->db->query("INSERT INTO sensores (temperatura, umidade, luminosidade) VALUES ($temperatura, $umidade, '$luminosidade')");
        
            if ($this->db->affected_rows() > 0) {
                $return = array("Code" => 200, "Message" => "Leitura inserida com sucesso");
            } else {
                $return = array("Code" => 500, "Message" => "Erro ao inserir leitura");
            }
        } catch (Exception $e) {
            $return = array("Code" => 500, "Message" => "Erro ao inserir leitura: " . $e->getMessage());
        }
        return $return;
    }
}
?>