<?php require_once('Connections/check_nano.php'); ?>
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
// number of maximum items displayed
$maxRows_Recordernano1 = 1000;
$pageNum_Recordernano1 = 0;
if (isset($_GET['pageNum_Recordernano1'])) {
  $pageNum_Recordernano1 = $_GET['pageNum_Recordernano1'];
}
$startRow_Recordernano1 = $pageNum_Recordernano1 * $maxRows_Recordernano1;

$colname_Recordernano1 = "-1";


// Search code
mysql_select_db($database_check_nano, $check_nano);
// Search for value in the search box
if (isset($_POST['search_text'])) 
{
  	$searchword = $_POST['search_text'];
	$query_Recordernano1 = "SELECT * FROM nano_colombia WHERE name LIKE '%".$searchword."%' OR final_product LIKE '%".$searchword."%' OR country LIKE '%".$searchword."%' OR city LIKE '%".$searchword."%' OR ISIC_group LIKE '%".$searchword."%' ";
}
// Search for all records, if search box is empty
else
{
	$query_Recordernano1 = "SELECT * FROM nano_colombia";	
}
$query_limit_Recordernano1 = sprintf("%s LIMIT %d, %d", $query_Recordernano1, $startRow_Recordernano1, $maxRows_Recordernano1);
$Recordernano1 = mysql_query($query_limit_Recordernano1, $check_nano) or die(mysql_error());
$row_Recordernano1 = mysql_fetch_assoc($Recordernano1);

// change the number of items
$totalRows_Recordernano1 = "SELECT COUNT(id_company) FROM ".$query_Recordernano1."";
// End of the search code

if (isset($_GET['totalRows_Recordernano1'])) {
  $totalRows_Recordernano1 = $_GET['totalRows_Recordernano1'];
} else {
  $all_Recordernano1 = mysql_query($query_Recordernano1);
  $totalRows_Recordernano1 = mysql_num_rows($all_Recordernano1);
}
$totalPages_Recordernano1 = ceil($totalRows_Recordernano1/$maxRows_Recordernano1)-1;
?>
<!doctype html><html><head>
<meta charset="utf-8">
<title>Nanotechnology - Colombia - Search</title>
<link href="styles/admin.css" rel="stylesheet" type="text/css">
<style type="text/css">
body {
	background-image: url(images/Background_light.jpg);}
</style>
<style type="text/css">
.searchbutton {
    background-color: #FF8C00; /* Orange */
    border: none;
    color: white;
    padding: 10px 21px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    margin: 2px 2px;
    cursor: pointer;
    border-radius: 8px;
    font-weight: bold;
}
.otherbutton {
    background-color: #FFFFFF; /* White */
    border: none;
    color: #FF8C00; /* orange */
    padding: 6px 6px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    margin: 2px 2px;
    cursor: pointer;
    border-radius: 8px;
    font-weight: bold;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
}
.otherbutton:hover {
    background-color: #5798DA; /* Green */
    color: white;
}

