<?php include ('dbconnect.php'); ?>

<?php
    $sql = "SELECT * FROM Photograph";
    $result = mysqli_query($connect, $sql);
    $bool = 1;

    if (mysqli_num_rows($result) > 0) {

        while($row = mysqli_fetch_assoc($result)) {
            if ($row["location"] == "Ontario") {
                $subject = $row["subject"];
                $location = $row["location"];
                $picture_url = $row["picture_url"];

                $bool = 0;

                echo "<figure>";
                echo "<img style=\"width: 20rem; height: auto;\" src=$picture_url alt=$subject>";
                echo "<figcaption>Subject: $subject |  Location: $location</figcaption>";
                echo "</figure>";
            }
        }
    }

    if ($bool == 1) {
        echo "There are no Ontario photos.";
    }
    
        mysqli_close($connect);
?>