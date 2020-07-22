@extends('layouts.main')

@section('title')
List {{ $title }}
@endsection
@section('header-title')
List {{ $title }}
@endsection

@section('content')
<!-- Modal -->
<form action="{{ route("reports.tabungan.history",[ "id" => $id]) }}" method="post">
    <div class="modal fade" id="modallaporan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Cetak Riwayat</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    @method("POST")
                    @csrf
                    <div class="form-group">
                        <label for="month">Pilih Bulan</label>
                        <input type="month" id="month" name="month" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <span type="button" class="btn btn-default" data-dismiss="modal">Kembali</span>
                    <button class="btn btn-primary">Cetak</button>
                </div>
            </div>
        </div>
    </div>
</form>

<div class="col-md-12">
    <div class="card card-default">
        <div class="card-header">
            <?= HtmlHelper::a(route('tabungan.show',["data" => $id]),['class' => 'btn btn-danger mt1 mr-1'])->label('Cancel')->get() ?>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modallaporan">
                Cetak Laporan
            </button>
        </div>
        <div class="card-body">
            <div class="table-sm-responsive">
                <table class="table table-hover table-borderless">
                    <thead>
                        <th>#</th>
                        <th>Tanggal Transaksi</th>
                        <th>Aksi</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php 

							if(isset($_GET['page'])){
								$no = (((0 + $_GET['page'])*10)+1)-10;
							}else{
								$no = 1;
							}
							?>
                        @foreach($data as $row)
                        <tr>
                            <td>
                                {{ $no++ }}
                            </td>
                            <td>
                                {{ Str::date($row->created_at) }}
                            </td>
                            <td>
                                {{ ($row->action == "simpan") ? "Penambahan Saldo" : "Pengambilan Saldo" }}
                            </td>
                            <td>
                                <?= HtmlHelper::a(
												route($actionRoutes . ".detail_transact",["data" => $row->id]),
												[
													"class" => "btn btn-default"
												]
											)
											->label("Detail")->get()
										  ?>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                {{ $data->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
