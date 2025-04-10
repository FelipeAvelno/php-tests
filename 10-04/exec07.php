<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exec 06 - 10/04</title>
</head>
<body>
            <h2>Tamanho e número de caracteres entre 0 e o número total</h2>
            <form method="POST">
                <label for="string_input">Insira uma string:</label>
                <input type="text" name="string_input" required>

                <div class="buttons">
                    <button type="submit" name="operacao" value="btn_post">Realizar cálculo</button>
                </div>
            </form>

            <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $string_input = $_POST["string_input"];

                    $qnt_caracteres = strlen($string_input);

                    for ($i = 0; $i < $qnt_caracteres; $i++) {
                        echo "$i ";
                    }
                }
            ?>
</body>
</html>