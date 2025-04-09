<?php
    function calc_mes($param) { // param é um int
        if ($param > 12 or $param < 1) {
            return "O número informado não está entre 1 e 12";
        }

        $meses = [
            "Janeiro" => 1,
            "Fevereiro" => 2,
            "Março" => 3,
            "Abril" => 4,
            "Maio" => 5,
            "Junho" => 6, 
            "Julho" => 7,
            "Agosto" => 8,
            "Setembro" => 9,
            "Outubro" => 10,
            "Novembro" => 11,
            "Dezembro" => 12,
        ];

        $nome_mes = array_search($param, $meses);

        if ($nome_mes !== false) {
            return $nome_mes;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercicio 04 - 09/04</title>
</head>
<body>
<form method="POST">
        <label for="numberA">Nota A:</label>
        <input type="number" name="numberA" id="numberA" required>
        <br><br>
        <button type="submit">Buscar mês</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numberA = $_POST["numberA"];

        $resultado = calc_mes($numberA);

        echo '<div class="result"><h3>Mês correspondente:</h3>';
        echo ($resultado);
        echo '</div>';
    }
    ?>
</body>
</html>