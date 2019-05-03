<link rel="stylesheet" href="css/bootstrap.min.css">
<?php 
include 'admin/kjn.php';
	$id_terdakwa = $_POST['id'];
	$show = mysqli_query($conn,"SELECT * FROM koderak
            JOIN terdakwa ON koderak.id_terdakwa = terdakwa.id_terdakwa 
            JOIN saksi ON koderak.id_terdakwa = saksi.id_terdakwa
            WHERE terdakwa.id_terdakwa='$id_terdakwa'");
		$data = mysqli_fetch_assoc($show);{
		$nama 		= $data['nama'];
		$koderak 	= $data['koderak'];
		$noper		= $data['noper'];
		$noput		= $data['noput'];
		$umur		= $data['umur'];
		$tempat		= $data['tempat'];
		$ttl		= $data['ttl'];
		$jk			= $data['jk'];
		$kebangsaan	= $data['kebangsaan'];
		$tempating	= $data['tempating'];
		$agama		= $data['agama'];
		$pekerjaan	= $data['pekerjaan'];
		$saksi		= nl2br(stripslashes($data['saksi_saksi']));
	
	echo "<center>";
	echo "<table class=\"table table-bordered\">";
	echo "	<tr>";
	echo "		<th align=\"left\">Nama</th>";
	echo "		<td><center>:</center></td>";
	echo "		<td align=\"left\" colspan=5><b>$nama</b></td>";		
	echo "	</tr>";

	echo "	<tr>";
	echo "		<th align=\"left\">Tempat Lahir </th>";
	echo "		<td><center>:</center></td>";
	echo "		<td align=\"left\" colspan=5>$tempat</td>";
	
	echo "	</tr>";
	
	echo "	<tr>";
	echo "		<th align=\"left\">Tanggal Tahun Lahir</th>";
	echo "		<td><center>:</center></td>";
	echo "		<td align=\"left\" colspan=5>$ttl</td>";
	echo "	</tr>";
	
	echo "	<tr>";
	echo "		<th align=\"left\">Umur </th>";
	echo "		<td><center>:</center></td>";
	echo "		<td align=\"left\" colspan=5>$umur</td>";
	echo "	</tr>";
	
	echo "	<tr>";
	echo "		<th align=\"left\">Jenis Kelamin </th>";
	echo "		<td><center>:</center></td>";
	echo "		<td align=\"left\" colspan=5>$jk</td>";
	echo "	</tr>";
	
	echo "	<tr>";
	echo "		<th align=\"left\">Kebangsaan </th>";
	echo "		<td><center>:</center></td>";
	echo "		<td align=\"left\" colspan=5>$kebangsaan</td>";
	echo "	</tr>";
	
	echo "	<tr>";
	echo "		<th align=\"left\">Tempat Tinggal </th>";
	echo "		<td><center>:</center></td>";
	echo "		<td align=\"left\" colspan=5>$tempating</td>";
	echo "	</tr>";

	echo "	<tr>";
	echo "		<th align=\"left\">Agama </th>";
	echo "		<td><center>:</center></td>";
	echo "		<td align=\"left\" colspan=5>$agama</td>";
	echo "	</tr>";

	echo "	<tr>";
	echo "		<th align=\"left\">Pekerjaan </th>";
	echo "		<td><center>:</center></td>";
	echo "		<td align=\"left\" colspan=5>$pekerjaan</td>";
	echo "	</tr>";

	echo "	<tr>";
	echo "		<th align=\"left\">Nomor Perkara </th>";
	echo "		<td><center>:</center></td>";
	echo "		<td align=\"left\" colspan=5>$noper</td>";
	echo "	</tr>";

	echo "	<tr>";
	echo "		<th align=\"left\">Nomor Putusan </th>";
	echo "		<td><center>:</center></td>";
	echo "		<td align=\"left\" colspan=5>$noput</td>";
	echo "	</tr>";

	echo "	<tr>";
	echo "		<th align=\"left\">Saksi - saksi </th>";
	echo "		<td><center>:</center></td>";
	echo "		<td align=\"left\" colspan=5>$saksi</td>";
	echo "	</tr>";
	
	echo "	</table>";
	echo "</center>";
	}
?>
