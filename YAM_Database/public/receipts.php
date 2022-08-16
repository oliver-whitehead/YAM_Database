<?php
if (isset($_POST['submit'])) {
  require "../config.php";

  try {
    $connection = new PDO($dsn, $username, $password, $options);
    $connection = new PDO($dsn, $username, $password, $options);

$new_receipt = array(
    "Receipt_ID" => $_POST['Receipt_ID'],
    "Donor_Donor_ID"  => $_POST['Donor_Donor_ID'],
    "Item_Item_ID"  => $_POST['Item_Item_ID'],
    "No_Of_Items"  => $_POST['No_Of_Items'],
    "Short_Description"  => $_POST['Short_Description'],
);

$sql = sprintf(
    "INSERT INTO %s (%s) values (%s)",
    "Receipt",
    implode(", ", array_keys($new_receipt)),
    ":" . implode(", :", array_keys($new_receipt))
);
      
$statement = $connection->prepare($sql);
$statement->execute($new_receipt);    
    
  } catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }

}
?>

<?php include "templates/header.php"; ?>

<strong>Create a new Receipt</strong>

<form method="post">
    	<label for="Receipt_ID">Receipt ID</label>
    	<input type="text" name="Receipt_ID" id="Receipt_ID">
    	<label for="Donor_Donor_ID">Donor ID</label>
    	<input type="text" name="Donor_Donor_ID" id="Donor_Donor_ID">
    	<label for="Item_Item_ID">Item ID</label>
    	<input type="text" name="Item_Item_ID" id="Item_Item_ID">
        <label for="No_Of_Items">Number of Items</label>
    	<input type="text" name="No_Of_Items" id="No_Of_Items">
        <label for="Short_Description">Short Item Description</label>
    	<input type="text" name="Short_Description" id="Short_Description">
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
    FROM Receipt
    WHERE Receipt_ID = :Receipt_ID";

    $receipt_ID = $_POST['Receipt_ID'];

    $statement = $connection->prepare($sql);
    $statement->bindParam(':Receipt_ID', $receipt_ID, PDO::PARAM_STR);
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
        <th>Receipt ID</th>
        <th>Donor ID</th>
        <th>Item ID</th>
        <th>Number of Items</th>
        <th>Short Item Description</th>
    </tr>
          </thead>
          <tbody>
      <?php foreach ($result as $row) { ?>
          <tr>
    <td></td>
    <td><?php echo ($row["Receipt_ID"]); ?></td>
    <td><?php echo ($row["Donor_Donor_ID"]); ?></td>
    <td><?php echo ($row["Item_Item_ID"]); ?></td>   
    <td><?php echo ($row["No_Of_Items"]); ?></td>
    <td><?php echo ($row["Short_Description"]); ?></td>
          </tr>
        <?php } ?>
          </tbody>
      </table>
      <?php } else { ?>
        > No results found for <?php echo ($_POST['Receipt_ID']); ?>.
      <?php }
    } ?>
    <br>
    <strong>Find Receipt by Receipt ID</strong>

    <form method="post">
    	<label for="Receipt_ID">Receipt ID</label>
    	<input type="text" id="Receipt_ID" name="Receipt_ID">
    	<input type="submit" name="submit1" value="View Results">
    </form>
    <br>
    <br>
    <a href="index.php">Back to home</a>

<?php include "templates/footer.php"; ?>