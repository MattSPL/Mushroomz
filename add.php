<?php 

if(!isset($_COOKIE["isLogged"]))
{
    header("Location: login.php");
}else
{

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Styles.css">
    <title>Dodaj grzyba</title>
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
<div class="background"></div>
    <div class="add-main-section">
        <div id="addpanel">
            <h2 id="addTitle">Dodawanie:</h2>
            
            <form action="addScript.php" method="post">
            <p id="categoryParagraph">
                <label for="catChoice">Kategoria:</label>
                <select name="catChoice" id="catChoice">
                    <option value="1">Workowce</option>
                    <option value="2">Podstawczaki</option>
                    <option value="3">Chromisty</option>
                    <option value="4">Skoczkowce</option>
                    <option value="5">Kłębiakowe</option>
                    <option value="6">Sprzężniaki</option>
                    <option value="7">Inne</option>
                </select>
            </p>
            <div class="edibility-choice">
                <label for="type">Czy jadalny?</label>
                <select name="type" id="type">
                    <option value="1">Trujący</option>
                    <option value="2">Jadalny na ciepło</option>
                    <option value="3">Jadalny na zimno</option>
                </select>
            </div>

            <p id="NameToAddParagraph"> 
                <label for="NameToAdd">Nazwa:</label>
                <input type="text" name="NameToAdd" id="NameToAdd" placeholder="">
            </p>
            <label for="description" id="descLabel">Opis okazu:</label>
            <textarea name="description" id="descriptionAdd" cols="30" rows="10" placeholder="Opis grzyba..."></textarea>
            <input type="submit" class="primaryButton" id=savebutton value="Zapisz">
         </form>
         
         <button class="primaryButton" id="addMainImageBtn">Wybierz główne zdjęcie</button>

        <form enctype="multipart/form-data" action=""  method="post" id="form1">
            
            <input type="file" name="image" class="primaryButton" id="addMainImageBtnForm" alt="" hidden>

            <input type="submit" name="imageDisp1" class="secondaryButton" id="addMainImageBtn2" value="Dodaj zdjęcie" form="form1">
            
            <?php
            if(isset($_POST['imageDisp1']))
                {
                    if($_FILES){
                    $uploaddir = 'images/';
                    $uploadfile = $uploaddir . basename($_FILES['image']['name']);

                    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
                        ?>
                        <img src="<?=$uploadfile;?>"class="main-img-add" alt="Wybierz zdjęcie">
                        <?php
                    } else {
                        echo "<h1>Error</h1>";
                    }
                }
            }

            ?>
           

        </form>    

    <div id="small-images-panel-add" >
        <form enctype="multipart/form-data" action="" method="post" id="form2">
            <div class="imageAddPanel">

                    <input type="file" name="image2" class="primaryButton addImageBtn" value="Wybierz">
                    <input type="submit" name="imageDisp2" class="secondaryButton addImageBtn2" value="Dodaj" form="form2">
                    

                     <?php
                     if(isset($_POST['imageDisp2']))
                     {
                        if($_FILES){
                            $uploaddir = 'images/';
                            $uploadfile = $uploaddir . basename($_FILES['image2']['name']);

                            if (move_uploaded_file($_FILES['image2']['tmp_name'], $uploadfile)) {
                                ?>
                                <img src="<?=$uploadfile;?>" class="img-add">
                                <?php
                            } else {
                                echo "<h1>Error</h1>";
                            }
                        }
}
?> 
                </form>
            </div>
            <div class="imageAddPanel">
                
                <!-- <input name="image" type="file" /> -->
                <button class="primaryButton addImageBtn">Wybierz</button>
                <input type="button" class="secondaryButton addImageBtn2" value="Dodaj">
                <img src="images/image.png" class="img-add" alt="">
            </div>
            <div class="imageAddPanel">
                
                <button class="primaryButton addImageBtn">Wybierz</button>
                <input type="button" class="secondaryButton addImageBtn2" value="Dodaj">
                <img src="images/image.png" class="img-add" alt="">
            </div>
            <div class="imageAddPanel">
                
                <button class="primaryButton addImageBtn">Wybierz</button>
                <input type="button" class="secondaryButton addImageBtn2" value="Dodaj">
                <img src="images/image.png" class="img-add" alt="">
            </div>
         </div>
        
        <!-- <button class="primaryButton" id="savebutton">Zapisz</button> -->
</div>
    
</div>
    </main>
    <script src="isLogged.js"></script>
    <script src="addButtonScript.js"></script>
</body>
</html>

<?php } 
?>