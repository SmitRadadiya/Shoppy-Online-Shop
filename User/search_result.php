<?php
include 'header.php';
include 'connection.php';


$sort = "ASC";
            if(isset($_POST['sortbtn']))
            {
              $sort = $_POST["sort"];
            }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <script>
    </script>
  </head>
  <body data-spy="scroll" data-target=".onpage-navigation" data-offset="60" style="background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;background-color:#e0e0eb">
    <br><br><br>
    <form action="#" method="post" align="center">
                  <h4><b><Input type ='Radio' Name ='sort' value='ASC'> Low to High &nbsp;
                  <Input type ='Radio' Name ='sort' value='DESC'> High to Low</b></h4>
                    <input type="submit" class="btn btn-primary" name="sortbtn" style="background-color:black;color:while;border:none;border-radius:8px;" value="Sort">
                  </div>
                </form>

<?php
ini_set("display_errors","off");

if(isset($_GET["product"]))
{
    $pl_id= $_GET["product"];

    //echo $pl_id."<br>";
    $query = mysqli_query($conn,"SELECT * FROM items WHERE pl_id='".$pl_id."' ORDER BY price".$price." ".$sort) or die("dakho1");
  //  echo "SELECT * FROM items WHERE pl_id='".$pl_id."' ORDER BY price".$sort_order;


echo "<br><br><br>";
    while($row=mysqli_fetch_array($query)){


        $shop_id = $row['sh_id'];
        $price = round($row["price"]+($row["price"]*0.1));

        $sql = "SELECT * FROM shop WHERE sh_id=".$shop_id;
        $s=mysqli_query($conn,$sql);

        while($data=mysqli_fetch_array($s))
        {
            echo '<div class="main showcase-page" style="background-color:#e0e0eb;">';

           echo '<a class="content-box" href="item.php?shop='.$shop_id.'">';
           echo '<div class="content-box-image " style="height:70px;border-radius: 10px;background-color:#c1c1d7;margin:10px;margin-top:-20px;margin-bottom:-20px;">';
            echo '<table boder="1">';
            echo '<tr>';
            echo '<h3>';
            echo '<td style="padding-left:10px">'.$data['sh_nm'].'</td>';
            echo '<td />';
            echo '<td rowspan="2" style="padding-left:200px" scope="col">';
            echo '₹'.$price;
            echo '</td>';
            echo '</tr>';
            echo '</table>';
            echo '</div>';
            echo '</div>';
        }


    }
}
?>
</body>
</html>
