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
        <title>Main</title>
    </head>
    <body>
        <p>PÄÄSIVU</p>

        <form action="main.php" method="get"> 
            <input type="submit" value="Pääsivu" name="main">
        </form>
        
        <form action="main.php" method="get"> 
            <input type="submit" value="Omat tiedot" name="user">
        </form>

        <form action="main.php" method="get"> 
            <input type="submit" value="Laitteiden hallinta" name="edit">
        </form>

        <form action="main.php" method="get"> 
            <input type="submit" value="Varaus" name="rent">
        </form>

        <form action="main.php" method="get"> 
            <input type="submit" value="Kirjaudu ulos" name="logout">
        </form>

        <?php
            require_once("db.inc");

            if (isset($_GET["main"])){ // mainii
                header('Location: main.php');
                exit;
            }

            if (isset($_GET["user"])){ // Omat tiedoit sivulle
                header('Location: user.php');
                exit;
            }

            if (isset($_GET["edit"])){ // laitehallinta sivulle
                header('Location: edit.php');
                exit;
            }

            if (isset($_GET["rent"])){ // varaus sivulle
                header('Location: rent.php');
                exit;
            }

            if (isset($_GET["logout"])){ // loggaa ulos
                session_unset();
                session_destroy(); 
                header('Location: login.php');
                exit;
            }
        ?>

    </body>
</html>
<?php
    } else { // heittää ulos jos ideetä ei ole sessionissa
        header('Location: login.php');
        exit;
?>  
<?php
    }