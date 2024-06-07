<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .calc {
            width: 400px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);

        }
        .calc input, .calc select {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
        }
        .calc button {
            width: 100%;
            padding: 10px;
            background-color: #AF805C;
            color: white;
            border: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="calc">
        <h2>Calculator</h2>
        <form method="post">
            <input type="number" name="num1" step="any" placeholder="Enter first number" required>
            <input type="number" name="num2" step="any" placeholder="Enter second number">
            <select name="operation" required>
                <option value="add">Addition</option>
                <option value="subtract">Subtraction</option>
                <option value="multiply">Multiplication</option>
                <option value="divide">Division</option>
                <option value="exponent">Exponentiation</option>
                <option value="percentage">Percentage</option>
                <option value="sqrt">Square Root</option>
                <option value="log">Logarithm</option>
            </select>
            <button type="submit" name="calc">Calculate</button>
        </form>
        <?php
        if (isset($_POST['calc'])) {
            $num1 = isset($_POST['num1']) ? (float)$_POST['num1'] : 0;
            $num2 = isset($_POST['num2']) ? (float)$_POST['num2'] : 0;
            $operation = $_POST['operation'];
            $result = '';

            switch ($operation) {
                case 'add':
                    $result = $num1 + $num2;
                    break;
                case 'subtract':
                    $result = $num1 - $num2;
                    break;
                case 'multiply':
                    $result = $num1 * $num2;
                    break;
                case 'divide':
                    if ($num2 != 0) {
                        $result = $num1 / $num2;
                    } else {
                        $result = 'Division by zero error!';
                    }
                    break;
                case 'exponent':
                    $result = pow($num1, $num2);
                    break;
                case 'percentage':
                    $result = ($num1 / 100) * $num2;
                    break;
                case 'sqrt':
                    $result = sqrt($num1);
                    break;
                case 'log':
                    $result = log($num1);
                    break;
                default:
                    $result = 'Invalid operation selected';
            }

            echo "<h3>Result: $result</h3>";
        }
        ?>
    </div>
</body>
</html>
