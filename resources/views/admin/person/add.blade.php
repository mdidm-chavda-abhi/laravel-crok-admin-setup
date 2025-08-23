@extends('admin.layout.main')

@section('meta')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
        <title>Trackmywork Admin </title>

        <!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
        <link href="{{ asset('src/assets/css/light/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('src/assets/css/dark/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
        <!-- BEGIN PAGE LEVEL CUSTOM STYLES -->


    <link rel="stylesheet" type="text/css" href="{{asset('src/plugins/src/tomSelect/tom-select.default.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('src/plugins/css/light/tomSelect/custom-tomSelect.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('src/plugins/css/dark/tomSelect/custom-tomSelect.css')}}">

    @endsection

    @section('main')
        <div class="layout-px-spacing">

            <div class="middle-content container-xxl p-0">

                <!--  BEGIN BREADCRUMBS  -->
                <div class="secondary-nav">
                    <div class="breadcrumbs-container" data-page-heading="Analytics">
                        <header class="header navbar navbar-expand-sm">
                            <a href="javascript:void(0);" class="btn-toggle sidebarCollapse" data-placement="bottom">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-menu">
                                    <line x1="3" y1="12" x2="21" y2="12"></line>
                                    <line x1="3" y1="6" x2="21" y2="6"></line>
                                    <line x1="3" y1="18" x2="21" y2="18"></line>
                                </svg>
                            </a>
                            <div class="d-flex breadcrumb-content">
                                <div class="page-header">

                                    <div class="page-title">
                                    </div>

                                    <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Add Persons</li>
                                        </ol>
                                    </nav>

                                </div>
                            </div>

                        </header>
                    </div>
                </div>
                <!--  END BREADCRUMBS  -->



                <div class="seperator-header">

                </div>
                <div class="row">
                    <form action="{{ route('work.store') }}" method="POST" class="row g-3 needs-validation"
                        novalidate>
                        @csrf

                        {{-- Name --}}
                        <div class="col-md-6 position-relative">
                            <label for="name" class="form-label">Work Name</label>
                            <input type="text" name="name" id="name"
                                class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                required>
                            <div class="invalid-tooltip">
                                @error('name')
                                    {{ $message }}
                                @else
                                    Please enter a name.
                                @enderror
                            </div>
                        </div>

                    {{-- WhatsApp Number --}}
                        <div class="col-md-6 position-relative">
                            <label for="whatsapp_number" class="form-label">WhatsApp Number</label>
                            <input type="number" name="whatsapp_number" id="whatsapp_number"
                                class="form-control @error('whatsapp_number') is-invalid @enderror"
                                 required>
                            <div class="invalid-tooltip">
                                @error('whatsapp_number')
                                    {{ $message }}
                                @else
                                    Please enter a valid WhatsApp number.
                                @enderror
                            </div>
                        </div>

                        {{-- Description --}}
                        <div class="col-md-12 position-relative">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"
                                rows="4" ></textarea>
                            <div class="invalid-tooltip">
                                @error('description')
                                    {{ $message }}
                                @else
                                    Please enter a description.
                                @enderror
                            </div>
                        </div>


                        {{-- Submit --}}
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Store Form</button>
                        </div>
                    </form>
                </div>



            </div>

        </div>
    @endsection


    @section('js')
        <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
        <script src="{{ asset('src/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
        <script src="{{ asset('src/plugins/src/mousetrap/mousetrap.min.js') }}"></script>
        <script src="{{ asset('src/plugins/src/waves/waves.min.js') }}"></script>
        <script src="{{ asset('layouts/vertical-dark-menu/app.js') }}"></script>
        <script src="{{ asset('src/plugins/src/highlight/highlight.pack.js') }}"></script>
        <!-- END GLOBAL MANDATORY SCRIPTS -->

        <!--  BEGIN CUSTOM SCRIPTS FILE  -->
        <script src="{{ asset('src/assets/js/scrollspyNav.js') }}"></script>
        <script src="{{ asset('src/assets/js/forms/bootstrap_validation/bs_validation_script.js') }}"></script>
        <!--  END CUSTOM SCRIPTS FILE  -->


        <script src="{{asset('src/plugins/src/tomSelect/tom-select.base.js')}}"></script>
        <script src="{{asset('src/plugins/src/tomSelect/custom-tom-select.js')}}"></script>



        <script>
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        </script>


<script>
$(document).ready(function () {
    $('form.needs-validation').on('submit', function (event) {
        var phone = $('#whatsapp_number').val().trim();
        var phoneRegex = /^[0-9]{10,15}$/; // 10 to 15 digits allowed

        if (!phoneRegex.test(phone)) {
            event.preventDefault();
            event.stopPropagation();
            $('#whatsapp_number').addClass('is-invalid');
            $('#whatsapp_number').siblings('.invalid-tooltip').text('Please enter a valid WhatsApp number (10-15 digits).');
        } else {
            $('#whatsapp_number').removeClass('is-invalid');
        }
    });

    // Optional: Real-time validation as user types
    $('#whatsapp_number').on('input', function () {
        var phone = $(this).val().trim();
        var phoneRegex = /^[0-9]{10,15}$/;

        if (!phoneRegex.test(phone)) {
            $(this).addClass('is-invalid');
        } else {
            $(this).removeClass('is-invalid');
        }
    });
});
</script>


<script>
    // Select Box

new TomSelect("#select-beast",{
    create: true,
    sortField: {
        field: "text",
        direction: "asc"
    }
});
</script>

        </body>

    </html>
@endsection
