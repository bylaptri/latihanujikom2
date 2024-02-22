@extends('template_auth.layout')

@section('content')
<div class="my-auto page page-h">
			<div class="main-signin-wrapper">
				<div class="main-card-signin d-md-flex">
				<div class="wd-md-50p login d-none d-md-block page-signin-style p-5 text-white" >
					<div class="my-auto authentication-pages">
						<div>
							<img src="{{asset('')}}assets/img/brand/logo-white.png" class=" m-0 mb-4" alt="logo">
							<h5 class="mb-4">KELOMPOK 4 UJICOM</h5>
							<p class="mb-5">PERPUSTAKAAN DIGITAL.</p>
							<p>A digital library, also called an online library, an internet library, a digital repository, a library without walls, or a digital collection, is an online database of digital objects that can include text, still images, audio, video, digital documents, or other digital media formats or a library accessible through the internet.</p>
							<a href="index.html" class="btn btn-success">Learn More</a>
						</div>
					</div>
				</div>
				<div class="sign-up-body wd-md-50p">
					<div class="main-signin-header">
						<h2>Welcome back!</h2>
						<h4>Please sign up to continue</h4>
						<form method="POST" action="{{ route('login')}}">
                            @csrf
							<div class="form-group">
								<label>Firstname &amp; Lastname</label> <input class="form-control" placeholder="Enter your firstname and lastname" type="text">
							</div>
							<div class="form-group">
								<label>Email</label> <input class="form-control" placeholder="Enter your email" type="text">
							</div>
							<div class="form-group">
								<label>Password</label> <input class="form-control" placeholder="Enter your password" type="password">
							</div>
                            <div class="form-group">
								<label>Hak Akses</label>
                                <select name='namerole' id="f1" class="form-control select2" onchange="reload_table()">
                                <option value="">=== pilih ===</option>
                                <option value="admin" @if(request()->get('f1')==1) selected @endif>admin</option>
                                <option value="petugas" @if(request()->get('f1')==2) selected @endif>petugas</option>
                                <option value="peminjam" @if(request()->get('f1')==3) selected @endif>peminjam</option>
                            </select>
							</div>
                            <button a href="{{ route('data-buku') }}" class="btn btn-primary btn-block"><i class="fa fa-user-plus"></i>   Create Account</button>
						</form>
					</div>
					<div class="main-signin-footer mt-3 mg-t-5">
						{{-- <p><a href="">Forgot password?</a></p> --}}
						<p>Already have an account? <a href="{{ route('login') }}">Sign In</a></p>
					</div>
				</div>
			</div>
			</div>
		</div>
@endsection
