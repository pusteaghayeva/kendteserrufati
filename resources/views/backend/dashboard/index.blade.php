@extends('layouts.backend')
@section('title', 'Dashboard')
@section('content')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <div class="checkout-tabs">
                <div class="row">
                    <div class="col-xl-3 col-sm-3">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active"   href="{{route('backend.news.index')}}"  >
                                <i class= "bx bxs-news d-block check-nav-icon mt-4 mb-2"></i>
                                <p class="fw-bold mb-4">Xəbərlər</p>
                            </a>
                            <a class="nav-link" href="{{route('backend.static_pages.index')}}"> 
                                <i class= "bx bxs-detail d-block check-nav-icon mt-4 mb-2"></i>
                                <p class="fw-bold mb-4">Səhifələr</p>
                            </a>
                            <a class="nav-link" href="{{route('backend.laws.index')}}">
                                <i class= "bx bxs-collection d-block check-nav-icon mt-4 mb-2"></i>
                                <p class="fw-bold mb-4">Qanunvericilik</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-3">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" href="{{route('backend.photos.index')}}">
                                <i class= "bx bx-images d-block check-nav-icon mt-4 mb-2"></i>
                                <p class="fw-bold mb-4">Fotoqalereya</p>
                            </a>
                            <a class="nav-link" href="{{route('backend.videos.index')}}"> 
                                <i class= "bx bxs-videos d-block check-nav-icon mt-4 mb-2"></i>
                                <p class="fw-bold mb-4">Video</p>
                            </a>
                            <a class="nav-link" href="{{route('backend.sliders.index')}}">
                                <i class= "bx bx-slider d-block check-nav-icon mt-4 mb-2"></i>
                                <p class="fw-bold mb-4">Slayd</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-3">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" href="{{route('backend.categories.index')}}">
                                <i class= "bx bx-customize
                                d-block check-nav-icon mt-4 mb-2"></i>
                                <p class="fw-bold mb-4">Kateqoriyalar</p>
                            </a>
                            <a class="nav-link" href="{{route('backend.admins.index')}}"> 
                                <i class= "bx bxs-user-plus d-block check-nav-icon mt-4 mb-2"></i>
                                <p class="fw-bold mb-4">Admin</p>
                            </a>
                            <a class="nav-link" href="{{route('backend.settings.edit', ['setting' => 1])}}">
                                <i class= "bx bxs-cog d-block check-nav-icon mt-4 mb-2"></i>
                                <p class="fw-bold mb-4">Tənzimləmələr</p>
                            </a>
                        </div>
                    </div>
        
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    <!-- Transaction Modal -->
    <div class="modal fade transaction-detailModal" tabindex="-1" role="dialog" aria-labelledby="transaction-detailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="transaction-detailModalLabel">Order Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="mb-2">Product id: <span class="text-primary">#SK2540</span></p>
                    <p class="mb-4">Billing Name: <span class="text-primary">Neal Matthews</span></p>

                    <div class="table-responsive">
                        <table class="table align-middle table-nowrap">
                            <thead>
                                <tr>
                                    <th scope="col">Product</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">
                                        <div>
                                            <img src="{{asset('backend/assets/images/product/img-7.png')}} " alt="" class="avatar-sm">
                                        </div>
                                    </th>
                                    <td>
                                        <div>
                                            <h5 class="text-truncate font-size-14">Wireless Headphone (Black)</h5>
                                            <p class="text-muted mb-0">$ 225 x 1</p>
                                        </div>
                                    </td>
                                    <td>$ 255</td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <div>
                                            <img src="{{asset('backend/assets/images/product/img-4.png')}}" alt="" class="avatar-sm">
                                        </div>
                                    </th>
                                    <td>
                                        <div>
                                            <h5 class="text-truncate font-size-14">Phone patterned cases</h5>
                                            <p class="text-muted mb-0">$ 145 x 1</p>
                                        </div>
                                    </td>
                                    <td>$ 145</td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <h6 class="m-0 text-right">Sub Total:</h6>
                                    </td>
                                    <td>
                                        $ 400
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <h6 class="m-0 text-right">Shipping:</h6>
                                    </td>
                                    <td>
                                        Free
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <h6 class="m-0 text-right">Total:</h6>
                                    </td>
                                    <td>
                                        $ 400
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal -->

    <!-- subscribeModal -->
    
    <!-- end modal -->

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