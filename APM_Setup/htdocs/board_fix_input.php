<?
	echo "수신한 내용<br>";
	$title = htmlspecialchars($_POST['title']);
	echo $title."<br>";
	$content = htmlspecialchars($_POST['content']);
	echo $content."<br>";
	$uid = $_POST['uid'];
	echo $uid."<br>";
	

	$connect = mysql_connect('localhost', 'root', 'apmsetup');
	
	mysql_selectdb("mydb");
	mysql_query("set names utf8");
	$qry = "UPDATE board SET title='$title', content='$content' WHERE uid=$uid";
	$result = mysql_query($qry);
	echo(mysql_error($connect)); 
	
	$qry = "SELECT * FROM board";
	$result = mysql_query($qry);
	$total_record = @mysql_num_rows($result);
	echo "total_record=".$total_record."<p>";
	while($row_array = @mysql_fetch_array($result)){
		echo("$row_array[uid] | $row_array[title] | $row_array[content] | 
		<a href='board_fix.php?uid=$row_array[uid]'>수정</a> <a href='board_delete.php?uid=$row_array[uid]'>삭제</a><br>");
	}
	
	mysql_close($connect);
	
?> 