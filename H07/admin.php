<?php
session_start();

require_once('config.php');

if(!isset($_SESSION['userID'])) {
    header('Location: Loginrol.php');
exit();
}

$stmt = $conn->prepare("SELECT * FROM loginrol WHERE userID = ?");
$stmt-> execute(array( $_SESSION['userID']));
$user =$stmt-> fetch(PDO::FETCH_ASSOC);
var_dump($user);
if ($user['rol'] !== 'Admin') {
    header('Location: Loginrol.php');
    exit();
}
?>
<title>Title</title>
</head>
<body>
<h1></h1>


<p><a href="Loginrol.php">Uitloggen </p>
</body>
</html>
