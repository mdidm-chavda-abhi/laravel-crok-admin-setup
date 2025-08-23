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
        <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/src/table/datatable/datatables.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('src/plugins/css/light/table/datatable/dt-global_style.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('src/plugins/css/light/table/datatable/custom_dt_miscellaneous.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('src/plugins/css/dark/table/datatable/dt-global_style.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('src/plugins/css/dark/table/datatable/custom_dt_miscellaneous.css') }}">

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
                                            <li class="breadcrumb-item active" aria-current="page">Works List</li>
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

                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-content widget-content-area">
                                <table id="html5-extension" class="table dt-table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Work Name</th>
                                            <th>Assign to</th>
                                            <th>Bank Name</th>
                                            <th>Category Name</th>
                                            {{-- <th>Status</th> --}}
                                            <th>Created Date</th>
                                            <th>Steps</th>

                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($Works as $Work)
                                            <tr>
                                                <td>{{ $Work->work_name }}</td>
                                                <td>{{ $Work->client->name ?? 'N/A' }}</td>
                                                <td>{{ $Work->bank->bank_name ?? '-' }}</td>
                                                <td>{{ $Work->category->name ?? '-' }}</td>
                                                {{-- <td>
                                                    @php
                                                        $status = $Work->status ?? 'pending';
                                                        $statusClasses = [
                                                            'pending' => 'badge bg-warning text-dark',
                                                            'in_progress' => 'badge bg-info text-dark',
                                                            'completed' => 'badge bg-success',
                                                            'cancelled' => 'badge bg-danger',
                                                        ];
                                                    @endphp

                                                    <span class="{{ $statusClasses[$status] ?? 'badge bg-secondary' }}">
                                                        {{ ucfirst(str_replace('_', ' ', $status)) }}
                                                    </span>
                                                </td> --}}
                                                <td>
                                                    {{ $Work->creation_date ? \Carbon\Carbon::parse($Work->creation_date)->format('j F Y') : '-' }}
                                                </td>

                                                <td>
                                                    <a class="btn btn-success position-relative mb-2 me-4" href="{{ route('work.step.list', $Work->id) }}">
                                                        <div>


                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-check-circle">
                                                            <path d="M9 11l3 3L22 4"></path>
                                                            <circle cx="12" cy="12" r="10"></circle>
                                                        </svg>
                                                          </div>
                                                        <span class="btn-text-inner">Steps</span>
                                                        </button>
                                                </td>

                                                <td class="text-center">
                                                    <div class="action-btns">
                                                        <a href="{{ route('work.edit', $Work->id) }}"
                                                            class="action-btn btn-edit bs-tooltip me-2"
                                                            data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-edit-2">
                                                                <path
                                                                    d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                                </path>
                                                            </svg>
                                                        </a>
                                                        <a href="javascript:void(0);"
                                                            class="action-btn btn-delete bs-tooltip"
                                                            data-id="{{ $Work->id }}" data-toggle="tooltip"
                                                            data-placement="top" title="Delete">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-trash-2">
                                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                                <path
                                                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                                </path>
                                                                <line x1="10" y1="11" x2="10"
                                                                    y2="17"></line>
                                                                <line x1="14" y1="11" x2="14"
                                                                    y2="17"></line>
                                                            </svg>
                                                        </a>

                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>

                </div>


            </div>

        </div>
    @endsection


    @section('js')
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="{{ asset('src/plugins/src/table/datatable/datatables.js') }}"></script>
        <script src="{{ asset('src/plugins/src/table/datatable/button-ext/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('src/plugins/src/table/datatable/button-ext/jszip.min.js') }}"></script>
        <script src="{{ asset('src/plugins/src/table/datatable/button-ext/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('src/plugins/src/table/datatable/button-ext/buttons.print.min.js') }}"></script>
        <script src="{{ asset('src/plugins/src/table/datatable/custom_miscellaneous.js') }}"></script>
        <!-- END PAGE LEVEL SCRIPTS -->


        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            document.querySelectorAll('.btn-delete').forEach(button => {
                button.addEventListener('click', function() {
                    let WorkId = this.getAttribute('data-id');

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = `/work/delete/${WorkId}`;
                        }
                    });

                });
            });
        </script>


        </body>

    </html>
@endsection
