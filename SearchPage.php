<?php session_start(); ?>
<?php
  $_SESSION["searchHistory"] = array();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Searching...</title>
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
            $("#contentArea").html(result);
          }
        })

        $("#goButton").click(function(){
          $.ajax({
            url:"getData.php?query=" + $("#searchBar").val(),
            async:true,
            success: function(result){
              $("#contentArea").html(result);
            }
          })
          <?php
            //add searched words to searchHistory session array
            
          ?>
        })
      })
    </script>
</head>
<body>
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
  <!--Need to implement actual products from database as well as the sort by feature-->
  
  <input type="text" name="searchBar" placeholder="Search" id="searchBar">
  <input type="button" value="Go" id="goButton">
  <br /><br />

  <div id="contentArea">&nbsp;</div>

  <br />
  <form action="MyOrder.php" method="post">
  <label> Choose a Product: &nbsp;&nbsp;
  <select name="product" id="productDropDown">
    <?php
      require_once("db.php");
      $sql = "SELECT p_id, p_name from bit4444group24.product order by p_id";
      $result = $mydb->query($sql);
      while($row=mysqli_fetch_array($result)){
        echo "<option value='".$row["p_id"]."'>".$row["p_name"]."</option>";
      }
    ?>
  </select>
  </label>
  <input type="submit" name="addCart" value="Add to Cart">
  </form>
</body>
</html>