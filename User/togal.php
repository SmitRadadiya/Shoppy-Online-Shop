<?php

$query=mysqli_connect("localhost","root","","abc");

?>
<!DOCTYPE html PUBLIC “-//W3C//DTD XHTML 1.0 Transitional//EN" “http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11″>
<title>iPhone Style Radio and Checkbox Switches, found on DevGrow.com</title>
<script type="text/javascript"src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js">
</script>
<script type="text/javascript">
$(document).ready(function(){
$(‘#myonoffswitch’).click(function(){
var myonoffswitch=$(‘#myonoffswitch’).val();
if ($(“#myonoffswitch:checked").length == 0)
{
var a=myonoffswitch;
}
else
{
var a="off";
}

$.ajax({
type: “POST",
url: “ajax.php",
data: “value="+a ,
success: function(html){
$(“#display").html(html).show();
}
});

});
});
</script>

<script type="text/javascript">
$(document).ready( function(){
$(“.cb-enable").click(function(){
var parent = $(this).parents(‘.switch’);
$(‘.cb-disable’,parent).removeClass(‘selected’);
$(this).addClass(‘selected’);
$(‘.checkbox’,parent).attr(‘checked’, true);
});
$(“.cb-disable").click(function(){
var parent = $(this).parents(‘.switch’);
$(‘.cb-enable’,parent).removeClass(‘selected’);
$(this).addClass(‘selected’);
$(‘.checkbox’,parent).attr(‘checked’, false);
});
});
</script>

<style type="text/css">
.onoffswitch {
position: relative; width: 90px;
-webkit-user-select:none; -moz-user-select:none; -ms-user-select: none;
}
.onoffswitch-checkbox {
display: none;
}
.onoffswitch-label {
display: block; overflow: hidden; cursor: pointer;
border: 2px solid #999999; border-radius: 20px;
}
.onoffswitch-inner {
width: 200%; margin-left: -100%;
-moz-transition: margin 0.3s ease-in 0s; -webkit-transition: margin 0.3s ease-in 0s;
-o-transition: margin 0.3s ease-in 0s; transition: margin 0.3s ease-in 0s;
}
.onoffswitch-inner:before, .onoffswitch-inner:after {
float: left; width: 50%; height: 30px; padding: 0; line-height: 30px;
font-size: 14px; color: white; font-family: Trebuchet, Arial, sans-serif; font-weight: bold;
-moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box;
}
.onoffswitch-inner:before {
content: “OFF"
padding-left: 10px;
background-color: #2FCCFF; color: #FFFFFF;
}
.onoffswitch-inner:after {
content: “ON"
padding-right: 10px;
background-color: #EEEEEE; color: #999999;
text-align: right;
}
.onoffswitch-switch {
width: 18px; margin: 6px;
background: #FFFFFF;
border: 2px solid #999999; border-radius: 20px;
position: absolute; top: 0; bottom: 0; right: 56px;
-moz-transition: all 0.3s ease-in 0s; -webkit-transition: all 0.3s ease-in 0s;
-o-transition: all 0.3s ease-in 0s; transition: all 0.3s ease-in 0s;
}
.onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-inner {
margin-left: 10;
}
.onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-switch {
right: 10px;
}
</style>

</head>
<body>
<div class="onoffswitch">
<input type="radio" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch"
<?php
ini_set("display_errors","off");
$query3=mysqli_query("select * from abc where id = '1'");
$query4=mysqli_fetch_array($query3);
if($query4['choice']=="off")
{
echo "checked";
}
?>>
<label class="onoffswitch-label" for="myonoffswitch">
<div class="onoffswitch-inner"></div>
<div class="onoffswitchswitch">
</div>
</label>
</div>

<div id="display"></div>
</body>
</html>
