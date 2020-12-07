<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search History Page</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <style>
      .head {
        background-color: black;
        height: 60px;
        width: 100%;
        margin-left: 0px;
        margin-right: 0px;
        margin-top: 40px;
      }  
      .head p {
        float: left;
        color: #FA4094;
        font-size: 26pt;
        font-family: "Calibri";
        font-weight: bolder;
        margin-left: 10px;
      }
      body {
        background-color: #6ccff6;
        text-align: center;
      }
      .links {
        float: right;
        margin-right: 25px;
        margin-top: 10px;
        display: inline;
      }
      .links a {
        margin-right: 5px;
        color: #6ccff6;
      }
      .links ul a:hover {
        background-color: #FA4094;
      }
      
    </style>
</head>
<body>
    <!--Designing the nav here-->
    <!--Designing the nav here-->
    <div class="head">
    <p>The Clothing Store</p>
    <span class="links">
      <ul class="nav nav-pills">
      <li role="presentation"><a href="#">My Profile</a></li>
        <li role="presentation"><a href="MyOrder.php">My Order</a></li>
        <li role="presentation"><a href="#">Customer Reviews</a></li>
        <li role="presentation"><a href="#">Review a Product</a></li>
        <li role="presentation"><a href="SearchHistory.php">History</a></li>
        <li role="presentation"><a href="#">Logout</a></li>
        <li role="presentation"><a href="HomePage.php">Home</a></li>
      </ul>
    </span>
    </div>
    <!--products search bar-->
    <br>
    <a href="SearchPage.php"><button>Search by Product Name and Description</button></a>
    <br>
    
</body>
</html>