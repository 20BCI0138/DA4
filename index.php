<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Assignment 4</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <?php
        $con = mysqli_connect("localhost", "shaunak", "mysqlPassword", "IWP");
        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = 'CREATE OR REPLACE TABLE student (
            name VARCHAR(30),
            regNo VARCHAR(10),
            course VARCHAR(30),
            courseCodeode VARCHAR(10),
            internal FLOAT,
            comment VARCHAR(100)
        );';
        if (mysqli_query($con, $sql)) {
            echo "<script>console.log('Table created successfully with no errors');</script>";
        } else {
            echo "Error creating table: " . mysqli_error($con);
        }
    ?>
    <div class="nav">
        <div class="menu" id="menu">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="firstQuery.php">firstQuery</a></li>
                <li><a href="secondQuery.php">secondQuery</a></li>
                <li><a href="thirdQuery.php">thirdQuery</a></li>
            </ul>
        </div>
        <div class="bar">
            <a class="fa fa-bars" id="bars" onclick="responsive()" style="cursor: pointer;"></a>
        </div>
    </div>
    <h1>Student Details Submission</h1>
    <center>
        <form method="post">
            <p><label>Name: </label>
                <input type="text" name="name">
            </p>
            <p><label>RegNo: </label>
                <input type="text" name="regno">
            </p>
            <p><label>Course: </label>
                <input type="text" name="course">
            </p>
            <p><label>Cource Code: </label>
                <input type="text" name="courseCode">
            </p>
            <p><label>Cat1 Marks: </label>
                <input type="text" name="cat1">
            </p>
            <p><label>Cat2 Marks: </label>
                <input type="text" name="cat2">
            </p>
            <p><label>DA1 Marks: </label>
                <input type="text" name="da1">
            </p>
            <p><label>DA2 Marks: </label>
                <input type="text" name="da2">
            </p>
            <p><label>Quiz Marks: </label>
                <input type="text" name="quiz">
            </p>
            <br>
            <input type="submit" name="submit">
        </form>
    </center>
    <?php
        $name = $regno = $course = $courseCode = "";
        $cat1 = $cat2 = $da1 = $da2 = $quiz = 0;
        if (isset($_POST["submit"])) {
            $name = $_POST["name"];
            $regno = $_POST["regno"];
            $course = $_POST["course"];
            $courseCode = $_POST["coursec"];
            $cat1 = $_POST["cat1"];
            $cat2 = $_POST["cat2"];
            $da1 = $_POST["da1"];
            $da2 = $_POST["da2"];
            $quiz = $_POST["quiz"];
            $con = mysqli_connect("localhost", "shaunak", "mysqlPassword", "IWP");
            if ($con === false) {
                die("ERROR: Could not connect. " . mysqli_connect_error());
            }
            if (($cat1 < 0 or $cat1 > 50) or ($cat2 < 0 or $cat2 > 50)) {
                echo '<script>alert("Invalid data entry on marks")</script';
            } else {
                $internal = round((($cat1 * 15) / 50) + (($cat2 * 15) / 50) + $da2 + $da1 + $quiz);
                $sql = "INSERT INTO student VALUES ('$name','$regno','$course','$courseCode','$internal','')";
                if (mysqli_query($con, $sql)) {
                    echo '<script>alert("Database updated successfully")</script>';
                } else {
                    echo '<script>alert("ERROR: "' . mysqli_error($con) . '")' . '</script>';
                }
                mysqli_close($con);
            }
        }
    ?>
    <script src="script.js"></script>
</body>

</html>
</body>

</html>