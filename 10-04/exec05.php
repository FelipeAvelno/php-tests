<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exec 05 - 10/04</title>
</head>
<body>
            <h2>Fatorial</h2>
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
                    // static $lista = [];
                    $contador = 1;
                    $resultado = 1;
                    
                    echo "Fatorial de $numero é: ";
                    echo "<br>";

                    while ($contador <= $numero) {
                        $resultado *= $contador;
                        $contador += 1;
                    }

                    echo $resultado;
                    // for ($i = $numero; $i > 0; $i--) {
                    //     $lista[] = $i;
                    // }

                    // foreach ($lista as $num) {
                    //     echo $num;
                    // }
                }
            ?>
</body>
</html>