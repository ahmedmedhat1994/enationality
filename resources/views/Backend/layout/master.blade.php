<!DOCTYPE html>
<html lang="zxx" class="js"  >
<head>
    <base href="../../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{asset('backend/images/favicon.png')}}">
    <!-- Page Title  -->
    <title>@yield('title')</title>
    <!-- StyleSheets  -->
    @include('backend.layout.head')
    @yield('css')


<style>
    .colored-toast.swal2-icon-success {
        background-color: #a5dc86 !important;
    }

    .colored-toast.swal2-icon-error {
        background-color: #f27474 !important;
    }

    .colored-toast.swal2-icon-warning {
        background-color: #f8bb86 !important;
    }

    .colored-toast.swal2-icon-info {
        background-color: #3fc3ee !important;
    }

    .colored-toast.swal2-icon-question {
        background-color: #87adbd !important;
    }

    .colored-toast .swal2-title {
        color: white;
    }

    .colored-toast .swal2-close {
        color: white;
    }

    .colored-toast .swal2-html-container {
        color: white;
    }

</style>

</head>


{{--@if(\Illuminate\Support\Facades\App::getLocale() == 'ar')--}}
{{--    <body class="nk-body bg-lighter npc-general has-sidebar has-rtl" dir="rtl" style="font-family: 'Rubik', sans-serif !important; font-weight: 600;" >--}}
{{--    @else--}}
{{--        <body class="nk-body bg-lighter npc-general has-sidebar" style="font-family: 'Rubik', sans-serif !important; font-weight: 600;">--}}
{{--        @endif--}}

        <body class="nk-body bg-lighter npc-general has-sidebar has-rtl " dir="rtl" style=" font-family: 'Rubik', sans-serif !important; font-weight: 600;" >

        @include('sweetalert::alert')


<div class="nk-app-root">
    <!-- main @s -->
    <div class="nk-main ">

        <!-- sidebar @s -->
    @include('backend.layout.sidebar')
    <!-- sidebar @e -->
        <!-- wrap @s -->
        <div class="nk-wrap ">
            <!-- main header @s -->
        @include('backend.layout.header')
        <!-- main header @e -->
            <!-- content @s -->
            <div class="nk-content ">
    <div class="container-xl wide-xl pb-5">
        <div class="nk-content-body">

                @if(Session::has('error'))
                    <div class="alert alert-danger" id="success-danger">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        {{ Session::get('error') }}
                    </div>
                @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
    </div>
    </div>

                @yield('content')
            </div>
            <!-- content @e -->
            <!-- footer @s -->
        @include('backend.layout.footer')

        <!-- footer @e -->
        </div>
        <!-- wrap @e -->
    </div>
    <!-- main @e -->
</div>
<!-- app-root @e -->
<!-- select region modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="region">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-md">
                <h5 class="title mb-4">Select Your Country</h5>
                <div class="nk-country-region">
                    <ul class="country-list text-center gy-2">
                        <li>
                            <a href="#" class="country-item">
                                <img src="{{asset('backend/images/flags/arg.png')}}" alt="" class="country-flag">
                                <span class="country-name">Argentina</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="{{asset('backend/images/flags/aus.png')}}" alt="" class="country-flag">
                                <span class="country-name">Australia</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="{{asset('backend/images/flags/bangladesh.png')}}" alt="" class="country-flag">
                                <span class="country-name">Bangladesh</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="{{asset('backend/images/flags/canada.png')}}" alt="" class="country-flag">
                                <span class="country-name">Canada <small>(English)</small></span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="{{asset('backend/images/flags/china.png')}}" alt="" class="country-flag">
                                <span class="country-name">Centrafricaine</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="{{asset('backend/images/flags/china.png')}}" alt="" class="country-flag">
                                <span class="country-name">China</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="{{asset('backend/images/flags/french.png')}}" alt="" class="country-flag">
                                <span class="country-name">France</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="{{asset('backend/images/flags/germany.png')}}" alt="" class="country-flag">
                                <span class="country-name">Germany</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="{{asset('backend/images/flags/iran.png')}}" alt="" class="country-flag">
                                <span class="country-name">Iran</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="{{asset('backend/images/flags/italy.png')}}" alt="" class="country-flag">
                                <span class="country-name">Italy</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="{{asset('backend/images/flags/mexico.png')}}" alt="" class="country-flag">
                                <span class="country-name">México</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="{{asset('backend/images/flags/philipine.png')}}" alt="" class="country-flag">
                                <span class="country-name">Philippines</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="{{asset('backend/images/flags/portugal.png')}}" alt="" class="country-flag">
                                <span class="country-name">Portugal</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="{{asset('backend/images/flags/s-africa.png')}}" alt="" class="country-flag">
                                <span class="country-name">South Africa</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="{{asset('backend/images/flags/spanish.png')}}" alt="" class="country-flag">
                                <span class="country-name">Spain</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="{{asset('backend/images/flags/switzerland.png')}}" alt="" class="country-flag">
                                <span class="country-name">Switzerland</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="{{asset('backend/images/flags/uk.png')}}" alt="" class="country-flag">
                                <span class="country-name">United Kingdom</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="country-item">
                                <img src="{{asset('backend/images/flags/english.png')}}" alt="" class="country-flag">
                                <span class="country-name">United State</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div><!-- .modal-content -->
    </div><!-- .modla-dialog -->
</div><!-- .modal -->
<!-- JavaScript -->
<script src="{{asset('backend/js/bundle.js')}}"></script>
<script src="{{asset('backend/js/scripts.js')}}"></script>
        <link rel="stylesheet" href="{{asset('backend/css/editors/summernote.css')}}">
        <script src="{{asset('backend/js/libs/editors/summernote.js')}}"></script>
        <script src="{{asset('backend/js/editors.js')}}"></script>
        {{-- ...Some more scripts... --}}

        @yield('script')
        @if(Session::has('message'))
            <script>
                $( document ).ready(function() {
                    toastr.clear();
                    NioApp.Toast('<h5>{{session()->get('type')}}</h5><p>{{session()->get('message')}}</p>', '{{session()->get('alert-type')}}',{position: 'top-center'});
                });
            </script>
        @endif
</body>
</html>
