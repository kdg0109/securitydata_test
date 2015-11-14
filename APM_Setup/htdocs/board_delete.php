<?
	$uid = $_GET['uid'];
	
	$connect = mysql_connect('localhost', 'root', 'apmsetup');
	
	mysql_selectdb("mydb");
	mysql_query("set names utf8");
	
		
	if($_REQUEST[title] != null){
		$title = $_REQUEST[title]; //주소에 있는 name값을 받아 name 변수에 저장
		$qry = "DELETE FROM board WHERE title = '$title'";
		$result = mysql_query($qry);
		
	}else{
		$qry = "DELETE FROM board WHERE uid = $uid";
		$result = mysql_query($qry);
		if(result) echo "uid=".$uid." 데이터가 삭제되었습니다.<br>";
	}
	
	
	
	mysql_close($connect);
	
?> 