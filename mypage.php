<?php
require_once('functions.php');
// fetchからのリクエストを受け取る(615e9cbcb317d)
$params = json_decode(file_get_contents('php://input'), true);
// 文字列に変換
$string = strval($params);

$stmt = $pdo->prepare('SELECT * FROM metaTable WHERE MetaMaskAddress = ?');
$stmt->execute([$params]);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
header("Access-Control-Allow-Origin: *");
echo json_encode($rows);
?>