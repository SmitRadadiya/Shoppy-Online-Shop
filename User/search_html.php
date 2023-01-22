<html>
<head>
  <style>
  input[type=text] {
    width: 70%;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 20px;
    background-color: #c1c1d7;
    background-image: url('assets/images/search--v2.png');
    background-position: 0px 7px;
    background-repeat: no-repeat;
    padding: 12px 5px 12px 50px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
    margin-left: 3%;
  }

  input[type=text]:focus {
    width: 94%;
  }
  ::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
  color: black;
  opacity: 0.5; /* Firefox */
}
  </style>
<script>


</script>
<script>
function showResult(str) {
  if (str.length==0) {
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("livesearch").innerHTML=this.responseText;
      document.getElementById("livesearch").style.border="0px solid #A5ACB2";

    }
  }
  xmlhttp.open("GET","livesearch.php?q="+str,true);
  xmlhttp.send();
}
</script>
</head>
<body>

<form>
 <!-- <b style="font-size: 20px; margin-left:10px"> Search      </b> -->
 <b style="color:black">
<input type="text" name="search" style="border-radius: 8px;" placeholder="Search" size="30" onkeyup="showResult(this.value)"></b>
<div id="livesearch" style="margin-left: 16%"></div>
</form>

</body>
</html>
