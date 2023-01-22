<?php
session_start();
ini_set('display_errors','off');
include 'connection.php';

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
      <h1 align="center"><b>Add Item Here</b></h1>
      <h4>
      <form action="add_insert.php" method="POST">
      <table align="center" class="dat">
        <tr>
          <td>&nbsp;&nbsp;Select Item  </td>
          <td><div data-validate = "Item name is required">
          <?php
          $sql=mysqli_query($conn,"SELECT dept_id FROM shop where sh_id ='".$_SESSION['id']."'");
          $sqlf=mysqli_fetch_array($sql);
          $str=mysqli_query($conn,"SELECT p_id from product where dept_id='".$sqlf['dept_id']."'");
           ?>
            <select name="plid" style="border-radius: 10px;background-color:#ffaa80;border:none;">
              <option value=" "></option>
              <?php
              while($strf=mysqli_fetch_array($str)){
                $rows=mysqli_query($conn,"SELECT * from prod_list where p_id='".$strf['p_id']."'");
                while($rowsf=mysqli_fetch_array($rows)){
                echo '<option value="';
                echo $rowsf['pl_id'];
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
        <tr>
          <td>&nbsp;&nbsp;Price  </td>
          <th><div data-validate = "price is required">
            <input type="text" name="Price" style="border-radius: 10px;background-color:#ffa880;border:none;" value= "  0">
          </div></th>
        </tr>
      </table><br>
      <div align="center">
        <input type="submit" name="add" value="Add" style="border-radius: 8px;background-color:black;border:none;color:white;">
      </div>
      </form>
      </h4>
      </span>
  </body>
</html>
