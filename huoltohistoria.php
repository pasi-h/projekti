<?php
session_start(); // sessioni ylös

if (isset($_SESSION['id'])) {// tarkistetaan id 
    $id = $_SESSION['id'];
    require_once("db.inc");
    $sql = "SELECT * FROM admin WHERE admin_ID = '$id'";
    $result = mysqli_query($conn, $sql);
    while ($row = $result->fetch_assoc()) {
        $name = $row["tunnus"];
    }
?>
<html>
    <head>
        <title>Edit</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
    <?php include 'primary-navigation.php'; ?>

        <div class="row">
            <div class="column side">
            </div>
                 <div class="column middle">
        <p>HUOLTOHISTORIA</p>

<a href="huoltohistoria-hae.php">Hae laitteen huoltohistoria</a>
<a href="huoltohistoria-lisää.php">Lisää uusi huolto</a>
      

        
        </div>
  <div class="column side">
  </div>
</div>
<?php include 'footer.php'; ?>
    </body>
</html>
<?php
    } else { // heittää ulos jos ideetä ei ole sessionissa
        header('Location: login.php');
        exit;
?>  
<?php
    }

    ?>
