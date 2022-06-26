<?php
//１．PHP
//select.phpの[PHPコードだけ！]をマルっとコピーしてきます。
//※SQLとデータ取得の箇所を修正します。

$id = $_GET["id"];


/////////////////////////////////
include("funcs.php");  //funcs.phpを読み込む（関数群）
$pdo = db_conn();      //DB接続関数

//２．データ登録SQL作成
$stmt   = $pdo->prepare("SELECT * FROM xxx_table WHERE id=:id"); //SQLをセット
$stmt->bindValue(':id',   $id,    PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //SQLを実行→エラーの場合falseを$statusに代入

//３．データ表示
$view=""; //HTML文字列作り、入れる変数
if($status==false) {
  //SQLエラーの場合
  sql_error($stmt);
}else{
  //SQL成功の場合
  $row = $stmt->fetch(); /// 1つのデータを取り出して $rowに格納
//   var_dump($row);
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="style.css">
<link href="https://fonts.googleapis.com/earlyaccess/sawarabimincho.css" rel="stylesheet" />
<title>投稿</title>
</head>
<body id = tokoBody>
    <header id = tokoHeader>
        <a href="./top.php">TOP</a>
        <a href="./kensaku.php">検索</a>
        <h2>御薦めレストランを投稿</h2>
    </header>    

    <!-- 投稿画面 -->
    <div id ="contribution">
        <!-- フォーム作成 -->
        <form method="post" action="insert2.php">
            <div id="formSpace">    
                <table id="tokoForm">
                    <tr>
                        <th>投稿者名</th>
                        <td><input type="text" id="contributor" name = "contributor" value="<?=$row["contributor"]?>"></td>
                        <!-- <td><input type="text" id="contributor" name = "contributor" ></td> -->
                    </tr>
                    <tr>
                        <th>使用機会</th>
                        <td>
                            <input type="radio" name="occasion" value="会食（夕食）"
                            <?php if (isset($row["occasion"]) && $row["occasion"] =="会食（夕食）") echo 'checked'; ?>
                            > 会食（夕食）
                            
                            <input type="radio" name="occasion" value="会食（昼食）"
                            <?php if (isset($row["occasion"]) && $row["occasion"] =="会食（昼食）") echo 'checked'; ?>                           
                            > 会食（昼食）

                            <input type="radio" name="occasion" value="社内イベント"
                            <?php if (isset($row["occasion"]) && $row["occasion"] =="社内イベント") echo 'checked'; ?>                           
                            > 社内イベント

                            <input type="radio" name="occasion" value="合コン"
                            <?php if (isset($row["occasion"]) && $row["occasion"] =="合コン") echo 'checked'; ?>                           
                            >合コン

                            <input type="radio" name="occasion" value="その他"
                            <?php if (isset($row["occasion"]) && $row["occasion"] =="その他") echo 'checked'; ?>                                                      
                            > その他


                        </td>
                    </tr>
                    <!-- <tr>
                        <th>主要出席者</th>
                        <td><input type="text" id="person"></td>
                    </tr> -->
                    <tr>
                        <th>価格帯</th>
                        <td>
                            <input type="radio" name="price" value="5000円以下" 
                            <?php if (isset($row["price"]) && $row["price"] =="5000円以下") echo 'checked'; ?>                           
                            > 5000円以下
                            <input type="radio" name="price" value="5000円超～1万円以下"
                            <?php if (isset($row["price"]) && $row["price"] =="5000円超～1万円以下") echo 'checked'; ?>                                                      
                            > 5000円超～1万円以下
                            <input type="radio" name="price" value="1万円超"
                            <?php if (isset($row["price"]) && $row["price"] =="1万円超") echo 'checked'; ?>                                                      
                            > 1万円超                

                        </td>
                    </tr>
                    <tr>
                        <th>レストラン名</th>
                        <td><input type="text" id="restaurant" name="restaurant" value="<?=$row["restaurant"]?>"></td>
                    </tr>
                    <tr>
                        <th>URL</th>
                        <td><input type="text" id="url" name="url" value="<?=$row["url"]?>"></td>
                    </tr>
                    <tr>
                        <th>ジャンル</th>
                        <td>
                            <input type="radio" name="genre" value="焼肉"
                            <?php if (isset($row["genre"]) && $row["genre"] =="焼肉") echo 'checked'; ?>                           
                            >焼肉
                            <input type="radio" name="genre" value="焼き鳥"
                            <?php if (isset($row["genre"]) && $row["genre"] =="焼き鳥") echo 'checked'; ?>                           
                            >焼き鳥
                            <input type="radio" name="genre" value="寿司"
                            <?php if (isset($row["genre"]) && $row["genre"] =="寿司") echo 'checked'; ?>                           
                            >寿司
                            <input type="radio" name="genre" value="居酒屋"
                            <?php if (isset($row["genre"]) && $row["genre"] =="居酒屋") echo 'checked'; ?>                           
                            >居酒屋
                            <input type="radio" name="genre" value="イタリアン"
                            <?php if (isset($row["genre"]) && $row["genre"] =="イタリアン") echo 'checked'; ?>                           
                            >イタリアン
                            <input type="radio" name="genre" value="中華"
                            <?php if (isset($row["genre"]) && $row["genre"] =="中華") echo 'checked'; ?>                           
                            >中華
                            <input type="radio" name="genre" value="その他"
                            <?php if (isset($row["genre"]) && $row["genre"] =="その他") echo 'checked'; ?>                           
                            >その他
                        </td>
                    </tr>
                    <tr>
                        <th>場所</th>
                        <td><input type="text" id="place" name="place" value="<?=$row["place"]?>"></td>
                    </tr>
                    <tr>
                        <th>コメント</th>
                        <td><textarea name="comment" id="comment" cols="110" rows="5" value="<?=$row["comment"]?>"></textarea></td>
                    </tr>
                </table>
            </div>    
        
            <!-- ボタン -->
            <div id="contGamenBtn">
                <button id="send" type="submit" class="silver">再投稿</button>

            </div>
        </form>
    </div>

<!-- 以下いらんのちゃう？ -->
<!-- ・・・・・・・・・・・・・・・・・・・・・・・・・・・・・・・ -->

</body>
</html>