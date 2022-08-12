<?php
session_start();
if (isset($_SESSION['role'])) {
	include 'template/header.php'; // menampilkan header
?>

	<!-- Navigasi Bar -->
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link active" href="#">Beranda</span></a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="kursus/">Materi Kursus</a>
		</li>
		<?php if (isset($_SESSION['role'])) { ?>
			<!-- Tambahan menu pada role admin dan peserta -->
			<li class="nav-item">
				<a class="nav-link" href="jadwal/">Jadwal Kursus</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="pendaftaran/">Pendaftaran</a>
			</li>
		<?php }
		if ($_SESSION['role'] == 'admin') { ?>
			<!-- Tambahan menu pada role admin -->
			<li class="nav-item">
				<a class="nav-link" href="mahasiswa/">Mahasiswa</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="pengguna/">Pengguna</a>
			</li>
		<?php } ?>
	</ul>
	<ul class="navbar-nav ml-auto">
		<?php if ($_SESSION['role'] == 'admin') { ?>
			<!-- Jika role admin maka menampilkan nama admin -->
			<span class="navbar-text text-white">
				Admin: <?php echo $_SESSION['name']; ?>
			</span>
		<?php } elseif ($_SESSION['role'] == 'peserta') { ?>
			<!-- Jika role peserta maka menampilkan nama peserta -->
			<span class="navbar-text text-white">
				<?php echo $_SESSION['id'] . ' ' . $_SESSION['name'] . ' ' . $_SESSION['kelas']; ?>
			</span>
		<?php } ?>
		<li class="nav-item ml-3">
			<button type="button" class="btn btn-light" data-toggle="modal" data-target="#modalLogout">Logout</button>
		</li>
	</ul>
	</div>
	</nav>

	<!-- Konfirmasi logout -->
	<div class="modal fade" id="modalLogout">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Konfirmasi</h4>
				</div>
				<div class="modal-body">
					Apakah Anda yakin ingin keluar?
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Batal</button>
					<a href="logout.php"><button type="button" class="btn btn-outline-danger">Keluar</button></a>
				</div>
			</div>
		</div>
	</div>

<?php include 'template/dashboard.php'; // menampilkan dashboard
} else {
	header("Location: index.php"); // jika belum login maka membuka index.php
} ?>