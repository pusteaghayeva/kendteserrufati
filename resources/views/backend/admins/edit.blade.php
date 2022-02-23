{{-- @extends('layouts.backend')
@section('content')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Yenİ admİn yarat</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('backend.admins.update', ['admin' => $admin->id])}}" method="POST">
                                @csrf
                                @method('PUT')
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-2 col-form-label">Ad</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="name" value="{{$admin->name}}" id="example-text-input"  placeholder="Ad daxil edin">
                                </div>
                                <small class="text-danger">
                                    @error('name'){{$message}}@enderror
                                </small>
                            </div>
                           
                            <div class="mb-3 row">
                                <label for="example-email-input" class="col-md-2 col-form-label">Email</label>
                                <div class="col-md-10">
                                    <input class="form-control" name="email" type="email" value="{{$admin->email}}" placeholder="E-mail daxil edin" id="example-password-input">
                                </div>
                                <small class="text-danger">
                                    @error('email'){{$message}}@enderror
                                </small>
                            </div>
                            

                            <div class="mb-3 row">
                                <label for="example-password-input" class="col-md-2 col-form-label">Şifrə</label>
                                <div class="col-md-10">
                                    <input class="form-control" name="password" type="password" value="{{$admin->password}}" placeholder="Şifrə daxil edin" id="example-password-input">
                                </div>
                                <small class="text-danger">
                                    @error('password'){{$message}}@enderror
                                </small>
                            </div>
                           

                            <div class="mb-3 row">
                                <label for="example-email-input" class="col-md-2 col-form-label"></label>
                                <div class="col-md-10">
                                    <button class="btn btn-info" type="submit">Düzəliş et</button>
                                </div>
                            </div>
                        </form>

                        </div>
                    </div>
                </div> 
            </div>
           
        </div> 
    </div>


    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>document.write(new Date().getFullYear())</script>2021 © Skote.
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end d-none d-sm-block">
                        Design &amp; Develop by Themesbrand
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
    
@endsection --}}