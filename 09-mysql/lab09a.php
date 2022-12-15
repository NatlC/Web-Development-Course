<?php include ('dbconnect.php'); ?>

<?php
    // creating a table with 5 fields
    $sql = "CREATE TABLE Photograph (
    picture_number    INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    subject   VARCHAR(20) NOT NULL, 
    location  VARCHAR(50) NOT NULL, 
    date_taken  VARCHAR(4) NOT NULL, 
    picture_url VARCHAR(50) NOT NULL); ";

    if (mysqli_query($connect, $sql)) {
        echo "New table created successfully.<br>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connect);
    }
?>

<?php
// Image information is not correct
    $sql = "INSERT INTO Photograph (picture_number, subject, location, date_taken, picture_url)
    VALUES (1, 'Horse', 'Alberta', 2022, 'images/horse.jpg'); ";
    $sql .= "INSERT INTO Photograph (picture_number, subject, location, date_taken, picture_url)
    VALUES (2, 'Monkey', 'British Columbia', 2011, 'images/monkey.jpg'); ";
    $sql .= "INSERT INTO Photograph (picture_number, subject, location, date_taken, picture_url)
    VALUES (3, 'Flower', 'Manitoba', 2015, 'images/flower.jpg'); ";
    $sql .= "INSERT INTO Photograph (picture_number, subject, location, date_taken, picture_url)
    VALUES (4, 'Mammal', 'New Brunswick', 1995, 'images/mammal.jpg'); ";
    $sql .= "INSERT INTO Photograph (picture_number, subject, location, date_taken, picture_url)
    VALUES (5, 'Mountain', 'Newfoundland and Labrador', 2016, 'images/mountain.jpg'); ";
    $sql .= "INSERT INTO Photograph (picture_number, subject, location, date_taken, picture_url)
    VALUES (6, 'Zebra', 'Northwest Territories', 2020, 'images/zebra.jpg'); ";
    $sql .= "INSERT INTO Photograph (picture_number, subject, location, date_taken, picture_url)
    VALUES (7, 'Trees', 'Nova Scotia', 2008, 'images/trees.jpg'); ";
    $sql .= "INSERT INTO Photograph (picture_number, subject, location, date_taken, picture_url)
    VALUES (8, 'Bird', 'Nunavut', 2012, 'images/bird.jpg'); ";
    $sql .= "INSERT INTO Photograph (picture_number, subject, location, date_taken, picture_url)
    VALUES (9, 'Water', 'Yukon', 2009, 'images/water.jpg'); ";
    $sql .= "INSERT INTO Photograph (picture_number, subject, location, date_taken, picture_url)
    VALUES (10, 'Islands', 'Ontario', 2018, 'images/islands.jpg'); ";
    
    if (mysqli_multi_query($connect, $sql)) {
        echo "Multiple Photographs added.<br>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connect);
    }
?>