<?php
    // 10 % de desconto funcionários, 5% para clientes e valor total a ser pago por pessoa
    function verify_descont($valor_total, $code) {
        if (!is_numeric($code)) {
            return "Você deve inserir um número no código";
        }

        if ($code > 3 || $code < 1) {
            return "Código informado inválido (1 para comum, 2 para funcionário e 3 para vip)";
        }

        switch ($code) {
            case 1:
                $valor_total = $valor_total * 1;

            case 2:
                $valor_total = $valor_total - ($valor_total * 0.10);

            case 3:
                $valor_total = $valor_total - ($valor_total * 0.05);
        }

        return "O usuário deverá pagar: $valor_total";
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exec 02 - 10/04</title>
</head>
<body>
            <h2>Calculadora de desconto</h2>
            <form method="POST">
                <label for="valor_total">Valor total de compra:</label>
                <input type="number" name="valor_total" required>

                <label for="code">Código:</label>
                <input type="number" name="code" required>

                <div class="buttons">
                    <button type="submit" name="operacao" value="btn_somar">Realizar cálculo</button>
                </div>
            </form>

            <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $valor_total = $_POST["valor_total"];
                    $code = $_POST["code"];

                    $result = verify_descont($valor_total, $code);
                    echo $result;

                }
            ?>
</body>
</html>