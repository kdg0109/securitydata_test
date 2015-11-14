<?
	
	$connect = mysql_connect('localhost', 'root', 'apmsetup');
	
	mysql_selectdb("mydb");
	mysql_query("set names utf8");
	$qry = "SELECT * FROM board";
	$result = mysql_query($qry);
	
	$xmlcode = "<?xml version = \"1.0\" encoding = \"utf-8\"?>\n"; //xml파일에 출력할 코드
 
	while($obj = mysql_fetch_object($result))
	{
		$title = $obj->title;
		$content = $obj->content;
	 
		$xmlcode .= "<node>\n";
		$xmlcode .= "<title>$title</title>\n";
		$xmlcode .= "<content>$content</content>\n";
		$xmlcode .= "</node>\n"; //DB쿼리로 받아낸 title과 content값을 xml파일에 출력하기 위한 코드
	}
	 
	$dir = "C:/APM_Setup/htdocs"; //board_searchresult.xml 파일을 저장할 경로
	$filename = $dir."/board_searchresult.xml";
	 
	file_put_contents($filename, $xmlcode); //xmlcode의 내용을 xml파일로 출력
	mysql_close($connect);
	
?>
<?

	$connect = mysql_connect('localhost', 'root', 'apmsetup');
	
	mysql_selectdb("mydb");
	mysql_query("set names utf8");
	$qry = "SELECT * FROM board";
	$result = mysql_query($qry);
	$total_record = mysql_num_rows($result);
	echo "total_record=".$total_record."<p>";
	while($row_array = mysql_fetch_array($result)){
		echo("$row_array[uid] | $row_array[title] | $row_array[content] | 
		<a href='board_fix.php?uid=$row_array[uid]'>수정</a> <a href='board_delete.php?uid=$row_array[uid]'>삭제</a><br>");
	}
	
	
	
	mysql_close($connect);
	
?> 