<?php
$id = $_GET['ID'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "atlas";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

mysqli_set_charset($conn, 'utf8');

$sql = "SELECT mushrooms.id, mushroom, category, edibility_status, main_photo, photo_1, photo_2, photo_3, photo_4, description FROM `mushrooms` join edibility on mushrooms.edibility_id=edibility.id JOIN categories ON mushrooms.category_id = categories.id where mushrooms.id='$id'";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style></style>
    <title>Szczegóły</title>
    <link rel="stylesheet" href="Styles.css">
    
</head>
<body>
    <nav class="navbar">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="index.php" class="nav-link" id="navtitle">
                    Atlas Grzybiarza
                </a>
            </li>
           
           
            <li class="nav-item" id="searcher">
                <form action="searchScript.php" method="post">
                <input type="search" id="searchbox" name="searchbox" placeholder="Szukam..."></input>
                <input type="submit" id="searchbutton" value="Szukaj">
               
            </form>
            </li>
            <li class="nav-item">
                <a href="logout.php"><button class="navbarbutton" id="logoutbutton" >Wyloguj</button></a>
                <a href="login.php"><button class="navbarbutton" id="loginbutton" >Zaloguj</button></a>
                <a href="add.php"><button class="navbarbutton" id="addbutton" >Dodaj</button></a>
            </li>
            
        </ul>
    </nav>

    <?php

if ($result->num_rows > 0) {
  // output data of each row
 
  while($row = $result->fetch_assoc()) {
?>
<main>
        <div id="main-section">
            <div class="background"></div>
            <div id="gallery">
                <a href=<?php echo $row["main_photo"]?> target="_blank" >
                <img src=<?php echo $row["main_photo"]?> alt="" class="main-img" style="max-width: 70%" >
                </a>
                
                
                
                <?php if($row["photo_1"]!="")
                {
                    ?>
                    <a href="<?php echo $row["photo_2"]?>" target="_blank" >
                    <img src="<?php echo $row["photo_2"]?>" alt="" class="main-img" style="display: none;">
                </a>
                <?php
                }?>
                <?php if($row["photo_2"]!="")
                {
                    ?>
                    <a href="<?php echo $row["photo_2"]?>" target="_blank" >
                    <img src="<?php echo $row["photo_2"]?>" alt="" class="main-img" style="display: none;">
                </a>
                <?php
                }?>
                
                <?php if($row["photo_3"]!="")
                {
                    ?>
                    <a href="<?php echo $row["photo_3"]?>" target="_blank" >
                    <img src="<?php echo $row["photo_3"]?>" alt="" class="main-img" style="display: none;">
                </a>
                <?php
                }?>

                 <?php if($row["photo_4"]!="")
                {
                    ?>
                    <a href="<?php echo $row["photo_4"]?>" target="_blank" >
                    <img src="<?php echo $row["photo_4"]?>" alt="" class="main-img" style="display: none;">
                </a>
                <?php
                }?>
                <div id="gallery-mini-images">
                    <img src="<?php echo $row["main_photo"]?>" alt="" class="mini-image" onclick="currentDiv(1)">

                    <?php if($row["photo_1"]!=""){ ?>
                    <img src="<?php echo $row["photo_1"]?>" alt=""class="mini-image" onclick="currentDiv(2)">
                    <?php } ?>

                    <?php if($row["photo_2"]!=""){ ?>
                    <img src="<?php echo $row["photo_2"]?>" alt=""class="mini-image" onclick="currentDiv(3)">
                    <?php } ?>

                    <?php if($row["photo_3"]!=""){ ?>
                    <img src="<?php echo $row["photo_3"]?>" alt=""class="mini-image" onclick="currentDiv(4)">
                    <?php } ?>

                    <?php if($row["photo_4"]!=""){ ?>
                    <img src="<?php echo $row["photo_4"]?>" alt=""class="mini-image" onclick="currentDiv(5)">
                    <?php } ?>
                    
                    
                </div>
            </div>

            <p id="namePanel" class="cardPanel"><?php echo($row["mushroom"])?></p>
            <p id="categoryPanel" class="cardPanel">Kategoria: <?php echo($row["category"])?></p>
            <p id="edibilityPanel" class="cardPanel"><?php echo($row["edibility_status"])?></p>
            <div id="description" class="cardPanel">
            <?php echo $row["description"]?>
            </div>
            </div>
       
        </main>
<?php

  
} 
}else {
  echo "0 results";
}
$conn->close();

?>

    
        <script src="galleryScript.js"></script>
        <script src="isLogged.js"></script>
   </body>
</html>