@extends('layouts.backend')
@section('content')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Kolleqalara düzəlİş edİn</h4>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">                           
                            <form action="{{ route('backend.colleges.update', ['college' => $college->id]) }}" enctype="multipart/form-data" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Ad</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="name" value="{{ $college->name }}" id="example-text-input"  placeholder="Ad daxil edin">
                                    </div>
                                    <small class="text-danger">
                                        @error('name') {{$message}} @enderror
                                    </small>
                                </div>

                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Soyad</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="surname" value="{{ $college->surname }}" id="example-text-input"  placeholder="Soyad daxil edin">
                                    </div>
                                    <small class="text-danger">
                                        @error('surname') {{$message}} @enderror
                                    </small>
                                </div>
    

{{--                            <div class="form-group img-section">--}}
{{--                                <label for="exampleFormControlFile1">Şəkil</label>--}}
{{--                                <input id="uploadImage" value="{{$college->image}}" type="file" name="image" class="form-control-file w-25" id="exampleFormControlFile1" onchange="PreviewImage();">--}}
{{--                                <div class="delete-img" onclick="deleteImage();"><i class="fas fa-trash"></i></div>--}}
{{--                                <input id="hiddenInput" type="hidden" name="hidden" value="1">--}}
{{--                                    <?php--}}
{{--                                        if (empty($college->image))--}}
{{--                                            echo "<img id='previewImage' src='".asset('uploads/noPhoto.png')."' class='img-thumbnail preview-img w-25 mb-2' alt=''>";--}}
{{--                                        else--}}
{{--                                            echo "<img id='previewImage' src='".asset('uploads/colleges/'.$college->image)."' class='img-thumbnail preview-img w-25 mb-2' alt=''>";--}}
{{--                                    ?>--}}
{{--                            </div>--}}

                            
                            <div class="mb-3 row">
                                <label for="example-password-input" class="col-md-2 col-form-label">Status</label>
                                <div class="col-md-10">
                                    <select class="form-select" name="status" id="inlineFormSelectPref">
                                        <option value="1" <?php if ($college->status ==1) echo 'selected' ?>>Aktiv</option>
                                        <option value="0" <?php if ($college->status ==0) echo 'selected' ?>>Deaktiv</option>
                                    </select>
                                </div>
                                <small class="text-danger">
                                    @error('status'){{$message}}@enderror
                                </small>
                            </div>


                           
{{--                            <div class="mb-3 row">--}}
{{--                                <label for="example-email-input" class="col-md-2 col-form-label">Mətn</label>--}}
{{--                                <div class="col-md-10">--}}
{{--                                    <textarea cols="40" rows="10" class="form-control editor" id="editor" name="content" style="visibility:hidden; display: none;">{{ $college->content }}</textarea>--}}
{{--                                </div>--}}
{{--                                <small class="text-danger">--}}
{{--                                    @error('content'){{$message}}@enderror--}}
{{--                                </small>--}}
{{--                            </div>--}}


                            <div class="mb-3 row">
                                <label for="example-email-input" class="col-md-2 col-form-label"></label>
                                <div class="col-md-10">
                                    <button class="btn btn-info" type="submit">Redaktə et</button>
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