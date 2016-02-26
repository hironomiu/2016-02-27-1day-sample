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
$mem = new Memcached();
$mem->addServer('localhost',11211);
$mem->set($_POST["text1"],$_POST["text2"]);
$result = $mem->get($_POST["text1"]);
echo $_POST["text1"] . ":" . $result;
?>
  </body>
</html>

