<?php
require_once('functions.php');

// 変数を格納
$uniqueNumber = uniqid();
$title = $_POST['title'];
$plice = $_POST['plice'];
$address = $_POST['address'];
$discription = $_POST['discription'];
$up_image = $_FILES['file']['name'];

$sql = "INSERT INTO metaTable(meta_id, plice, title, discription, image, uniqid, MetaMaskAddress,create_at,update_at) VALUES(NULL,:plice,:title, :discription, :image, :uniqid, :MetaMaskAddress,sysdate(),null)";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':plice', $plice, PDO::PARAM_INT);
$stmt->bindValue(':title', $title, PDO::PARAM_STR);
$stmt->bindValue(':discription', $discription, PDO::PARAM_STR);
$stmt->bindValue(':image', $up_image, PDO::PARAM_STR);
$stmt->bindValue(':uniqid', $uniqueNumber, PDO::PARAM_STR);
$stmt->bindValue(':MetaMaskAddress', $address, PDO::PARAM_STR);
$status = $stmt->execute();

// ------画像アップロード--------
$upload = "image/";
if (move_uploaded_file($_FILES['file']['tmp_name'], $new_file = $upload . $uniqueNumber . $up_image)) {
  // echo 'アップロード成功';
} else {
  // echo 'アップロード失敗';
}

$imageurl = $upload . $up_image;
$somecontent = (object) array(
  "plice" => "$plice",
  "title" => "$title",
  // 🧐🧐🧐チェックしてね⏬⏬⏬⏬🧐🧐🧐
  "imageurl" => "$deployMetadataUrl\image/$uniqueNumber$up_image",
  "image" => "$up_image",
  "discription" => "$discription",
  "uniqueNumber" => "$uniqueNumber",
  "address" => "$address",
);

// /metaにJSONファイルを作成
$est = json_encode($somecontent);
$fp = fopen("meta/$address$uniqueNumber.json", "c");
$img = fwrite($fp, $est);
fclose($fp);

header("Access-Control-Allow-Origin: *");

// レスポンスを返す
// 🧐🧐🧐チェックしてね⏬⏬⏬⏬🧐🧐🧐
header("Location:$deployNextUrl\mintOnlyPage/?url=$deployMetadataUrl\meta/$address$uniqueNumber.json");
?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MetaData屋さん</title>
</head>

<body style="height: 100%; width:100%; position:relative">
  <div style="height: 100%;">
    <img src="./背景.jpeg" alt="" style="width:100%; height:100%; object-fit:container;">
    <h1 style="text-shadow: 0px 0px 5px #fdc021; position:absolute; top:40%; left:34%; color:white;font-size:60px">
      METAデータ屋さん
    </h1>
  </div>
  <form action="">
    <input type="hidden">
  </form>
</body>