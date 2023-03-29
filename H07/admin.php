<?php
session_start();
$servername = "localhost";
$username = "id20296794_phpschool";
$password = "f@egLCkL11[E=KXi";
$dbname = "id20296794_schoolphp";

try {
    $conn = new PDO("mysql:host=$servername; port=3308; dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

if(isset($_SESSION['user'])){
    if($_SESSION['rol'] == 0){
        echo "welcome Admin";
    }
    else{
        echo "you Do not have the right credentials";
    }
}



if (isset($_POST["loguit"])) {
    $_SESSION = array();
    session_destroy();
}




?>
<title>Title</title>
</head>
<body>
<h1></h1>


<p><a href="Loginrol.php">Uitloggen </p>
</body>
</html>
