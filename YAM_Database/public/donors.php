<?php
if (isset($_POST['submit'])) {
  require "../config.php";

  try {
    $connection = new PDO($dsn, $username, $password, $options);
    $connection = new PDO($dsn, $username, $password, $options);

$new_donor = array(
    "Donor_ID" => $_POST['Donor_ID'],
    "Firstname"  => $_POST['Firstname'],
    "Surname"  => $_POST['Surname'],
);

$sql = sprintf(
    "INSERT INTO %s (%s) values (%s)",
    "Donor",
    implode(", ", array_keys($new_donor)),
    ":" . implode(", :", array_keys($new_donor))
);
      
$statement = $connection->prepare($sql);
$statement->execute($new_donor);    
    
  } catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }

}
?>

<?php include "templates/header.php"; ?>

<strong>Create a new Donor</strong>

<form method="post">
    	<label for="Donor_ID">Donor ID</label>
    	<input type="text" name="Donor_ID" id="Donor_ID">
    	<label for="Firstname">Firstname</label>
    	<input type="text" name="Firstname" id="Firstname">
    	<label for="Surname">Surname</label>
    	<input type="text" name="Surname" id="Surname">
        <br>
        <br>
    	<input type="submit" name="submit" value="Submit">
    </form>
    <br>

<?php
if (isset($_POST['submit1'])) {
  try {
    require "../config.php";

    $connection = new PDO($dsn, $username, $password, $options);

    $sql = "SELECT *
    FROM Donor
    WHERE Donor_ID = :Donor_ID";

    $Donor_ID = $_POST['Donor_ID'];

    $statement = $connection->prepare($sql);
    $statement->bindParam(':Donor_ID', $Donor_ID, PDO::PARAM_STR);
    $statement->execute();

    $result = $statement->fetchAll();
      
  } catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }
}
?>


    <?php
    if (isset($_POST['submit1'])) {
      if ($result && $statement->rowCount() > 0) { ?>
        <h2>Results</h2>

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
    <br>
    <strong>Find Donor by Donor ID</strong>

    <form method="post">
    	<label for="Donor_ID">Donor ID</label>
    	<input type="text" id="Donor_ID" name="Donor_ID">
    	<input type="submit" name="submit1" value="View Results">
    </form>
    <br>
    <br>
    <a href="index.php">Back to home</a>

<?php include "templates/footer.php"; ?>