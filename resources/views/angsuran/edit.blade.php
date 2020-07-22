@extends('layouts.main')

@section('title')
	Pembayaran  {{ $title }}
@endsection
@section('header-title')
	Pembayaran  {{ $title }}
@endsection

@section('content')

<div class="col-md-12 mb-1">
    {!! LaraYii::alert($errors) !!}
    <div class="mb-1"></div>
</div>

<div class="col-md-4">
  	<?php $form = ActiveForm::begin([
		  		'id' => 'form-angsuran',
		  		'action' => route($actionRoutes. '.update',[
		  			'peminjaman' => $peminjaman,
		  			'id' => $data]),
		  		'method' => 'put',
		  	]) ?>
    <div class="card card-default">
        <div class="card-header"></div>
        <!-- /.card-header -->
        <div class="card-body">

          @include($actionRoutes. '._form1')

        </div>
        <!-- /.card-body -->
        <div class="card-footer">

        	<?= HtmlHelper::button([
					"class" => "btn btn-primary btn-block mb-1"
				],false,"hitungDenda()")->label("Check Denda")->get() ?>
        </div>
     </div>
      <!-- /.card -->
</div>
<div class="col-md-8">
    <div class="card card-default">
        <div class="card-header"></div>
        <!-- /.card-header -->
        <div class="card-body">
          @include($actionRoutes. '._form2')
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
        	<?= HtmlHelper::button([
        			'class' => 'btn btn-primary mr-1 mt-1'
        		],false)->label('Check Kembalian')
        		->get() ?>

        	<?= HtmlHelper::submit([
        			'class' => 'btn btn-success mr-1 mt-1'
        		])->label('Submit')
        		->get() ?>
        	
        	<?= HtmlHelper::a(url()->previous(),[
        			'class' => 'btn btn-danger mr-1 mt-1'
        		])->label('Cancel')
        		->get() ?>
        	
        </div>
      </div>
      <!-- /.card -->
        	<?= ActiveForm::end() ?>
  </div>
@endsection

@section("_js")
<script type="text/javascript">
	var diffDate = function(date1, date2) {
		dt1 = new Date(date1);
		dt2 = new Date(date2);
		$ret = Math.floor((Date.UTC(dt2.getFullYear(), dt2.getMonth(), dt2.getDate()) - Date.UTC(dt1.getFullYear(), dt1.getMonth(), dt1.getDate()) ) /(1000 * 60 * 60 * 24));

        if($ret < 0){
            return 0;
        }else{
            return $ret;
        }
	}
	
	let hitungDenda = () => {
		let dNow = new Date("<?= Date('Y-m-d') ?>");
		let lDate = new Date("<?= $data->jatuh_tempo ?>");

		let letMeKnow = diffDate(lDate,dNow);

		let denda = Math.floor(<?= request()->cms['denda_perhari'] ?> * <?= $peminjaman->angsur_perbulan ?> * letMeKnow);
		let totalBayar = denda + <?= $peminjaman->angsur_perbulan ?> ;

		$('#lama_terlambat').val(letMeKnow)
		$('#denda').val(denda)
		$('#total_bayar').val(totalBayar)
	}
</script>
@endsection