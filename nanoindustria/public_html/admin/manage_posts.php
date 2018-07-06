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

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_getPosts = 10;
$pageNum_getPosts = 0;
if (isset($_GET['pageNum_getPosts'])) {
  $pageNum_getPosts = $_GET['pageNum_getPosts'];
}
$startRow_getPosts = $pageNum_getPosts * $maxRows_getPosts;

mysql_select_db($database_check_mag, $check_mag);
$query_getPosts = "SELECT post_id, title, updated FROM news ORDER BY updated DESC";
$query_limit_getPosts = sprintf("%s LIMIT %d, %d", $query_getPosts, $startRow_getPosts, $maxRows_getPosts);
$getPosts = mysql_query($query_limit_getPosts, $check_mag) or die(mysql_error());
$row_getPosts = mysql_fetch_assoc($getPosts);

if (isset($_GET['totalRows_getPosts'])) {
  $totalRows_getPosts = $_GET['totalRows_getPosts'];
} else {
  $all_getPosts = mysql_query($query_getPosts);
  $totalRows_getPosts = mysql_num_rows($all_getPosts);
}
$totalPages_getPosts = ceil($totalRows_getPosts/$maxRows_getPosts)-1;

$queryString_getPosts = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_getPosts") == false && 
        stristr($param, "totalRows_getPosts") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_getPosts = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_getPosts = sprintf("&totalRows_getPosts=%d%s", $totalRows_getPosts, $queryString_getPosts);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Manage Posts</title>
<link href="../styles/admin.css" rel="stylesheet" type="text/css">
<style type="text/css">
body {
	background-image: url(../images/Background_light.jpg);
}
</style>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0" name="MainTable" align="center">
  <tr>
    <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0" name="header">
      <tr>
        <td width="21%"><div align="left"><font color="#FFFFFF"><a href="../intro_nano.php"><img src="../images/ColombiaNanotech.jpg" width="251" height="67" name="ColombiaLogo" alt="Logo" border="0" align="top"></a></font></div></td>
        <td width="7%"><div align="left"><font color="#FFFFFF"></font></div></td>
        <td width="72%"><div align="left">
          <table width="100%" border="0" cellspacing="0" cellpadding="0" name="menu">
            <tr>
              <td width="15"><div align="center"><font face="Arial, Helvetica, sans-serif"><b><font color="#666666"><font size="3">Inicio</font></font></b></font></div></td>
              <td width="17%"><div align="center"><font face="Arial, Helvetica, sans-serif"><b><font color="#666666"><font size="3">Buscar</font></font></b></font></div></td>
              <td width="19%"><div align="center"><font face="Arial, Helvetica, sans-serif"><b><font color="#666666"><font size="3">Reportar 
                un producto</font></font></b></font></div></td>
              <td width="17%"><div align="center"><font face="Arial, Helvetica, sans-serif"><b><font color="#666666"><font size="3">Descargas</font></font></b></font></div></td>
              <td width="17%"><div align="center"><font face="Arial, Helvetica, sans-serif"><b><font color="#666666"><font size="3">Colaboradores</font></font></b></font></div></td>
              <td width="15%"><div align="center"><font face="Arial, Helvetica, sans-serif"><b><font color="#666666"><font size="3">Metodolog&iacute;a</font></font></b></font></div></td>
            </tr>
          </table>
        </div></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="0">
  <tr>
    <td bgcolor="#FFFFFF" height="34"><div align="center"><font size="4" face="Verdana, Arial, Helvetica, sans-serif" color="#333333">Explore la informaci&oacute;n de la industria en torno a la nanotecnolog&iacute;a en</font> <img src="../images/colombia_letters.png" width="113" height="19" alt="Colombia" align="texttop"></div></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF" height="34"><div align="center"><font face="Arial, Helvetica, sans-serif" size="3" color="#333333">Realice 
      su b&uacute;squeda por empresas, ciudades, sectores econ&oacute;micos, 
      clasificaci&oacute;n de productos</font></div></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><div align="center">
      <table width="100%" border="0" cellpadding="2" align="center" name="searchPption">
        <tr>
          <td><div align="center"><font color="#003366" size="2" face="Arial, Helvetica, sans-serif"><b>Volver 
            a la b&uacute;squeda inicial</b></font></div></td>
          <td><div align="center"><font color="#003366" size="2" face="Arial, Helvetica, sans-serif"><b>Buscar 
            por mapa</b></font></div></td>
          <td><div align="center"><font color="#003366" size="2" face="Arial, Helvetica, sans-serif"><b><a href="manage_posts.php">Ver toda la base de datos</a></b></font></div></td>
        </tr>
      </table>
      <font color="#003366" size="2" face="Arial, Helvetica, sans-serif"></font></div></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tbody>
        <tr>
          <th width="20%" bgcolor="#C8C8C8" style="font-size: 12px" scope="col">Date</th>
          <th width="60%" bgcolor="#C8C8C8" style="font-size: 12px" scope="col">Title</th>
          <th width="10%" bgcolor="#C8C8C8" style="font-size: 12px" scope="col">&nbsp;</th>
          <th width="10%" bgcolor="#C8C8C8" style="font-size: 12px" scope="col">&nbsp;</th>
        </tr>
        <?php do { ?>
        <tr>
          <td style="font-size: 12px"><?php echo $row_getPosts['updated']; ?></td>
          <td style="font-size: 12px"><?php echo $row_getPosts['title']; ?></td>
          <td style="font-size: 12px"><a href="update_post.php?post_id=<?php echo $row_getPosts['post_id']; ?>">EDIT</a></td>
          <td style="font-size: 12px"><a href="delete_post.php?post_id=<?php echo $row_getPosts['post_id']; ?>">DELETE</a></td>
        </tr>
        <?php } while ($row_getPosts = mysql_fetch_assoc($getPosts)); ?>
      </tbody>
    </table></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#FFFFFF"><font color="#003366" size="2" face="Arial, Helvetica, sans-serif"><a href="<?php printf("%s?pageNum_getPosts=%d%s", $currentPage, 0, $queryString_getPosts); ?>"><strong>Primero</strong></a> <strong><a href="<?php printf("%s?pageNum_getPosts=%d%s", $currentPage, max(0, $pageNum_getPosts - 1), $queryString_getPosts); ?>">Anterior</a> <a href="<?php printf("%s?pageNum_getPosts=%d%s", $currentPage, min($totalPages_getPosts, $pageNum_getPosts + 1), $queryString_getPosts); ?>">Siguiente</a> <a href="<?php printf("%s?pageNum_getPosts=%d%s", $currentPage, $totalPages_getPosts, $queryString_getPosts); ?>" style="font-size: 12px">Último</a></strong></font></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
</table>
<h1>&nbsp;</h1>
<h1>Manage Posts</h1>
<p><a href="index.php">Admin menu</a></p>
<p><a href="add_post.php">Add new post</a></p>
<h5>&nbsp;</h5>
</body>
</html>
<?php
mysql_free_result($getPosts);
?>
