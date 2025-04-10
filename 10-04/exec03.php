<?php
    // Calcular reajustes salario até 300 50% de reajustes, maiores que 300 30% de reajustes.
    function calc_salario($valor_salario) {
        if ($valor_salario > 300) {
            return $valor_salario + ($valor_salario * 0.30);
        } else {
            return $valor_salario + ($valor_salario * 0.50);
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exec 03 - 10/04</title>
</head>
<body>
            <h2>Calculadora de reajuste</h2>
            <form method="POST">
                <label for="valor_salario">Valor total do salárrio:</label>
                <input type="number" name="valor_salario" required>

                <div class="buttons">
                    <button type="submit" name="operacao" value="btn_post">Realizar cálculo</button>
                </div>
            </form>

            <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $valor_salario = $_POST["valor_salario"];
                    $result = calc_salario($valor_salario);
                    echo "O salário reajustado é de: ", $result;

                }
            ?>
</body>
</html>