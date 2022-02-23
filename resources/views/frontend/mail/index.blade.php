@extends('layouts.frontend')
@section('title', 'Mail')
@section('content')
    <form method="post" id="contactForm" class="gme container w-75" action="{{ url('/contact-send') }}">
        @csrf
        <input type="hidden" name="to" value="puste.aghayeva@gmail.com">

        <div class="form-group row mt-5">
            <label for="ad" class="col-sm-3 col-form-label">Soyad, ad, ata adı:<span style="color:red">*</span></label>
            <div class="col-sm-9">
                <input type="text" name="name" class="form-control" id="name" required="">
            </div>
        </div>

        <div class="form-group row">
            <label for="from" class="col-sm-3 col-form-label">Elektron-poçt:<span style="color:red">*</span></label>
            <div class="col-sm-9">
                <input type="email" name="email" class="form-control" id="email" required="">
            </div>
        </div>

        <div class="form-group row">
            <label for="tel" class="col-sm-3 col-form-label">Telefon:<span style="color:red">*</span></label>
            <div class="col-sm-9">
                <input type="text" name="phone" class="form-control" id="phone" required="">
            </div>
        </div>

        <div class="form-group row">
            <label for="unvan" class="col-sm-3 col-form-label">Ünvan:<span style="color:red">*</span></label>
            <div class="col-sm-9">
                <input type="text" name="address" class="form-control" id="address" required="">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Müraciətin növü:<span style="color:red">*</span></label>
            <div class="col-sm-9">

                <div class="form-check form-check-inline">

                    <input type="radio" checked id="html" name="type" value="erize">
                    <label for="html">ərizə</label>
                    <input type="radio" id="css" name="type" value="teklif">
                    <label for="css">təklif</label>
                    <input type="radio" id="javascript" name="type" value="sikayet">
                    <label for="javascript">şikayət</label>

                </div>

            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="content">Müraciətin mətni:<span style="color:red">*</span></label>
            <div class="col-sm-9">
                <textarea class="form-control" name="content" id="content" cols="40" rows="10"></textarea>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-3">
            </div>
            <div class="col-sm-9">
                <input id="contact-btn" type="button" class="btn btn-info" value="Göndər">
            </div>
        </div>

    </form>

@endsection




@section('scripts')
    <script src="{{ asset('backend/assets/libs/sweetalert2/sweetalert2.all.min.js') }}"></script>
    @include('sweetalert::alert')
    <script>
        $('#contact-btn').click(function() {
            var name = $('#name').val()
            var email = $('#email').val()
            var phone = $('#phone').val()
            var address = $('#address').val()
            var content = $('#content').val()

            if (name.trim() == '' || email.trim() == '' || phone.trim() == '' || address.trim() == '' || content
                .trim() == '') {

                Swal.fire({
                    icon: 'error',
                    title: 'Xəta...',
                    text: 'Bütün xanalar doldurulmalıdır!',
                    confirmButtonText: 'Tamam',
                })

            } else {
                $('#contactForm').submit();
            }

        })
    </script>
@endsection
