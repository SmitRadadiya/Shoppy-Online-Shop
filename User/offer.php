<?php include 'header.php';
include 'connection.php';
ini_set("display_errors","off");
?>
<!DOCTYPE html>
<html lang="en-US" dir="ltr">
  <head>
    <style>
.btn-group button {
  background-color: #c1c1d7; /* Green background */
  border: none; /* Green border */
  color: black; /* White text */
  padding: 10px 24px; /* Some padding */
  cursor: pointer; /* Pointer/hand icon */
  float: left; /* Float the buttons side by side */
}
/* Clear floats (clearfix hack) */
.btn-group:after {
  content: "";
  clear: both;
  display: table;
}

.btn-group button:not(:last-child) {
  border-right: none; /* Prevent double borders */
}

/* Add a background color on hover */
.btn-group button:hover {
  background-color: #e0e0eb;
}
#myDIV {
  display : block;
}
#myDIV1 {
  display : none;
}
#myDIV2 {
  display : none;}

</style>

  </head>
  <body data-spy="scroll" data-target=".onpage-navigation" data-offset="60" style="background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;background-color:#e0e0eb">
    <br>
    <p>Three buttons in a group:</p>
    <?php $str=mysqli_query($conn,"SELECT * from discount where status=1");
          $strf=mysqli_fetch_array($str);
    ?>
    <div class="btn-group" style="width:100%">

      <button style="width:33.3%" onclick="myFunction()"><b>Cashback Offer</b></button>
      <button style="width:33.3%" onclick="myFunction1()"><b>On-Shop Offer</b></button>
      <button style="width:33.3%" onclick="myFunction2()"><b>Department Offer</b></button>

    </div>
    <div id="myDIV">
      <?php
        $cb=mysqli_query($conn,"SELECT * from discount where p_id=1 and status=1");
        while($cbf=mysqli_fetch_array($cb)){
      ?>
        <div class="main showcase-page">
        <div class="container" style="background-color:#e0e0eb;">
        <div class="col-md-6 col-sm-6 col-xs-15">
          <div class="content-box" style="border-radius: 25px; margin-top:10px; margin-bottom:5px;">
          <div class="content-box-image" style="height:;width:; border-radius:10px; background-color:#c1c1d7;background-attachment:fixed;">
          <img src="assets/images/<?php echo $cbf['img']; ?>" alt="" height="200" width="100" align="left" background-size:"cover">
              <div align="left" style="font-size:15; color:#000;margin-top:5px;"><b><?php echo $cbf['code']; ?></b></div>
              <div align="left" style="font-size:15;">*<?php echo $cbf['description']; ?></div>
          </div>
        </div>
        </div>
        </div>
        </div>
        <?php
        }
        ?>
    </div>
      <div id="myDIV1">
        <?php
          $cb=mysqli_query($conn,"SELECT * from discount where sh_id!=0 and status=1");
          while($cbf=mysqli_fetch_array($cb)){
        ?>
          <div class="main showcase-page">
          <div class="container" style="background-color:#e0e0eb;">
          <div class="col-md-6 col-sm-6 col-xs-15">
            <div class="content-box" style="border-radius: 25px; margin-top:10px; margin-bottom:5px;">
            <div class="content-box-image" style="height:;width:; border-radius:10px; background-color:#c1c1d7;background-attachment:fixed;">
            <img src="assets/images/<?php echo $cbf['img']; ?>" alt="" height="200" width="100" align="left">
                <div align="left" style="font-size:15; color:#000;margin-top:5px;"><b><?php echo $cbf['code']; ?></b></div>
                <div align="left" style="font-size:15;">*<?php echo $cbf['description']; ?></div>
            </div>
          </div>
          </div>
          </div>
          </div>
          <?php
          }
          ?>
      </div>
      <div id="myDIV2">
        <?php
          $cb=mysqli_query($conn,"SELECT * from discount where dept_id!=0 and status=1");
          while($cbf=mysqli_fetch_array($cb)){
        ?>
          <div class="main showcase-page">
          <div class="container" style="background-color:#e0e0eb;">
          <div class="col-md-6 col-sm-6 col-xs-15">
            <div class="content-box" style="border-radius: 25px; margin-top:10px; margin-bottom:5px;">
            <div class="content-box-image" style="height:;width:; border-radius:10px; background-color:#c1c1d7;background-attachment:fixed;">
            <img src="assets/images/<?php echo $cbf['img']; ?>" alt="" height="200" width="100" align="left">
                <div align="left" style="font-size:15; color:#000;margin-top:5px;"><b><?php echo $cbf['code']; ?></b></div>
                <div align="left" style="font-size:15;">*<?php echo $cbf['description']; ?></div>
            </div>
          </div>
          </div>
          </div>
          </div>
          <?php
          }
          ?>
      </div>

    </main>
    <script>
function myFunction() {
  var x = document.getElementById("myDIV");
  var x1 = document.getElementById("myDIV1");
  var x2 = document.getElementById("myDIV2");
  if (x.style.display === "none") {
    x.style.display = "block";
    x1.style.display = "none";
    x2.style.display = "none";
  } else {
    x.style.display = "block";
    x1.style.display = "none";
    x2.style.display = "none";  }
}

function myFunction1() {
  var x = document.getElementById("myDIV");
  var x1 = document.getElementById("myDIV1");
  var x2 = document.getElementById("myDIV2");
  if (x1.style.display === "none") {
    x.style.display = "none";
    x1.style.display = "block";
    x2.style.display = "none";

  } else {
    x.style.display = "none";
    x1.style.display = "block";
    x2.style.display = "none";
  }
}

function myFunction2() {
  var x = document.getElementById("myDIV");
  var x1 = document.getElementById("myDIV1");
  var x2 = document.getElementById("myDIV2");
  if (x2.style.display === "none") {
    x.style.display = "none";
    x1.style.display = "none";
    x2.style.display = "block";

  } else {
    x.style.display = "none";
    x1.style.display = "none";
    x2.style.display = "block";  }
}
</script>

</body>
</html>
