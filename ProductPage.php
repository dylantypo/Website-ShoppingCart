<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
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
    <script>
      $(function(){
        $.ajax({
          url:"getData.php?query=" + $("#searchBar").val(),
          async:true,
          success: function(result){
              console.log(result);
            $("#contentArea").html(result);
          }
        })

        /* $(".img").click(function(event){
            console.log("here");
            console.log(event.target.nodeName);
        }) */


        $("#goButton").click(function(event){
          $.ajax({
            url:"getData.php?query=" + $("#searchBar").val(),
            async:true,
            success: function(result){
              $("#contentArea").html(result);
            }
          })
        })

      })
    </script>
</head>
<body>
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
        <li role="presentation"><a href="#">About Us</a></li>
        <li role="presentation"><a href="#">Logout</a></li>
        <li role="presentation"><a href="HomePage.php">Home</a></li>
      </ul>
    </span>
    
    </div>
    <!--products search bar-->
    <input type="text" name="searchBar" placeholder="Search" id="searchBar">
    <a href="SearchPage.php"><input type="button" value="Go" id="goButton"></a>
    <form action="" method="get">
        <div>
          <div id="contentArea">&nbsp;</div>
          <span>
          <p>Item Quantity:</p>
          <input type="number" name="itemQuantity" placeholder="##" min="0" max="10">
          <p>Item Size:</p>
          <select name="itemSize" id="itemSize">
              <option value="Small">Small</option>
              <option value="Medium">Medium</option>
              <option value="Large">Large</option>
          </select>
          <br>
          <input type="submit" value="Add To Cart">
          </span>
        </div>
    </form>
</body>
</html>