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

$colname_Recordsetnano1 = "-1";
if (isset($_GET['post_id'])) {
  $colname_Recordsetnano1 = $_GET['post_id'];
}
mysql_select_db($database_check_nano, $check_nano);
$query_Recordsetnano1 = sprintf("SELECT id_company, vat, name, address, phone, CIUU_code, security_protocols, num_protocols, patents, num_patents, `size`, final_product, country, `state`, city, ISIC_section, ISIC_division, ISIC_group, international_HQ, interna_HQ_address, university_info, nanoscalematerials, nanointermediates, nanofinalproduct, tools_equipment, researchDevelop, website FROM nano_colombia WHERE id_company = %s", GetSQLValueString($colname_Recordsetnano1, "int"));
$Recordsetnano1 = mysql_query($query_Recordsetnano1, $check_nano) or die(mysql_error());
$row_Recordsetnano1 = mysql_fetch_assoc($Recordsetnano1);
$totalRows_Recordsetnano1 = mysql_num_rows($Recordsetnano1);

$colname_Recordset1 = "-1";
if (isset($_GET['id_company'])) {
  $colname_Recordset1 = $_GET['id_company'];
}
mysql_select_db($database_check_nano, $check_nano);
$query_Recordset1 = sprintf("SELECT id_company, name, ISIC_group FROM nano_colombia WHERE id_company = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $check_nano) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$colname_Recordset1 = "-1";

mysql_select_db($database_check_nano, $check_nano);
$query_Recordset1 = sprintf("SELECT * FROM nano_colombia WHERE id_company = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $check_nano) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Nanotechnology - Colombia - Company information</title>
<link href="styles/admin.css" rel="stylesheet" type="text/css">
<style type="text/css">
body {
	background-image: url(images/Background_light.jpg);
}
</style>
</head>

<body>
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
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <th scope="col">&nbsp;</th>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF"><p><font face="Arial, Helvetica, sans-serif" size="3" color="#333333">Complete Information of the company / Información completa de la empresa</font></p>
        <hr>
      <p><font color="#333333" size="3" face="Arial, Helvetica, sans-serif"></font></p></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="0" cellspacing="0" id="company_info">
        <tbody>
          <tr>
            <th width="30%" align="left" scope="col"><strong>Company /Empresa</strong></th>
            <th width="40%" align="left" scope="col"><strong>Product / Producto</strong></th>
            <th width="30%" align="left" scope="col"><strong>Website / Página web</strong></th>
          </tr>
          <tr>
            <td align="left" style="font-size: 12px"><?php echo $row_Recordsetnano1['name']; ?></td>
            <td align="left" style="font-size: 12px"><?php echo $row_Recordsetnano1['final_product']; ?></td>

            <td align="left" style="font-size: 12px"><a href="<?php echo $row_Recordsetnano1['website'];?>" target="_blank"><?php echo $row_Recordsetnano1['website'];?></a>
          </tr>
          <tr>
            <td align="left"><strong>Country /País</strong></td>
            <td align="left"><strong>ISIC Section / Sección ISIC</strong></td>
            <td align="left"><strong>Product classification / Clasificación de producto</strong></td>
          </tr>
          <tr>
            <td align="left" style="font-size: 12px"><?php echo $row_Recordsetnano1['country']; ?></td>
            <td align="left" style="font-size: 12px"><?php echo $row_Recordsetnano1['ISIC_section']; ?></td>
            <td rowspan="5" align="left"><table width="100%" border="0" cellpadding="0" cellspacing="0" id="product_type">
              <tbody>
                <tr>
                  <td width="120" scope="col" style="font-size: 12px">nano scale material</td>
                  <td width="20" align="left" style="text-align: left" scope="col"><?php if($row_Recordsetnano1['nanoscalematerials']==1){ echo('<img src="images/check.jpg" width="19" height="19" alt="Check" align="texttop">');} ?></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td width="120" scope="col" style="font-size: 12px">nano intermediate</td>
                  <td width="20" align="left" style="text-align: left"><?php if($row_Recordsetnano1['nanointermediates']==1){ echo('<img src="images/check.jpg" width="19" height="19" alt="Check" align="texttop">');} ?></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td width="120" scope="col" style="font-size: 12px">nano final product</td>
                  <td width="20" align="left" style="text-align: left"><?php if($row_Recordsetnano1['nanofinalproduct']==1){ echo('<img src="images/check.jpg" width="19" height="19" alt="Check" align="texttop">');} ?></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td width="120" scope="col" style="font-size: 12px">tools / equipment</td>
                  <td width="20" align="left" style="text-align: left"><?php if($row_Recordsetnano1['tools_equipment']==1){ echo('<img src="images/check.jpg" width="19" height="19" alt="Check" align="texttop">');} ?></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td width="120" scope="col" style="font-size: 12px">R&amp;D</td>
                  <td width="20" align="left" style="text-align: left"><?php if($row_Recordsetnano1['researchDevelop']==1){ echo('<img src="images/check.jpg" width="19" height="19" alt="Check" align="texttop">');} ?></td>
                  <td>&nbsp;</td>
                </tr>
              </tbody>
            </table></td>
          </tr>
          <tr>
            <td align="left"><strong>State / Departamento</strong></td>
            <td align="left"><strong>ISIC Division / División ISIC </strong></td>
          </tr>
          <tr>
            <td align="left" style="font-size: 12px"><?php echo $row_Recordsetnano1['state']; ?></td>
            <td rowspan="2" align="left" style="font-size: 12px"><?php echo $row_Recordsetnano1['ISIC_division']; ?></td>
          </tr>
          <tr>
            <td align="left"><strong>City / Ciudad</strong></td>
          </tr>
          <tr>
            <td align="left" style="font-size: 12px"><?php echo $row_Recordsetnano1['city']; ?></td>
            <td align="left"><strong>ISIC group / Grupo ISIC</strong></td>
          </tr>
          <tr>
            <td align="left"><strong>Address / Dirección</strong></td>
            <td rowspan="3" align="left" style="font-size: 12px"><?php echo $row_Recordsetnano1['ISIC_group']; ?></td>
            <td align="left"><strong>Patents / Patentes</strong></td>
          </tr>
          <tr>
            <td align="left" style="font-size: 12px"><?php echo $row_Recordsetnano1['address']; ?></td>
            <td align="left"><table width="100%" border="0" cellpadding="0" cellspacing="0" id="patents">
              <tbody>
                <tr>
                  <td width="120" scope="col" style="font-size: 12px"><em>Patents:</em></td>
                  <td width="20" style="font-size: 12px" scope="col"><?php if($row_Recordsetnano1['patents']==1){ echo('<img src="images/check.jpg" width="19" height="19" alt="Check" align="texttop">');} ?></td>
                  <td>&nbsp;</td>
                  <td width="40" scope="col" style="font-size: 12px"><em>Nº:</em></td>
                  <td width="30" style="font-size: 12px" scope="col"><?php echo $row_Recordsetnano1['num_patents']; ?></td>
                  <td>&nbsp;</td>
                </tr>
              </tbody>
            </table></td>
          </tr>
          <tr>
            <td align="left"><strong>Phone / Teléfono</strong></td>
            <td align="left"><strong>Security protocols / Protocolos de segunridad</strong></td>
          </tr>
          <tr>
            <td align="left" style="font-size: 12px"><?php echo $row_Recordsetnano1['phone']; ?></td>
            <td align="left"><strong>National commerce code / Código CIIU </strong></td>
            <td align="left"><table width="100%" border="0" cellpadding="0" cellspacing="0" id="protocols">
              <tbody>
                <tr>
                  <td width="120" scope="col" style="font-size: 12px"><em>Protocols:</em></td>
                  <td width="20" style="font-size: 12px" scope="col"><?php if($row_Recordsetnano1['security_protocols']==1){ echo('<img src="images/check.jpg" width="19" height="19" alt="Check" align="texttop">');} ?></td>
                  <td>&nbsp;</td>
                  <td width="40" scope="col" style="font-size: 12px"><em>Nº:</em></td>
                  <td width="30" style="text-align: left; font-size: 12px;" scope="col"><?php echo $row_Recordsetnano1['num_protocols']; ?></td>
                  <td>&nbsp;</td>
                </tr>
              </tbody>
            </table></td>
          </tr>
          <tr>
            <td align="left"><strong>VAT / NIT / NIF</strong></td>
            <td rowspan="4" align="left" style="font-size: 12px"><?php echo $row_Recordsetnano1['CIUU_code']; ?></td>
            <td align="left"><strong>International HQ/ Base internacional</strong></td>
          </tr>
          <tr>
            <td align="left" style="font-size: 12px"><?php echo $row_Recordsetnano1['vat']; ?></td>
            <td align="left"><table width="100%" border="0" cellpadding="0" cellspacing="0" id="HQ">
              <tbody>
                <tr>
                  <td width="120" scope="col" style="font-size: 12px"><em>International HQ:</em></td>
                  <td width="20" style="font-size: 12px" scope="col"><?php if($row_Recordsetnano1['international_HQ']==1){ echo('<img src="images/check.jpg" width="19" height="19" alt="Check" align="texttop">');} ?></td>
                  <td>&nbsp;</td>
                  <td scope="col" style="font-size: 12px"><em>Location:</em></td>
                  <td width="30%" style="text-align: left; font-size: 12px;" scope="col"><?php echo $row_Recordsetnano1['interna_HQ_address']; ?></td>
                </tr>
              </tbody>
            </table></td>
          </tr>
          <tr>
            <td align="left"><strong>Size of the company / Tamaño de la empresa</strong></td>
            <td align="left"><strong>Allied University / Universidad Aliada</strong></td>
          </tr>
          <tr>
            <td align="left" style="font-size: 12px"><?php echo $row_Recordsetnano1['size']; ?></td>
            <td align="left" style="font-size: 12px"><?php echo $row_Recordsetnano1['university_info']; ?></td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
  </tbody>
</table>
<h1>&nbsp;</h1>
</body>
</html>
<?php
mysql_free_result($Recordsetnano1);
?>
