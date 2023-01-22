<?php
include 'navigationbar.php';
include 'connection.php';
 ?>
<html>

<style>
.container {
  justify-content: flex-end;
}
</style>
<body data-spy="scroll" data-target=".onpage-navigation" data-offset="60" style="background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;background-color:#e0e0eb;">
  	<main>
         <div class="main showcase-page" style="background-color:#e0e0eb;"><br><br>
           <?php

             $day = date('w');
             $week_start = date('Y-m-d', strtotime('-'.$day.' days'));
             $week_end = date('Y-m-d', strtotime('+'.(7-$day).' days'));

             $str1="select * from balance where dt>='".$week_start."' AND dt<'".$week_end."'";

             $result1=mysqli_query($conn,$str1);

             $total=0;

             while($rows1 = mysqli_fetch_array($result1))
             {
               $total += $rows1['curr_bal'];
             }

             ?>

             <div class="container">
               <div class="row multi-columns-row">
                 <div class="col-md-4 col-sm-6 col-xs-12">
                   <div class="" style="margin-bottom: 0px; margin: 20px ;">
                   <div align="left" margin="10px" height="33.33%">
                     <div class="content-box-image" style="height:200px;background:lightpink;border-radius: 25px;">
                       <h4>
                           <table>
                             <tr>
                               <td><h3 style="color:white">&nbsp;&nbsp;<b> Payable Amount </b></h3></td>
                             </tr>
                             <tr>
                               <td><b><h6 style="color:white">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Total</h6></b></td><td>
                             </tr>
                             <tr>
                               <td><b><h3 style="color:white">&nbsp;&nbsp;<b><?php echo ' ₹'.$total; ?> </b></h3></b></td>
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

             <table style="width:100%" align="center">
               <tr align="center">
                 <td><h4><b>ID</b></h4></td>
                 <td><h4><b>Name</b></h4></td>
                 <td><h4><b>Amount</b></h4></td>
                 <td><h4><b>Payout</b></h4></td>
               </tr>
             </table>


             <?php
            $total=0;
             $shid=mysqli_query($conn,"SELECT * FROM shop");
             while($shidf=mysqli_fetch_array($shid)){
               $str1="select * from balance where dt>='".$week_start."' AND dt<'".$week_end."' AND sh_id=".$shidf['sh_id'];
               $result1=mysqli_query($conn,$str1);
               $weektotal=0;

               while($rows1 = mysqli_fetch_array($result1))
               {
                 $weektotal += $rows1['curr_bal'];
               }

            ?>
            <table style="width:100%;" align="center">
              <tr align="center">
                <td><h4><?php echo $shidf['sh_id']; ?></h4></td>
                <td><h4><?php echo $shidf['sh_nm']; ?></h4></td>
                <td><h4><?php echo '₹'.$weektotal; ?></h4></td>
                <td><h4><input type="button" name="pay" value="Pay" style="background-color:black;color:white;border-radius:8px;border:none;"></h4></td>
              </tr>
            </table>

           <?php }
           $total=0;
           $weektotal=0;
          ?>
]          <td><h5><input type="button" name="payall" value="Pay All" style="width:100%;height:40px;background-color:black;color:white;border-radius:8px;border:none;"></h5></td>
         </div>
       </main>
</bodheight:40px;y>
</html>
