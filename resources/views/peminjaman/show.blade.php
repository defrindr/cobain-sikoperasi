@extends('layouts.main')


@section('title')
	Detail {{ $title }}
@endsection
@section('header-title')
	Detail {{ $title }}
@endsection

@section('content')
  <div class="col-md-12">
    {!! LaraYii::alert($errors) !!}
    <div class="mb-1"></div>
    
    <div class="card card-default">
      <div class="card-header">
        <?= HtmlHelper::a(route($actionRoutes.'.index'),[
              'class' => 'btn btn-danger mb-1 mr-1'
            ])->label('Cancel')
            ->get() ?>
        
        <?= HtmlHelper::a(route($actionRoutes.'.edit',['data' => $data["id"]]),[
              'class' => 'btn btn-primary mb-1 mr-1'
            ])->label('Ubah')
            ->get() ?>

        <?= HtmlHelper::a(route($actionRoutes.'.list_angsuran',['data' => $data["id"]]),[
              'class' => 'btn btn-success mb-1 mr-1'
            ])->label('Detail Angsuran')
            ->get() ?> 
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive">
        <?php
          $withouts = ['id','created_at','updated_at','password'];
          $options = [
              "class" => "table table-borderless table-hover"
            ];
        ?>
        <?= ListView::generate($data,
            $withouts,$options
            ) ?>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
@endsection