<?php
	require "database.php";
   
	$pk = $_GET['pk'];
	
	// prepare and bind
	$stmt = $db->prepare("SELECT * FROM tb_pajak WHERE pk=?");
	$stmt->bind_param("s", $pk);	
	$stmt->execute();

	$stmt->bind_result($pk, $pemilik, $rowktp, $rowstnk, $rowbpkb, $rowscktp, $rowscstnk, $rowscbpkb);
	
	$result = null;
	while ($stmt->fetch()) {
		$result[] = array(
            'pk' => $pk,
            'pemilik' => $pemilik,
			'ktp' => $rowktp,
            'stnk' => $rowstnk,
            'bpkb' => $rowbpkb,
            'scktp' => $rowscktp,
            'scstnk' => $rowscstnk,
            'scbpkb' => $rowscbpkb,
		);
	}
	$stmt->close();
	$db->close();
	$result = json_encode($result);
	echo $result;
?>