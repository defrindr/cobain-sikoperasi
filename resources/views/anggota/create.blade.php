@extends('layouts.main')

@section('title')
	Tambah  {{ $title }}
@endsection
@section('header-title')
	Tambah  {{ $title }}
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
            'action' => route($actionRoutes.'.store'),
            'method' => 'post',
          ]) ?>
      <div class="card-body">

        @include($actionRoutes. '._form',['data' => []])
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