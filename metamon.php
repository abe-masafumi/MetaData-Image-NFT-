<?php
$result = glob('meta/*');
// var_dump($result);
$ary = [];
foreach ($result as $value) {
  // echo json_encode($value);
  $content = json_decode(file_get_contents($value));

   array_push($ary, $content);
}
echo json_encode($ary);
