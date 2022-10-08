<?php 
if (isset($_POST['year-issn-text'])) {
	$parameter = $_POST['year-issn-text']; 
}
else $parameter = "Girilmedi";
$len= strlen ($parameter);
$issn="";
$year = "0000";
$issn="xxxx-xxxx";
$quartile = "";
if (strlen($parameter) == 14) {
	$issn = substr ($parameter,-9);
	$year = substr ($parameter,0,4);
	$db= new SQLite3("database.db");
	$stmt = $db->prepare('select * from quartile where year= :year and issn= :issn OR eissn= :issn');
	$stmt->bindValue(':year',$year,SQLITE3_TEXT);
	$stmt->bindValue(':issn',$issn,SQLITE3_TEXT);
	$result = $stmt->execute();
	if (!$result->fetchArray()) // false means, no result from query
		$quartile="??";
	else	{ 
	$result->reset(); // go to first row of result again
	$row = $result->fetchArray(); // gets only first result, database has unique constraint on year, issn, eissn
	$quartile = $row["quartile"];
	}
}
// echo statement used below to be able to display variable values of $year, $issn, $quartile
echo <<<_END
<!DOCTYPE html>
<!-- Bu yazılım Dr. Zafer Akçalı tarafından oluşturulmuştur -->
<!-- Programmed by Zafer Akçalı, MD-->
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Yıl ve issn numarasıyla WOS Q değeri</title>
</head>
<body>
<form method="post" action="index.php">
Year: $year issn/eissn: $issn Quartile: $quartile <br/>
Enter year,issn/eissn (14 characters) below box<br/>
<input type="text" name="year-issn-text" size="14" maxlength="14" id="year-issn">
<input type="submit"> <button onclick="document.getElementById('year-issn').value=''">Sil</button>
</form>
</body>
</html>
_END;
?>