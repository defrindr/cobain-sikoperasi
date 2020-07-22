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
			  		'id' => 'active-form',
			  		'action' => route($actionRoutes. '.store'),
			  		'method' => 'post',
			  	]) ?>
      <div class="card-body">

      	@include($actionRoutes.'._form')
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

@section('_js')

<script type="text/javascript">
  
  $('#anggota_id').select2({theme: 'bootstrap4'});
  
  $('#anggota_id').change(function(){
    let val = $('#anggota_id').val();

    if(val == '' || val == undefined || val == null){
      $('#alamat_peminjam').val('')
      $('#no_hp_peminjam').val('')
      return;
    }

    $.ajax({
      methods: 'GET',
      url: '/api/peminjaman_check_user/' + val,
      success: (res) => {
        if(res.success){
          $('#alamat_peminjam').val(res.data.alamat)
          $('#no_hp_peminjam').val(res.data.no_hp)
          return
        }else{
          alert('gagal mendapatkan data anggota')
          return
        }
      }
    })
  })

</script>

@endsection