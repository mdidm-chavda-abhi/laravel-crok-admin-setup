@extends('admin.layout.main')

@section('meta')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
        <title>Trackmywork Admin </title>

        <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
        <link href="{{ asset('src/plugins/src/apex/apexcharts.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('src/assets/css/light/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('src/assets/css/dark/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
        <!--  BEGIN CUSTOM STYLE FILE  -->
        <link href="{{ asset('src/assets/css/light/elements/custom-tree_view.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('src/assets/css/dark/elements/custom-tree_view.css') }}" rel="stylesheet" type="text/css" />
        <!--  END CUSTOM STYLE FILE  -->
    @endsection

    @section('main')
        <div class="layout-px-spacing">
            <div id="treeviewMain" class="col-lg-12 layout-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <h4>Banks & Categories Tree</h4>
                    </div>
                    <div class="widget-content widget-content-area">
                        <ul class="treeview">

                            {{-- Banks Node --}}
                            <li class="tv-item tv-folder">
                                <div class="tv-header">
                                    <div class="tv-collapsible collapsed" data-bs-toggle="collapse"
                                        data-bs-target="#banksCollapse" aria-expanded="false">
                                        <p class="title">Banks</p>
                                    </div>
                                </div>

                                <div id="banksCollapse" class="treeview-collapse collapse">
                                    <ul class="treeview">
                                        @foreach ($banks as $bank)
                                            <li class="tv-item">
                                                <p>{{ $bank->bank_name }}</p>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </li>

                            {{-- Categories Node --}}
                            <li class="tv-item tv-folder">
                                <div class="tv-header">
                                    <div class="tv-collapsible collapsed" data-bs-toggle="collapse"
                                        data-bs-target="#categoriesCollapse" aria-expanded="false">
                                        <p class="title">Categories</p>
                                    </div>
                                </div>

                                <div id="categoriesCollapse" class="treeview-collapse collapse">
                                    <ul class="treeview">
                                        @foreach ($categories as $category)
                                            <li class="tv-item tv-folder">
                                                <div class="tv-header">
                                                    <div class="tv-collapsible collapsed" data-bs-toggle="collapse"
                                                        data-bs-target="#category{{ $category->id }}" aria-expanded="false">
                                                        <p class="title">{{ $category->name }}</p>
                                                    </div>
                                                </div>

                                                <div id="category{{ $category->id }}" class="treeview-collapse collapse">
                                                    <ul class="treeview">

                                                        {{-- Steps --}}
                                                        @foreach ($category->steps as $step)
                                                            <li class="tv-item tv-folder">
                                                                <div class="tv-header">
                                                                    <div class="tv-collapsible collapsed"
                                                                        data-bs-toggle="collapse"
                                                                        data-bs-target="#step{{ $step->id }}"
                                                                        aria-expanded="false">
                                                                        <p class="title">{{ $step->step_name }}
                                                                        @if ($step->step_type !== 'simple')
                                                                           :- ({{ $step->step_type }})
                                                                        @endif</p>
                                                                    </div>
                                                                </div>

                                                                <div id="step{{ $step->id }}"
                                                                    class="treeview-collapse collapse">
                                                                    <ul class="treeview">

                                                                        {{-- Step Options --}}
                                                                        @if ($step->options->count())
                                                                            @foreach ($step->options as $option)
                                                                                <li class="tv-item">
                                                                                    <p>Option: {{ $option->option_name }}
                                                                                    </p>
                                                                                </li>
                                                                            @endforeach
                                                                        @endif

                                                                    </ul>
                                                                </div>
                                                            </li>
                                                        @endforeach

                                                        {{-- Required Docs --}}
                                                        @if ($category->requiredDocs->count())
                                                            @foreach ($category->requiredDocs as $doc)
                                                                <li class="tv-item">
                                                                    <p>Doc: {{ $doc->doc_name }}</p>
                                                                </li>
                                                            @endforeach
                                                        @endif

                                                    </ul>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>


        </div>
    @endsection


    @section('js')
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="{{ asset('src/plugins/src/treeview/custom-jstree.js') }}""></script>
        <script src="{{ asset('src/assets/js/scrollspyNav.js') }}""></script>
        <!-- END PAGE LEVEL SCRIPTS -->

        </body>

    </html>
@endsection
