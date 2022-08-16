<?php
if (isset($_POST['submit'])) {
  try {
    require "../config.php";

    $connection = new PDO($dsn, $username, $password, $options);

    $sql = "SELECT *
    FROM Item";

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
        > No results found for <?php echo ($_POST['Donor_ID']); ?>.
      <?php }
} ?>

<head>
<style>
    button,input {
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
    
    button:hover,input:hover {
        background-color: #696969;
    }
</style>
</head>
<br>
<form method="post">
    <input type="submit" name="submit" value="View all Items">
</form>
<button onclick="window.location.href='readByID.php';"> Find Item by Item ID </button>
<button onclick="window.location.href='readByDonorID.php';"> Find Item by Donor ID </button>
<br>
<br>
<a href="index.php">Back to home</a>

<?php include "templates/footer.php"; ?>