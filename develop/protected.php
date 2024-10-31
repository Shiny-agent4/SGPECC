<?php
session_start();

// 認証済みか確認
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>秘密のページ</title>
</head>
<body>

<h1>秘密のページ</h1>
<p>ここには認証されたユーザーのみがアクセスできます。</p>
<a href="logout.php">ログアウト</a>

</body>
</html>
