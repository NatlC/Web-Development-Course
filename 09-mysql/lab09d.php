<?php include ('dbconnect.php'); ?>

<!DOCTYPE html>

<html>
    <head>
        <title>lab09d</title>
    </head>
    <body>
        <form action="/~n12chan/lab09d.php" method="post">
            
            <?php
                echo "Image options: ";
                echo "<select name=\"locations\">";
                    $sql = "SELECT * FROM Photograph";
                    $result = mysqli_query($connect, $sql);

                    if (mysqli_num_rows($result) > 0) {

                    while($row = mysqli_fetch_assoc($result)) {
                        $location = $row["location"];

                        echo "<option value=\"$location\">$location</option>";
                    }
                    } else {
                    echo "No results.";
                    }


                echo "</select> <br>";

                echo "Date options: ";
                echo "<select name=\"dates\">";

                    $sql = "SELECT * FROM Photograph";
                    $result = mysqli_query($connect, $sql);

                    if (mysqli_num_rows($result) > 0) {

                    while($row = mysqli_fetch_assoc($result)) {
                        $date_taken = $row["date_taken"];

                        echo "<option value=$date_taken>$date_taken</option>";
                    }
                    } else {
                    echo "No results.";
                    }
                ?>
            </select> <br>
        
            <input type="submit" value="Submit">
        </form>

        <?php
            $location = $_POST['locations'];
            $date = $_POST['dates'];

            $bool = 1;

            $sql = "SELECT * FROM Photograph";
            $result = mysqli_query($connect, $sql);

            if (mysqli_num_rows($result) > 0) {

                while($row = mysqli_fetch_assoc($result)) {
                    if ($location == $row["location"] and $date == $row["date_taken"]) {
                        $date_taken = $row["date_taken"];
                        $location = $row["location"];
                        $picture_url = $row["picture_url"];

                        $bool = 0;

                        echo "<figure>";
                        echo "<img style=\"width: 20rem; height: auto;\" src=$picture_url alt=$subject>";
                        echo "<figcaption>Subject: $date_taken |  Location: $location</figcaption>";
                        echo "</figure>";
                        
                    }
                }
            }

            if ($bool == 1) {
                echo "Cannot find any photos that match or you did not click submit.";
                echo "<br>";
                echo "Nunavut - 2022 works.";
            }
            
                mysqli_close($connect);
        ?>

    </body>
</html>