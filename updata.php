<?php
require_once('functions.php');
// fetchからのリクエストを受け取る(615e9cbcb317d)
$tokenID = $_GET['tokenID'];
$uniqid = $_GET['uniqueNumber'];
var_dump($tokenID);
var_dump($uniqid);

// 文字列に変換
$stmt = $pdo->prepare('UPDATE metaTable SET tokenID=:tokenID WHERE uniqid = :uniqid');
$stmt->bindValue(':tokenID', $tokenID);
$stmt->bindValue(':uniqid', $uniqid);
$status = $stmt->execute();

if ($status == false) {
  $error = $stmt->errorInfo();
  exit('sqlError:' . $error[2]);
}
  // 🧐🧐🧐チェックしてね⏬⏬🧐🧐🧐
// header("Location:{$localNextUrl}/?tokenID={$tokenID}");
header("Location:{$deployNextUrl}/?tokenID={$tokenID}");
?>