@extends('layouts.backend')
@section('content')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Yenİ xəbər daxİl edİn</h4>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('backend.news.store')}}" enctype="multipart/form-data" method="POST">
                                @csrf
                               
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Başlıq</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="title" value="" id="example-text-input"  placeholder="Başlıq daxil edin">
                                    </div>
                                    <small class="text-danger">
                                        @error('title'){{$message}}@enderror
                                    </small>
                                </div>
    

{{--                                <div class="mb-3 row d-none">--}}
{{--                                    <label for="example-text-input" class="col-md-2 col-form-label">Kateqoriya</label>--}}
{{--                                    <div class="col-md-10">--}}
{{--                                        <select class="form-select" name="category_id" id="autoSizingSelect">--}}
{{--                                            <option selected value="19">Xəbərlər</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                    <small class="text-danger">--}}
{{--                                        @error('category_id'){{$message}}@enderror--}}
{{--                                    </small>--}}
{{--                                </div>--}}

                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Kateqoriya</label>
                                    <div class="col-md-10">
                                        <select class="form-select" name="category_id" id="autoSizingSelect">
                                            <option value="">Kateqoriyanı seçin...</option>
                                            @foreach ($categories as $cat)
                                                <option value="{{$cat->id}}">{{$cat->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <small class="text-danger">
                                        @error('category_id'){{$message}}@enderror
                                    </small>
                                </div>



                            <div class="form-group img-section">
                                <label for="exampleFormControlFile1">Şəkil</label>
                                <input id="uploadImage-create" type="file" name="image" class="form-control-file w-25" id="exampleFormControlFile1" onchange="PreviewImageCreate();">
                                <div class="delete-img" onclick="deleteImageCreate();"><i class="fas fa-trash"></i></div>
                                <img class="preview-img img-thumbnail w-25" id='previewImage-create' src="{{asset('uploads/noPhoto.png')}}" alt="">
                                <small class="text-danger">
                                    @error('image'){{$message}}@enderror
                                </small>
                            </div>
                            

                            <div class="mb-3 row">
                                <label for="example-password-input" class="col-md-2 col-form-label">Status</label>
                                <div class="col-md-10">
                                    <select class="form-select" name="status" id="inlineFormSelectPref">
                                        <option selected="">Statusu seçin:</option>
                                        <option value="1">Aktiv</option>
                                        <option value="0">Deaktiv</option>
                                    </select>
                                </div>
                                <small class="text-danger">
                                    @error('status'){{$message}}@enderror
                                </small> 
                            </div>

                           
                            <div class="mb-3 row">
                                <label for="example-email-input" class="col-md-2 col-form-label">Mətn</label>
                                <div class="col-md-10">
                                    <textarea cols="40" rows="10" class="form-control editor" id="editor" name="content" style="visibility:hidden; display: none;"></textarea>
                                </div>
                                <small class="text-danger">
                                    @error('content'){{$message}}@enderror
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

@section('styles')
    <link rel="stylesheet" href="{{asset('backend/assets/libs/summernote/summernote.min.css')}}">
@endsection

@section('scripts')
<script>
    var id = 1;
    $('textarea.editor').each(function () {
        $(this).attr("id", "editor" + id);
        CKEDITOR.replace('editor' + id, {
            height: '300px',

        });
        id = id + 1;
    });
</script>
@endsection