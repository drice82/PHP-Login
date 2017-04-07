<?php
require "login/dbconf.php";
$uid="";
$keys="";

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
    foreach ($stmt as $row) {
        $unitprice=$row['price'];
        $expire_time=$row['expire_time'];
    }
    $moretime = $ali_price/$unitprice*2592000;

    if ($expire_time > time()) {$expire_time = $expire_time+$moretime;}
    else {$expire_time = time()+$moretime;}

    $stmt = $conn->prepare("UPDATE members SET expire_time=:expire_time WHERE username=:username");
    $stmt->bindParam(':username', $ali_title);
    $stmt->bindParam(':expire_time', $expire_time);

    $stmt->execute();

    }
catch(PDOException $e)
{
//    echo "ERROR";
    echo "Error: " . $e->getMessage();
}
$conn = null;

exit("succ");

}else{
exit("error");
}
?>
