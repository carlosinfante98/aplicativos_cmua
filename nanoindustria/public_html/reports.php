<?php require_once('Connections/check_nano.php'); 
				
					// Search code
					mysql_select_db($database_check_nano, $check_nano);
					// Search for value in the search box
					if (isset($_POST['search_text'])) 
					{
  						$searchword = $_POST['search_text'];
						$query_Recordernano1 = "nano_colombia WHERE name LIKE '%".$searchword."%' OR final_product LIKE '%".$searchword."%' OR country LIKE '%".$searchword."%' OR city LIKE '%".$searchword."%' OR ISIC_group LIKE '%".$searchword."%' ";
					}
					// Search for all records, if search box is empty
					else
					{
						$query_Recordernano1 = "nano_colombia";	
					}

?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Nanotechnology - Colombia - Reports</title>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<style type="text/css">
${demo.css}
		body {
	background-image: url(images/Background_light.jpg);
	text-align: left;
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

<!-- Start of report products -->
<script type="text/javascript">
$(function () {
    $('#products').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: 'Distribution by Type of products'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Distribution',
            data: [
				
				<?php
				
								
					// creates the search SQL command
					$query_limit_Recordernano1 = sprintf("SELECT * FROM %s",$query_Recordernano1);
					// Search in sql according to searchtext in search box
					$result = mysql_query($query_limit_Recordernano1, $check_nano);

					$total_nanoscale=0;
					$total_nanointermediates=0;
					$total_nanofinal=0;
					$total_tools=0;
					$total_research=0;
		  
		  			while($row=mysql_fetch_array($result))
					{ 
						if($row['nanoscalematerials']==1)
						{
							$total_nanoscale++;
						}
						if($row['nanointermediates']==1)
						{
							$total_nanointermediates++;
						}
						if($row['nanofinalproduct']==1)
						{
							$total_nanofinal++;
						}
						if($row['tools_equipment']==1)
						{
							$total_tools++;
						}	
						if($row['researchDevelop']==1)
						{
							$total_research++;
						}								
						
					}
						
				?>
					
					['nanoscale materials',  <?php echo($total_nanoscale); ?>],
					['nano intermediates',  <?php echo($total_nanointermediates); ?>],
					['nano final product',  <?php echo($total_nanofinal); ?>],
					['Tools and Equipment',  <?php echo($total_tools); ?>],
					['Research and Development',  <?php echo($total_research); ?>],
				
				
            ]
        }]
    });
});
</script>

<!-- End of report --> 

<!-- Start of report country -->                
<script type="text/javascript">
$(function () {
    $('#country').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: 'Distribution by Countries'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Distribution',
            data: [
				
				  	<?php

					// creates the search SQL command
					// Set this up for each search SQL table-column
					$searchvar="country";
					$query_limit_Recordernano1 = sprintf("SELECT COUNT(id_company), %s FROM %s GROUP BY %s ORDER BY COUNT(id_company) DESC",$searchvar,$query_Recordernano1,$searchvar);
					// Search in sql according to searchtext in search box
					$result = mysql_query($query_limit_Recordernano1, $check_nano) or die(mysql_error());	

					$tags=1;
					$items=0;
		  
		  			while($row=mysql_fetch_array($result))
					{ 
					?>
						['<?php echo($row[$tags]); ?>',  <?php echo($row[$items]); ?>],
					<?php
					}
					?>				
            ]
        }]
    });
});

</script>
<!-- End of report --> 

<!-- Start of report city -->                
<script type="text/javascript">
$(function () {
    $('#city').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: 'Distribution by Cities'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Distribution',
            data: [
				
				  	<?php
				
					// creates the search SQL command
					// Set this up for each search SQL table-column
					$searchvar="city";
					$query_limit_Recordernano1 = sprintf("SELECT COUNT(id_company), %s FROM %s GROUP BY %s ORDER BY COUNT(id_company) DESC",$searchvar,$query_Recordernano1,$searchvar);
					// Search in sql according to searchtext in search box
					$result = mysql_query($query_limit_Recordernano1, $check_nano) or die(mysql_error());	

					$tags=1;
					$items=0;
		  
		  			while($row=mysql_fetch_array($result))
					{ 
					?>
						['<?php echo($row[$tags]); ?>',  <?php echo($row[$items]); ?>],
					<?php
					}
					?>				
            ]
        }]
    });
});

</script>
<!-- End of report --> 

<!-- Start of report ISIC Section -->                
<script type="text/javascript">
$(function () {
    $('#ISIC_section').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: 'Distribution by ISIC Sections'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Distribution',
            data: [
				
				  	<?php
				
					// creates the search SQL command
					// Set this up for each search SQL table-column
					$searchvar="ISIC_section";
					$query_limit_Recordernano1 = sprintf("SELECT COUNT(id_company), %s FROM %s GROUP BY %s ORDER BY COUNT(id_company) DESC",$searchvar,$query_Recordernano1,$searchvar);
					// Search in sql according to searchtext in search box
					$result = mysql_query($query_limit_Recordernano1, $check_nano) or die(mysql_error());	

					$tags=1;
					$items=0;
		  
		  			while($row=mysql_fetch_array($result))
					{ 
					?>
						['<?php echo($row[$tags]); ?>',  <?php echo($row[$items]); ?>],
					<?php
					}
					?>				
            ]
        }]
    });
});

</script>
<!-- End of report --> 


