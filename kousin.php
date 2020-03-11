<?php

$id = $_GET["id"];
// echo $id;

try {
    $pdo = new PDO('mysql:dbname=kadai3;charset=utf8;host=localhost','root','');
    } catch (PDOException $e) {
      exit('データベースに接続できませんでした。'.$e->getMessage());
    }

    $sql = "SELECT * FROM kadai3_table WHERE id=:id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $status = $stmt->execute();

    $view="";
    if($status==false){
      $error = $stmt->errorInfo();
      exit("ErrorQuery:".$error[2]);
    }else{
        $row = $stmt->fetch();
    }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>TODOリスト登録</title>
  <link href="css/style.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>


<form method="post" action="insert.php">
  <div class="jumbotron">
   <fieldset>
    <legend class="taitoru">TODOリスト登録</legend>
     <label class="kate">カテゴリ：
     <select name="kategori" value="<?=$row["kategori"]?>">
<option value="仕事">仕事</option>
<option value="手続き">手続き</option>
<option value="対人予定">対人予定</option>
<option value="メンテナンス">メンテナンス</option>
<option value="その他">その他</option>
</select>
</label>
<br><br>
     <label class="sime">締め切り： <input type="date" name="simekiri" value="simekiri"><?=$row["simekiri"]?></label><br><br>
     <label class="nai">やること：<textArea name="naiyou" rows="4" cols="40"><?=$row["naiyou"]?></textArea></label><br>
     <br><br>
     <input type="submit" value="登録">

     </fieldset>
  </div>
</form>
</body>
</html>
