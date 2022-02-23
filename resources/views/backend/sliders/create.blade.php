@extends('layouts.backend')
@section('content')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Slayd yaratmaq</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('backend.sliders.store')}}" enctype="multipart/form-data" method="POST">
                                @csrf
                                
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-2 col-form-label">Başlıq</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="title" value="" id="example-text-input"  placeholder="Başlığı daxil edin">
                                </div>
                                <small class="text-danger">
                                    @error('title'){{$message}}@enderror
                                </small>
                            </div>


                            <div class="form-group img-section">
                                <label for="exampleFormControlFile1">Şəkil</label>
                                <input id="uploadImage-create" type="file" name="image" class="form-control-file" id="exampleFormControlFile1" onchange="PreviewImageCreate();">
                                <div class="delete-img" onclick="deleteImageCreate();"><i class="fas fa-trash"></i></div>
                                <img class="preview-img img-thumbnail w-25" id='previewImage-create' src="{{asset('uploads/noPhoto.png')}}" alt="">
                                <small class="text-danger">
                                    @error('image'){{$message}}@enderror
                                </small>
                            </div>
                            
{{-- 
                            <div class="mb-3 row">
                                <label for="example-password-input" class="col-md-2 col-form-label">Link</label>
                                <div class="col-md-10">
                                    <input class="form-control" name="url" type="text" value="" placeholder="Linki daxil edin" id="example-password-input">
                                </div>
                                <small class="text-danger">
                                    @error('url'){{$message}}@enderror
                                </small>
                            </div> --}}

                            <div class="mb-3 row">
                                <label for="example-password-input" class="col-md-2 col-form-label">Status</label>
                                <div class="col-md-10">
                                    <select class="form-select" name="status" id="inlineFormSelectPref">
                                        <option selected="">Statusu seçin</option>
                                        <option value="1">Aktiv</option>
                                        <option value="0">Deaktiv</option>
                                    </select>
                                </div>
                                <small class="text-danger">
                                    @error('status'){{$message}}@enderror
                                </small> 
                            </div>
                           

                            <div class="mb-3 row">
                                <label for="example-email-input" class="col-md-2 col-form-label"></label>
                                <div class="col-md-10">
                                    <button class="btn btn-info" type="submit">Yarat</button>
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


@section('js')
<script>
function PreviewImageCreate() {
                var oFReader = new FileReader();
                oFReader.readAsDataURL(document.getElementById("uploadImage-create").files[0]);

                oFReader.onload = function(oFREvent) {
                    document.getElementById("previewImage-create").src = oFREvent.target.result;
                };
            };

            function deleteImageCreate() {
                document.getElementById("previewImage-create").src = '{{asset('uploads/noPhoto.png')}}';
                document.getElementById("uploadImage-create").value = '';
            }
</script>
@endsection