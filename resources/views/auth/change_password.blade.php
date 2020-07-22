@extends('layouts.main')

@section('title')
	Ganti Password
@endsection
@section('header-title')
	Ganti Password
@endsection


@section('content')
<div class="col-md-12">
	<?= LaraYii::alert($errors) ?>
	<form class="form" action="{{ route('auth.change_password') }}" method="POST">
		@csrf
		<div class="card card-default">
			<div class="card-header"></div>
			<div class="card-body">
				<div class="form-group">
					<label for="">Username</label>
					<input type="text" name="username" readonly="true" value="<?= Auth::user()->username ?>" class="form-control">
				</div>
				<div class="form-group">
					<label for="">Password Lama <i id="change_password" onclick="change(event,'#password_lama')" class="fas fa-eye-slash text-danger"></i></label>
					<input type="password" name="password_lama" class="form-control" id="password_lama">
				</div>
				<div class="form-group">
					<label for="">Password Baru <i id="change_password" onclick="change(event,'#password_baru')" class="fas fa-eye-slash text-danger"></i></label>
					<input type="password" name="password_baru" min="6" class="form-control" id="password_baru">
				</div>
			</div>
			<div class="card-footer">
				<div class="form-group">
					<button class="btn btn-success  ml-1 mt-1">Submit</button>
					<a href="{{ url()->previous() }}" class="btn btn-danger ml-1 mt-1">Cancel</a>
				</div>
			</div>
		</div>
	</form>
</div>
@endsection

@section("_js")
<script type="text/javascript">
	let change = (ev,target) => {
		target = document.querySelector(target);

		if(target.type == "password"){
			target.type = "text";
			target.autocomplete = "off";
			ev.target.className = "fas fa-eye text-primary";
		}else {
			target.type = "password";
			ev.target.className = "fas fa-eye-slash text-danger";
		}
	}
</script>
@endsection

