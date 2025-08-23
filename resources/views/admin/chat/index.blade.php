@extends('admin.layout.main')

@section('meta')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
        <title>Chat - Trackmywork Admin </title>

        <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
        <link href="{{ asset('src/plugins/src/apex/apexcharts.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('src/assets/css/light/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('src/assets/css/dark/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->


        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="{{ asset('src/assets/css/light/apps/chat.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('src/assets/css/dark/apps/chat.css') }}" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
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
                                            <li class="breadcrumb-item active" aria-current="page">Chat</li>
                                        </ol>
                                    </nav>

                                </div>
                            </div>
                        </header>
                    </div>
                </div>
                <!--  END BREADCRUMBS  -->

                <div class="chat-section layout-top-spacing">
                    <div class="row">

                        <div class="col-xl-12 col-lg-12 col-md-12">

                            <div class="chat-system">
                                <div class="hamburger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-menu mail-menu d-lg-none">
                                        <line x1="3" y1="12" x2="21" y2="12"></line>
                                        <line x1="3" y1="6" x2="21" y2="6"></line>
                                        <line x1="3" y1="18" x2="21" y2="18"></line>
                                    </svg></div>
                                <div class="user-list-box">
                                    <div class="search">
                                        <input type="text" class="form-control" placeholder="Search User" />
                                    </div>
                                    <div class="people">

                                        @foreach ($Works as $item)
                                            <div class="person" data-chat="person{{ $item->id }}">
                                                <div class="user-info">
                                                    <div class="f-head">
                                                        <img src="{{ asset('src/assets/img/profile-30.png') }}"
                                                            alt="avatar">
                                                    </div>
                                                    <div class="f-body">
                                                        <div class="meta-info">
                                                            <span class="user-name" data-name="{{ $item->client->name }}">
                                                                {{ $item->client->name }} </span>
                                                            <span
                                                                class="user-meta-time">{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}</span>
                                                        </div>
                                                        <span class="preview">{{ $item->work_name }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach


                                    </div>
                                </div>
                                <div class="chat-box">

                                    <div class="chat-not-selected">
                                        <p> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-message-square">
                                                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z">
                                                </path>
                                            </svg> Click User To Chat</p>
                                    </div>

                                    <div class="chat-box-inner">
                                        <div class="chat-meta-user">
                                            <div class="current-chat-user-name"><span><img
                                                        src="{{ asset('src/assets/img/90x90.jpg') }}"
                                                        alt="dynamic-image"><span class="name"></span></span></div>

                                            <div class="chat-action-btn align-self-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-phone  phone-call-screen">
                                                    <path
                                                        d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                                    </path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-video video-call-screen">
                                                    <polygon points="23 7 16 12 23 17 23 7"></polygon>
                                                    <rect x="1" y="5" width="15" height="14" rx="2"
                                                        ry="2"></rect>
                                                </svg>
                                                <div class="dropdown d-inline-block">
                                                    <a class="dropdown-toggle" href="#" role="button"
                                                        id="dropdownMenuLink-2" data-bs-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-more-vertical">
                                                            <circle cx="12" cy="12" r="1"></circle>
                                                            <circle cx="12" cy="5" r="1"></circle>
                                                            <circle cx="12" cy="19" r="1"></circle>
                                                        </svg>
                                                    </a>

                                                    {{-- <div class="dropdown-menu left" aria-labelledby="dropdownMenuLink-2">
                                                        <a class="dropdown-item" href="javascript:void(0);"><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-settings">
                                                                <circle cx="12" cy="12" r="3"></circle>
                                                                <path
                                                                    d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z">
                                                                </path>
                                                            </svg> Settings</a>
                                                        <a class="dropdown-item" href="javascript:void(0);"><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-mail">
                                                                <path
                                                                    d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                                                </path>
                                                                <polyline points="22,6 12,13 2,6"></polyline>
                                                            </svg> Mail</a>
                                                        <a class="dropdown-item" href="javascript:void(0);"><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-copy">
                                                                <rect x="9" y="9" width="13" height="13"
                                                                    rx="2" ry="2"></rect>
                                                                <path
                                                                    d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1">
                                                                </path>
                                                            </svg> Copy</a>
                                                        <a class="dropdown-item" href="javascript:void(0);"><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
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
                                                            </svg> Delete</a>
                                                        <a class="dropdown-item" href="javascript:void(0);"><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-share-2">
                                                                <circle cx="18" cy="5" r="3"></circle>
                                                                <circle cx="6" cy="12" r="3"></circle>
                                                                <circle cx="18" cy="19" r="3"></circle>
                                                                <line x1="8.59" y1="13.51" x2="15.42"
                                                                    y2="17.49"></line>
                                                                <line x1="15.41" y1="6.51" x2="8.59"
                                                                    y2="10.49"></line>
                                                            </svg> Share</a>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="chat-conversation-box">
                                            <div id="chat-conversation-box-scroll" class="chat-conversation-box-scroll">
                                                @foreach ($Works as $item)
                                                    <div class="chat" data-chat="person{{ $item->id }}">
                                                        <div class="conversation-start">
                                                            <span>{{ now()->format('F d, Y') }}</span>
                                                        </div>

                                                        {{-- Greeting message --}}
                                                        <div class="bubble you">
                                                            <div class="d-flex align-items-start">
                                                                <i class="fas fa-handshake me-2"
                                                                    style="color:#4caf50;"></i>
                                                                <span>
                                                                    Greetings, <br>
                                                                    <strong>{{ $item->client->name }}</strong><br><br>
                                                                    You have been allotted
                                                                    <strong>{{ $item->category->name }}</strong>
                                                                    on
                                                                    <strong>{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}</strong>.
                                                                    <br><br>
                                                                    <i class="fas fa-link me-1"
                                                                        style="color:#2196f3;"></i>
                                                                    You can track the current status of your
                                                                    <strong>{{ $item->category->name }}</strong> by
                                                                    clicking the link below:<br>
                                                                    <a href="{{ route('work.track', [
                                                                        'id' => $item->id,
                                                                        'category' => Str::slug($item->category->name),
                                                                        'client' => Str::slug($item->client->name),
                                                                    ]) }}"
                                                                        target="_blank" style="color:#2196f3;">
                                                                        {{ route('work.track', [
                                                                            'id' => $item->id,
                                                                            'category' => Str::slug($item->category->name),
                                                                            'client' => Str::slug($item->client->name),
                                                                        ]) }}
                                                                    </a>

                                                                    <br><br>
                                                                    Please feel free to reach out in case you need any
                                                                    further information or assistance.
                                                                    <br><br>
                                                                    <strong>Best Regards,</strong><br>
                                                                    <span style="display:flex;align-items:center;">
                                                                        <i class="fas fa-user-tie me-1"
                                                                            style="color:#6c757d;"></i> Jay Soni
                                                                    </span>
                                                                    <span style="display:flex;align-items:center;">
                                                                        <i class="fas fa-phone-alt me-1"
                                                                            style="color:#4caf50;"></i> +91 98765 43210
                                                                    </span>
                                                                </span>
                                                            </div>
                                                        </div>

                                                        <a href="{{ route('Chat.send.whatsapp', $item->id) }}"
                                                            class="bubble me" target="_blank">
                                                            Click here to Send your message via WhatsApp
                                                        </a>


                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>

                                        <div class="chat-footer">
                                            <div class="chat-input">
                                                <form class="chat-form" action="javascript:void(0);">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-message-square">
                                                        <path
                                                            d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z">
                                                        </path>
                                                    </svg>
                                                    <input type="text" class="mail-write-box form-control"
                                                        placeholder="Message" />
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>
    @endsection


    @section('js')
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="{{ asset('src/assets/js/apps/chat.js') }}"></script>
        <!-- END PAGE LEVEL SCRIPTS -->


        </body>

    </html>
@endsection
