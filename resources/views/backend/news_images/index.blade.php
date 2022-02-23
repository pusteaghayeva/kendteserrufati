@extends('layouts.backend')
@section('content')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

   
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                   
                            <div class="col-xl-12 ">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Xəbərİn şəkİllərİ</h4>
                                        <div class="button-items">
                                            
                                        
                                            <a href="{{route('backend.news_images.create', ['img'=>$id])}}" class="btn btn-primary waves-effect waves-ligh mt-2">  <i class="mdi mdi-plus me-1"></i>Yarat</a>
                                        </div>
                  
                                    </div>
                                </div>
                            </div>
                        {{-- <div class="col-xl-4">
                                <div class="card">
                                    <div class="card-body">
                                        <form class="app-search d-none d-lg-block" method="GET">
                                            <div class="position-relative d-flex w-50">
                                                <input type="text" name="search" class="form-control" placeholder="Axtar...">
                                                <button type="submit" class="btn btn-unique btn-rounded btn-sm my-0">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>Xəbərin şəkli</th>
                                            <th>Əməliyyatlar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($news_images as $news_image)
                                        <tr id="row{{ $news_image->id }}">
                                            <td>
                                                <?php
                                                   if (!empty($news_image->image)) {
                                                       $image = $news_image->image;
                                                   }
                                                   else 
                                                   {
                                                       $image  = 'noPhoto.png';
                                                   }
                                                ?>
                                                <img src="{{ asset('uploads/news_images/'. $news_image->image) }}" width="100">
                                            </td>

                                            <td>
                                                <a class="text-danger deleteBtn" data-id="{{ $news_image->id }}">
                                                    <i class="mdi mdi-delete font-size-24"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <br>
                                {{-- {{$news_images ->appends(request()->input())->links()}} --}}
                            </div>

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
                    <script>document.write(new Date().getFullYear())</script> © Skote.
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end d-none d-sm-block">
                        Design & Develop by Themesbrand
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
@endsection


@section('js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.deleteBtn').click(function () {
                let dataID = $(this).data('id');
                let route = '{{route('backend.news_images.destroy', ['news_image'=>'id'])}}';
                route = route.replace('id', dataID);
                Swal.fire({
                    title: 'Xəbərdarlıq',
                    text: 'Silmək istədiyinizə əminsiniz?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Bəli',
                    cancelButtonText: 'Xeyr'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: route,
                            method: 'DELETE',
                            data: {
                                id: dataID,
                            },
                            async: false,
                            success: function (response) {
                                $('#row' + dataID).remove();

                                Swal.fire({
                                    icon: 'success',
                                    title: 'Xəbərdarlıq',
                                    text: "Silindi",
                                    confirmButtonText: 'Tamam'
                                })
                            },
                            error: function () {

                            }
                        })
                    }
                })


            });
    </script>

@endsection