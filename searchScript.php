    <?php
    $query = $_POST['searchbox'];
    echo $query;
    setcookie("searched", $query , time() + 3600);
    header("Location: search.php");
    ?>