<?php
ini_set('display_errors', 1);
// ππζ¬ηͺη°ε’ππ
// define('DSN', 'mysql:host=mysql-2.mc.lolipop.lan;port=3306; dbname=665345266565417a2349663d4afc12c1');
// define('DB_USER', '665345266565417a2349663d4afc12c1');
// define('DB_PASS', 'Masafumi4555');

// π·π·γ­γΌγ«γ«η¨π·π·
define('DSN', 'mysql:host=localhost;dbname=metadataTable-NFT');
define('DB_USER', 'root');
define('DB_PASS', '');

try {
  $pdo = new PDO(DSN, DB_USER, DB_PASS);
} catch (PDOException $e) {
  echo json_encode(["db error" => "{$e->getMessage()}"]);
  exit(); // γdbError:...γγθ‘¨η€Ίγγγγdbζ₯ηΆγ§γ¨γ©γΌγηΊηγγ¦γγγγ¨γγγγ
}

function h($str){
  return htmlspecialchars($str, ENT_QUOTES, 'utf-8');
}

// $commonMetadatUri = "";

// π©π©γγΌγΏγ΅γΌγγΌπ©π©
$localMetadataUrl = "http://localhost/myfile_lab05/%20NFTMetaData/";
$deployMetadataUrl = "https://loving-kusu-4281.lolipop.io/";
// π²π²γγ­γ³γπ²π²
$localNextUrl = "http://localhost:3000/";
$deployNextUrl = "https://nextjs-anifo-steel.vercel.app/";