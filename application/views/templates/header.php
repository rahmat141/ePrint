<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title> <?php echo $title; ?></title>

	<!-- Custom fonts for this template-->

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">


	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<link href="<?php echo base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="<?php echo base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('Admin/index') ?>">
				<div class="sidebar-brand-icon rotate-n-15">
					<i class="fas fa-laugh-wink"></i>
				</div>
				<div class="sidebar-brand-text mx-3">Digital Printing</div>
			</a>

			<!-- Divider -->
			<hr class="sidebar-divider my-0">

			<!-- Nav Item - Dashboard -->
			<li class="nav-item active">
				<a class="nav-link" href="<?php echo base_url('Admin/index') ?>">
					<i class="fas fa-fw fa-chart-area"></i>
					<span>Dashboard</span></a>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider">

			<!-- Heading -->
			<div class="sidebar-heading">
				Interface
			</div>

			<!-- Nav Item - Pages Collapse Menu -->
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url('admin/barang'); ?>">
					<i class="fas fa-fw fa-table"></i>
					<span>Data Barang</span></a>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url('admin/daftarPesanan'); ?>">

					<i class="fas fa-fw fa-file-invoice"></i>
					<span>Pesanan</span>
				</a>

			</li>

			<li class="nav-item">
				<a class="nav-link" href="<?= base_url('admin/HistoriPesanan') ?>">
					<i class="fas fa-fw fa-table"></i>
					<span>Riwayat Pesanan</span></a>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="<?= base_url('admin/postingan') ?>">
					<i class="fas fa-fw fa-folder"></i>
					<span>Postingan</span></a>
			</li>

			<hr class="sidebar-divider d-none d-md-block">

			<div class="text-center d-none d-md-inline">
				<button class="rounded-circle border-0" id="sidebarToggle"></button>
			</div>

			<!-- Nav Item - Utilities Collapse Menu -->


		</ul>
		<!-- End of Sidebar -->