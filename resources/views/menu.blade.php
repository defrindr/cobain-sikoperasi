@extends('layouts.main')


@section('title')
	Dashboard
@endsection
@section('header-title')
	Dashboard
@endsection

<?php 

$isAdmin = (Auth::user()->role == "administrator") ? 1 : 0;

$col = (($isAdmin) ? "col-sm-6" : "col-sm-4");

?>

@section('content')
<div class="col-md-12">
  <div class="row">
    <?php if($isAdmin): ?>
    <div class="<?= $col ?> mb-1">
      <div class="info-box">
        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user-alt"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">User</span>
          <span class="info-box-number">
            {{ $userTotal }}
            <small>Orang</small>
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
    </div>
  <?php endif; ?>
    <div class="<?= $col ?> mb-1">
      <div class="info-box">
        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user-alt"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Total Anggota</span>
          <span class="info-box-number">
            {{ $anggotaTotal }}
            <small>Orang</small>
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
    </div>
    <div class="<?= $col ?> mb-1">
      <div class="info-box">
        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Total Tabungan</span>
          <span class="info-box-number">
            {{ $tabunganTotal }}
            <small>Rekening</small>
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
    </div>
    <div class="<?= $col ?> mb-1">
      <div class="info-box">
        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-book"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Total Pinjaman</span>
          <span class="info-box-number">
            {{ $peminjamanTotal }}
            <small>Pinjaman</small>
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
    </div>
  </div>
</div>
@endsection