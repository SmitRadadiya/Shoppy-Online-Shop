<?php
session_start();
include 'connection.php';

ini_set('display_errors','off')
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Add Item</title>
    <style media="screen">
    th, td {
              width:150px;
              text-align:left;
              padding:5px

          }
    .dat{
            border-collapse:separate;
            border-spacing:0 15px;
        }
    </style>
  </head>
  <body data-spy="scroll" data-target=".onpage-navigation" data-offset="60" style="background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;background-color:#ffddcc">
    <?php include"navigationbar.php" ?><br><br><br><br>
    <span class="login100-form-title p-b-53 fnt">
      <h1 align="center"><b>Remove Item Here</b></h1>
      <h4>
    <form action="rm_update.php" method="POST">
      <table align="center" class="dat">
        <tr>
          <td>&nbsp;&nbsp;Select Item  </td>
          <td><div data-validate = "Item name is required">
          <?php
          $sql=mysqli_query($conn,"SELECT * FROM items where sh_id ='".$_SESSION['id']."'");
           ?>
            <select name="iid" style="border-radius: 10px;background-color:#ffaa80;border:none;">
              <option value=" "></option>
              <?php
              while($sqlf=mysqli_fetch_array($sql)){
              $rows=mysqli_query($conn,"SELECT * from prod_list where pl_id='".$sqlf['pl_id']."'");
              while($rowsf=mysqli_fetch_array($rows)){
                echo '<option value="';
                echo $sqlf['i_id'];
                echo '">';
                echo $rowsf['pl_nm'];
                echo " - ";
                echo $rowsf['descr'];
                echo '</option>';
              }
            }
              ?>
            </select>
          </div>
          </td>
          <td></td>
        </tr>
      </table><br>
      <div align="center">
        <input type="submit" name="edit" value="Remove" style="border-radius: 8px;background-color:black;border:none;color:white;">
      </div>
      </form>
      </h4>
      </span>
  </body>
</html>
