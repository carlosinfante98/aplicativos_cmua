<?php require_once('../Connections/check_mag.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$colname_getPost = "-1";
if (isset($_GET['post_id'])) {
  $colname_getPost = $_GET['post_id'];
}
mysql_select_db($database_check_mag, $check_mag);
$query_getPost = sprintf("SELECT post_id, title, blog_entry FROM news WHERE post_id = %s", GetSQLValueString($colname_getPost, "int"));
$getPost = mysql_query($query_getPost, $check_mag) or die(mysql_error());
$row_getPost = mysql_fetch_assoc($getPost);
$totalRows_getPost = mysql_num_rows($getPost);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Update post</title>
<link href="../styles/admin.css" rel="stylesheet" type="text/css">
</head>

<body>
<h1>Update post </h1>
<p><a href="index.php">Admin menu</a></p>
<form id="form1" name="form1" method="post">
  <p>
    <label for="title" class="Title:">Title:</label>
    <input name="title" type="text" class="textfields" id="title" value="<?php echo $row_getPost['title']; ?>" maxlength="150">
  </p>
  <p>
    <label for="blog_entry">Post:</label>
    <textarea name="blog_entry" class="textfields" id="blog_entry"><?php echo $row_getPost['blog_entry']; ?></textarea>
  </p>
  <p>
    <input name="insert" type="button" id="insert" value="Update Post">
    <input type="hidden" name="post_id" id="post_id">
  </p>
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($getPost);
?>
