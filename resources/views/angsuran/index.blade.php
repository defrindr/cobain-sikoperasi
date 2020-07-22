@extends('layouts.main')


@section('title')
	Daftar  {{ $title }}
@endsection
@section('header-title')
	Menu  {{ $title }}
@endsection

@section('content')

<div class="col-md-12 mb-1">
    {!! LaraYii::alert($errors) !!}
    <div class="mb-1"></div>
</div>

  <div class="col-md-5 d-none d-sm-block">
    <div class="card card-default">
      <div class="card-header">
        <?= HtmlHelper::a(route('peminjaman.show',['data' => $peminjaman]),[
          "class" => "btn btn-danger mb-1 mr-1"
        ])->label("Detail Peminjaman")
        ->get() ?>
      </div>
      <div class="card-body">
        <table class="table table-hover table-borderless">
          <tbody>
            <tr>
              <th>
                Peminjam
              </th>
              <td>
                :
              </td>
              <td>
                {{ $peminjaman->anggota->nama }}
              </td>
            </tr>
            <tr>
              <th>
                Alamat
              </th>
              <td>
                :
              </td>
              <td>
                {{ $peminjaman->anggota->alamat }}
              </td>
            </tr>
            <tr>
              <th>
                Total Pinjaman
              </th>
              <td>
                :
              </td>
              <td>
                {{ Str::toRp($peminjaman->total_pinjaman) }}
              </td>
            </tr>
            <tr>
              <th>
                Lama Angsur
              </th>
              <td>
                :
              </td>
              <td>
                {{ $peminjaman->lama_angsur. " Bulan" }}
              </td>
            </tr>
            <tr>
              <th>
                Tanggal Pinjam
              </th>
              <td>
                :
              </td>
              <td>
                {{ Str::date($peminjaman->tanggal_pinjam) }}
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="card-footer">
        
        <p>
        <span class="text-danger">*
        Pembayaran dapat dilakukan mulai dari 5 hari sebelum jatuh tempo
        </span>
        </p>
      </div>
    </div>
  </div>
  <div class="col-md-7">
    
    <div class="card card-default">
      <div class="card-header">
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <div class="table-responsive-sm">
          <table class="table table-hover table-borderless table-striped">
            <thead>
              <tr>
                <th>
                  #
                </th>
                <th>
                  jatuh Tempo
                </th>
                <th>
                  Jumlah Angsuran
                </th>
                <th>
                  Tanggal Bayar
                </th>
                <th>
                  Action
                </th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no = (($data->currentPage()) * $data->perPage()) - $data->perPage()+1;
              ?>
              @if(count($data) > 0)
              @foreach($data as $row)
              <tr>
                <td>{{ $no }}</td>
                <td> {{ ( $row->jatuh_tempo != null) ? Str::date($row->jatuh_tempo) : "-" }} </td>
                <td> {{ ( $row->jumlah_angsur != null) ? Str::toRp($row->jumlah_angsur) : "-" }} </td>
                <td> {{ ( $row->tanggal_bayar != null) ? Str::date($row->tanggal_bayar) : "-" }} </td>

                  <?php 

                  $now = strtotime(Date("Y-m-d",time()));
                  $active =  strtotime ( '-10 day' , strtotime ( $row->jatuh_tempo) );

                  ?>

                  @if($active - $now >= 0 )

                  <td> 
                    <span class="btn btn-default disabled">Ubah</span> 
                  </td>
                  @else
                    @if($row->status == 'dibayar')
                      <td> 
                        {!! HtmlHelper::button(['class' => 'btn btn-success disabled'])
                              ->label('Di Bayar')->get() !!} 
                      </td>
                    @else
                      <td> 
                        {!! HtmlHelper::a(route('angsuran.edit',
                             [
                               "peminjaman" => $row->peminjaman,
                               "id" => $row->id
                             ]),
                              [
                                'class' => 'btn btn-primary'
                              ])->label('Bayar')->get() !!} 
                      </td>
                    @endif
                  @endif
                <?php $no++; ?>
              </tr>
              @endforeach
              @else
              <tr>
                <td colspan="5"> <p class="text-center">Data Tidak Tersedia</p></td>
              </tr>
              @endif
            </tbody>
          </table>
        </div>
        <div class="mb-2"></div>
        {{ $data->links() }}
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
@endsection