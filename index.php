<?php
require_once('functions.php');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

var_dump($_POST);
// echo $_POST;

// $params = json_decode(file_get_contents('php://input', true));
// $params = json_decode(file_get_contents('php://input'), false); 

// $id = $params["title"];
// var_dump($id );
// echo $params;

// echo $params['title'];

// print_r($id);
// var_dump($id);


exit('ok');
$title = $_POST['title'];
$plice = $_POST['plice'];
$discription = $_POST['discription'];
$uniqueNumber = $_POST['uniqueNumber'];

var_dump($title);
var_dump($discription);
var_dump($plice);
// insert分にはまだ入れてない↓
var_dump($uniqueNumber);
// exit('ok');

// ------画像アップロード--------
$up_image = $_FILES['file']['name'];
$upload = "image/";
if (move_uploaded_file($_FILES['file']['tmp_name'], $new_file = $upload . $uniqueNumber . $up_image)) {
  echo 'アップロード成功';
} else {
  echo 'アップロード失敗';
}

// SQL作成&実行データベースに入れるならこれつかヲーねい
// $sql = "INSERT INTO metaTable(meta_id, plice, title, discription, image) VALUES(NULL,:plice,:title, :discription, :image)";
// $stmt = $pdo->prepare($sql);

// $stmt->bindValue(':plice', $plice, PDO::PARAM_INT);
// $stmt->bindValue(':title', $title, PDO::PARAM_STR);
// $stmt->bindValue(':discription', $discription, PDO::PARAM_STR);
// $stmt->bindValue(':image', $up_image, PDO::PARAM_STR);

// $status = $stmt->execute(); // SQLを実行

$imageurl = $upload . $up_image;

$somecontent = (object) array(
  "plice" => "$plice",
  "title" => "$title",
  "image" => "$imageurl",
  "discription" => "$discription",
);

$est = json_encode($somecontent);
$fp = fopen("meta/$uniqueNumber.json", "c");
$img = fwrite($fp, $est);
fclose($fp);

header("Access-Control-Allow-Origin: *");
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