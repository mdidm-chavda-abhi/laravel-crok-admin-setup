@extends('admin.layout.main')

@section('meta')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
        <title>Work - Trackmywork Admin </title>

        <!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
        <link href="{{ asset('src/assets/css/light/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('src/assets/css/dark/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
        <!-- BEGIN PAGE LEVEL CUSTOM STYLES -->

        <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/src/tomSelect/tom-select.default.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/css/light/tomSelect/custom-tomSelect.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/css/dark/tomSelect/custom-tomSelect.css') }}">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    @endsection

    @section('main')
        <div class="layout-px-spacing">
            <div class="middle-content container-xxl p-0">

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
                                    <div class="page-title"></div>
                                    <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#">Work</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Add Work</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </header>
                    </div>
                </div>

                <style>
                    .category-card {
                        background-color: #007bff;
                        /* Primary by default */
                        color: #fff;
                        border: 2px solid #007bff;
                        border-radius: 8px;
                        transition: all 0.3s ease;
                        position: relative;
                    }

                    .category-card .check-icon {
                        position: absolute;
                        top: 8px;
                        right: 12px;
                        font-size: 20px;
                        font-weight: bold;
                    }

                    .category-card.selected {
                        background-color: #28a745;
                        /* Success when selected */
                        border: 2px solid #218838;
                    }

                    .category-card.selected .check-icon i {
                        content: "\f14a";
                        /* Font Awesome checked square */
                        font-family: "Font Awesome 5 Free";
                        font-weight: 900;
                    }
                </style>
                <div class="seperator-header"></div>

                <div class="row">
                    <form action="{{ route('work.store') }}" method="POST" class="row g-3 needs-validation" novalidate>
                        @csrf

                        {{-- Work Name --}}
                        <div class="col-md-6 position-relative">
                            <label for="work_name" class="form-label">Work Name</label>
                            <input type="text" name="work_name" id="work_name"
                                class="form-control @error('work_name') is-invalid @enderror" value="{{ old('work_name') }}"
                                required>
                            <div class="invalid-tooltip">
                                @error('work_name')
                                    {{ $message }}
                                @else
                                    Please enter a work name.
                                @enderror
                            </div>
                        </div>

                        {{-- Select Person --}}
                        <div class="col-md-6 position-relative">
                            <label for="person_id" class="form-label">Select Person</label>
                            <select id="select-beast" name="person_id"
                                class="form-control @error('person_id') is-invalid @enderror"
                                placeholder="Select a person...">
                                <option value="" disabled>Select a person...</option>
                                @foreach ($clients as $client)
                                    <option value="{{ $client->id }}"
                                        {{ old('person_id') == $client->id ? 'selected' : '' }}>
                                        {{ $client->name }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="invalid-tooltip">
                                @error('person_id')
                                    {{ $message }}
                                @else
                                    Please select a person.
                                @enderror
                            </div>
                        </div>

                        {{-- Select Bank --}}
                        <div class="col-md-6 position-relative">
                            <label for="bank_id" class="form-label">Select Bank</label>
                            <select id="select-bank" name="bank_id"
                                class="form-control @error('bank_id') is-invalid @enderror" placeholder="Select a bank...">
                                <option value="" disabled>Select a bank...</option>
                                @foreach ($banks as $bank)
                                    <option value="{{ $bank->id }}"
                                        {{ old('bank_id') == $bank->id ? 'selected' : '' }}>
                                        {{ $bank->bank_name }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="invalid-tooltip">
                                @error('bank_id')
                                    {{ $message }}
                                @else
                                    Please select a bank.
                                @enderror
                            </div>
                        </div>

                        {{-- Categories --}}
                        <div class="col-md-12 mt-3">
                            <label class="form-label">Select Category</label>
                            <div class="d-flex flex-wrap gap-3">
                                @foreach ($categories as $category)
                                    <div class="card category-card {{ old('category_id') == $category->id ? 'selected' : '' }}"
                                        data-id="{{ $category->id }}"
                                        style="cursor:pointer; width:180px; position: relative;">
                                        <div class="card-body text-center">
                                            <h5 class="card-title mb-0">{{ $category->name }}</h5>
                                            <span class="check-icon">
                                                <i class="far fa-square"></i> <!-- Empty checkbox by default -->
                                            </span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <input type="hidden" name="category_id" id="selected_category"
                                value="{{ old('category_id') }}">
                        </div>



                        {{-- Submit --}}
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Store Work</button>
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


        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="{{ asset('src/plugins/src/tomSelect/tom-select.base.js') }}"></script>
        <script src="{{ asset('src/plugins/src/tomSelect/custom-tom-select.js') }}"></script>


     <script>
    window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('needs-validation');

        Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                let categoryInput = document.getElementById('selected_category');

                // Custom validation for category selection
                if (!categoryInput.value) {
                    event.preventDefault();
                    event.stopPropagation();

                    // Show a custom Bootstrap validation tooltip
                    showCategoryError();
                } else {
                    hideCategoryError();
                }

                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }

                form.classList.add('was-validated');
            }, false);
        });

        function showCategoryError() {
            let categoryWrapper = document.querySelector('.d-flex.flex-wrap');
            if (!document.querySelector('.category-error')) {
                let errorDiv = document.createElement('div');
                errorDiv.className = 'invalid-tooltip category-error';
                errorDiv.style.display = 'block';
                errorDiv.innerText = 'Please select a category.';
                categoryWrapper.parentNode.appendChild(errorDiv);
            }
        }

        function hideCategoryError() {
            let errorDiv = document.querySelector('.category-error');
            if (errorDiv) {
                errorDiv.remove();
            }
        }

        // Also remove error when user selects a category
        const categoryCards = document.querySelectorAll('.category-card');
        categoryCards.forEach(card => {
            card.addEventListener('click', function() {
                hideCategoryError();
            });
        });
    }, false);
