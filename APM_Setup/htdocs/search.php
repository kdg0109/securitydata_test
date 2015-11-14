<?php
$connect = mysql_connect('localhost', 'root', 'apmsetup'); //DB가 있는 주소(이것은 웹서버로 직접 접속하는 것이기 때문에 루프백 주소를 써도 됨)
mysql_selectdb("bookdb"); //DB 선택
mysql_query("set names utf8"); //이것 또한 한글(utf8)을 지원하기 위한 것

 /*
if($connect)
	echo "db연결성공!";
else
	echo "db연결실패!";
*/
$qry = "select * from books;";
$result = mysql_query($qry);
 
$xmlcode = "<?xml version = \"1.0\" encoding = \"utf-8\"?>\n"; //xml파일에 출력할 코드
 
while($obj = mysql_fetch_object($result))
{
    $name = $obj->name;
    $price = $obj->price;
 
    $xmlcode .= "<node>\n";
    $xmlcode .= "<name>$name</name>\n";
    $xmlcode .= "<price>$price</price>\n";
    $xmlcode .= "</node>\n"; //DB쿼리로 받아낸 name과 price값을 xml파일에 출력하기 위한 코드
}
 
$dir = "C:/APM_Setup/htdocs"; //searchresult.xml 파일을 저장할 경로
$filename = $dir."/searchresult.xml";
 
file_put_contents($filename, $xmlcode); //xmlcode의 내용을 xml파일로 출력
?>