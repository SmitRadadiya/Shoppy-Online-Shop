<?php
include 'navigationbar.php';
include 'connection.php';
 ?>
<html>

<body data-spy="scroll" data-target=".onpage-navigation" data-offset="60" style="background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;background-color:#e0e0eb;">
  	<main>
    <div class="main showcase-page" style="background-color:#e0e0eb;margin-top:50px; ">
<?php
  $tot_rev = 0;

  $oid=mysqli_query($conn,"SELECT * FROM order_delivery ");
  while($oidf=mysqli_fetch_array($oid)){

       // $que=mysqli_query($conn,"SELECT * from order_shopkeeper where id=".$oidf['o_id']);
       //
       // $bal=0;
       // while($quef=mysqli_fetch_array($que)){
       //
       //   $str=mysqli_query($conn,"SELECT * from items where pl_id=".$quef['pl_id']." AND sh_id=".$quef['sh_id']);
       //   while($strf=mysqli_fetch_array($str))
       //   {
       //     $bal+=$quef['quantity']*$strf['price'];
       //   }
       // }
       // $delchrg=($bal*0.1)/2;
       // $profit=$oidf['eff_price']-$bal-$delchrg;
       // $tot_profit +=  $profit;

       $rev = $oidf['eff_price'];
       $tot_rev += $rev;
     }
       ?>

               <div class="row multi-columns-row">
                 <div class="col-md-4 col-sm-6 col-xs-12">
                   <div class="" style="margin-bottom: 0px; margin: 20px ;">
                   <div align="left" margin="10px" height="33.33%">
                     <div class="content-box-image" style="height:200px;margin: 15px;background:gray;border-radius: 25px;">
                       <h4>
                           <table>
                             <tr>
                               <td><h3 style="color:white">&nbsp;&nbsp;<b> REVENUE   </b></h3></td>
                             </tr>
                             <tr>
                               <td><b><h6 style="color:white">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Total Balence</h6></b></td><td>
                             </tr>
                             <tr>
                               <td><b><h3 style="color:white">&nbsp;&nbsp; &#8377;<b><?php echo $tot_rev; ?> </b></h3></b></td>

                             </tr>
                           </table>

                     </h4>
                     </div>
                   </div>
                 </div>
                 </div>
               </div>
             </div>
             <h3 align="left" style="margin:20px"><b>Transactions :</b></h3>
             <table style="width:100%;margin:10px;" align="center">
               <tr align="center" style="border: 1px solid black;">
                 <td style="border: 1px solid black;"><b>Order Id<b></td>
                 <td style="border: 1px solid black;"><b>Price</td>
                 <td style="border: 1px solid black;"><b>Pay Method<b></td>
                 <td style="border: 1px solid black;"><b>Date<b></td>
                 <td style="border: 1px solid black;"><b>Cashback</b></td>
               </tr>
             <?php
             $oid=mysqli_query($conn,"SELECT * FROM order_delivery ");
             while($oidf=mysqli_fetch_array($oid)){
              ?>
              <?php
              // $count=1;
                  $que=mysqli_query($conn,"SELECT * from order_shopkeeper where id=".$oidf['o_id']);
                  $quef=mysqli_fetch_array($que);
                  ?>

               <tr align="center" style="border: 1px solid black;">
                 <td style="border: 1px solid black;"><?php echo $oidf['o_id'] ?></td>
                 <td style="border: 1px solid black;"><?php echo $oidf['eff_price'] ?></td>
                 <td style="border: 1px solid black;"><?php echo $oidf['pay_method'] ?></td>
                 <td style="border: 1px solid black;"><?php echo $quef['order_date'] ?></td>
                 <td style="border: 1px solid black;"><b><?php echo $oidf['cashback'] ?></b></td>
               </tr>




           <?php } ?>
           </table>
         </div>
       </main>
</body>
</html>
