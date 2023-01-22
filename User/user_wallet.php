<?php
include 'header.php';
include 'connection.php';
 ?>
<html>
<body data-spy="scroll" data-target=".onpage-navigation" data-offset="60" style="background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;background-color:#e0e0eb;">
  	<main>
     <!-- <div class="main showcase-page"> <!-- box mate nu css -->
     <!-- </div> -->
         <div class="main showcase-page" style="background-color:#e0e0eb;"><br><br>
           <?php
           $que = mysqli_query($conn,"SELECT * from customers WHERE c_id='".$_SESSION['id']."'");
           $sql = mysqli_fetch_array($que);

           $cb = mysqli_query($conn,"SELECT * from order_delivery WHERE c_id='".$_SESSION['id']."' AND cashback != 0");
            ?>

             <div class="container">
               <div class="row multi-columns-row">
                 <div class="col-md-4 col-sm-6 col-xs-12">
                   <a class="content-box" style="margin-bottom: 0px; margin: 20px ;">
                   <div align="left" margin="10px" height="33.33%">
                     <div class="content-box-image" style="height:200px;background:#F5663C;border-radius: 25px;">
                       <h4>
                           <table>
                             <tr>
                               <td><h3 style="color:white">&nbsp;&nbsp;<b> YOUR MONEY</b></h3></td>
                             </tr>
                             <tr>
                               <td><b><h6 style="color:white">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Total Balence</h6></b></td><td>
                             </tr>
                             <tr>
                               <td><b><h3 style="color:white">&nbsp;&nbsp; &#8377;<b><?php echo $sql['wallet'] ?> </b></h3></b></td>

                             </tr>
                           </table>

                     </h4>
                     </div>
                   </div>
                 <!-- </a> -->
                 </div>
               </div>
             </div>
             <h3 align="left" style="margin:20px"><b>Transactions :</b></h3>
             <?php
             while($cbf = mysqli_fetch_array($cb)){
               $date = mysqli_query($conn,"SELECT * FROM order_shopkeeper where id='".$cbf['o_id']."'");
               $datef = mysqli_fetch_array($date);
             ?>
             <table style="width:100%" align="center">
               <tr align="center">
                 <td><h4 align="left"> Cashback Received :</td>
                 <td>+ &#8377;<?php echo $cbf['cashback']; ?></td>
                 <hr/>
               </tr>
               <tr>
                 <td><h6 align="left"> <?php echo $datef['order_date']; ?></h6></td>
                 <td><h6 align="left"> Order id : <?php echo $cbf['o_id']; ?></h6></td>
               </tr>
             </table>

           <?php } ?>
         </div>
       </main>
</body>
</html>
