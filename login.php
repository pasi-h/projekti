<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
<?php include 'primary-navigation.php'; ?>
<div class="row">
            <div class="column side">
            </div>
                 <div class="column middle">

        <form action="login.php" method="get"> 
            Tunnus: <input type="text" name="name"> <br>
            Salasanasdsada: <input type="password" name="password"> <br>
            <br><input type="submit" value="Kirjaudu" name="log">
        </form>

        <?php
            require_once("db.inc");

            if (isset($_GET["log"])) {
                if(count(array_filter($_GET))!=count($_GET)){
                    echo "Täytä kaikki kentät";
                }
                else {
                    $name = $_GET["name"];
                    $password = $_GET["password"];

                    $sql = "SELECT * FROM admin WHERE tunnus = '$name' AND salasana = '$password'";
                    $result = mysqli_query($conn, $sql);
                    if( mysqli_num_rows($result) > 0 ){

                        session_start(); //sessioni 

                        $sql = "SELECT * FROM admin WHERE tunnus = '$name'";
                        $result = mysqli_query($conn, $sql);
                        while ($row = $result->fetch_assoc()) {
                            $id = $row["admin_ID"];
                        }
                        $_SESSION['id'] = $id; // tallennus sessionii 
                        echo $id;
                        header('Location: main.php');
                        exit;
                    }
                    else{
                        echo "Tunnus tai salasana on väärin, syötä uudelleen";
                    }
                }
            }


        ?>
</div>
  <div class="column side">
  </div>
</div>
<?php include 'footer.php'; ?>
    </body>
</html>