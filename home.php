<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <style type="text/css">
            table {
                border-collapse: collapse;
                width: 100%;
                color: #ffffff;
                font-family: "Agency FB";
                font-size: medium;
                text-align: left;
            }
            th{
                background-color: black;
                color: #ffffff;
            }

        </style>

        <title>HOME</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
    <table class="center">
        <h1>Hello <?php echo $_SESSION['name'] ; ?>, Welcome Back!</h1
        <tr>
            <th>id</th>
            <th>user_name</th>
            <th>password</th>
            <th>name</th>
        </tr>
        <?php
        $conn = mysqli_connect("localhost", "root", "", "test_db");
        $sql = "SELECT * FROM `users` WHERE id = 1";
        $result = $conn->query($sql);

        if ($result->num_rows <= 0) {

            echo "No Results";
        } else {
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row['id'] . "</td><td>" . $row['user_name'] . "</td><td>" . $row['password'] . "</td><td>" . $row['name'] . "</td><td>";
            }
        }
        $conn->close();
        ?>
        <a href="logout.php">Logout</a>
        <title>SIGN UP</title>
        <link rel="stylesheet" type="text/css" href="style.css">

    </table>
    </body>
    </html>

    <?php
}else{
    header("Location: index.php");
    exit();
}
?>
