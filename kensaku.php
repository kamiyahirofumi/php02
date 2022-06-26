<?php
//1.  DB接続します
require_once("funcs.php");

try {
  //Password:MAMP='root',XAMPP=''
  $pdo = new PDO('mysql:dbname=xxx;charset=utf8;host=localhost','root','');
//   $pdo = new PDO('mysql:dbname=maroonjackal32_xxx;charset=utf8;host=mysql57.maroonjackal32.sakura.ne.jp','maroonjackal32','PASSWORD');
} catch (PDOException $e) {
  exit('DBConnection Error:'.$e->getMessage());
}

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM xxx_table");
$status = $stmt->execute();



//３．データ表示
$view="";
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("SQL_ERROR:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while( $res = $stmt->fetch(PDO::FETCH_ASSOC)){

    $view .= "<tr>";

    $view .= "<td class = occasionRan>";
    $view .= h($res["occasion"]);
    $view .= "</td>";

    $view .= "<td class = priceRan>";
    $view .= h($res["price"]);
    $view .= "</td>";
    
    $view .= "<td class = genreRan>";
    $view .= h($res["genre"]);
    $view .= "</td>";
    
    $view .= "<td class = restaurantRan>";
    $view .= h($res["restaurant"]);
    $view .= "</td>";

    $view .= "<td class = placeRan>";
    $view .= h($res["place"]);
    $view .= "</td>";

    $view .= "<td class = urlRan>";
    $view .= h($res["url"]);
    $view .= "</td>";
    
    $view .= "<td class = personRan>";
    $view .= h($res["contributor"]);
    $view .= "</td>";

    // $view .= "<td class = commentRan>";
    // $view .= h($res["comment"]);
    // $view .= "</td>";


    $view .= "<td>";
        // $view .= '<a href="update.php">';
        $view .= '<a>';
        $view .= "[コメントを見る]";
        $view .= '</a>';  

        $view .= '<a href="detail.php?id='.h($res["id"]).'">';   
        $view .= "[修正]";
        $view .= '</a>';  

        $view .= '<a href="delete.php?id='.h($res["id"]).'">';   
        $view .= "[削除]";
        $view .= '</a>';  
    $view .= "</td>";

    $view .= "</tr>";



    }

}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="style.css">
<link href="https://fonts.googleapis.com/earlyaccess/sawarabimincho.css" rel="stylesheet" />
<title>検索</title>
</head>
<body id = kensakuBody>

    <header id = kensakuHeader>
        <a href="./top.php">TOP</a>
        <a href="./toko.php">投稿</a>
        <h2>御薦めレストランリスト</h2>
    </header>    

    <!--検索画面 -->
    <div id = serch>

        <!-- 絞り込み -->
        <nav>
            <p>使用機会</p>
                <select id="oSelect">
                    <option value="">全て</del></option>
                    <option value="会食（夕食）">会食（夕食）</option>
                    <option value="会食（昼食）">会食（昼食）</option>
                    <option value="社内イベント">社内イベント</option>
                    <option value="合コン">合コン</option>
                </select>
            <p>価格帯</p>
                <select id="pSelect">
                    <option value="">全て</option>
                    <option value="5000円以下">5000円以下</option>
                    <option value="5000円超～1万円以下">5000円超～1万円以下</option>
                    <option value="1万円超">1万円超</option>
                </select>
            <p>ジャンル</p>
                <select id="gSelect">
                    <option value="">全て</option>
                    <option value="焼肉">焼肉</option>
                    <option value="焼き鳥">焼き鳥</option>
                    <option value="寿司">寿司</option>
                    <option value="居酒屋">居酒屋</option>
                    <option value="イタリアン">イタリアン</option>
                    <option value="中華">中華</option>
                    <option value="その他">その他</option>    
                </select>
        </nav>

        <!-- 表 -->
        <div id="tableSpace"> 
        <table id ="output">
            <tr>
                <th class = occasionRan>使用機会</th>
                <th class = priceRan>価格帯</th>
                <th class = genreRan>ジャンル</th>
                <th class = restaurantRan>レストラン</th>
                <th class = placeRan>場所</th>
                <th class = urlRan>URL</th>
                <th class = personRan>投稿者</th>
                <!-- <th class = commentRan>コメント</th> -->
                <th class = deleteBtnRan></th>
            </tr>

            <?=$view?>
        </table>
        </div>



</body>
</html>