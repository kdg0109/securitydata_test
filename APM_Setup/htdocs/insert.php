<?php

$connect = mysql_connect('localhost', 'root', 'apmsetup'); //DB가 있는 주소(이것은 웹서버로 직접 접속하는 것이기 때문에 루프백 주소를 써도 됨)

/*
if($connect)
	echo "db연결성공!";
else
	echo "db연결실패!";
*/

mysql_selectdb("bookdb"); //DB 선택
mysql_query("set names utf8"); //이것 또한 한글(utf8)을 지원하기 위한 것
 
$name = $_REQUEST[name]; //주소에 있는 name값을 받아 name 변수에 저장
$price = $_REQUEST[price]; //주소에 있는 price값을 받아 prica 변수에 저장
 
$qry = "insert into books(name, price) values('$name', $price);";
$result = mysql_query($qry);
 
$xmlcode = "<?xml version = \"1.0\" encoding = \"utf-8\"?>\n"; //xml파일에 출력할 코드
$xmlcode .= "<result>$result</result>\n"; //DB insert가 성공적으로 됐는지 여부를 확인하기 위해 result값을 xml로 출력시킴
 
$dir = "C:/APM_Setup/htdocs"; //insertresult.xml 파일을 저장할 경로
$filename = $dir."/insertresult.xml";
 
file_put_contents($filename, $xmlcode); //xmlcode의 내용을 xml파일로 출력

?>