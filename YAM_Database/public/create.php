<?php
if (isset($_POST['submit'])) {
  require "../config.php";

  try {
    $connection = new PDO($dsn, $username, $password, $options);
    $connection = new PDO($dsn, $username, $password, $options);

$new_Item = array(
    "Item_ID" => $_POST['Item_ID'],
    "Description"  => $_POST['Description'],
    "Date_received"     => $_POST['Date_received'],
    "Item_Condition"  => $_POST['Item_Condition'],
    "Catalogue_Catalogue_ID"     => $_POST['Catalogue_Catalogue_ID'],
    "Donor_Donor_ID"     => $_POST['Donor_Donor_ID'],
    "Assessor_Assessor_ID"     => $_POST['Assessor_Assessor_ID'],
    "Collection_box_Collection_box_ID"     => $_POST['Collection_box_Collection_box_ID'],
    "Location_Location_ID"     => $_POST['Location_Location_ID'],
);

$sql = sprintf(
    "INSERT INTO %s (%s) values (%s)",
    "Item",
    implode(", ", array_keys($new_Item)),
    ":" . implode(", :", array_keys($new_Item))
);
      
$statement = $connection->prepare($sql);
$statement->execute($new_Item);
    
  } catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }

}
?>

<?php include "templates/header.php"; ?>

<h2>Create a new Item</h2>
<form method="post">
    	<label for="Item_ID">Item ID</label>
    	<input type="text" name="Item_ID" id="Item_ID">
    	<label for="Description">Description</label>
    	<input type="text" name="Description" id="Description">
    	<label for="Date_received">Date Received</label>
    	<input type="text" name="Date_received" id="Date_received">
        <label for="Item_Condition">Item Condition</label>
    	<input type="text" name="Item_Condition" id="Item_Condition">
        <label for="Catalogue_Catalogue_ID">Catalogue ID</label>
    	<input type="text" name="Catalogue_Catalogue_ID" id="Catalogue_Catalogue_ID">
        <label for="Donor_Donor_ID">Donor ID</label>
    	<input type="text" name="Donor_Donor_ID" id="Donor_Donor_ID">
        <label for="Assessor_Assessor_ID">Assessor ID</label>
    	<input type="text" name="Assessor_Assessor_ID" id="Assessor_Assessor_ID">
        <label for="Collection_box_Collection_box_ID">Collection Box ID</label>
    	<input type="text" name="Collection_box_Collection_box_ID" id="Collection_box_Collection_box_ID">
        <label for="Location_Location_ID">Location ID</label>
    	<input type="text" name="Location_Location_ID" id="Location_Location_ID">
        <br>
        <br>
    	<input type="submit" name="submit" value="Submit">
    </form>
    <br>
    <br>
    <a href="index.php">Back to home</a>

<?php include "templates/footer.php"; ?>