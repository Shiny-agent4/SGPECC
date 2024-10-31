<?php
session_start();

// パスワードがすでに正しい場合、直接保護ページへリダイレクト
if (isset($_SESSION['authenticated']) && $_SESSION['authenticated'] === true) {
    header("Location: protected.php");
    exit();
}

// パスワード確認処理
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST['password'];
    $correctPassword = "12345";  // 実際の運用ではより強力なパスワードにしてください

    if ($password === $correctPassword) {
        $_SESSION['authenticated'] = true;
        header("Location: protected.php");
        exit();
    } else {
        $error = "パスワードが間違っています";
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ログインページ</title>
</head>
<body>

<h2>パスワードを入力してください</h2>
<?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

<form method="post" action="login.php">
    <label for="password">パスワード:</label>
    <input type="password" name="password" id="password" required>
    <button type="submit">ログイン</button>
</form>

</body>
</html>
