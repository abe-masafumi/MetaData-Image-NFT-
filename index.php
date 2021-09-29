<?php
require_once('functions.php');

$title = $_POST['title'];
$discription = $_POST['discription'];
// $account = $_POST['account'];
$plice = $_POST['plice'];

var_dump($title);
var_dump($discription);
// var_dump($account);
var_dump($plice);

// ------画像アップロード--------
// var_dump($_FILES['file']['name']); //画像名
$up_image = $_FILES['file']['name']; //画像名

var_dump($up_image);
// //アップロード処理 imgフォルダの読み書き権限を確認すること！
$upload = "image/";
if (move_uploaded_file($_FILES['file']['tmp_name'], $new_file = $upload . $up_image)) {
  echo 'アップロード成功';
  // exit();
} else {
  echo 'アップロード失敗';
  // exit();
}

$uniqid = uniqid('id_', true);

// var_dump($upload);
// SQL作成&実行
$sql = "INSERT INTO metaTable(meta_id, plice, title, discription, image, uniqid) VALUES(NULL,:plice,:title, :discription, :image, :uniqid)";
$stmt = $pdo->prepare($sql);
// 変数をバインド変数(:todo)に格納!!
$stmt->bindValue(':plice', $plice, PDO::PARAM_INT);
$stmt->bindValue(':title', $title, PDO::PARAM_STR);
$stmt->bindValue(':discription', $discription, PDO::PARAM_STR);
$stmt->bindValue(':image', $up_image, PDO::PARAM_STR);
$stmt->bindValue(':uniqid', $uniqid, PDO::PARAM_STR);

$status = $stmt->execute(); // SQLを実行
header("Access-Control-Allow-Origin: *");

$somecontent = (object) array(
  "plice" => "$plice",
  "title" => "$title",
  "discription" => "$discription",
  "image" => "$upload$up_image",
);

$est = json_encode($somecontent);

$fp = fopen("meta/$uniqid.json", "c");
$img = fwrite($fp, $est);
fclose($fp);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  kkk
  <form action="" method="post"><input type="text"></form>
</body>

</html>