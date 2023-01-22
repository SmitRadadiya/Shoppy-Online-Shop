<?php
include 'connection.php';

  ini_set("display_errors","off");

  $dom = new DOMDocument('1.0','UTF-8');
  $dom->formatOutput = true;

  $root = $dom->createElement('pages');
  $dom->appendChild($root);

$query = mysqli_query($conn,"SELECT * FROM prod_list");
while($row=mysqli_fetch_array($query)){
$name=$row["pl_nm"];
$pl_id=$row["pl_id"];

$url="/Shoppy/search_result.php?product=".$pl_id;
  $link = $dom->createElement('link');
  $root->appendChild($link);

  $link->setAttribute();
  $link->appendChild( $dom->createElement('title', $name) );
  $link->appendChild( $dom->createElement('url', $url) );

}

$query1 = mysqli_query($conn,"SELECT * FROM shop");
while($row1=mysqli_fetch_array($query1)){
$name1=$row1["sh_nm"];
$shop_no = $row1["sh_id"];
$url1="/Shoppy/item.php?shop=".$shop_no;

  $link = $dom->createElement('link');
  $root->appendChild($link);

  $link->setAttribute();
  $link->appendChild( $dom->createElement('title', $name1) );
  $link->appendChild( $dom->createElement('url', $url1) );

}
  echo '<xmp>'. $dom->saveXML() .'</xmp>';
  $dom->save('links.xml') or die('XML Create Error');

  header("Location: index.php")
?>
