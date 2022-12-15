<!DOCTYPE html>

<html>
    <head>
        <title>lab08b</title>
    </head>

    <style>
        th {
            font-family: Arial;
            color: white;
            border: 2px solid blue;
            font-size: 32px;
        }

        tr {
            background-image: url("lab08b.jpg");
        }
    </style>
    <body>
        <div>
            <?php
                $int1 = $_POST['int1'];
                $int2 = $_POST['int2'];
                $output = "";
                echo "<table>";
                if (($int1 >= 3 and $int1 <= 12) and ($int2 >= 3 and $int2 <= 12)) {
                    for ($i = 1; $i <= $int1; $i++) {
                            echo "</tr>";
                            echo "<tr>";
                        for ($j = $i; $j <= $int2 * $i; $j+=$i) {
                            echo "<th>$j</th>";
                        }
                    }
                echo "</table>";
                } else {
                    echo "Integers 1 and 2 are not between 3 and 12 (inclusive).";
                    echo "<br>";
                    echo "<button onclick=\"self.close()\">Go back</button>";   
                }
            ?>
        </div>
    </body>
</html>