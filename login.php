<?php 

if(isset($_COOKIE["isLogged"]))
{
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Styles.css">
    <title>Zaloguj</title>
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
                <a href="login.php"><button class="navbarbutton" id="loginbutton" >Zaloguj</button></a>
                <a href="add.php"><button class="navbarbutton" id="addbutton" >Dodaj</button></a>
            </li>
            
        </ul>
    </nav>
    <main>
        <div class="add-main-section">
            <div class="background"></div>
            <div id="loginpanel">
                <h2 id="loginTitle">Logowanie:</h2>
                <form action="loginScript.php" method="post">
                <p id="loginPanLogin">
                    <label for="loginField">Login:</label>
                <input type="text" class="loginRegisterTextField" name="loginField" id="loginField">
            </p>
                <p id="loginPanPassword">
                    <label for="passwordFieldLogin">Hasło:</label>
                <input type="password" class="loginRegisterTextField" name="passwordFieldLogin" id="passwordFieldLogin">
                </p>
                <input type="submit" class="primaryButton" id="loginButtonLogin" value="Zaloguj"> 
            </form>
                <a href="register.php">
                    <button class="secondaryButton" id="registerButtonLogin" href="register.html">Zarejestruj</button>
                </a>
            
            </div>
        </div>
        
    </div>
        
</div>
    </main>
</body>
</html>