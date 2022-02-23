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
                                        <h4 class="card-title">Buttons with icons</h4>
                                        <p class="card-title-desc">Add icon in button.</p>

                                        <div class="button-items">
                                            <a href="{{route('backend.photo_galleries.create')}}" class="btn btn-primary waves-effect waves-light">Create</a>
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
                                            <th><a href="{{ request()->fullUrlWithQuery(['sortBy' =>'id', 'orderBy' => $orderBy])}}">Title</a></th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($photo_galleries as $photo_gallery)
                                        <tr>
                                            <th scope="row">{{ $photo_gallery->id }}</th>
                                            <td>{{ $photo_gallery->title }}</td>                                        
                                            <td>{{ $photo_gallery->status }}</td>
                                            <td>
                                                <a href="{{ route('backend.photo_galleries.edit', ['photo_gallery'=>$photo_gallery->id])}}" class="btn btn-success">Edit</a>
                                                <a href="{{ route('backend.photo_galleries.destroy', ['photo_gallery'=>$photo_gallery->id]) }}" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('form').submit();">Delete</a>
                                                 <form action="{{route('backend.photo_galleries.destroy', ['photo_gallery'=>$photo_gallery->id]) }}" method="POST" id="form">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            
                                            </td>
                                        </tr>
                                        @endforeach
                                        
                                      
                                       
                                    </tbody>
                                </table>
                                <br>
                                {{$photo_galleries->links()}}
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