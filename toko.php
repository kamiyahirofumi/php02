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
                        <td><input type="text" id="contributor" name = "contributor"></td>
                    </tr>
                    <tr>
                        <th>使用機会</th>
                        <td>
                            <input type="radio" name="occasion" value="会食（夕食）" checked> 会食（夕食）
                            <input type="radio" name="occasion" value="会食（昼食）"> 会食（昼食）
                            <input type="radio" name="occasion" value="社内イベント"> 社内イベント
                            <input type="radio" name="occasion" value="合コン">合コン
                            <input type="radio" name="occasion" value="その他"> その他
                        </td>
                    </tr>
                    <!-- <tr>
                        <th>主要出席者</th>
                        <td><input type="text" id="person"></td>
                    </tr> -->
                    <tr>
                        <th>価格帯</th>
                        <td>
                            <input type="radio" name="price" value="5000円以下" checked> 5000円以下
                            <input type="radio" name="price" value="5000円超～1万円以下"> 5000円超～1万円以下
                            <input type="radio" name="price" value="1万円超"> 1万円超                
                        </td>
                    </tr>
                    <tr>
                        <th>レストラン名</th>
                        <td><input type="text" id="restaurant" name="restaurant"></td>
                    </tr>
                    <tr>
                        <th>URL</th>
                        <td><input type="text" id="url" name="url"></td>
                    </tr>
                    <tr>
                        <th>ジャンル</th>
                        <td>
                            <input type="radio" name="genre" value="焼肉" checked>焼肉
                            <input type="radio" name="genre" value="焼き鳥">焼き鳥
                            <input type="radio" name="genre" value="寿司">寿司
                            <input type="radio" name="genre" value="居酒屋">居酒屋
                            <input type="radio" name="genre" value="イタリアン">イタリアン
                            <input type="radio" name="genre" value="中華">中華
                            <input type="radio" name="genre" value="その他">その他
                        </td>
                    </tr>
                    <tr>
                        <th>場所</th>
                        <td><input type="text" id="place" name="place"></td>
                    </tr>
                    <tr>
                        <th>コメント</th>
                        <td><textarea name="comment" id="comment" cols="110" rows="5"></textarea></td>
                    </tr>
                </table>
            </div>    
        
            <!-- ボタン -->
            <div id="contGamenBtn">
                <button id="send" type="submit" class="silver">投稿</button>

            </div>
        </form>
    </div>

<!-- 以下いらんのちゃう？ -->
<!-- ・・・・・・・・・・・・・・・・・・・・・・・・・・・・・・・ -->

</body>
</html>