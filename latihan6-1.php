<!DOCTYPE html>
<html>
<head>
	<title>Form dan Detail Penyewaan Villa</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<?php if (!isset($_POST["submit"])) { ?>
		<h1>Form Penyewaan Villa</h1>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
			<label for="nama">Nama Penyewa:</label>
			<input type="text" id="nama" name="nama" required><br>

			<label for="alamat">Alamat:</label>
			<textarea id="alamat" name="alamat" required></textarea><br>

			<label for="tipe">Tipe Villa:</label>
			<select id="tipe" name="tipe" required>
				<option value="Standar">Standar</option>
				<option value="Deluxe">Deluxe</option>
				<option value="Superior">Superior</option>
			</select><br>

			<label for="lama">Lama Sewa (hari):</label>
			<input type="number" id="lama" name="lama" min="1" required><br>

			<div class="button-container">
				<input type="submit" name="submit" value="Hitung Total Harga">
				<input type="reset" value="Reset">
			</div>
		</form>
	<?php } else {
		$nama = $_POST["nama"];
		$alamat = $_POST["alamat"];
		$tipe = $_POST["tipe"];
		$lama = $_POST["lama"];

		switch ($tipe) {
			case 'Standar':
				$harga = 100000;
				break;
			case 'Deluxe':
				$harga = 150000;
				break;
			case 'Superior':
				$harga = 200000;
				break;
			default:
				$harga = 0;
				break;
		}

		if ($lama >= 3 && $lama <= 5) {
			$diskon = 0.15;
		} elseif ($lama > 5) {
			$diskon = 0.25;
		} else {
			$diskon = 0.1;
		}

		$total = $harga * $lama * (1 - $diskon);

		echo "<div class='result'>";
		echo "<h2>Detail Penyewaan Villa</h2>";
		echo "<table>";
		echo "<tr><td>Nama Penyewa</td><td>$nama</td></tr>";
		echo "<tr><td>Alamat</td><td>$alamat</td></tr>";
		echo "<tr><td>Tipe Villa</td><td>$tipe</td></tr>";
		echo "<tr><td>Lama Sewa</td><td>$lama hari</td></tr>";
		echo "<tr><td>Harga per hari</td><td>Rp " . number_format($harga, 0, ',', '.') . "</td></tr>";
		echo "<tr><td>Jumlah Diskon</td><td>" . ($diskon * 100) . "%</td></tr>";
		echo "<tr><td>Total Harga</td><td>Rp " . number_format($total, 0, ',', '.') . "</td></tr>";
		echo "</table>";
		echo "<div class='button-container'>";
		echo "<button onclick='window.location.href=\"latihan6-1.php\"'>Kembali ke Menu Awal</button>";
		echo "</div>";
		echo "</div>";
	} ?>
</body>
</html>