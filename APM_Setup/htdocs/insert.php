<?php

$connect = mysql_connect('localhost', 'root', 'apmsetup'); //DB�� �ִ� �ּ�(�̰��� �������� ���� �����ϴ� ���̱� ������ ������ �ּҸ� �ᵵ ��)

/*
if($connect)
	echo "db���Ἲ��!";
else
	echo "db�������!";
*/

mysql_selectdb("bookdb"); //DB ����
mysql_query("set names utf8"); //�̰� ���� �ѱ�(utf8)�� �����ϱ� ���� ��
 
$name = $_REQUEST[name]; //�ּҿ� �ִ� name���� �޾� name ������ ����
$price = $_REQUEST[price]; //�ּҿ� �ִ� price���� �޾� prica ������ ����
 
$qry = "insert into books(name, price) values('$name', $price);";
$result = mysql_query($qry);
 
$xmlcode = "<?xml version = \"1.0\" encoding = \"utf-8\"?>\n"; //xml���Ͽ� ����� �ڵ�
$xmlcode .= "<result>$result</result>\n"; //DB insert�� ���������� �ƴ��� ���θ� Ȯ���ϱ� ���� result���� xml�� ��½�Ŵ
 
$dir = "C:/APM_Setup/htdocs"; //insertresult.xml ������ ������ ���
$filename = $dir."/insertresult.xml";
 
file_put_contents($filename, $xmlcode); //xmlcode�� ������ xml���Ϸ� ���

?>