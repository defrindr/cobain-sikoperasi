@extends('layouts.main')


@section('title')
	Daftar  {{ $title }}
@endsection
@section('header-title')
	Menu  {{ $title }}
@endsection

@section('content')
  <div class="col-md-12">
    {!! LaraYii::alert($errors) !!}
    <div class="mb-1"></div>
    
    <div class="card card-default">
      <div class="card-header">
        <a href="{{ route($actionRoutes. '.create') }}" class="btn btn-success mr-1 mt-1"> <i class="fas fa-plus"></i> Tambah </a>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <?= $data ?>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>

@endsection