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
                                        <h4 class="card-title">Yenİ slayd daxİl edİn:</h4>
                                        <div class="button-items">
                                            <a href="{{route('backend.sliders.create')}}" class="btn btn-primary waves-effect waves-ligh mt-2">  <i class="mdi mdi-plus me-1"></i>Yarat</a>
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
                                            <th>Ad</th>
                                            <th>Status</th>      
                                            <th>Əməliyyatlar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sliders as $slider)
                                        <tr id="row{{ $slider->id }}">
                                            <td>{{ $slider->id }}</td>
                                            <td>
                                                <img src="{{ asset('uploads/sliders/'. $slider->image) }}" width="100">
                                            </td>

                                            <td>{{ $slider->title }}</td>

                                            {{-- <td>{{ $slider->url }}</td> --}}

                                            <td>
                                                @if ($slider->status == 1)
                                                    <span class="badge bg-success">Aktiv</span>
                                                @else
                                                <span class="badge bg-danger">Deaktiv</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('backend.sliders.edit', ['slider' => $slider->id]) }}"
                                                    class=" text-success"><i
                                                        class="mdi mdi-pencil font-size-24"></i></a>
                                                <a class="text-danger deleteBtn" data-id="{{ $slider->id }}"><i
                                                        class="mdi mdi-delete font-size-24"></i></a>
                                            </td>

                                        </tr>
                                        @endforeach
                                       
                                    </tbody>
                                </table>
                                <br>
                                {{$sliders ->appends(request()->input())->links()}}
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
                let route = '{{route('backend.sliders.destroy', ['slider'=>'ids'])}}';
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