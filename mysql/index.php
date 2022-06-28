<?php
$dsn = 'mysql:host=phptest_db_1 bash;dbname=mysql;charset=utf8';
$db_user = 'root';
$db_pass = 'no1s';
$driver_options = [
];

try {
    $pdo = new PDO($dsn, $db_user, $db_pass, $driver_options);
    $stmt = $pdo->prepare("SELECT * FROM user");
    $res = $stmt->execute();
    $datas = [];
    while($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $datas[] = $data;
    }
    var_dump($datas);
} catch (PDOException $e) {
    exit('データベース接続失敗。' . $e->getMessage());
}