</style>
</head><body>
<table width="100%" border="0" cellspacing="0" cellpadding="0" name="MainTable" align="center">
  <tr>
    <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0" name="header">
      <tr>
        <td width="21%"><div align="left"><font color="#FFFFFF"><a href="intro_nano.php"><img src="images/ColombiaNanotech.jpg" width="251" height="67" name="ColombiaLogo" alt="Logo" border="0" align="top"></a></font></div></td>
        <td width="7%"><div align="left"><font color="#FFFFFF"></font></div></td>
        <td width="72%" valign="middle">&nbsp;
          <div align="left">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" name="menu">
              <tr>
                <td width="15"><div align="center"><font face="Arial, Helvetica, sans-serif">&nbsp;</font></div></td>
                <td width="17%"><div align="center"><font face="Arial, Helvetica, sans-serif"><b><a href="intro_nano.php"><font color="#666666"><font size="3">Buscar</font></font></a></b></font></div></td>
                <td width="19%"><div align="center"><font face="Arial, Helvetica, sans-serif"><b><font color="#666666"><font size="3">Reportar 
                  un producto</font></font></b></font></div></td>
                <td width="17%"><div align="center"><font face="Arial, Helvetica, sans-serif"><b><font color="#666666"><font size="3"> Descargas</font></font></b></font></div></td>
                <td width="17%"><div align="center"><font face="Arial, Helvetica, sans-serif"><b><a href="collaborators.html"><font color="#666666"><font size="3">Colaboradores</font></font></a></b></font></div></td>
                <td width="15%"><div align="center"><font face="Arial, Helvetica, sans-serif"><b><a href="methodology.html"><font color="#666666"><font size="3">Metodolog&iacute;a</font></font></a></b></font></div></td>
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
                <td bgcolor="#FFFFFF" height="34"><br>
                  <div align="center"><font face="Arial, Helvetica, sans-serif" size="3" color="#333333">Search by companies, products, countries, cities and ISIC groups</font></div>
		  <div align="center"><font face="Arial, Helvetica, sans-serif" size="2" color="#333333">Realice 
    su b&uacute;squeda por empresas, productos, pa&iacute;ses, ciudades y grupos ISIC</font></div><br>
                </td>
              </tr>
              <tr> 
  <tr>
    <td height="34" align="center" bgcolor="#FFFFFF" style="text-align: center"><form name="search_form" id="search_form">
      <input name="search_text" type="text" id="search_text" form="search_form" size="80">
      <input name="Search" type="submit" form="search_form" formmethod="POST" value="Search / Buscar" class="searchbutton">
    </form></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><div align="center"></div></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><div align="center">
      <table width="100%" border="0" cellpadding="2" align="center" name="searchPption">
        <tr>
          <td width="50%"><div align="center">
	    <form method="post" action="search_nano.php">
    			<input type="hidden" name="search_text" value="">
       			<input type="submit" name="submit" id="submit" value="View all database / Ver toda la base de datos" class="otherbutton">
			</form>
	  </div></td>
          <td width="50%"><div align="center">
            <form method="post" action="reports.php">
    			<input type="hidden" name="search_text" value="<?php echo($searchword); ?>">
       			<input type="submit" name="submit" id="submit" value="Create Report from Search / Crear Reporte de la Búsqueda" class="otherbutton">
			</form>
          </div></td>
          </tr>
        <tr>
          <td>&nbsp; </td>
          <td>&nbsp;</td>
          </tr>
        <tr>
          <td colspan="2"><span style="scope="><font face="Arial, Helvetica, sans-serif" size="2" color="#333333"><strong>Found records / Resultados obtenidos</strong></font></span><span style="font-size: 12px; scope="><font face="Arial, Helvetica, sans-serif" size="2" color="#333333">:&nbsp; </font> <?php echo $totalRows_Recordernano1 ?> items</span></td>
        </tr>
      </table>
    <font color="#003366" size="2" face="Arial, Helvetica, sans-serif"></font></div></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">
        
          <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tbody>
              <tr>
                <th width="20%" height="23" bgcolor="#E8E8E8" style="font-size: 12px" scope="col">&nbsp;Company / Empresa</th>
                <th width="30%" height="23" bgcolor="#E8E8E8" style="font-size: 12px" scope="col">Final Product / Producto Final</th>
                <th width="15%" height="23" bgcolor="#E8E8E8" style="font-size: 12px" scope="col">Country / País</th>
                <th width="15%" height="23" bgcolor="#E8E8E8" style="font-size: 12px" scope="col">City / Ciudad</th>
                <th width="10%" height="23" bgcolor="#E8E8E8" style="font-size: 12px" scope="col">ISIC group</th>
                <th width="10%" height="23" bgcolor="#E8E8E8" style="font-size: 12px" scope="col">Extra info</th>
              </tr>
              <?php do { ?>
              <tr>
                <td align="left" valign="top" style="font-size: 12px"><?php echo $row_Recordernano1['name']; ?></td>
                <td valign="top" style="font-size: 12px"><?php echo $row_Recordernano1['final_product']; ?></td>
                <td align="center" valign="top" style="font-size: 12px"><?php echo $row_Recordernano1['country']; ?></td>
                <td align="center" valign="top" style="font-size: 12px"><?php echo $row_Recordernano1['city']; ?></td>
                <td align="center" valign="top" style="font-size: 12px"><?php echo $row_Recordernano1['ISIC_group']; ?></td>
                <td align="center" valign="top" style="font-size: 12px"><a href="detail_post.php?post_id=<?php echo $row_Recordernano1['id_company']; ?>" target="new">View / Ver</a></td>
              </tr>
              <tr>
              	<td colspan="6"><hr></td>
              </tr>
              <?php } while ($row_Recordernano1 = mysql_fetch_assoc($Recordernano1)); ?>
            </tbody>
          </table>
          
    </td>
  </tr>
  <tr>
    <td align="center" bgcolor="#FFFFFF"><table width="80%" border="0" cellpadding="0" cellspacing="0" id="navegacion">
      <tbody>
        <tr>
          <th style="font-size: 12px; color: #0200FF;" scope="col">&nbsp; </th>
          <th style="font-size: 12px" scope="col"><hr></th>
          <th style="font-size: 12px" scope="col"><hr></th>
          <th style="font-size: 12px" scope="col"><hr></th>
          <th style="font-size: 12px" scope="col"><hr></th>
          <th style="font-size: 12px; color: #0200FF;" scope="col"><hr></th>
          <th style="font-size: 12px" scope="col"><hr></th>
          </tr>       
        <tr>
          <th align="center" style="font-size: 12px; color: #0200FF;" scope="col">&nbsp;</th>
          <th width="60" align="center" style="font-size: 12px" scope="col">&nbsp;</th>
          <th width="60" align="center" style="font-size: 12px" scope="col">&nbsp;</th>
          <th width="60" align="center" style="font-size: 12px" scope="col">&nbsp;</th>
          <th width="60" align="center" style="font-size: 12px" scope="col">&nbsp;</th>
          <th align="left" style="font-size: 12px; scope="col"><font face="Arial, Helvetica, sans-serif" size="2" color="#333333">&nbsp;&nbsp;</font></th>
          </th>
          <th align="center" style="font-size: 12px" scope="col">&nbsp;</th>
          </tr>
        </tbody>
      </table></td>
    </tr>
  <tr>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
</table>
<p>&nbsp;</p>
<h5>&nbsp;</h5>
</body>
</html>
<?php
mysql_free_result($Recordernano1);
?>
