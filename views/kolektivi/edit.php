<?php require "./views/components/head.php" ?>
<?php require "./views/components/navbar.php" ?>
<?php 
    $kolektiv = $KolektiviModel->getOneKolektivi($_GET["editId"]);
?>
<div>
    <form method='POST'>
        <input type='text' name='name' value='<?= $kolektiv["name"]?> '></input>
        <input type='text' name='description' value='<?= $kolektiv["description"]?> '></input>
        <input type='number' name='editId' value='<?= intval($_GET["editId"])?>' hidden></input>
        <button>✅</button>
    </form>  
    <form method='POST' action='/kolektivi/delete'><button name='deleteId' value='<?=$kolektiv["id"] ?>'>❌</button></form>
</div>

<?php
    if (empty($errors) == false) {
        foreach ($errors as $error) {
            echo "<p>" . $error . "</p>";
        } 
    }
?>

<?php require "./views/components/footer.php" ?>


