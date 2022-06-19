<?php
//1. POSTデータ取得
//$name = filter_input( INPUT_GET, ","name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ
$contributor = $_POST['contributor'];
$occasion = $_POST['occasion'];
$price = $_POST['price'];
$restaurant = $_POST['restaurant'];
$url = $_POST['url'];
$genre = $_POST['genre'];
$place = $_POST['place'];
$comment = $_POST['comment'];

//2. DB接続します
try {
    //Password:MAMP='root',XAMPP=''
    $pdo = new PDO('mysql:dbname=xxx;charset=utf8;host=localhost','root','');
  } catch (PDOException $e) {
    exit('DBConnection Error:'.$e->getMessage());
  }
  //３．データ登録SQL作成
  $stmt = $pdo->prepare("insert into xxx_table(contributor, occasion, price, restaurant, url, genre, place,comment, indate) values(:contributor, :occasion, :price, :restaurant, :url, :genre, :place, :comment, sysdate())");
  $stmt->bindValue(':contributor', $contributor, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
  $stmt->bindValue(':occasion', $occasion, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
    $stmt->bindValue(':price', $price, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
  $stmt->bindValue(':restaurant', $restaurant, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
  $stmt->bindValue(':url', $url, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
  $stmt->bindValue(':genre', $genre, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
  $stmt->bindValue(':place', $place, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
  $stmt->bindValue(':comment', $comment, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
  $status = $stmt->execute();
  //４．データ登録処理後
  if($status==false){
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("SQL_ERROR:".$error[2]);
  }else{
    //５．toko.phpへリダイレクト
    header("Location: toko.php");
    exit();
  }
  ?>