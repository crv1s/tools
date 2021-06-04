<?php 
	
	$xml = new SimpleXMLElement("scans/ip-slayer-scan.xml", 0, true);
	
	function random_color_part() 
	{
    	return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
	}
	function random_color() 
	{
    	return random_color_part() . random_color_part() . random_color_part();
	}
	
	date_default_timezone_set('America/Santiago');
	$fecha_hora=date('d-m-Y - H:i:s')
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Informe Puertos Abiertos</title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link href='https://fonts.googleapis.com/css?family=Grandstander' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Happy Monkey' rel='stylesheet'>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
  $( function() {
    $( "#accordion" ).accordion();
  } );
</script>
<style type="text/css">
#h3{
	font-family: "Happy Monkey";
}
.fuente_titulos {
	font-family: "Happy Monkey";
	font-size: 12px;
	font-weight: bold;
	color: #666;
}
div {
    height: 350px;
}
.fuente_protocolo {
	font-family: "Happy Monkey";
	font-size: 12px;
	font-weight: bold;
	color: #036;
}
.fuente_estado_verde {
	font-family: "Happy Monkey";
	font-size: 14px;
	font-weight: bold;
	color: #090;
}
.fuente_textos {
	font-family: "Happy Monkey";
	font-size: 12px;
	color: #666;
}
.titulo_informe {
	font-family: "Grandstander";
	font-size: 35px;
	font-weight: bold;
	text-transform: uppercase;
	color: #00c281;
	text-align: center;
}
#puerto
{
	width: 40px;
	height: 40px;
	-moz-border-radius: 50%;
	-webkit-border-radius: 50%;
	border-radius: 50%;
	display: flex;
    justify-content: center;
    align-items: center;
	font-family: "Happy Monkey";
	font-size: 16px;
	color: #FFF;
		
}
body {
	background-image: url("imagenes/background_one.gif");
	background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: 1500px 900px;
}
#title{
	margin-top: 30px;
	color: white;
	text-shadow: 4px 4px 4px #000000;
}

</style>
</head>
<body>
<table id="title" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="imagenes/logois.png" width="180" /></td>
    <td><center><span class="titulo_informe">INFORME DE VULNERABILIDAD<br /><?php echo $fecha_hora;?></span></center></td>
  </tr>
</table>
<br /><br />
<div id="accordion">
  <?php
	foreach($xml->host as $datos) 
	{
		?>
  <h3><?php echo "Dirección IP :<b>".$datos->address['addr']."</b> | Nombre del Equipo :<b>".$datos->hostnames->hostname['name']."</b>";?></h3>
    <div>
    <?php
  		foreach($datos->ports->port as $pt) 
    	{
			?>
    <table border="0" cellspacing="5" cellpadding="0">
      <tr>
	    <td width="40" height="40" rowspan="2" class="fuente_titulos"><div id="puerto" style="background-color:#<?php echo random_color();?>"><?php echo $pt['portid'];?></div></td>
        <td class="fuente_titulos">Puerto : </td>
        <td class="fuente_protocolo"><?php echo $pt['portid'];?></td>
        <td class="fuente_titulos">Protocolo :</td>
        <td class="fuente_protocolo"><?php echo strtoupper($pt['protocol']);?></td>
        <td class="fuente_titulos">Estado :</td>
        <td class="fuente_estado_verde"><?php echo strtoupper($pt->state['state']);?></td>
      </tr>
      <tr>
      	<td class="fuente_titulos">Servicio : </td>
        <td class="fuente_protocolo"><?php echo strtoupper($pt->service['name']);?></td>
        <td class="fuente_titulos">Producto :</td>
        <td class="fuente_protocolo"><?php echo strtoupper($pt->service['product']);?></td>
        <td class="fuente_titulos">Versión :</td>
        <td class="fuente_protocolo"><?php echo strtoupper($pt->service['version']);?></td>
      </tr>
    </table>
    <hr>
        <?php
		}
		?>
  </div>
  <?php 
	}
?>
</div>
</body>
</html>