<?php



//1. POSTデータ取得
$date = $_POST["date"];
$item = $_POST["item"];
$type = $_POST["type"];
$amount = $_POST["amount"];

//2. DB接続します
try {
  //ID:'root', Password: xamppは 空白 ''
  $pdo = new PDO('mysql:dbname=n442_ledger;charset=utf8;host=mysql3104.db.sakura.ne.jp', 'n442_ledger', 'ledger2024');
} catch (PDOException $e) {
  exit('DBConnectError:' . $e->getMessage());
}

//３．データ登録SQL作成

// 1. SQL文を用意
$stmt = $pdo->prepare('INSERT INTO ledger(id,item,type,amount, date) VALUES(NULL, :item, :type, :amount, :date)');

//  2. バインド変数を用意
// Integer 数値の場合 PDO::PARAM_INT
// String文字列の場合 PDO::PARAM_STR


$stmt->bindValue(':item', $item, PDO::PARAM_STR);
$stmt->bindValue(':type', $type, PDO::PARAM_STR);
$stmt->bindValue(':amount', $amount, PDO::PARAM_INT);
$stmt->bindValue(':date', $date, PDO::PARAM_STR);

//  3. 実行
$status = $stmt->execute();

//４．データ登録処理後
if ($status === false) {
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit('ErrorMessage:' . $error[2]);
} else {
  //５．index.phpへリダイレクト
  header('Location: index.php');
}
