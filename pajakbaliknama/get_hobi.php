<?php
	require "database.php";
   
	$nama = $_POST['nama'];
	
	// prepare and bind
	
	$query = "SELECT * FROM tb_pajak WHERE pk = '".$nama."'";
	$result = mysqli_query($db, $query);
	$output='';

	if(mysqli_num_rows($result) > 0)
	{
		$output .= '<div class="table-responsive">
						<table class="table table bordered">
							<tr>
								<th>PK</th>
								<th>Nama</th>
								<th>Nomor KTP</th>
								<th>Nomor STNK</th>
								<th>Nomor BPKB</th>
								<th>Scan KTP</th>
								<th>Scan STNK</th>
								<th>Scan BPKB</th>
								<th>Scan Action</th>
							</tr>';
		while($row = mysqli_fetch_array($result))
		{
			$link_update ="<button type='button' class='updateData'>Update</button>";
			$output .= '
				<tr>
					<td>'.$row["pk"].'</td>
					<td>'.$row['pemilik'].'</td>
					<td>'.$row['ktp'].'</td>
					<td>'.$row['stnk'].'</td>
					<td>'.$row['bpkb'].'</td>
					<td>'.$row['scktp'].'</td>
					<td>'.$row['scstnk'].'</td>
					<td>'.$row['scbpkb'].'</td>
					<td>'.$link_update.'</td>
				</tr>
			';
		}
	
		$output .='</table></div>';
	}
	else{
		$output = "no data";
	}
	
	echo $output;

	$db->close();
?>