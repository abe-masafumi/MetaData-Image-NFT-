<?php
ini_set('display_errors', 1);
// 本番環境
define('DSN', 'mysql:host=mysql-2.mc.lolipop.lan;port=3306; dbname=665345266565417a2349663d4afc12c1');
define('DB_USER', '665345266565417a2349663d4afc12c1');
define('DB_PASS', 'Masafumi4555');

// ローカル用
// define('DSN', 'mysql:host=localhost;dbname=metadataTable-NFT');
// define('DB_USER', 'root');
// define('DB_PASS', '');

try {
  $pdo = new PDO(DSN, DB_USER, DB_PASS);
} catch (PDOException $e) {
  echo json_encode(["db error" => "{$e->getMessage()}"]);
  exit(); // 「dbError:...」が表示されたらdb接続でエラーが発生していることがわかる
}

function h($str){
  return htmlspecialchars($str, ENT_QUOTES, 'utf-8');
}

// $commonMetadatUri = "";

$localMetadataUrl = "http://localhost/myfile_lab05/%20NFTMetaData/";
$deployMetadataUrl = "https://loving-kusu-4281.lolipop.io/";

$localNextUrl = "http://localhost:3000/";
$deployNextUrl = "https://nextjs-anifo.vercel.app/";




?>
