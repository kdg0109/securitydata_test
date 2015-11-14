<?php
	echo("
	<html>
		<head>
			<title>미니 게시판 만들기</title>
		</head>
	<body>
		<center>
			<form method=post action='board_input.php'>
				<table>
					<tr>
						<td width=50>제목</td>
						<td valign=middle width=200>
							<input type=text size=70 name=title>
						</td>
					</tr>
					<tr>
						<td width=top>내용</td>
						<td>
						<textarea cols=70 rows=10 name=content>내용 입력</textarea>
						</td>
					</tr>
				</table>
					<input type=submit value='글 올리기'>
					<input type=reset value='취소'> 
			</form>
			<br>
		</center>
	</body>
	</html>
	");
?>