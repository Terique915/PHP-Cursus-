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

if ($user['rol'] !== 'Admin') {
    echo "Je hebt geen toesteming voor deze pagina";
    exit();
}
?>
<title>Title</title>
</head>
<body>
<h1></h1>
<h2>Welcome, <?php echo $_SESSION['userID']; ?></h2>

<p><a href="Loginrol.php">Uitloggen </p>
</body>
</html>
