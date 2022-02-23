@extends('layouts.auth')

@section('title', 'Login')
    

@section('content')
<div class="account-pages my-5 pt-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card overflow-hidden">
                    <div class="bg-primary bg-soft">
                        <div class="row">
                            <div class="col-7">
                                <div class="text-primary p-4">
                                    <h4 class="text-primary">Admin Panelə xoş gəlmisiniz! !</h4>
                                </div>
                            </div>
                            <div class="col-5 align-self-end">
                                <img src="{{asset('backend/assets/images/profile-img.png')}}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0"> 
                        <div class="auth-logo">
                            <a href="index.html" class="auth-logo-light">
                                <div class="avatar-md profile-user-wid mb-4">
                                    <span class="avatar-title rounded-circle bg-light">
                                        <img src="{{asset('backend/assets/images/logo-light.svg')}}" alt="" class="rounded-circle" height="34">
                                    </span>
                                </div>
                            </a>

                            <a href="index.html" class="auth-logo-dark">
                                <div class="avatar-md profile-user-wid mb-4">
                                    <span class="avatar-title rounded-circle bg-light">
                                        <img src="{{asset('backend/assets/images/logo.svg')}}" alt="" class="rounded-circle" height="34">
                                    </span>
                                </div>
                            </a>
                        </div>
                        <div class="p-2">
                            <form class="form-horizontal" action="{{route('backend.login')}}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="username" class="form-label">Email</label>
                                    <input type="text" name="email" class="form-control" id="username" placeholder="Mailinizi daxil edin">
                                </div>
                                <small class="text-danger">
                                    @error('email')
                                         {{$message}}
                                    @enderror
                                </small>
                                  
                                <div class="mb-3">
                                    <label class="form-label">Şifrə</label>
                                    <div class="input-group auth-pass-inputgroup">
                                        <input type="password" name="password" class="form-control" placeholder="Şifrənizi daxil edin" aria-label="Password" aria-describedby="password-addon">
                                        <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                    </div>
                                </div>
                                <small class="text-danger">
                                    @error('password')
                                        {{$message}}
                                     @enderror
                                </small>
                               

                                <div class="form-check">
                                    <input class="form-check-input" name="remember" type="checkbox" id="remember-check">
                                    <label class="form-check-label" for="remember-check">
                                        Məni xatırla!
                                    </label>
                                </div>
                                
                                <div class="mt-3 d-grid">
                                    <button class="btn btn-primary waves-effect waves-light" type="submit">Daxil ol</button>
                                </div>
    
                             

                                <div class="mt-4 text-center">
                                    <a href="auth-recoverpw.html" class="text-muted"><i class="mdi mdi-lock me-1"></i> Şifrəni unutdunuz?</a>
                                </div>
                            </form>
                        </div>
    
                    </div>
                </div>
                <div class="mt-5 text-center">
                    
                    <div>
                        <p>© <script>document.write(new Date().getFullYear())</script> Skote. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection


@include('sweetalert::alert')
