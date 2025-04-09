<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 01 - 09/04</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 400px;
            margin: 50px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 10px;
            color: #555;
            font-weight: bold;
        }

        input[type="number"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 20px;
            font-size: 1em;
        }

        .buttons {
            display: flex;
            justify-content: center;
        }

        button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #007BFF;
            color: #fff;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        .result {
            margin-top: 20px;
            text-align: center;
            font-size: 1.2em;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Calculadora</h2>
        <form method="POST">
            <label for="number">Insira um número:</label>
            <input type="number" name="number" id="number" required>
            <div class="buttons">
                <button type="submit" name="calculate" value="calcular">Realizar verificação</button>
            </div>
        </form>

        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $number = $_POST["number"];

                $result = verify_number($number);

                echo '<div class="result">' . $result . '</div>';
            }

            function verify_number($num) {
                try {
                    if ($num > 0) {
                        return "Valor positivo";
    
                    } elseif ($num < 0) {
                        return "Valor negativo";
    
                    } else {
                        return "Igual a zero";
                    }
                } catch (Exception $e) {
                    echo "Exceção:", $e->getMessage();
                }
            }
        ?>
    </div>
</body>
</html>
