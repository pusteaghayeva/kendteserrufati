@extends('layouts.backend')
@section('content')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Xəbərdə düzəlİş edİn</h4>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">                           
                            <form action="{{ route('backend.news.update', ['news' => $news->id]) }}" enctype="multipart/form-data" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Başlıq</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="title" value="{{ $news->title }}" id="example-text-input"  placeholder="Enter the name">
                                    </div>
                                    <small class="text-danger">
                                        @error('title') {{$message}} @enderror
                                    </small>
                                </div>
    

{{--                                <div class="mb-3 row d-none">--}}
{{--                                    <label for="example-text-input" class="col-md-2 col-form-label">Kateqoriya</label>--}}
{{--                                    <div class="col-md-10">--}}
{{--                                        <select class="form-select" name="category_id" id="autoSizingSelect">--}}
{{--                                                 @foreach ($categories as $cat)--}}
{{--                                                    <option value="{{$cat->id}}"--}}
{{--                                                        @if ($news->category_id == $cat->id)--}}
{{--                                                        selected--}}
{{--                                                    @endif >--}}
{{--                                                        {{$cat->title}}</option>--}}
{{--                                                @endforeach--}}
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
                                            @foreach ($categories as $cat)
                                                <option value="{{$cat->id}}"
                                                        @if ($news->categories == $cat->id)
                                                        selected
                                                        @endif >
                                                    {{$cat->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <small class="text-danger">
                                        @error('categories'){{$message}}@enderror
                                    </small>
                                </div>
                                

{{--                          
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-2 col-form-label">Qalereya</label>
                                <div class="col-md-10">
                                    <select class="form-select" name="gallery_id" id="autoSizingSelect">
                                        @foreach ($photo_galleries as $gallery)
                                             <option value="{{$gallery->id}}" 
                                                @if ($news->gallery_id == $gallery->id) 
                                            @endif selected>
                                                {{$gallery->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <small class="text-danger">
                                    @error('gallery_id'){{$message}}@enderror
                                </small>
                            </div> --}}

                                  

                            <div class="form-group img-section">
                                <label for="exampleFormControlFile1">Şəkil</label>
                                <input id="uploadImage" value="{{$news->image}}" type="file" name="image" class="form-control-file w-25" id="exampleFormControlFile1" onchange="PreviewImage();">
                                <div class="delete-img" onclick="deleteImage();"><i class="fas fa-trash"></i></div>
                                <input id="hiddenInput" type="hidden" name="hidden" value="1">
                                    <?php
                                        if (empty($news->image))
                                            echo "<img id='previewImage' src='".asset('uploads/noPhoto.png')."' class='img-thumbnail preview-img w-25 mb-2' alt=''>";
                                        else
                                            echo "<img id='previewImage' src='".asset('uploads/news/'.$news->image)."' class='img-thumbnail preview-img w-25 mb-2' alt=''>";
                                    ?>
                            </div>

                            
                            <div class="mb-3 row">
                                <label for="example-password-input" class="col-md-2 col-form-label">Status</label>
                                <div class="col-md-10">
                                    <select class="form-select" name="status" id="inlineFormSelectPref">
                                        <option value="1" <?php if ($news->status ==1) echo 'selected' ?>>Aktiv</option>
                                        <option value="0" <?php if ($news->status ==0) echo 'selected' ?>>Deaktiv</option>
                                    </select>
                                </div>
                                <small class="text-danger">
                                    @error('status'){{$message}}@enderror
                                </small>
                            </div>


                           
                            <div class="mb-3 row">
                                <label for="example-email-input" class="col-md-2 col-form-label">Mətn</label>
                                <div class="col-md-10">
                                    <textarea cols="40" rows="10" class="form-control editor" id="editor" name="content" style="visibility:hidden; display: none;">{{ $news->content }}</textarea>
                                </div>
                                <small class="text-danger">
                                    @error('content'){{$message}}@enderror
                                </small>
                            </div>

                            {{-- <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-2 col-form-label">Link</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="url" value="{{$news->url}}" id="example-text-input"  placeholder="Linki daxil edin">
                                </div>
                                <small class="text-danger">
                                    @error('url'){{$message}}@enderror
                                </small>
                            </div> --}}

                            <div class="mb-3 row">
                                <label for="example-email-input" class="col-md-2 col-form-label"></label>
                                <div class="col-md-10">
                                    <button class="btn btn-info" type="submit">Redaktə et</button>
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


{{-- @section('styles')
    <link rel="stylesheet" href="{{asset('backend/assets/libs/summernote/summernote.min.css')}}">
@endsection --}}

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