<?php
//共通に使う関数を記述
//XSS対応（ echoする場所で使用！それ以外はNG ）

function h($stg){
    return htmlspecialchars($stg, ENT_QUOTES);
  }

$dsn = 'mysql:dbname=n442_ledger;charset=utf8;host=mysql3104.db.sakura.ne.jp';
$username = 'n442_ledger';
$password = 'ledger2024';