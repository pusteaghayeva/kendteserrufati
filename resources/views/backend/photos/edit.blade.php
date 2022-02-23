@extends('layouts.backend')
@section('content')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Şəkİlə düzəlİş et</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('backend.photos.update', ['photo' => $photos->id])}}" enctype="multipart/form-data" method="POST">
                                @csrf
                                @method('PUT')

                            
                            <div class="form-group img-section">
                                <label for="exampleFormControlFile1">Şəkil</label>
                                <input id="uploadImage" value="{{$photos->images}}" type="file" name="images" class="form-control-file w-25" id="exampleFormControlFile1" onchange="PreviewImage();">
                                <div class="delete-img" onclick="deleteImage();"><i class="fas fa-trash"></i></div>
                                <input id="hiddenInput" type="hidden" name="hidden" value="1">
                                <?php
                                if (empty($photos->images))
                                    echo "<img id='previewImage' src='".asset('uploads/noPhoto.png')."' class='img-thumbnail preview-img w-25 mb-2' alt=''>";
                                else
                                    echo "<img id='previewImage' src='".asset('uploads/photos/'.$photos->images)."' class='img-thumbnail preview-img w-25 mb-2' alt=''>";
                                ?>
                                  <small class="text-danger">
                                    @error('images'){{$message}}@enderror
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