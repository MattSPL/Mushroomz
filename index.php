<?php

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

$sql = "SELECT * FROM mushrooms";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Atlas Grzybów</title>
    
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
                <input type="search" id="searchbox" placeholder="Szukam..."></input>
                <button id="searchbutton">Szukaj</button>
            </li>
            
            
            <li class="nav-item">
            <a href="logout.php"><button class="navbarbutton hidden" id="logoutbutton" >Wyloguj</button></a>
                <a href="login.php"><button class="navbarbutton" id="loginbutton" >Zaloguj</button></a>
                <a href="add.php"><button class="navbarbutton" id="addbutton" >Dodaj</button></a>
            </li>
            
        </ul>
    </nav>

    
<div id="filter-panel">
    <ul>
<li>
<p id="filtertextTitle" class="filtertext">Filtruj:</p>
</li>
<li>
 <p id="filtertextCat" class="filtertext">Kategoria:</p>
                    <ul id="categoryList" class="filterlist" >
                        <li>
                            <input type="checkbox" name="Workowce" id="Workowce">
                            <label for="Workowce">Workowce</label>
                        </li>
                        <li>
                            <input type="checkbox" name="Pdstawczaki" id="Podstawczaki">
                            <label for="Podstawczaki">Podstawczaki</label>
                        </li>
                        <li>
                            <input type="checkbox" name="Chromisty" id="Chromisty">
                            <label for="Chromisty">Chromisty</label>
                        </li>
                        <li>
                            <input type="checkbox" name="Skoczkowce" id="Skoczkowce">
                            <label for="Skoczkowce">Skoczkowce</label>
                        </li>
                        <li>
                            <input type="checkbox" name="Kłębiakowe" id="Klebiakowe">
                            <label for="Klebiakowe">Kłębiakowe</label>
                        </li>
                        <li>
                            <input type="checkbox" name="Sprzężniaki" id="Sprzezniaki">
                            <label for="Sprzezniaki">Sprzężniaki</label>
                        </li>
                        <li>
                            <input type="checkbox" name="Inne" id="Inne">
                            <label for="Inne">Inne</label>
                        </li>
                    </ul>
</li>
<li>
<p id="filtertextEdibility" class="filtertext">Jadalność:</p>
                <ul id="EdibilityList" class="filterlist">
                    <li>
                        <input type="checkbox" name="Inedible" id="Inedible">
                        <label for="Inedible">Niejadalny</label>
                    </li>
                    <li>
                        <input type="checkbox" name="Cold" id="Cold">
                        <label for="Cold">Jadalny na zimno</label>
                    </li>
                    <li>
                        <input type="checkbox" name="Hot" id="Hot">
                        <label for="Hot">Jadalny na ciepło</label>
                    </li>    
                </ul>
</li>
    </ul>
                <p id="filterButtons">       
                <input type="submit" value="Filtruj" id="filterButton"></button><button id="filterResetButton">Zresetuj filtr</button>
                </p> 
            </div>

    <main>
        
        <div class="grid-container" id="content">
            

<?php

if ($result->num_rows > 0) {
  // output data of each row
 
  while($row = $result->fetch_assoc()) {
     
?>
<div class="grid-item" id="content-panel">
<a class="content" href="details.html">
                     <div class="content-link">
                         <img src=<?php echo $row["main_photo"]?> alt="" align="left" class="index-page-panel-image" >
                            <h6><?php echo $row['mushroom']?></h6>
                            <h5>Kategoria: <?php echo $row['category_id']?></h5>
                            <h5><?php echo $row['edibility_id']?></h5>
                            <?php echo $row['description']?> 
                    </div></a></div>

<?php

  
} 
}else {
  echo "0 results";
}
$conn->close();

?>
        </div>
        </main>
        <script src="isLogged.js"></script>
   </body>
</html>