<!-- Start of report ISIC Division -->   
<script type="text/javascript">
$(function () {
    $('#ISIC_division').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Distribution by ISIC Divisions'
        },
        subtitle: {
            text: 'ISIC group distribution'
        },
        xAxis: {
            type: 'category',
            labels: {
                rotation: -25,
                style: {
                    fontSize: '8px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: '% companies'
            }
        },
        legend: {
            enabled: false
        },
        tooltip: {
            pointFormat: 'ISIC group'
        },
        series: [{
            name: 'Distribution',
            data: [
				
				  	<?php
				
					// creates the search SQL command
					// Set this up for each search SQL table-column
					$searchvar="ISIC_division";
					$query_limit_Recordernano1 = sprintf("SELECT COUNT(id_company), %s FROM %s GROUP BY %s ORDER BY COUNT(id_company) DESC",$searchvar,$query_Recordernano1,$searchvar);
					// Search in sql according to searchtext in search box
					$result = mysql_query($query_limit_Recordernano1, $check_nano) or die(mysql_error());	

					// Determine the total elements to generate the percentages	
					$sum=0;
					while($row=mysql_fetch_array($result))
					{
						$sum = $sum + $row[$items];
					}
				
					$tags=1;
					$items=0;
					$result = mysql_query($query_limit_Recordernano1, $check_nano) or die(mysql_error());
		  
		  			while($row=mysql_fetch_array($result))
					{ 
					?>
						['<?php echo($row[$tags]); ?>',  <?php echo($row[$items]*100/$sum); ?>],
					<?php
					}
					?>					
                ],
            dataLabels: {
                enabled: true,
                rotation: 0,
                color: '#000000',
                align: 'center',
                format: '{point.y:.1f}', // one decimal
                y: 3, // 10 pixels down from the top
                style: {
                    fontSize: '14px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        }]
    });
});
</script>           								
<!-- End of report --> 
	
<!-- Start of report ISIC Group -->   
<script type="text/javascript">
$(function () {
    $('#ISIC_group').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Distribution by ISIC Groups'
        },
        subtitle: {
            text: 'ISIC group distribution'
        },
        xAxis: {
            type: 'category',
            labels: {
                rotation: -25,
                style: {
                    fontSize: '8px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: '% companies'
            }
        },
        legend: {
            enabled: false
        },
        tooltip: {
            pointFormat: 'ISIC group'
        },
        series: [{
            name: 'Distribution',
            data: [
				
				  	<?php

					// creates the search SQL command
					// Set this up for each search SQL table-column
					$searchvar="ISIC_group";
					$query_limit_Recordernano1 = sprintf("SELECT COUNT(id_company), %s FROM %s GROUP BY %s ORDER BY COUNT(id_company) DESC",$searchvar,$query_Recordernano1,$searchvar);
					// Search in sql according to searchtext in search box
					$result = mysql_query($query_limit_Recordernano1, $check_nano) or die(mysql_error());	
				
					// Determine the total elements to generate the percentages	
					$sum=0;
					while($row=mysql_fetch_array($result))
					{
						$sum = $sum + $row[$items];
					}
				
					$tags=1;
					$items=0;
					$result = mysql_query($query_limit_Recordernano1, $check_nano) or die(mysql_error());
		  
		  			while($row=mysql_fetch_array($result))
					{ 
					?>
						['<?php echo($row[$tags]); ?>',  <?php echo($row[$items]*100/$sum); ?>],
					<?php
					}
					?>				
                ],
            dataLabels: {
                enabled: true,
                rotation: 0,
                color: '#000000',
                align: 'center',
                format: '{point.y:.1f}', // one decimal
                y: 3, // 10 pixels down from the top
                style: {
                    fontSize: '14px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        }]
    });
});
</script>           								
<!-- End of report --> 	

	</head>
	<body>
<script src="charts/js/highcharts.js"></script>
<script src="charts/js/modules/exporting.js"></script>

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
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" id="content">
  <tbody>
    <tr>
      <th bgcolor="#FFFFFF" scope="col">
      </th>
    </tr>
    <tr>     
      <th align="right" bgcolor="#FFFFFF" scope="col">
      <table width="100%">
      	<tr>
      		<td width="5%">&nbsp;</td>
      		<td width="10%">&nbsp;</td>
      		<td>&nbsp;</td>
      		<td width="40%" align="right"><br><form method="post" action="search_nano.php">
    			<input type="hidden" name="search_text" value="<?php echo($searchword); ?>">
       			<input type="submit" name="submit" id="submit" value="Return to previous search / Volver a la búsqueda anterior"  class="otherbutton">
			</form><br></td>
      		<td width="5%">&nbsp;</td>
      	</tr>
      </table>
	</th>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF"><div id="products" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div></td>
    </tr>
    <tr>
      <th align="left" bgcolor="#FFFFFF" style="text-align: left"><hr></th>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF"><div id="country" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div></td>
    </tr>
    <tr>
      <th align="left" bgcolor="#FFFFFF" style="text-align: left"><hr></th>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF"><div id="city" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div></td>
    </tr>
    <tr>
      <th align="left" bgcolor="#FFFFFF" style="text-align: left"><hr></th>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF"><div id="ISIC_section" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div></td>
    </tr>
    <tr>
      <th align="left" bgcolor="#FFFFFF"><hr></th>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF"><div id="ISIC_division" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div></td>
    </tr>
    <tr>
      <th align="left" bgcolor="#FFFFFF"><hr></th>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF"><div id="ISIC_group" style="min-width: 310px; height: 600px; max-width: 600px; margin: 0 auto"></div></td>
    </tr>
    <tr>
      <th align="left" bgcolor="#FFFFFF"><hr></th>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
  </tbody>
</table>
	</body>
</html>
