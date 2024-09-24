<?php

// 他のPHPファイルを読み込む
require_once __DIR__ . '/functions/user.php';

// これを忘れない
session_start();


// フォームが送信されたかチェックする
if (isset($_POST['submit-button'])) {
    $name = $_POST['name'];
    $year = $_POST['year'];
    $month = $_POST['month'];
    $day = $_POST['day'];
    $birthday = "$year-$month-$day";
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];
    $address = $_POST['address'];
    $password = $_POST['password'];

    // 連想配列を作成
    $user = [
        'name' => $name,
        'birthday' => $birthday,
        'email' => $email,
        'phoneNumber' => $phoneNumber,
        'address' => $address,
        'password' => $password,
    ];

    // 関数を呼び出す
    $user = saveUser($user);

    // セッションにIDを保存
    $_SESSION['id'] = $user['id'];

    // my-page に移動させる（リダイレクト）
    header('Location: ./my-page.php');
    exit();
}

?>

<html>

<head>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <div class="form-wrapper">
        <h1>会員登録</h1>
        <!-- action: フォームの送信先 -->
        <!-- method: 送信方法 (GET / POST) -->
        <form action="./register.php" method="post">
            <div class="form-item">
                お名前
                <input type="text" name="name">
            </div><br>
            <div class="form-item">
                誕生日<br><br>
                <label class="selectbox-1">
                    年
                    <select name="year">
                        <option value="<?php echo $i; ?>">
                            <?php for ($i = 1990; $i <= 2024; $i++): ?>
                        <option value="<?php echo $i; ?>">
                            <?php
                                echo $i
                            ?>
                        </option>
                    <?php endfor ?>
                    </select>
                </label><br><br>
                <label class="selectbox-1">
                    月
                    <select name="month">
                        <option value="<?php echo $i; ?>">
                            <?php for ($i = 1; $i <= 12; $i++): ?>
                        <option value="<?php echo $i; ?>">
                            <?php
                                echo $i
                            ?>
                        </option>
                    <?php endfor ?>
                    </select>
                </label><br><br>
                <label class="selectbox-1">
                    日
                    <select name="day">
                        <option value="<?php echo $i; ?>">
                            <?php for ($i = 1; $i <= 31; $i++): ?>
                        <option value="<?php echo $i; ?>">
                            <?php
                                echo $i
                            ?>
                        </option>
                    <?php endfor ?>
                    </select>
                </label>
            </div><br>
            <div class="form-item">
                メールアドレス
                <input type="email" name="email">
            </div><br>
            <div class="form-item">
                電話番号
                <input type="phoneNumber" name="phoneNumber">
            </div><br>
            <div class="form-item">
                住所
                <input type="address" name="address">
            </div><br>
            <div class="form-item">
                パスワード
                <input type="password" name="password">
            </div><br>
            <div class="button-panel">
                <input type="submit" class="button" title="登録" value="登録" name="submit-button">
            </div>
            <div class="form-footer">
                <?php include __DIR__ . '/includes/footer.php' ?>
            </div>
        </form>
    </div> <!-- form-wrapper -->
</body>

</html>
