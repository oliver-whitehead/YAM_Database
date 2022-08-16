<?php
if (isset($_POST['submit'])) {
  try {
    require "../config.php";

    $connection = new PDO($dsn, $username, $password, $options);

    $sql = "SELECT *
    FROM Item
    WHERE Donor_Donor_ID = :Donor_Donor_ID";

    $Donor_Donor_ID = $_POST['Donor_Donor_ID'];

    $statement = $connection->prepare($sql);
    $statement->bindParam(':Donor_Donor_ID', $Donor_Donor_ID, PDO::PARAM_STR);
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
        <h2>Results</h2>

        <table>
          <thead>
    <tr>
        <th>#</th>
        <th>Item ID</th>
        <th>Description</th>
        <th>Date Received</th>
        <th>Item Condition</th>
        <th>Catalogue ID</th>
        <th>Donor ID</th>
        <th>Assessor ID</th>
        <th>Collection Box ID</th>
        <th>Location ID</th>
    </tr>
          </thead>
          <tbody>
      <?php foreach ($result as $row) { ?>
          <tr>
    <td></td>
    <td><?php echo ($row["Item_ID"]); ?></td>
    <td><?php echo ($row["Description"]); ?></td>
    <td><?php echo ($row["Date_received"]); ?></td>   
    <td><?php echo ($row["Item_Condition"]); ?></td>
    <td><?php echo ($row["Catalogue_Catalogue_ID"]); ?></td>
    <td><?php echo ($row["Donor_Donor_ID"]); ?></td>
    <td><?php echo ($row["Assessor_Assessor_ID"]); ?></td>
    <td><?php echo ($row["Collection_box_Collection_box_ID"]); ?></td>
    <td><?php echo ($row["Location_Location_ID"]); ?></td>
          </tr>
        <?php } ?>
          </tbody>
      </table>
      <?php } else { ?>
        > No results found for <?php echo ($_POST['Donor_Donor_ID']); ?>.
      <?php }
    } ?>

    <h2>Find Item by Donor ID</h2>

    <form method="post">
    	<label for="Donor_Donor_ID">Donor ID</label>
    	<input type="text" id="Donor_Donor_ID" name="Donor_Donor_ID">
    	<input type="submit" name="submit" value="View Results">
    </form>
    <br>
    <a href="index.php">Back to home</a>

    <?php include "templates/footer.php"; ?>