<?php
$connect = mysql_connect('localhost', 'root', 'apmsetup'); //DB�� �ִ� �ּ�(�̰��� �������� ���� �����ϴ� ���̱� ������ ������ �ּҸ� �ᵵ ��)
mysql_selectdb("bookdb"); //DB ����
mysql_query("set names utf8"); //�̰� ���� �ѱ�(utf8)�� �����ϱ� ���� ��

 /*
if($connect)
	echo "db���Ἲ��!";
else
	echo "db�������!";
*/
$qry = "select * from books;";
$result = mysql_query($qry);
 
$xmlcode = "<?xml version = \"1.0\" encoding = \"utf-8\"?>\n"; //xml���Ͽ� ����� �ڵ�
 
while($obj = mysql_fetch_object($result))
{
    $name = $obj->name;
    $price = $obj->price;
 
    $xmlcode .= "<node>\n";
    $xmlcode .= "<name>$name</name>\n";
    $xmlcode .= "<price>$price</price>\n";
    $xmlcode .= "</node>\n"; //DB������ �޾Ƴ� name�� price���� xml���Ͽ� ����ϱ� ���� �ڵ�
}
 
$dir = "C:/APM_Setup/htdocs"; //searchresult.xml ������ ������ ���
$filename = $dir."/searchresult.xml";
 
file_put_contents($filename, $xmlcode); //xmlcode�� ������ xml���Ϸ� ���
?>