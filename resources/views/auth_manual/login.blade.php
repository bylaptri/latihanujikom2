@extends('template_auth.layout')
<title> Login </title>
@section('content')

    <!-- page -->
    <div class="page">

        <!-- main-signin-wrapper -->
		<div class="my-auto page page-h">
			<div class="main-signin-wrapper">
				<div class="main-card-signin d-md-flex">
				<div class="wd-md-50p login d-none d-md-block page-signin-style p-5 text-white" >
					<div class="my-auto authentication-pages">
						<div>
							<div class="my-auto authentication-pages">
								<div>
									<h5 class="mb-4">KELOMPOK 4 UJIKOM GACOR</h5>
								</div>
							</div>
							<h5 class="mb-4">APLIKASI PERPUSTAKAAN DIGITAL &amp; Admin Template</h5>
							<p class="mb-5">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
							<a href="index.html" class="btn btn-success">Learn More</a>
						</div>
					</div>
				</div>
				<div class="sign-up-body wd-md-50p">
					<div class="main-signin-header">
						<h2>Welcome back!</h2>
						<div class="px-0 col-12 mb-2">
                        @include('component.message')
                        </div>
                        <h4>Please login to continue</h4>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label>Email</label>
                                <input name="email" class="form-control" placeholder="Enter your email" type="email" required autofocus>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input name="password" class="form-control" placeholder="Enter your password" type="password" value="password" required>
                            </div>
                            <button a href="{{ route('data-buku') }}" type="submit" class="btn btn-primary btn-block"><i class="fe fe-log-in"></i> Sign In</button>
                        </form>
					</div>
					<div class="main-signin-footer mt-3 mg-t-5">
						{{-- <p><a href="">Forgot password?</a></p> --}}
						<p>Don't have an account?  <a href="{{ route('register') }}">Create Account</a>
					</div>
				</div>
			</div>
			</div>
		</div>
    </div>

@endsection
