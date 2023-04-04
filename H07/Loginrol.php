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




try {
    $conn = new PDO("mysql:host=$servername; port=3308; dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();

}
if (isset($_POST['knop'])) {
    $rol = "Admin";
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role ="User";


        $query = "SELECT * FROM loginrol WHERE email = '$email' AND password = '$password' AND rol = '$rol' ";
        $statement = $conn->prepare($query);
        $statement->execute(array($email,$password,$rol));
        $count = $statement->rowCount();
        $user = $statement-> fetch();

        if ($count > 0) {
         $_SESSION['user'] = $user['email'];
         $_SESSION['rol'] = $user['rol'];
            header("location:admin.php");
        }
        else if($count < 1){
            $_SESSION['user'] = $user['email'];
            $_SESSION['role'] = $user['role'];
            header("location:admin.php");
        }







}
?>

    <title>Title</title>
</head>
<body>
<h1></h1>
<form action="<?php echo  $_SERVER['PHP_SELF'];?>" method="post">
    <input type="text" name= "email" id="email" value="">
    <input type= "password" name="password" id="password" value="">
    <input type="submit" name="knop" id ="knop" value="login">
</form>

<p><a href="Loginrol.php?loguit">Uitloggen </p>
</body>
</html>