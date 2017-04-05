<?php require "login/loginheader.php"; ?>

<?php
require 'login/dbconf.php';

try {
    $conn = new PDO("mysql:host=$host; dbname=$db_name", $username, $password);
    // 设置 PDO 错误模式为异常
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 预处理 SQL 并绑定参数
    $stmt = $conn->prepare("UPDATE members SET password=:password WHERE username=:username");
    $stmt->bindParam(':username', $usr);
    $stmt->bindParam(':password', $pw);

    $usr = $_SESSION['username'];
    $pw = $_POST['password1'];
    $stmt->execute();

    echo "<script> alert( '密码修改成功！即将自动退出。 '); location.href='login/logout.php'; </script>";

}
catch(PDOException $e)
{
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>
