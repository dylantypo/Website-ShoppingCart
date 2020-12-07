<?php 
    $query = "";
    if(isset($_GET['query'])) $query=$_GET['query'];

    require_once("db.php");

    if($query == "") {
        $sql = "select * from bit4444group24.product;";

        $result = $mydb -> query($sql);

        echo "<div class='container-fluid'>";
        echo "<div class='row'>";
        
        while($row = mysqli_fetch_array($result)) {
            echo "<div class='col-xs-12 col-sm-6 col-md-3'>";
            echo "<img src='images/".$row["p_img_file_name"]."' class='img' width='175' height='175'>";
            echo "<h4>".$row["p_name"]."</h4>";
            echo "<h6>$".$row["p_price"]."</h6>";
            echo "</div>";  
        }
        echo "</div>";
        echo "</div>";
    } else {
        $sql = "select * from bit4444group24.product where p_name rlike '$query' or p_description rlike '$query' or p_id rlike '$query';";

        $result = $mydb -> query($sql);

        if(mysqli_num_rows($result) < 5) {
            echo "<div class='container-fluid'>";
            echo "<div class='row'>";
            while($row = mysqli_fetch_array($result)) {
                echo "<div class='col-xs-12 col-sm-6 col-md-6'>";
                echo "<img src='images/".$row["p_img_file_name"]."' class='img' width='300' height='350'>";
                echo "<h4>".$row["p_name"]."</h4>";
                echo "<h6>$".$row["p_price"]."</h6>";
                echo "<h6>".$row["p_description"]."</h6>";
                echo "<h6>".$row["unit_weight"]."oz.</h6>";
                echo "</div>";
            }
            echo "</div>";
            echo "</div>";
        } else {
            echo "<div class='container-fluid'>";
            echo "<div class='row'>";
            while($row = mysqli_fetch_array($result)) {
                echo "<div class='col-xs-12 col-sm-6 col-md-3'>";
                echo "<img src='images/".$row["p_img_file_name"]."' class='img' width='175' height='175'>";
                echo "<h4>".$row["p_name"]."</h4>";
                echo "<h6>$".$row["p_price"]."</h6>";
                echo "</div>";  
            }
            echo "</div>";
            echo "</div>";
        }
    };
?>