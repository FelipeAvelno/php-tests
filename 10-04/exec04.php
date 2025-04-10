<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exec 04 - 10/04</title>
</head>
<body>
            <h2>For simples</h2>
            <form method="POST">
                <label for="numero">Insira um número:</label>
                <input type="number" name="numero" required>

                <div class="buttons">
                    <button type="submit" name="operacao" value="btn_post">Realizar cálculo</button>
                </div>
            </form>

            <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $numero = $_POST["numero"];

                    for ($i = 0; $i <= $numero; $i++) {
                        echo $i;
                        echo "<br>";
                    }
                }
            ?>
</body>
</html>