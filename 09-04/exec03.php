<?php
function calc_media(...$parametros) {
    $lista = [];
    $soma = 0;

    foreach ($parametros as $param) {
        if (is_numeric($param)) {
            $lista[] = $param;
        }
    }

    foreach ($lista as $nota) {
        $soma += $nota;
    }

    if (count($lista) > 0) {
        $media = $soma / count($lista);
        return sprintf("Média geral das notas: %.2f", $media);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exec 03 - 09/04</title>
</head>
<body>
<form method="POST">
        <label for="numberA">Nota A:</label>
        <input type="number" name="numberA" id="numberA" required>
        <br><br>
        <label for="numberB">Nota 2:</label>
        <input type="number" name="numberB" id="numberB" required>
        <br><br>
        <label for="numberC">Nota 3:</label>
        <input type="number" name="numberC" id="numberC" required>
        <button type="submit">Calcular média geral</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numberA = $_POST["numberA"];
        $numberB = $_POST["numberB"];
        $numberC = $_POST["numberC"];

        $resultado = calc_media($numberA, $numberB, $numberC);

        echo '<div class="result"><h3>Média:</h3>';
        echo ($resultado);
        echo '</div>';
    }
    ?>
</body>
</html>