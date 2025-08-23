@extends('admin.layout.main')

@section('meta')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
        <title>Works - Trackmywork Admin </title>

        <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
        <!--  BEGIN CUSTOM STYLE FILE  -->
        <link href="{{ asset('src/assets/css/light/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('src/assets/css/light/components/timeline.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('src/assets/css/dark/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('src/assets/css/dark/components/timeline.css') }}" rel="stylesheet" type="text/css" />


        <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
        <link href="{{ asset('src/plugins/src/apex/apexcharts.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('src/assets/css/light/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('src/assets/css/dark/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

        <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
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
                                            <li class="breadcrumb-item active" aria-current="page">{{ $work->work_name }}
                                            </li>
                                            <li class="breadcrumb-item active" aria-current="page"> Step`s</li>
                                        </ol>
                                    </nav>

                                </div>
                            </div>

                        </header>
                    </div>
                </div>
                <!--  END BREADCRUMBS  -->

                <div class="row layout-top-spacing">
                    <div class="widget-heading">
                        <h5 class="">Required Documents</h5>
                    </div>
                    {{-- Required Documents --}}
                    @forelse($work->category->requiredDocs as $doc)
                        <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                            <div class="widget widget-six">
                                <div class="widget-heading">
                                    <h6 class=""> <strong>{{ $doc->doc_name }}</strong> </h6>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">No .</div>
                    @endforelse



                    {{-- Steps Timeline --}}
                    <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-activity-five">

                            <div class="widget-heading">
                                <h5 class="">{{ $work->category->name }} - Steps</h5>
                            </div>

                            <div class="widget-content">

                                <div class="w-shadow-top"></div>

                                <div class="mt-container mx-auto">
                                    <div class="timeline-line">

                                        @foreach ($work->category->steps as $step)
                                            @php
                                                $isCompleted = $completedSteps[$step->id] ?? 'pending';
                                            @endphp

                                            <div class="item-timeline timeline-new">
                                                <div class="t-dot">
                                                    @if ($isCompleted === 'completed')
                                                        <div class="t-success">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-check">
                                                                <polyline points="20 6 9 17 4 12"></polyline>
                                                            </svg>
                                                        </div>
                                                    @else
                                                        <div class="circle-placeholder"
                                                            style="width: 24px; height: 24px; border: 2px solid #ccc; border-radius: 50%;">
                                                        </div>
                                                    @endif
                                                </div>

                                                <div class="t-content">
                                                    <div class="t-uppercontent d-flex align-items-center">
                                                        <input style="visibility: hidden;" type="checkbox"
                                                            class="me-2 step-checkbox"
                                                            data-category-step-id="{{ $step->id }}"
                                                            data-work-id="{{ $work->id }}"
                                                            id="step_{{ $step->id }}"
                                                            @if ($isCompleted === 'completed') checked @endif>

                                                        <label for="step_{{ $step->id }}"
                                                            style="display: flex;width:90%;">{{ $step->step_name }} &nbsp;
                                                            @if ($step->step_type == 'copy_option')
                                                                <span class="badge badge-primary"> <small id="sh-text4"
                                                                        class="form-text mt-0" style="font-size: 12px;">
                                                                        Copy Required / Not </small> </span>
                                                            @endif
                                                        </label>
                                                    </div>

                                                    {{-- Show options if available --}}
                                                    @if ($step->options->count())
                                                        <div class="ms-4 mt-2"
                                                            style="display: flex; flex-wrap: wrap; gap: 20px;">
                                                            @foreach ($step->options as $option)
                                                                <label class="d-block">
                                                                    <input type="radio"
                                                                        name="option_{{ $step->id }}"
                                                                        value="{{ $option->id }}"
                                                                        class="step-option-radio"
                                                                        data-work-id="{{ $work->id }}"
                                                                        data-step-id="{{ $step->id }}">
                                                                    {{ $option->option_name }}
                                                                </label>
                                                            @endforeach
                                                        </div>
                                                    @endif


                                                </div>
                                            </div>
                                        @endforeach



                                    </div>
                                </div>

                                <div class="w-shadow-bottom"></div>
                            </div>
                        </div>
                    </div>



                </div>

            </div>

        </div>
    @endsection


    @section('js')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const checkboxes = document.querySelectorAll('.step-checkbox');

                checkboxes.forEach((checkbox, index) => {
                    checkbox.addEventListener('change', function(e) {
                        e.preventDefault();

                        // Check if previous step is completed
                        if (index > 0) {
                            const prevCheckbox = checkboxes[index - 1];
                            if (!prevCheckbox.checked) {
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'Oops!',
                                    text: 'You must complete the previous step before updating this one.',
                                });
                                this.checked = false;
                                return;
                            }
                        }

                        const timelineItem = this.closest('.item-timeline');
                        const dotContainer = timelineItem.querySelector('.t-dot');

                        const categoryStepId = this.dataset.categoryStepId;
                        const workId = this.dataset.workId;
                        const status = this.checked ? 'completed' : 'pending';

                        Swal.fire({
                            title: 'Are you sure?',
                            text: `Do you really want to mark this step as "${status}"?`,
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonText: 'Yes, update it!',
                            cancelButtonText: 'Cancel',
                            reverseButtons: true
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Update UI immediately
                                dotContainer.innerHTML = status === 'completed' ?
                                    `<div class="t-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-check">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                        </div>` :
                                    `<div class="circle-placeholder"
                            style="width: 24px; height: 24px; border: 2px solid #ccc; border-radius: 50%;"></div>`;

                                // Send AJAX
                                fetch("{{ route('worksteps.update') }}", {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/json',
                                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                        },
                                        body: JSON.stringify({
                                            work_id: workId,
                                            category_step_id: categoryStepId,
                                            status: status
                                        })
                                    })
                                    .then(response => response.json())
                                    .then(data => {
                                        if (data.success) {
                                            Swal.fire({
                                                icon: 'success',
                                                title: data.message,
                                                toast: true,
                                                position: 'top-end',
                                                showConfirmButton: false,
                                                timer: 2000
                                            });
                                        } else {
                                            Swal.fire({
                                                icon: 'error',
                                                title: 'Error',
                                                text: 'Failed to update step status!'
                                            });
                                            checkbox.checked = !checkbox.checked;
                                        }
                                    })
                                    .catch(() => {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Error',
                                            text: 'Something went wrong!'
                                        });
                                        checkbox.checked = !checkbox.checked;
                                    });
                            } else {
                                this.checked = !this.checked;
                            }
                        });
                    });
                });
            });
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const radios = document.querySelectorAll('.step-option-radio');

                radios.forEach(radio => {
                    radio.addEventListener('change', function() {
                        const workId = this.dataset.workId;
                        const stepId = this.dataset.stepId;
                        const optionId = this.value;

                        Swal.fire({
                            title: 'Are you sure?',
                            text: 'Do you want to select this option for this step?',
                            icon: 'question',
                            showCancelButton: true,
                            confirmButtonText: 'Yes, select it!',
                            cancelButtonText: 'Cancel',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                fetch("{{ route('workstepoption.update') }}", {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/json',
                                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                        },
                                        body: JSON.stringify({
                                            work_id: workId,
                                            category_step_id: stepId,
                                            option_id: optionId
                                        })
                                    })
                                    .then(res => res.json())
                                    .then(data => {
                                        if (data.success) {
                                            Swal.fire({
                                                icon: 'success',
                                                title: data.message,
                                                toast: true,
                                                position: 'top-end',
                                                showConfirmButton: false,
                                                timer: 2000
                                            });
                                        } else {
                                            Swal.fire({
                                                icon: 'error',
                                                title: 'Error',
                                                text: 'Failed to update option!'
                                            });
                                        }
                                    })
                                    .catch(err => {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Error',
                                            text: 'Something went wrong!'
                                        });
                                    });
                            } else {
                                // Revert radio selection if canceled
                                this.checked = false;
                            }
                        });
                    });
                });
            });
        </script>


        </body>

    </html>
@endsection
