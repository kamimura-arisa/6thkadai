<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>TODOリスト表示</title>
<link rel="stylesheet" href="css/style.css">
<!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<!-- <header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index.php">データ登録</a>
      </div>
    </div>
  </nav>
</header> -->
<!-- Head[End] -->

<!-- Main[Start] $view-->
<!-- <form method="post" action="insert.php">
  <div class="jumbotron">
   <fieldset>
    <legend class="taitoru">TODOリスト登録</legend>
     <label class="kate">カテゴリ：
     <select name="kategori">
<option value="仕事">仕事</option>
<option value="手続き">手続き</option>
<option value="対人予定">対人予定</option>
<option value="メンテナンス">メンテナンス</option>
<option value="その他">その他</option>
</select>
</label>
<br><br>
     <label class="sime">締め切り： <input type="date" name="simekiri"></label><br><br>
     <label class="nai">やること：<textArea name="naiyou" rows="4" cols="40"></textArea></label><br>
     <br><br>
     <label><input class="touroku" type="submit" value="登録"></label> -->
     <!-- <nav class="navbar navbar-default">
    <div class="container-fluid"> -->
    <!-- <div class="navbar-header"><a class="navbar-brand" href="select.php">登録済みリスト一覧</a></div> -->
    </div>
  </nav>
    </fieldset>
  </div>
</form>
<?php
//1.  DB接続します xxxにDB名を入れます
try {
$pdo = new PDO('mysql:dbname=kadai3;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}

//２．データ登録SQL作成
//作ったテーブル名を書く場所  xxxにテーブル名を入れます
$stmt = $pdo->prepare("SELECT * FROM kadai3_table");
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
  //Selectデータの数だけ自動でループしてくれる $resultの中に「カラム名」が入ってくるのでそれを表示させる例
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    // $view .= "<p>";
    // $view .= $result["kategori"].":".$result["simekiri"].":".$result["naiyou"];
    // $view .= "</p>";
    $view .= "<p>";
    $view .= '<a href="kousin.php?id='.$result["id"].'">';
    $view .= $result["kategori"].":".$result["simekiri"].":".$result["naiyou"];
    $view .= '</a>';
    $view .= "</p>";
  }

}
?>
<div>
    <div class="container jumbotron"><?=$view?></div>
</div>

<!-- Main[End] -->

</body>
</html>