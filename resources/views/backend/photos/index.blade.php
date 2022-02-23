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
                                        <h4 class="card-title">Fotoqalereya</h4>
                                        <div class="button-items">
                                            <a href="{{route('backend.photos.create')}}" class="btn btn-primary waves-effect waves-ligh mt-2">  <i class="mdi mdi-plus me-1"></i>Yarat</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                            <th>#</th>
                                            <th>Şəkil</th>
                                            <th>Əməliyyatlar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($photos as $photo)
                                            <tr id="row{{ $photo->id }}">
                                                <td>{{ $photo->id }}</td>
                                                <td>
                                                    <?php
                                                    if (!empty($photo->images)) {
                                                        $images = $photo->images;
                                                    } else {
                                                        $images  = 'noPhoto.png';
                                                    }
                                                    ?>
                                                    <img src="{{ asset('uploads/photos/'. $images) }}" width="100">
                                                </td>
                                                <td>
                                                    <a href="{{ route('backend.photos.edit', ['photo' => $photo->id]) }}"
                                                        class=" text-success"><i
                                                            class="mdi mdi-pencil font-size-24"></i></a>
                                                    <a class="text-danger deleteBtn" data-id="{{ $photo->id }}"><i
                                                            class="mdi mdi-delete font-size-24"></i></a>
                                                </td>
                                        </tr>
                                        @endforeach
                                        
                                      
                                       
                                    </tbody>
                                </table>
                                <br>
                                
                                {{-- {{$photos->links()}} --}}
                                {{$photos ->appends(request()->input())->links()}}

                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <!-- end row -->
  

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    
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
                let route = '{{route('backend.photos.destroy', ['photo'=>'ids'])}}';
                route = route.replace('ids', dataID);
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