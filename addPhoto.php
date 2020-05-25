<?php
if($_FILES){
    $uploaddir = 'images/';
    $uploadfile = $uploaddir . basename($_FILES['image']['name']);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
        
    } else {
        echo "<h1>Error</h1>";
    }
}

?> 