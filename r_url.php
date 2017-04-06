<?php
require "login/dbconf.php";
$uid="";
$keys="";
$unitprice = 0.1;

$ali_price=trim($_GET[aliprice]);
$ali_title=trim(urldecode($_GET[alititle]));
$sign=trim($_GET[keys]);
$guid=trim($_GET[uid]);
//-------------------------------------------------------
if($guid==$uid && $sign==$keys){

try {
    $conn = new PDO("mysql:host=$host; dbname=$db_name", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt=$conn->query("SELECT * from members WHERE username=$ali_title");
    if ($stmt->rowCount()==0){exit("error");}

      foreach ($conn->query("SELECT * from members WHERE username=$ali_title") as $row) {
	$unitprice=$row['price'];
      }
    $moretime = $ali_price/$unitprice*2592000;
    $stmt = $conn->prepare("UPDATE members SET expire_time=expire_time+:moretime WHERE username=:username");
    $stmt->bindParam(':username', $ali_title);
    $stmt->bindParam(':moretime', $moretime);

    $stmt->execute();

    }
catch(PDOException $e)
{
    echo "Error: " . $e->getMessage();
}
$conn = null;

exit("succ");

}else{
exit("error");
}
?>
