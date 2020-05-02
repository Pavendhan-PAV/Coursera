<?php

require_once "pdo.php";
session_start();
if ( isset($_POST['logout']) ) {
    header('Location: logout.php');
    return;
}

$status = false;
$success = false;

if (!isset($_SESSION['name'])) {
    die("Name parameter missing");
} elseif (isset($_POST['make']) && isset($_POST['year'])
    && isset($_POST['mileage'])) {
    if (!is_numeric($_POST['year']) || !is_numeric($_POST['mileage'])) {
        $_SESSION['status'] = "Mileage and year must be numeric";
        header("Location: add.php");
        return;
    } elseif (strlen($_POST['make']) < 1 ) {
        $_SESSION['status'] = "Make is required";
        header("Location: add.php");
        return;
    } else {
        $stmt = $pdo->prepare('INSERT INTO autos (make, year, mileage) VALUES ( :make, :year, :mileage)');
        $stmt->execute(array(
                ':make' => $_POST['make'],
                ':year' => $_POST['year'],
                ':mileage' => $_POST['mileage'])
        );
        $_SESSION['success'] = 'Record inserted';
    }
}
$stmt = $pdo->query("SELECT make, year, mileage FROM autos");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
<title>PAVENDHAN N</title>
<?php require_once "bootstrap.php"; ?>
</head>
<body>
<div class="container">
    <h1>Tracking Autos for <?php echo $_SESSION['name']; ?></h1>
    <?php
   if ( isset($_SESSION['status']) ) {
  echo('<p style="color: red;">'.htmlentities($_SESSION['status'])."</p>\n");
  unset($_SESSION['status']);
}
    if ( isset($_SESSION['success'])) {
        header('Location: view.php');
        return;
    }
    ?>
    <form method="post">
        <p>Make:
            <input type="text" name="make" size="60"/></p>
        <p>Year:
            <input type="text" name="year"/></p>
        <p>Mileage:
            <input type="text" name="mileage"/></p>
        <input type="submit" value="Add">
        <input type="submit" name="logout" value="Logout">
    </form>

    <h2>Automobiles</h2>
    <ul>

        <?php
        foreach ($rows as $row) {
            echo '<li>';
            echo htmlentities($row['make']) . ' ' . $row['year'] . ' / ' . $row['mileage'];
        };
        echo '</li><br/>';
        ?>
    </ul>
</div>
</body>
</html>
