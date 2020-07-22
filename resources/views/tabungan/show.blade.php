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
        <?= HtmlHelper::a(route($actionRoutes.'.index'),['class' => 'btn btn-danger mt-1 mr-1'])->label('Cancel')->get() ?>
        <?= HtmlHelper::a(route($actionRoutes.'.transact',[
          "data" => $data
        ]),[
          'class' => 'btn btn-success mt-1 mr-1'
        ])
        ->label('Transaksi')
        ->get() ?>

        <?= HtmlHelper::a(route('riwayat.list_transact',[
          "data" => $data
        ]),[
          'class' => 'btn btn-primary mt-1 mr-1'
        ])
        ->label('Riwayat Transaksi')
        ->get() ?>
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