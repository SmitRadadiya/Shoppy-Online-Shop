<?php
session_start();
$shid=$_SESSION['id'];
if(!isset($_SESSION['email'])){
echo '<script type="text/javascript">';
echo 'alert("Please Login first")';
echo '</script>';
header("refresh: 0.05; url = login.php");
}

?>

<?php
include 'connection.php';
include 'navigationbar.php';
ini_set('display_errors','off');

?>
<html lang="en-US" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style media="screen">
    .td{
      margin-bottom: 0px;
      margin-left: : 15px;
    }
    table {
      width: 100%;
    }
    td, th {
      text-align: left;
      padding-left: 8px;
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
    <div class="main showcase-page" style="background-color:#ffddcc;"><br><br>
      <h3><b>&nbsp;&nbsp;&nbsp;&nbsp;Schedule Order :</b></h3>
      <section class="module-medium" id="demos">
        <?php
        $dt = date("Y-m-d");
        $sql=mysqli_query($conn,"SELECT * from schedule WHERE sh_id=$shid");
        while($sqlf=mysqli_fetch_array($sql)){
          $pl=mysqli_query($conn,"SELECT * FROM order_shopkeeper WHERE id=".$sqlf['o_id']);
          $plf=mysqli_fetch_array($pl);
          $pnm=mysqli_query($conn,"SELECT * FROM prod_list WHERE pl_id=".$plf['pl_id']);
          $pnmf=mysqli_fetch_array($pnm);
          ?>
        <div class="container">
          <div class="row multi-columns-row">
            <div class="col-md-4 col-sm-6 col-xs-12">
              <b class="" style="margin-bottom: 0px; margin: 5px 0;" href="">
              <div align="left" margin="10px" height="33.33%" spacing="10px">
                <div class="content-box-image" style="height:370px;border-radius: 25px;background-color:#ffaa80;">
                  <h3>
                      <table>
                        <tr>
                          <td><h4 style="margin-left:20px;color:#595959;">Order ID:</h4></td><td>
                        <?php
                          echo $sqlf['o_id'];
                        ?></td></tr>
                        <tr>
                          <td><h4 style="margin-left:20px;color:#595959;">Start Date:</h4></td><td>
                        <?php
                          echo $sqlf['s_date'];
                        ?></td></tr>
                        <tr>
                          <td><h4 style="margin-left:20px;color:#595959;">End Date:</h4></td><td>
                        <?php
                          echo $sqlf['e_date'];
                        ?></td></tr>
                        <tr>
                          <td><h4 style="margin-left:20px;color:#595959;">Today Date:</h4></td><td>
                        <?php
                          echo $dt;
                        ?></td></tr>
                        <tr>
                          <td><h4 style="margin-left:20px;color:#595959;">Item:</h4></td><td>
                        <?php
                          echo $pnmf['pl_nm'];
                        ?></td>
                        </tr>
                        <tr>
                          <td><h4 style="margin-left:20px;color:#595959;">Quantity:</h4></td><td>
                        <?php
                          echo $plf['quantity'];
                        ?></td>
                        </tr>
                          <tr>
                            <td><h4 style="margin-left:20px;color:#595959;">OTP :</h4></td>
                            <td><h4><?php
                              echo $plf['s_otp'];
                            ?></h4></td>
                          </tr>

                        </table>

                </h3>
                <form action="sche_check.php?o_id=<?php echo $sqlf['o_id']; ?>" method="post">
                    <h4 align="center"><input type="submit" value="Order prepared" align="center" style="border-radius: 8px;background-color:black;color:white;border:none;"></h4></h3>
                  </form>
              </div>

              </div>

            </div>
          </div>
        </div>
      <?php } ?>
      </section>

    </div>
  </main>
</body>
</html>
