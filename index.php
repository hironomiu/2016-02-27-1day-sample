<html>
  <body>
    <form method="POST">
      text1:<input type="text" name="text1"><br>
      text2:<input type="text" name="text2"><br>
      <input type="submit" value="送信">
    </form>
<?php
if(!isset($_POST["text1"])){
    exit;
}

try{
    $con = new PDO(sprintf('mysql:host=%s;dbname=%s;charset=utf8', 'localhost', 'groupwork'), 'demouser', 'demopass', array(PDO::ATTR_EMULATE_PREPARES => false));
}catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    die;
}
$sql = 'insert into hoge values(?,?)';
$sth = $con->prepare($sql);
$sth->execute(array($_POST["text1"],$_POST["text2"]));

$sql = 'select * from hoge where text1 = ?';
$sth = $con->prepare($sql);
$sth->execute(array($_POST["text1"]));
$result = $sth->fetch(PDO::FETCH_BOTH);
echo $result['text1'] . ":" . $result['text2'];
?>
  </body>
</html>

