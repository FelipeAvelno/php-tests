<?php
function ordenar_numeros(...$parametros) {
    static $lista = [];

    foreach ($parametros as $parametro) {
        if (is_numeric($parametro)) {
            $lista[] = $parametro;
        }
    }

    for ($i = 1; $i < count($lista); $i++) {
        $val_i = $lista[$i];
        $j = $i - 1;

        while ($j >= 0 && $lista[$j] > $val_i) {
            $lista[$j + 1] = $lista[$j];
            $j--;
        }

        $lista[$j + 1] = $val_i;
    }

    return $lista;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordenar Números</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        .result {
            margin-top: 20px;
            padding: 10px;
            background: #f0f0f0;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>
    <form method="POST">
        <label for="numberA">Número A:</label>
        <input type="number" name="numberA" id="numberA" required>
        <br><br>
        <label for="numberB">Número B:</label>
        <input type="number" name="numberB" id="numberB" required>
        <br><br>
        <button type="submit">Ordenar Números</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numberA = $_POST["numberA"];
        $numberB = $_POST["numberB"];

        $resultado = ordenar_numeros($numberA, $numberB);

        echo '<div class="result"><h3>Números ordenados:</h3>';
        echo implode(', ', $resultado);
        echo '</div>';
    }
    ?>
</body>
</html>