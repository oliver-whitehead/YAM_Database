<?php include "templates/header.php"; ?>

<head>
<style>
    button {
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
    
    button:hover {
        background-color: #696969;
    }
</style>
</head>


<button onclick="window.location.href='create.php';"> Add a new Item </button>
<button onclick="window.location.href='read.php';"> Find an Item </button> 
<button onclick="window.location.href='donors.php';"> Donors </button> 
<button onclick="window.location.href='receipts.php';"> Receipts </button>  
<button onclick="window.location.href='reports.php';"> Reports </button>
<br>
<br>

<?php
echo "The current server timezone is: " . date('m/d/Y h:i:s a', time());;
?>

<?php include "templates/footer.php"; ?>