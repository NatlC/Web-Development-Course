<?php include ('dbconnect.php'); ?>

<?php
    $sql = "SELECT * FROM Photograph ORDER BY date_taken DESC";
    $result = mysqli_query($connect, $sql);

    if (mysqli_num_rows($result) > 0) {

        while($row = mysqli_fetch_assoc($result)) {
            $picture_number = $row["picture_number"];
            $subject = $row["subject"];
            $location = $row["location"];
            $date_taken = $row["date_taken"];
            $picture_url = $row["picture_url"];

            echo "<h2 style=\"color: blue\">$picture_number. |  Subject: $subject | Location: $location | Date taken: $date_taken  | Picture URL: $picture_url</h2>";
        }
        } else {
        echo "No results.";
        }
    
        mysqli_close($connect);
?>