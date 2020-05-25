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
    <title>Zarejestruj</title>
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
    <main>
        <div class="add-main-section">
            <div class="background"></div>
            <div id="registerpanel">
                <h2 id="loginTitle">Rejestracja:</h2>
        <form action="registerScript.php" method="post">
                <p id="registerPanLogin" class="registerParagraph">
                    <label for="loginField">Login:</label>
                <input class="loginRegisterTextField" type="text" name="loginField" id="loginFieldRegister">
            </p>
            <p id="registerPanEmail" class="registerParagraph">
                    <label for="emailField">E-mail:</label>
                <input class="loginRegisterTextField" type="email" name="emailField" id="emailField" placeholder="nazwa@domena.pl">
                </p>
                <p id="registerPanPassword" class="registerParagraph">
                    <label for="passwordField">Hasło:</label>
                <input class="loginRegisterTextField" type="password" name="passwordField" id="passwordFieldRegister" placeholder="min. 8 znaków">
                </p>
                
                <p id="registerPanRepeatPassword" class="registerParagraph">
                    <label for="repeatPasswordField">Powtórz hasło:</label>
                <input class="loginRegisterTextField" type="password" name="repeatPasswordField" id="repeatPasswordFieldRegister">
                </p>
                <p id="registerPanCode" class="registerParagraph">
                    <label for="codeField" id="codeGenLabel">Przepisz kod:</label>
                <input class="loginRegisterTextField" type="text" name="codeField" id="codeField">
                <input type="hidden" name="codeGen" id="codeGen" value="">
            </p>
                <input type="submit" class="primaryButton" id="registerButtonRegister" value="Zarejestruj">
            </div>
        </form>
        </div>
        
    </div>
        
</div>
    </main>
    <script src="isLogged.js"></script>
    <script src="codeGen.js"></script>
    <script src="fieldChecker.js"></script>
</body>
</html>