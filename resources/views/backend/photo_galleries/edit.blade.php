@extends('layouts.backend')
@section('content')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Foto qalereya</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('backend.photo_galleries.update', ['photo_gallery' => $photo_gallery->id])}}" enctype="multipart/form-data" method="POST">
                                @csrf
                                @method('PUT')
                                
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Başlıq</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="title" value="{{$photo_gallery->title}}" id="example-text-input"  placeholder="Başlıq daxil edin">
                                    </div>
                                    <small class="text-danger">
                                        @error('title'){{$message}}@enderror
                                    </small>
                                </div>
                     

                                <div class="mb-3 row">
                                    <label for="example-password-input" class="col-md-2 col-form-label">Status</label>
                                    <div class="col-md-10">
                                        <select class="form-select" name="status" id="inlineFormSelectPref">
                                            <option value="1" <?php if ($photo_gallery->status ==1) echo 'selected' ?>>Aktiv</option>
                                            <option value="0" <?php if ($photo_gallery->status ==0) echo 'selected' ?>>Deaktiv</option>
                                        </select>
                                    </div>
                                    <small class="text-danger">
                                        @error('status'){{$message}}@enderror
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