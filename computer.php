<?php

if (isset($_GET['operator'])) {
    //mb_convert_kana：全角半角変換'n':全角数字→半角数字
    $left = mb_convert_kana($_GET['left'], 'n', 'UTF-8');
    $right = mb_convert_kana($_GET['right'], 'n', 'UTF-8');
    // 変数が数字または数値形式の文字列であるかを調べる
    if (is_numeric($left) == true && is_numeric($right) == true) {
        switch ($_GET['operator']) {
      case '-':
          $ans = $left - $right;
          break;
      case '*':
          $ans = $left * $right;
          break;
      case '/':
          $ans = $left / $right;
          // $rightに0が入った場合(値はfalseになる):error
          if ($ans === false) {
              $ans = 'error';
          }
          break;
      case '+':
          $ans = $left + $right;
          break;
        }
    } else {
        //数字以外の文字が入力された場合
        $moji = '全角または半角の数字を入力してください。';
    }
} else {
    //未入力
  $ans = '計算結果なし';
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <title>計算機</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" type="text/css" href="css/index.css" media="all">
</head>

<body>
  <header>
      <h1>もっちーの計算機</h1>
  </header>
  <main>
      <form action="computer.php" method="GET">
          <input type="text" name="left" required autofocus/>
          <select name="operator">
        <option value="+" selected>+</option>
        <option value="-">-</option>
        <option value="*">×</option>
        <option value="/">÷</option>
      </select>
          <input type="text" name="right" required/>
          <input type="submit" value="計算する">
      </form>
      <!-- $_GET['left']とr$_GET['right]に数字が入ってきた場合(正常) -->
      <?php if (is_numeric($left) == true && is_numeric($right) == true): ?>
      <p>
          <?php echo '計算結果:'.$ans; ?>
      </p>
      <!-- $_GET['left']とr$_GET['right]に数字以外の文字が入ってきた場合(エラー) -->
      <?php endif; ?>
      <?php if (is_numeric($left) == false || is_numeric($right) == false): ?>
      <p>
          <?php echo $moji; ?>
      </p>
      <?php endif; ?>
  </main>
  <footer>
      <hr>
      <small> Copyright (c) 2016 Fujimoto Sachiko, All Rights Reserved.</small>
      <hr>
  </footer>
</body>

</html>
