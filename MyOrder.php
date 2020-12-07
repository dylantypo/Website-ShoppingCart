<?php session_start(); ?>
<?php
    //initializing varibles that make up the shopping cart
    $p_id = 0;
    $size = "";
    $qty = 0;
    $found = false;
    $i = 0;

    if(isset($_POST["product"])) $p_id=$_POST["product"];
    //echo $p_id;
    if(!isset($_SESSION["cart"]) || count($_SESSION["cart"])<1) {
        $_SESSION["cart"] = array(1=>array("p_id"=>$p_id, "size"=>"Medium", "qty"=>1));
    } else {
        //foreach loop to find products in array
        foreach($_SESSION["cart"] as $val) {
            $i++;
            for($x=1; $x<count($_SESSION["cart"]); $x++) { //while(list($k,$v) = each($val)) <= commented this out because 'each' is deprecated
                if(key($_SESSION["cart"]) == "p_id" && current($_SESSION["cart"]) == $p_id) {
                    //checking if item already exists in the cart array
                    array_splice($_SESSION["cart"], $i-1, 1, array(array("p_id"=>$p_id, "size"=>$val['size'], "qty"=>$val['qty']+1)));
                    $found = true;
                }
            }
        }
        if($found == false) {
            array_push($_SESSION["cart"], array("p_id"=>$p_id, "size"=>"Medium", "qty"=>1));
        }
    }

    //empty cart
    if(isset($_GET['cmd']) && $_GET['cmd'] == "emptycart") {
        unset($_SESSION["cart"]);
    }

    //creating cart output
    $cartOutput = "";
    if(!isset($_SESSION["cart"]) || count($_SESSION["cart"])<1) {
        $cartOutput = "<h2 align='center'>Your cart is empty.</h2>";
    } else {
        $i = 0;
        
        foreach($_SESSION["cart"] as $val) {
            $i++;
            $cartOutput = "<h4>Item $i</h4>";
            while(list($key, $value) = each($val)) {
                $cartOutput = "$key:$value<br />";
            }
            /* for($x=1; $x<count($_SESSION["cart"]); $x++) {
                $cartOutput = key($_SESSION["cart"][$x][$x]).": ".current($_SESSION["cart"][$x][$x])."<br />";
            } */
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Order</title>
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
    <?php
        require_once("db.php"); 
    ?>
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
            <li role="presentation"><a href="#">Logout</a></li>
            <li role="presentation"><a href="HomePage.php">Home</a></li>
        </ul>
    </span>
    </div> <!-- end navbar-->
    <!--products search page button-->
    <br>
    <a href="SearchPage.php"><button>Search by Product Name and Description</button></a>
    <br />
    <form action="checkOut.php" method="post">
        <?php echo $cartOutput; ?>
    </form>
    <br /><br />
    <a href="MyOrder.php?cmd=emptycart">Click to Empty Cart</a>
</body>
</html>