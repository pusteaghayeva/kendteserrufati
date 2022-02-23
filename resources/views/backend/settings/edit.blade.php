@extends('layouts.backend')
@section('content')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Tənzİmləmələr</h4>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('backend.settings.update', ['setting' => 1])}}" enctype="multipart/form-data" method="POST">
                                @csrf
                                @method('PUT')

                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-2 col-form-label">Başlıq</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="title" value="{{$setting->title}}" id="example-text-input"  placeholder="Başlığı dxaxil edin">
                                </div>
                                <small class="text-danger">
                                    @error('title'){{$message}}@enderror
                                </small>
                            </div>

                            <div class="mb-3 row">
                                <label for="example-password-input" class="col-md-2 col-form-label">Telefon:</label>
                                <div class="col-md-10">
                                    <input class="form-control" name="phone" type="text" value="{{$setting->phone}}" placeholder="Link daxil edin" id="example-password-input">
                                </div>
                                <small class="text-danger">
                                    @error('phone'){{$message}}@enderror
                                </small>
                            </div>

                            <div class="mb-3 row">
                                <label for="example-password-input" class="col-md-2 col-form-label">E-mail:</label>
                                <div class="col-md-10">
                                    <input class="form-control" name="mail" type="mail" value="{{$setting->mail}}" placeholder="Mail daxil edin" id="example-password-input">
                                </div>
                                <small class="text-danger">
                                    @error('mail'){{$message}}@enderror
                                </small>
                            </div>

                            <div class="mb-3 row">
                                <label for="example-password-input" class="col-md-2 col-form-label">Adress:</label>
                                <div class="col-md-10">
                                    <input class="form-control" name="address" type="text" value="{{$setting->address}}" placeholder="Mail daxil edin" id="example-password-input">
                                </div>
                                <small class="text-danger">
                                    @error('address'){{$message}}@enderror
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
                </div> <!-- end col -->
            </div>
            <!-- end row -->


        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->


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
    
@endsection
{{-- 
@section('js')
<script>
    function PreviewImage() {
                    document.getElementById('hiddenInput').value = '1';
                    var oFReader = new FileReader();
                    oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);
                    oFReader.onload = function(oFREvent) {
                        document.getElementById("previewImage").src = oFREvent.target.result;
                    };
                };
    
                function deleteImage() {
                    document.getElementById("previewImage").src = '{{asset('uploads/noPhoto.png')}}';
                    document.getElementById("uploadImage").value = '';
                    document.getElementById('hiddenInput').value = '0';
                }
    </script>
@endsection --}}