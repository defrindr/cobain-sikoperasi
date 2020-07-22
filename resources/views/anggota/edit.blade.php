@extends('layouts.main')

@section('title')
	Ubah  {{ $title }}
@endsection
@section('header-title')
	Ubah  {{ $title }}
@endsection

@section('content')
  <div class="col-md-12">
    {!! LaraYii::alert($errors) !!}
    <div class="mb-1"></div>

    <div class="card card-default">
      <div class="card-header"></div>
      <!-- /.card-header -->
	  	<?php $form = ActiveForm::begin([
			  		'id' => 'form-anggota',
			  		'action' => route($actionRoutes. '.update',['data' => $data]),
			  		'method' => 'put',
			  	]) ?>
      <div class="card-body">
        @include($actionRoutes. '._form')
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
      	<?= HtmlHelper::submit(['class' => 'btn btn-success mr-1 mt-1'])->label('Submit')->get() ?>
      	<?= HtmlHelper::a(url()->previous(),['class' => 'btn btn-danger mr-1 mt-1'])->label('Cancel')->get() ?>
      	
      	<?= ActiveForm::end() ?>
      </div>
    </div>
    <!-- /.card -->
  </div>
@endsection