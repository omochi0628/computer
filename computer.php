<?php
if (isset($_GET['operator'])) {
    switch ($_GET['operator']) {
      //mb_convert_kana：全角半角変換'n':全角数字→半角数字
        case '-':
            $ans = mb_convert_kana($_GET['left'], 'n', 'UTF-8') - mb_convert_kana($_GET['right'], 'n', 'UTF-8');
            break;
        case '*':
            $ans = mb_convert_kana($_GET['left'], 'n', 'UTF-8') * mb_convert_kana($_GET['right'], 'n', 'UTF-8');
            break;
        case '/':
            $ans = mb_convert_kana($_GET['left'], 'n', 'UTF-8') / mb_convert_kana($_GET['right'], 'n', 'UTF-8');
            break;
        case '+':
        default:
            $ans = mb_convert_kana($_GET['left'], 'n', 'UTF-8') + mb_convert_kana($_GET['right'], 'n', 'UTF-8');
            break;
    }
} else {
  //未入力
    $ans = '計算結果なし';
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8"/>
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
        <p>計算結果：<?php echo $ans; ?></p>
      </main>
      <footer>
        <hr>
        <small> Copyright (c) 2016 Fujimoto Sachiko, All Rights Reserved.</small>
        <hr>
      </footer>
    </body>
</html>
