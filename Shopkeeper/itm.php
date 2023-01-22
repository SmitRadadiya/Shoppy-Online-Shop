<?php
session_start();
ini_set('display_errors','off');
include 'connection.php';

if(!isset($_SESSION['email'])){
  echo '<script type="text/javascript">';
  echo 'alert("Please Login first")';
  echo '</script>';
  header("refresh: 0.05; url = login.php");
}

?>
<?php
$res=$_GET['plid'];
if(isset($_POST['checkbox'])) {
	$str="UPDATE items SET stock='1' WHERE sh_id ='".$_SESSION['id']."' AND i_id=$res";
	$result=mysqli_query($conn,$str);

	} else {

$str="UPDATE items SET stock='0' WHERE sh_id ='".$_SESSION['id']."' AND i_id=$res";
$result=mysqli_query($conn,$str);
}

?>
<html lang="en-US" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shoppy</title>
    <?php include 'navigationbar.php'; ?>
    <style>
    .switch {
        position: relative;
        display: inline-block;
        width: 70px;
        height: 34px;
      }
      .switch input {
        opacity: 0;
        width: 0;
        height: 0;
      }
      .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: red;
        -webkit-transition: .4s;
        transition: .4s;
      }
      .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
      }
      input:checked + .slider {
        background-color: green;
      }
      input:checked + .slider:before {
        -webkit-transform: translateX(36px);
        -ms-transform: translateX(36px);
        transform: translateX(36px);
      }
      .slider.round {
        border-radius: 34px;
      }
      .slider.round:before {
        border-radius: 50%;
      }
      table {
        border-collapse: collapse;
        width: 100%;
      }
      th {
        color: #fff;
        background-color: #666;
      }
      th, td {
        text-align: center;
        padding: 8px;
      }
      tr:nth-child(even) {
        background-color: #f2f2f2;
      }
      tr{
        line-height: 14px;
      }
      </style>
  </head>
  <body data-spy="scroll" data-target=".onpage-navigation" data-offset="60" style="background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;background-color:#ffddcc">
    <main>
      <div class="page-loader">
        <div class="loader">Loading...</div>
      </div>
      <div class="main showcase-page" style="background-color:#ffa880;">

      <br><br>
      <table>
        <tr>
          <td><b><h4><a href="add_item.php"><input type="button" name="add" style="border-radius: 8px;background-color:black;border:none;color:white" value="Add Item"></a></h4></b></td>
          <td><b><h4><a href="edit_itm.php"><input type="button" name="edit" style="border-radius: 8px;background-color:black;border:none;color:white;" value="Edit Item"></a></h4></b></td>
          <td><b><h4><a href="del_itm.php"><input type="button" name="del" style="border-radius: 8px;background-color:black;border:none;color:white;" value="Remove Item"></a></h4></b></td>
        </tr>
        <tr>
          <th>Product </th>
          <th>Description </th>
          <th>Add/Sub Items </th>
        </tr>
        <?php
            $count=1;
            $que=mysqli_query($conn,"SELECT * from items where sh_id='".$_SESSION['id']."'");
            while($sql=mysqli_fetch_array($que)){
            $str=mysqli_query($conn,"SELECT * from prod_list where pl_id='".$sql['pl_id']."'");
            while($rows=mysqli_fetch_array($str))
            {
              echo '<div class="main showcase-page">';
              echo '<div class="col-md-6 col-sm-6 col-xs-6">';
        ?>
        <tr>
          <td><img src="assets/images/<?php echo $rows['pl_img']; ?>" alt=" product" style="width:150px; height:150px;"></td>
          <td><b style="font-size:20px;">Stock: <?php echo $sql['stock'];?></b>
            <br><br><br>
            <?php
                  echo $rows['pl_nm']."<br><br>";
                  echo '₹'.$sql['price']."&nbsp&nbsp&nbsp&nbsp".$rows['descr'];
            ?>
          </td>
          <td>
            <form method="POST" action="itm.php?plid=<?php echo $sql['i_id'];?>">
              <?php
              $checked=not;
              if($sql['stock']>=1){
                $checked=checked;
              }
              ?>
              <label class="switch">
                <input type="checkbox" name='checkbox' onChange='submit();' <?php echo $checked; ?>>
                <span class="slider round"></span>
              </label>
            </form>


            <form method="POST" action="addStock.php">
            <input type="number" name="count" value="" style="width:80px;height: 30px;background-color:#ffddcc;border-radius:8px;border:none;" required><br><br>
            <input type="hidden" name="pl_id" value="<?php echo $sql['pl_id']?>" >
            <input type="hidden" name="cstock" value="<?php echo $sql['stock'];?>">
            <h4><input type="submit" name="add" style="background-color:black;color:white;border-radius:8px;border:none;" value="Add">
            <input type="submit" name="sub" style="background-color:black;color: white;border-radius:8px;border:none;" value="Sub" ></h4>
          </form>

          </td>
        </tr>
      <?php
        $count++;
      }}
      ?>
</div>
</div>

      </table>
    </div>
    </main>
  </body>
</html>
