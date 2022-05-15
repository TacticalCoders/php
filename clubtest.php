<?php
header("Content-Type:text/html;charset=utf-8");
echo "php-mysql club db 연결 테스트<br>";
$db = mysqli_connect("localhost", "id202001480", "pw202001480", "clubdb");
mysqli_set_charset($db, 'utf8');
echo "db character set: " . mysqli_character_set_name($db) . "<BR>";
if($db){
echo "db 접속 : 성공<br>";
}
else{
echo "db 접속 : 실패<br>";
}
$result = mysqli_query($db, 'SELECT name from account where accountId=1');
$data = mysqli_fetch_assoc($result);
echo $data['name'];
?>