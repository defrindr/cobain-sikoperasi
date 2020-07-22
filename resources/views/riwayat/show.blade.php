@extends('layouts.main')


@section('title')
	Detail {{ $title }}
@endsection
@section('header-title')
	Detail {{ $title }}
@endsection

@section('content')
  <div class="col-md-12">
    <?= LaraYii::alert($errors) ?>
    <div class="mb-1"></div>
    
    <div class="card card-default">
      <div class="card-header">
        <?= HtmlHelper::a(route($actionRoutes.'.list_transact',["data" => $data->tabungan_id]),['class' => 'btn btn-danger mt1 mr-1'])->label('Cancel')->get() ?>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive">
        <?= ListView::generate($data, 
            $withouts = ['id','created_at','updated_at','password'],
            [
              "class" => "table table-borderless table-hover"
            ]
            ) ?>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
@endsection