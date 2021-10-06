<?php
// metaディレクトリ内のファイル名を全て取得
$result = glob('meta/*');
$ary = [];
foreach ($result as $value) {
  // ファイルの内容を全て取得して配列に入れる
  $content = json_decode(file_get_contents($value));
   array_push($ary, $content);
}
echo json_encode($ary);
