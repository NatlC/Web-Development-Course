<?php include ('dbconnect.php'); ?>

<?php
    $sql = "SELECT * FROM Photograph";
    $result = mysqli_query($connect, $sql);
    $rand = rand(1, 10);

    $count = mysqli_num_rows($result) ?: 0;

    if (mysqli_num_rows($result) > 0) {

        while($row = mysqli_fetch_assoc($result)) {
            if ($rand == $row["picture_number"]) {
                $picture_number = $row["picture_number"];
                $subject = $row["subject"];
                $location = $row["location"];
                $picture_url = $row["picture_url"];

                echo "<figure>";
                echo "<img style=\"width: 20rem; height: auto;\" src=$picture_url alt=$subject>";
                echo "<figcaption>Subject: $subject |  Location: $location</figcaption>";
                echo "</figure>";
            }
        }
        } else {
        echo "No results.";
        }
    
    echo "Total number of images currently in the database: $count";

        mysqli_close($connect);
?>