<?php include "config.php"; ?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cetak Laporan</title>
<style type="text/css">
body { font-size : 12pt; padding: 0 20px 0 20px; margin: 0px auto 0px auto;}
table.gridtable {font-size:12pt;border-width: 1px;border-color: #000000;border-collapse: collapse;width:100%;}
table.gridtable th {background-color: #000000;border: 1px solid #000000; padding: 6px 0 6px 0; color:#FFFFFF;}
table.gridtable td {border-width: 1px;padding: 4px;border-style: solid;border-color: #000000;}

</style>
</head>

<body onload="javascript:window.print()">
<?php 

if(isset($_GET['cetak'])){ 
	if(file_exists($_GET['cetak'].".php")) {	
		require_once($_GET['cetak'].".php"); 
	} else {
		echo "File tidak ditemukan!";
	}
}
?>
</body>
</html>
