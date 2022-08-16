
<?php
if (isset($_POST['submit'])) {
  try {
    require "../config.php";

    $connection = new PDO($dsn, $username, $password, $options);

    $sql = "SELECT *
    FROM Donor";

    $statement = $connection->prepare($sql);
    $statement->execute();

    $result = $statement->fetchAll();
      
  } catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }
}
?>

<?php include "templates/header.php"; ?>

<?php
    if (isset($_POST['submit'])) {
      if ($result && $statement->rowCount() > 0) { ?>
        <h2>Donor Report Results</h2>

        <table>
          <thead>
    <tr>
        <th>#</th>
        <th>Donor ID</th>
        <th>Firstname</th>
        <th>Surname</th>

    </tr>
          </thead>
          <tbody>
      <?php foreach ($result as $row) { ?>
          <tr>
    <td></td>
    <td><?php echo ($row["Donor_ID"]); ?></td>
    <td><?php echo ($row["Firstname"]); ?></td>
    <td><?php echo ($row["Surname"]); ?></td>
          </tr>
        <?php } ?>
          </tbody>
      </table>
      <?php } else { ?>
        > No results found for <?php echo ($_POST['Donor_ID']); ?>.
      <?php }
} ?>

<head>
<style>
    input {
        background-color: #808080;
        color: white;
        padding: 10px 15px;
        text-align: center;
        text-decoration: none;
        font-size: 16px;
        cursor: pointer;
        width: 250px;
        display: block;
    }
    
    input:hover {
        background-color: #696969;
    }
</style>
</head>
<br>
<form method="post">
    <input type="submit" name="submit" value="Donor Report">
</form>
<br>
<br>

<a href="index.php">Back to home</a>

<?php include "templates/footer.php"; ?>