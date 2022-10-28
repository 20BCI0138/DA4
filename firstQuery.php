<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>firstQuery</title>
    <link rel="stylesheet" href="firstQuery.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
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
    <script src="script.js"></script>
    <?php
        $con = mysqli_connect("localhost", "shaunak", "mysqlPassword", "IWP");
        if ($con === false) {
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }
        $sql = "SELECT DISTINCT name FROM student WHERE internal <25";
        if ($result = mysqli_query($con, $sql)) {
            $rowcount = mysqli_num_rows($result);
            echo "<h2>The Number of students got internal < 25 are : </h2><br><h1>" . $rowcount . "</h1>";
        } else {
            echo '<script>alert("ERROR: connection failed! "' . mysqli_error($con) . '")' . '</script>';
        }
        mysqli_close($con);
    ?>
</body>

</html>