<!DOCTYPE html>
<html>
	<head>
		<title>Sertifikat</title>
	<style>
		div.barcode {
			margin: 30px 490px 0 0;
		}
		div.foto {
			margin: -110px 0 0 0;
		}
		div.tondano {
			margin: -125px 0 0 300px;
		}
		div.blnthn {
			margin: -18px 0 0 550px;
		}
		div.ketua {
			margin: 50px 0 0 500px;
		}
		div.nip {
			margin: 2px 0 0 417px;
		}
		div.kk {
			margin: 0 0 0 284px;
		}
	</style>
	<style type="text/css">
	@font-face {
	  font-family: 'Cabin';
	  font-style: normal;
	  font-weight: 400;
	  src: local('Cabin Regular'), local('Cabin-Regular'), url(font/satu.woff) format('woff');
	}
	@font-face {
	  font-family: 'Cabin';
	  font-style: normal;
	  font-weight: 700;
	  src: local('Cabin Bold'), local('Cabin-Bold'), url(font/dua.woff) format('woff');
	}
	@font-face {
	  font-family: 'Lobster';
	  font-style: normal;
	  font-weight: 400;
	  src: local('Lobster'), url(font/tiga.woff) format('woff');
	}
	</style>
	</head>
<body onLoad="window.print()">
	 <br><br><br><br>
	 <?php
		include "kjn.php";
            $sql = "SELECT * FROM koderak
                    JOIN terdakwa ON koderak.id_terdakwa = terdakwa.id_terdakwa 
                    JOIN saksi ON koderak.id_terdakwa = saksi.id_terdakwa
                    WHERE terdakwa.id_terdakwa='".$_GET['id_terdakwa']."'";
			$result = mysqli_query($conn, $sql);
            
			// output data of each row
			while($row = mysqli_fetch_array($result))
			{
				$koderak = $row['koderak'];
				
				echo "<center>";
				echo "<img src=\"logo.png\" width=\"130px\"><br>";
				echo "<h3 style=\"font-family:'Cabin';\">E-Arsip Kejaksaan Negeri Tomohon</h3>";
				echo "</center>";
				echo "<center>";
				echo "<table >";
				
				echo "<tr>";
					echo "<td>Nama </td>";
					echo "<td>&nbsp</td>";
					echo "<td>&nbsp</td>";
					echo "<td>:</td>";
					echo "<td><b>".$row['nama']."</b></td>";
				echo "</tr>";
				
				echo "<tr>";
					echo "<td>Umur </td>";
					echo "<td>&nbsp</td>";
					echo "<td>&nbsp</td>";
					echo "<td>:</td>";
					echo "<td>".$row['umur']."<i> tahun</i></td>";
				echo "</tr>";
				
				echo "<tr>";
					echo "<td>Nomor Perkara </td>";
					echo "<td>&nbsp</td>";
					echo "<td>&nbsp</td>";
					echo "<td>:</td>";
					echo "<td>".$row['noper']."</td>";
				echo "</tr>";
				echo "<tr>";
					echo "<td>Nomor Putusan </td>";
					echo "<td>&nbsp</td>";
					echo "<td>&nbsp</td>";
					echo "<td>:</td>";
					echo "<td>".$row['noput']."</td>";
				echo "</tr>";
				echo "<tr>";
					echo "<td>Jenis Kelamin </td>";
					echo "<td>&nbsp</td>";
					echo "<td>&nbsp</td>";
					echo "<td>:</td>";
					echo "<td>".$row['jk']."</td>";
				echo "</tr>";
				echo "<tr>";
					echo "<td>Kebangsaan </td>";
					echo "<td>&nbsp</td>";
					echo "<td>&nbsp</td>";
					echo "<td>:</td>";
					echo "<td>".$row['kebangsaan']."</td>";
				echo "</tr>";
				echo "<tr>";
					echo "<td>Tempat Tinggal </td>";
					echo "<td>&nbsp</td>";
					echo "<td>&nbsp</td>";
					echo "<td>:</td>";
					echo "<td>".$row['tempating']."</td>";
				echo "";
				echo "</table><br><br>";
				echo "<center>";
					
					echo "<img alt=\"testing\" src=\"barcode.php?text=$koderak&print=true\"/>";
					echo "</tr>";
				echo "</center>";
			}
	 ?>
</body>
</html>