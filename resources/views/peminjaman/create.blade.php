@extends('layouts.main')

@section('title')
	Tambah  {{ $title }}
@endsection
@section('header-title')
	Tambah  {{ $title }}
@endsection

@section('content')
  <?php $form = ActiveForm::begin([
        'id' => 'active-form',
        'action' => route($actionRoutes. '.store'),
        'method' => 'post',
        'options' => [
          'class' => 'row',
          'style' => 'width: 100%'
        ]
      ]) ?>

  <div class="col-md-12">
    {!! LaraYii::alert($errors) !!}
  </div>
  
  <div class="col-md-6" style="margin: auto;">
    <div class="card card-default">
      <div class="card-header">
      </div>
      <!-- /.card-header -->

      <div class="card-body">

        @include($actionRoutes.'._form1',['data' => []])
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <?= HtmlHelper::button([
              'id' => 'generate', 
              'onclick' => 'event.preventDefault();generatePeminjaman()',
              'class' => 'btn btn-success mr-1 mt-1'
            ])->label('Generate')->get() ?>
      </div>
    </div>
    <!-- /.card -->
  </div>


  <div class="col-md-6">
    <div class="card card-default">
      <div class="card-header">
      </div>
      <!-- /.card-header -->

      <div class="card-body">

        @include($actionRoutes.'._form2',['data' => []])
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <?= HtmlHelper::submit(['class' => 'btn btn-success mr-1 mt-1'])->label('Submit')->get() ?>
        <?= HtmlHelper::a( route($actionRoutes . '.index') ,['class' => 'btn btn-danger mr-1 mt-1'])->label('Cancel')->get() ?>
      </div>
    </div>
    <!-- /.card -->
  </div>


  
  <?= ActiveForm::end() ?>
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

  let generatePeminjaman = () => {
    let pinjaman_awal = $('#pinjaman_awal').val(),
        lama_angsur = $('#lama_angsur').val(),
        anggota_id = $('#anggota_id').val(),
        bunga = $('#bunga').val();


    if(pinjaman_awal == "" || lama_angsur == "" || bunga == "" || anggota_id == ""){
      alert('Harap Isi semua form')
      return 
    }

    pinjaman_awal = parseFloat(pinjaman_awal);
    lama_angsur = parseFloat(lama_angsur);
    bunga = parseFloat(bunga);


    /*
    12 => jumlah bulan dalam 1 tahun
    */
    let total_bunga = pinjaman_awal*(bunga/100)*(lama_angsur / 12 );

    let totalPinjaman = pinjaman_awal+total_bunga;

    let angsur_perbulan = totalPinjaman/lama_angsur;


    $('#total_pinjaman').val(totalPinjaman)
    $('#angsur_perbulan').val(angsur_perbulan) 

  }
</script>
@endsection