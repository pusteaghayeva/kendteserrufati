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
                                        <h4 class="card-title">Kollegİya</h4>
                                        <div class="button-items">
                                            <a href="{{route('backend.colleges.create')}}" class="btn btn-primary waves-effect waves-ligh mt-2">  <i class="mdi mdi-plus me-1"></i>Yarat</a>
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
{{--                                            <th>Şəkil</th>--}}
                                            <th>Ad</th>
                                            <th>Soyad</th>
                                            <th>Status</th>
{{--                                            <th>Əməliyyatlar</th>--}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($colleges as $college)
                                        <tr id="row{{ $college->id }}">
                                            <td id="row">{{ $college->id }}</td>
                                            
{{--                                            <td>--}}
{{--                                                <?php--}}
{{--                                                   if (!empty($college->image)) {--}}
{{--                                                       $image = $college->image;--}}
{{--                                                   }--}}
{{--                                                   else --}}
{{--                                                   {--}}
{{--                                                       $image  = 'noPhoto.png';--}}
{{--                                                   }--}}
{{--                                                ?>--}}
{{--                                                <img src="{{ asset('uploads/colleges/'. $college->image) }}" width="100">--}}
{{--                                            </td>--}}
                                            <td>{{ $college->name }}</td>
                                            <td>{{ $college->surname }}</td>
                                            <td>
                                                @if ($college->status == 1)
                                                    <span class="badge bg-success">Aktiv</span>
                                                @else
                                                <span class="badge bg-danger">Deaktiv</span>
                                                @endif
                                            </td>
                                     

                                            <td>
                                                <a href="{{ route('backend.colleges.edit', ['college' => $college->id]) }}"
                                                    class=" text-success"><i
                                                        class="mdi mdi-pencil font-size-24"></i></a>
                                                <a class="text-danger deleteBtn" data-id="{{ $college->id }}"><i
                                                        class="mdi mdi-delete font-size-24"></i></a>

                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <br>
                                {{$colleges ->appends(request()->input())->links()}}
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
                let route = '{{route('backend.colleges.destroy', ['college'=>'id'])}}';
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