</script>


        <script>
            // Initialize TomSelect for Person Dropdown
            new TomSelect("#select-beast", {
                create: false,
                sortField: {
                    field: "text",
                    direction: "asc"
                }
            });



            // Bank Selection (only one at a time)
            const bankCards = document.querySelectorAll('.bank-card');
            const selectedBankInput = document.getElementById('selected_bank');

            bankCards.forEach(card => {
                card.addEventListener('click', function() {
                    bankCards.forEach(b => b.classList.remove('bg-primary', 'text-white'));
                    this.classList.add('bg-primary', 'text-white');
                    selectedBankInput.value = this.dataset.id;
                });
            });
        </script>
        <script>
            const categoryCards = document.querySelectorAll('.category-card');
            const selectedCategoryInput = document.getElementById('selected_category');

            categoryCards.forEach(card => {
                card.addEventListener('click', function() {
                    // Reset all cards
                    categoryCards.forEach(c => {
                        c.classList.remove('selected', 'bg-success', 'text-white');
                        const icon = c.querySelector('.check-icon i');
                        icon.className = 'far fa-square'; // Reset icon to empty checkbox
                    });

                    // Apply selected styles and icon to clicked card
                    this.classList.add('selected', 'bg-success', 'text-white');
                    const selectedIcon = this.querySelector('.check-icon i');
                    selectedIcon.className = 'far fa-check-square'; // Checked checkbox

                    // Update hidden input
                    selectedCategoryInput.value = this.dataset.id;
                });

                // Preselect if old value exists
                if (selectedCategoryInput.value === card.dataset.id) {
                    card.classList.add('selected', 'bg-success', 'text-white');
                    const selectedIcon = card.querySelector('.check-icon i');
                    selectedIcon.className = 'far fa-check-square'; // Checked checkbox
                }
            });
        </script>


        </body>

    </html>
@endsection
