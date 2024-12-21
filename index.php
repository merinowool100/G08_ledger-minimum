<?php
require_once('funcs.php');

$dsn = 'xxxxxx';
$username = 'xxxxx';
$password = 'xxxxx';

//1.  DB接続します
try {
    $pdo = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    exit('DBConnectError' . $e->getMessage());
}

$sql = "SELECT * FROM ledger";
$stmt = $pdo->query($sql);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);  // 結果を配列として取得

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>データ表示</title>
    <a href="post.php" style="font-size:20px; padding:10px 20px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 5px;">Post</a>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h1>データ一覧</h1>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Item</th>
                <th>Type</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($rows as $row) {
                echo "<tr>";
                echo "<td>" . h($row['date']) . "</td>";
                echo "<td>" . h($row['item']) . "</td>";
                echo "<td>" . h($row['type']) . "</td>";
                echo "<td>" . h($row['amount']) . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>