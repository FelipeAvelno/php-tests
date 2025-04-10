<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exec 06 - 10/04</title>
</head>
<body>
            <h2>Distância entre 2 números</h2>
            <form method="POST">
                <label for="numero1">Insira um número:</label>
                <input type="number" name="numero1" required>

                <label for="numero2">Insira um número:</label>
                <input type="number" name="numero2" required>

                <div class="buttons">
                    <button type="submit" name="operacao" value="btn_post">Realizar cálculo</button>
                </div>
            </form>

            <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $numero = $_POST["numero1"];
                    $numero2 = $_POST["numero2"];

                    if ($numero < $numero2) {
                        for ($i = $numero+1; $i < $numero2; $i++) {
                            echo $i;
                        }
                    } elseif ($numero > $numero2) {
                        for ($i = $numero-1; $i > $numero2; $i--) {
                            echo $i;
                        }
                    } else {
                        echo "Um número não pode ser igual ao outro";
                    }
                }
            ?>
</body>
</html>