<?php
	echo "수신한 내용 : ";
	$uid = $_GET['uid'];
	echo $uid."<br>";
	
	$connect = mysql_connect('localhost', 'root', 'apmsetup');
	
	mysql_selectdb("mydb");
	mysql_query("set names utf8");
	
	$qry = "SELECT * FROM board WHERE uid = $uid";
	$result = mysql_query($qry);
	$row_array = @mysql_fetch_array($result);
	
	
	echo("
	<html>
		<head>
			<title>미니 게시판 만들기</title>
		</head>
	<body>
		<center>
			<form method=post action='board_fix_input.php'>
				<table>
					<tr>
						<td width=50>제목</td>
						<td valign=middle width=200>
							<input type=text size=70 name=title value='$row_array[title]'>
						</td>
					</tr>
					<tr>
						<td width=top>내용</td>
						<td>
						<textarea cols=70 rows=10 name=content >$row_array[content]</textarea>
						</td>
					</tr>
				</table>
					<input type=hidden name=uid value=$uid>
					<input type=submit value='수정하기'>
					<input type=reset value='취소'> 
			</form>
			<br>
		</center>
	</body>
	</html>
	");
?>