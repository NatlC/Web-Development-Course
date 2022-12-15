<!DOCTYPE html>

<html>
    <head>
        <title>lab08</title>

        <style>
            * {
                margin: 0;
            }

            div {
                background-size: cover;
            }

            h1 {
                color: black;
            }

            h2 {
                padding-top: 26rem;
                padding-bottom: 26rem;
                color: white; 
                text-align: center;
                font-size: 64px;
            }

            h3 {
                background-color: white;
                z-index: 2;
                padding-right: 10px;
                padding-left: 5px;
            }

            aside {
                position: fixed;
                left: 89%;
                top: 97.5%;
            }

            section {
                position: absolute;
                left: 94%;
            }

            h4 {
                color: white;
                position: fixed;
                top: 1%;
                left: 82.5%;
            }

            form {
                margin-top: 0.25%;
                margin-left: 1%;
            }

            p {
                margin-left: 1%;
            }
        </style>
    </head>
    <body>
        <aside>
            <?php
                setCookie('visits', $visit);
                $visit = $_COOKIE['visits'];
                $visit += 1;
                // echo "Your visit counter: ". $visit;
                echo "<h3>Your visit counter: $visit</h3>";
                setCookie('visits', $visit);
            ?>
        </aside>

        <section>
            <?php
                $image_file = htmlspecialchars($_GET["image"]);
                if (htmlspecialchars($_GET["image"])) {
                    echo "<img src=$image_file style=\"position: fixed; opacity: 0.5;\">";
                    echo "<h4>Halloween image is $image_file</h4>";
                }
            ?>
        </section>

            <?php
                $greeting = "";
                $background = "";
                if (date("H") >= 0 and date("H") < 12) {
                    $greeting = "Good Morning";
                    $background = "morning.jpg";
                } elseif (date("H") >= 12 and date("H") < 18) {
                    $greeting = "Good Afternoon";
                    $background = "afternoon.jpg";
                } elseif (date("H") >= 18 and date("H") < 21) {
                    $greeting = "Good Evening";
                    $background = "evening.jpg";
                } else {
                    $greeting = "Good Night";
                    $background = "night.jpg";
                }

                echo "<div style=\"background: url($background) no-repeat center fixed;\">";
                echo "<h2>$greeting</h2>";
                echo "</div>";
            ?>   
        <form action="lab08b.php" target="_blank" method="post"> 
            Input two integers: 
            <input name="int1" type="text">
            <input name="int2" type="text"> 
            <input type="submit">
        </form>

        <p>For problem 4: you have image_file jacks.gif, broom.gif and mail.gif</p>
        <p> ex. https://www.cs.ryerson.ca/~n12chan/lab08/lab08.php?image=jacks.gif</p>
    </body>
</html>