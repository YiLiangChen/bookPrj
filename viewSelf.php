<?php
session_start();
//require("dbconnect.php");

//set the login mark to empty
if ( ! isset($_SESSION['uID']) or $_SESSION['uID'] <= 0) {
	header("Location: loginForm.php");
	exit(0);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>

<p>my guest book !! [<a href='loginForm.php'>logout</a>] [<a href='view.php'>goback</a>]</p>
<hr />
<table width="600" border="1">
  <tr>
    <td>id</td>
    <td>title</td>
    <td>message</td>
    <td>author</td>
    <td>recommend by</td>
   <td>Likes</td>
  </tr>
<?php
require("model.php");
$results=getSelfBookList($_SESSION['uID']);

while (	$rs=mysqli_fetch_array($results)) {

	echo "<tr><td>" , $rs['id'] ,
	"<a href='control.php?act=delete&id=",$rs['id'] ,"'>砍</a> | ",
	"<a href='editMessageForm.php?id=",$rs['id'] ,"'>改</a> | ",
  "<a href='control.php?act=like&id=",$rs['id'] ,"'>Like</a> | ",
  "<a href='control.php?act=unlike&id=",$rs['id'] ,"'>unLike</a> | ",
	"<a href='viewDetail.php?id=",$rs['id'] ,"'>View Detail</a> | ",
	"</td><td>" , $rs['title'],
	"</td><td>" , $rs['msg'],
	"</td><td>", $rs['author'],
	"</td><td>", $rs['name'],
	"</td><td>(", $rs['push'], ")</td></td></tr>";
}
?>
</table>
</body>
</html>
