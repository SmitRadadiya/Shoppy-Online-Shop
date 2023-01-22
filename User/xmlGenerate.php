

<?php
include 'connection.php';
?>

<?php

$myfile = fopen("links.xml", "w") or die("Unable to open file!");
$txt = "<?xml version='1.0' encoding='UTF-8'?>\n<pages>\n";
fwrite($myfile, $txt);

$shop_data = mysqli_query($conn,"select sh_id,sh_nm from shop where status=1");

while($rows=mysqli_fetch_array($shop_data)){

$txt = "<link>\n<title>".$rows[1]."</title>\n<url>item.php?shop=".$rows[0]."</url>\n</link>\n";
fwrite($myfile, $txt);
}

$product_data = mysqli_query($conn,"SELECT prod_list.pl_nm, prod_list.pl_id, items.stock, items.sh_id FROM prod_list INNER JOIN items ON prod_list.pl_id = items.pl_id WHERE items.stock>=1");


while($rows=mysqli_fetch_array($product_data)){

$shop_items = mysqli_query($conn,"select status from shop where sh_id=".$rows[3]);
$get_items=mysqli_fetch_row($shop_items);
if($get_items[0]==1){
  $txt = "<link>\n<title>".$rows[0]."</title>\n<url>search_result.php?product=".$rows[1]."</url>\n</link>\n";
  fwrite($myfile, $txt);
  }
}

$txt = "\n</pages>";
fwrite($myfile, $txt);

// 
// $raw_xml =  file_get_contents("links.xml");
// $xml = simplexml_load_string($raw_xml);
// $items = json_decode(json_encode($xml), true);
// $items = $items['link'];
// $new_items = array();
// foreach($items as $value) {
//     if(!isset($new_items[$value['title']])) {
//         $new_items[$value['title']] = $value;
//     }
// }
//
// $new_items = array_values($new_items);
//
// fwrite($myfile, $new_items);

?>
