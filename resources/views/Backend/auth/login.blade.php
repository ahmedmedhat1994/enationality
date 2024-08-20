<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="../../../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{asset('backend/images/favicon.png')}}">
    <!-- Page Title  -->
    <title>{{''}}</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{asset('backend/css/dashlite.css?ver=3.2.0')}}">
    <link id="skin-default" rel="stylesheet" href="{{asset('backend/css/skins/theme-egyptian.css')}}">
</head>

<body class="nk-body ui-rounder npc-default pg-auth">
<div class="nk-app-root">
    <!-- main @s -->
    <div class="nk-main ">
        <!-- wrap @s -->
        <div class="nk-wrap nk-wrap-nosidebar">
            <!-- content @s -->
            <div class="nk-content ">
                <div class="nk-block nk-block-middle nk-auth-body  wide-xs">
                    <div class="brand-logo pb-4 text-center">
                        <a href="html/index.html" class="logo-link">
                            <img class="logo-light logo-img logo-img-lg" src="{{asset('backend/images/logo.png')}}" srcset="{{asset('backend/images/logo.png')}}" alt="logo">
                            <img class="logo-dark logo-img logo-img-lg" src="{{asset('backend/images/logo.png')}}" srcset="{{asset('backend/images/logo.png')}}" alt="logo-dark">
                        </a>
                    </div>
                    <div class="card card-bordered">
                        <div class="card-inner card-inner-lg">
                            <div class="nk-block-head">
                                <div class="nk-block-head-content">
                                    <h4 class="nk-block-title">Sign-In</h4>
                                    <div class="nk-block-des">
                                        <p>Access the Hayah Care panel using your email and passcode.</p>
                                    </div>
                                </div>
                            </div>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <label class="form-label" for="default-01">Email or Username</label>
                                    </div>
                                    <div class="form-control-wrap">
                                        <input  class="form-control form-control-lg" id="email"  type="text" name="login"  required autofocus autocomplete="username">
                                    </div>
                                    @error('login')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <label class="form-label" for="password">Password</label>
                                        {{--                                            <a class="link link-primary link-sm" href="html/pages/auths/auth-reset-v2.html">Forgot Code?</a>--}}
                                    </div>
                                    @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="form-control-wrap">
                                        <a href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                                            <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                            <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                        </a>
                                        <input  class="form-control form-control-lg" id="password"  type="password"
                                                name="password"
                                                required autocomplete="current-password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                                </div>
                            </form>
                            {{--                                <div class="form-note-s2 text-center pt-4"> New on our platform? <a href="html/pages/auths/auth-register-v2.html">Create an account</a>--}}
                        </div>
                        {{--                                <div class="text-center pt-4 pb-3">--}}
                        {{--                                    <h6 class="overline-title overline-title-sap"><span>OR</span></h6>--}}
                        {{--                                </div>--}}
                        {{--                                <ul class="nav justify-center gx-4">--}}
                        {{--                                    <li class="nav-item"><a class="nav-link" href="#">Facebook</a></li>--}}
                        {{--                                    <li class="nav-item"><a class="nav-link" href="#">Google</a></li>--}}
                        {{--                                </ul>--}}
                    </div>
                </div>
            </div>
        </div>
        <!-- wrap @e -->
    </div>
    <!-- content @e -->
</div>
<!-- main @e -->
</div>
<!-- app-root @e -->
<!-- JavaScript -->
<script src="{{asset('backend/js/bundle.js?ver=3.2.0')}}"></script>
<script src="{{asset('backend/js/scripts.js?ver=3.2.0')}}"></script>
<!-- select region modal -->

</html>
