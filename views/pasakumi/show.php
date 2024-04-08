<?php require "./views/components/head.php" ?>
<?php require "./views/components/navbar.php" ?>
<?php 
    $kolektiv = $KolektiviModel->getOneKolektivi($_GET["showId"]);
?>


<h2><?= $kolektiv["name"] ?></h2>
<p><?= $kolektiv["description"] ?></p>
<form method='POST' action='/kolektivi/delete'><button name='deleteId' value='<?= $kolektiv["id"] ?>'>❌</button></form>
<a href='/kolektivi/edit?editId=<?= $kolektiv["id"] ?>'><button>✏️</button></a>

<?php
    if (empty($errors) == false) {
        foreach ($errors as $error) {
            echo "<p>" . $error . "</p>";
        } 
    }
?>

<?php require "./views/components/footer.php" ?>


