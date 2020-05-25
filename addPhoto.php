<?php
if($_FILES){
    $uploaddir = 'images/';
    $uploadfile = $uploaddir . basename($_FILES['image']['name']);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
        ?>
        <img src="<?=$uploadfile;?>">
        <?php
    } else {
        echo "<h1>Error</h1>";
    }
}

?> 