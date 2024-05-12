<?php
session_start();
include 'db.php';
if ($_SESSION['status_login'] != true) {
	echo '<script>window.location="loginadmin.php"</script>';
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Caturnawa - Data Peserta</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>

<body>
	<!-- header -->
	<?php
	include 'mainmenu.php';
	?>

	<!-- content -->
	<div class="section">
		<div class="container">
			<h3>Data peserta</h3>
			<div class="box">
				<p><a href="tambah-peserta.php">Tambah Data Peserta</a></p>
				<table border="1" cellspacing="0" class="table">
					<thead>
						<tr>
							<th width="30px">No</th>
							<th>Room</th>
							<th>OG</th>
							<th>OO</th>
							<th>CG</th>
							<th>CO</th>
							<th>Juri</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						$peserta = mysqli_query($conn, "SELECT * FROM tb_peserta ORDER BY room_peserta ASC");
						if (mysqli_num_rows($peserta) > 0) {

							while ($row = mysqli_fetch_array($peserta)) {
								?>
								<tr>
									<td>
										<?php echo $no++ ?>
									</td>
									<td>
										<?php echo $row['room_peserta'] ?>
									</td>
									<td>
										<?php echo $row['opening_government'] ?>
									</td>
									<td>
										<?php echo $row['opening_oposition'] ?>
									</td>
									<td>
										<?php echo $row['closing_government'] ?>
									</td>
									<td>
										<?php echo $row['closing_oposition'] ?>
									</td>
									<td>
										<?php echo $row['adjudicators'] ?>
									</td>
									<td>
										<a href="edit-peserta.php?id=<?php echo $row['peserta_id'] ?>">Edit</a> || <a
											href="proses-hapus.php?idps=<?php echo $row['peserta_id'] ?>"
											onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
									</td>
								</tr>
							<?php }
						} else { ?>
							<tr>
								<td colspan="8">Tidak ada data</td>
							</tr>

						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<!-- footer -->
	<footer>
		<div class="container">
			<small>Copyright &copy; UNAS FEST 2023.</small>
		</div>
	</footer>
</body>

</html>