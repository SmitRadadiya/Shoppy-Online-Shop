<?php
include 'navigationbar.php';
include 'connection.php';
 ?>
<html>
<body data-spy="scroll" data-target=".onpage-navigation" data-offset="60" style="background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;background-color:#e0e0eb;">
  	<main>
         <div class="main showcase-page" style="background-color:#e0e0eb;"><br><br>
           <?php
           $day = date('w');
           $week_start = date('Y-m-d', strtotime('-'.$day.' days'));
           $week_end = date('Y-m-d', strtotime('+'.(7-$day).' days'));

           $profit = 0;


           $delid=mysqli_query($conn,"SELECT * from delivery");
           $oidf=mysqli_fetch_array($oid);

           while($delidf=mysqli_fetch_array($delid)){
                $oid=mysqli_query($conn,"SELECT * FROM del_hist where d_id=".$delidf['d_id']." AND o_status='complete'");
                while($oidf=mysqli_fetch_array($oid)){

                $que=mysqli_query($conn,"SELECT * from order_shopkeeper where id=".$oidf['o_id']);


                $bal=0;
                while($quef=mysqli_fetch_array($que)){

                  $str=mysqli_query($conn,"SELECT * from items where pl_id=".$quef['pl_id']." AND sh_id=".$quef['sh_id']);
                  while($strf=mysqli_fetch_array($str))
                  {
                    $bal+=$quef['quantity']*$strf['price'];
                  }
                }
                $delchrg=($bal*0.1)/2;
                $profit+=$delchrg;
              }}

            ?>
             <div class="container">
               <div class="row multi-columns-row">
                 <div class="col-md-4 col-sm-6 col-xs-12">
                   <div class="" style="margin-bottom: 0px; margin: 20px ;">
                   <div align="left" margin="10px" height="33.33%">
                     <div class="content-box-image" style="height:200px;background:skyblue;border-radius: 25px;">
                       <h4>
                           <table>
                             <tr>
                               <td><h3 style="color:white">&nbsp;&nbsp;<b> Payable Amount</b></h3></td>
                             </tr>
                             <tr>
                               <td><b><h6 style="color:white">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Total </h6></b></td><td>
                             </tr>
                             <tr>
                               <td><b><h3 style="color:white">&nbsp;&nbsp; &#8377;<b><?php echo $profit; ?> </b></h3></b></td>

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
                 <td style="border: 1px solid black;"><b>Delivery ID</b></td>
                 <td style="border: 1px solid black;"><b>Name </b></td>
                 <td style="border: 1px solid black;"><b>Commission </b></td>
               </tr>
             <?php
             $profit = 0;

             $delid=mysqli_query($conn,"SELECT * from delivery");
             $oidf=mysqli_fetch_array($oid);

             while($delidf=mysqli_fetch_array($delid)){
                  $oid=mysqli_query($conn,"SELECT * FROM del_hist where d_id=".$delidf['d_id']." AND o_status='complete'");
                  while($oidf=mysqli_fetch_array($oid)){

                  $que=mysqli_query($conn,"SELECT * from order_shopkeeper where id=".$oidf['o_id']);


                  $bal=0;
                  while($quef=mysqli_fetch_array($que)){

                    $str=mysqli_query($conn,"SELECT * from items where pl_id=".$quef['pl_id']." AND sh_id=".$quef['sh_id']);
                    while($strf=mysqli_fetch_array($str))
                    {
                      $bal+=$quef['quantity']*$strf['price'];
                    }
                  }
                  $delchrg=($bal*0.1)/2;

             ?>
              <tr align="center" style="border: 1px solid black;">
                 <td style="border: 1px solid black;"> <?php echo $delidf['d_id'] ?></td>
                 <td style="border: 1px solid black;"><?php echo $delidf['d_nm']; ?></td>
                 <td style="border: 1px solid black;"><?php echo ' ₹'.$delchrg; ?></td>
              </tr>


           <?php }}
         ?></table>
         </div>
       </main>
</body>
</html>
