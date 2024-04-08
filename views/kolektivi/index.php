<?php require "./views/components/head.php" ?>
<?php require "./views/components/navbar.php" ?>

<h1>CKC kolektīvi</h1>

<table>
  <tr>
    <th>Vārds</th>
    <th>Apraksts</th>
  </tr>
  <tr>
    <?php 
        foreach($KolektiviModel->getKolektivi() as $kolektiv) {
            echo "<tr>";
            echo "<td> <a href='/kolektivi/show?showId=" . $kolektiv["id"] . "'>" . $kolektiv["name"]. "</a></td>";
            echo "<td>" . $kolektiv["description"] . "</td>";
            echo "<td><form method='POST' action='/kolektivi/delete'><button name='deleteId' value='" . $kolektiv["id"] . "'>❌</button></form></td>";
            echo "<td><a href='/kolektivi/edit?editId=" . $kolektiv["id"] . "'><button>✏️</button></a></td>";
            echo "<tr>";
            
        } 
    ?>
</table>

<form method="POST">
    <label>
        Vārds:
        <input type="text" name="name" placeholder="Vārds" required>
    </label>
    <label>
        Apraksts:
        <input type="text" name="description" placeholder="Apraksts" required>
    </label>
    <button>Add a new category</button>
    <?php 
        if (empty($errors) == false) {
            foreach ($errors as $error) {
                echo "<p>" . $error . "</p>";
            } 
        }
    ?>
</form>


<?php require "./views/components/footer.php" ?>


