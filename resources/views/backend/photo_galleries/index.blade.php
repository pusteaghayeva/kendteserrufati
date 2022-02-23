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
                                        <h4 class="card-title">Foto qalereya</h4>
                                        <div class="button-items">
                                            <a href="{{route('backend.photo_galleries.create')}}" class="btn btn-primary waves-effect waves-ligh mt-2">  <i class="mdi mdi-plus me-1"></i>Yarat</a>
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
                            {{-- <h4 class="card-title">Hoverable rows</h4> --}}
                            {{-- <p class="card-title-desc">Add <code>.table-hover</code> to enable a hover state on table rows within a <code>&lt;tbody&gt;</code>.</p>     --}}                    
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th><a href="{{ request()->fullUrlWithQuery(['sortBy' =>'id', 'orderBy' => $orderBy])}}">#</a></th>
                                            <th><a href="{{ request()->fullUrlWithQuery(['sortBy' =>'id', 'orderBy' => $orderBy])}}">Başlıq</a></th>
                                            <th>Status</th>
                                            <th>Əməliyyatlar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($photo_galleries as $photo_gallery)
                                        <tr id="row{{ $photo_gallery->id }}">
                                            <td>{{ $photo_gallery->id }}</td>
                                            <td>{{ $photo_gallery->title }}</td>                                        
                                            <td>
                                                @if ($photo_gallery->status == 1)
                                                    <span class="badge bg-success">Aktiv</span>
                                                @else
                                                <span class="badge bg-danger">Deaktiv</span>
                                                @endif
                                            </td>

                                            <td>
                                                <a href="{{ route('backend.photo_galleries.edit', ['photo_gallery' => $photo_gallery->id]) }}"
                                                    class=" text-success"><i
                                                        class="mdi mdi-pencil font-size-24"></i></a>
                                                <a class="text-danger deleteBtn" data-id="{{ $photo_gallery->id }}"><i
                                                        class="mdi mdi-delete font-size-24"></i></a>

                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                <br>
                                {{-- {{$photo_galleries->links()}} --}}
                                {{$photo_galleries ->appends(request()->input())->links()}}

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
                let route = '{{route('backend.photo_galleries.destroy', ['photo_gallery'=>'id'])}}';
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
