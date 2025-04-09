<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Média</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f4f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        h2 {
            color: #4CAF50;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: bold;
        }

        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ddd;
            box-sizing: border-box;
            font-size: 16px;
        }

        .buttons {
            margin-top: 15px;
        }

        button {
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background-color: #4CAF50;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #45a049;
        }

        .result {
            margin-top: 20px;
            font-size: 18px;
            font-weight: bold;
        }

        .result.aprovado {
            color: #4CAF50;
        }

        .result.recuperacao {
            color: #FF9800;
        }

        .result.reprovado {
            color: #F44336;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Calculadora de Média</h2>
    <form method="POST">
        <label for="numero1">Primeira nota:</label>
        <input type="number" name="numero1" required>

        <label for="numero2">Segunda nota:</label>
        <input type="number" name="numero2" required>

        <label for="numero3">Terceira nota:</label>
        <input type="number" name="numero3" required>

        <div class="buttons">
            <button type="submit" value="btn_somar">Calcular</button>
        </div>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $numero1 = $_POST["numero1"];
            $numero2 = $_POST["numero2"];
            $numero3 = $_POST["numero3"];

            $resultado = calc($numero1, $numero2, $numero3);

            // Exibe o resultado com uma classe baseada na situação
            echo "<div class='result $resultado'>$resultado</div>";
        }

        function calc($valor1, $valor2, $valor3) {
            $media = ($valor1 + $valor2 + $valor3) / 3;
            if ($media >= 7) {
                return "Aprovado, média: $media";
            } elseif ($media >= 5) {
                return "Em recuperação, média: $media";
            } else {
                return "Reprovado, média: $media";
            }
        }
        ?>
    </form>
</div>
</body>
</html>
