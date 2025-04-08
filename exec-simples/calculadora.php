<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercicio - Teste</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-size: 14px;
            margin-bottom: 5px;
            color: #555;
        }

        input[type="number"] {
            width: 100%;
            padding: 10px;
            padding-right: 0px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        button {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            background-color: #4CAF50;
            color: white;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
        }

        .buttons {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .result {
            margin-top: 20px;
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Calculadora</h2>
        <form method="POST">
            <label for="numero1">Primeiro número:</label>
            <input type="number" name="numero1" required>

            <label for="numero2">Segundo número:</label>
            <input type="number" name="numero2" required>

            <div class="buttons">
                <button type="submit" name="operacao" value="btn_somar">Soma</button>
                <button type="submit" name="operacao" value="btn_subtrair">Subtrair</button>
                <button type="submit" name="operacao" value="btn_multiplicar">Multiplicar</button>
                <button type="submit" name="operacao" value="btn_dividir">Dividir</button>
            </div>
        </form>

        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $numero1 = $_POST["numero1"];
                $numero2 = $_POST["numero2"];
                $operacao = $_POST['operacao'];

                $resultado = '';
                if ($operacao == "btn_somar") {
                    $resultado = somar($numero1, $numero2);
                } elseif ($operacao == "btn_subtrair") {
                    $resultado = subtrair($numero1, $numero2);
                } elseif ($operacao == "btn_multiplicar") {
                    $resultado = multiplicar($numero1, $numero2);
                } elseif ($operacao == "btn_dividir") {
                    $resultado = dividir($numero1, $numero2);
                }
                echo "<div class='result'>Resultado: $resultado</div>";
            }

            function multiplicar($valor1, $valor2) {
                try {
                    return $valor1 * $valor2;
                } catch (Exception $e) {
                    echo "Exceção lançada:", $e->getMessage();
                    return None;
                }
            }

            function dividir($valor1, $valor2) {
                try {
                    if ($valor2 == 0) {
                        return "Erro: Divisão por zero!";
                    }
                    return $valor1 / $valor2;
                } catch (Exception $e) {
                    echo "Exceção lançada:", $e->getMessage();
                    return None;
                }
            }

            function somar($valor1, $valor2) {
                try {
                    return $valor1 + $valor2;
                } catch (Exception $e) {
                    echo "Exceção lançada:", $e->getMessage();
                    return None;
                }
            }

            function subtrair($valor1, $valor2) {
                try {
                    return $valor1 - $valor2;
                } catch (Exception $e) {
                    echo "Exceção lançada:", $e->getMessage();
                    return None;
                }
            }
        ?>
    </div>
</body>
</html>