@extends('Frontend.layout.master')
@section('title')
    تسجيل الدخول
@endsection

@section('style')

@endsection

@section('content')

    <div class="nk-content nk-content-fluid">
        <div class="container-xl wide-xl">
            <div class="nk-content-body">
                <div class="row w-100 d-inline-flex justify-content-center justify-items-center ">
                    <div class="col-6">
                        <img src="{{asset('frontend/logo.png')}}" width="300px"/>
                    </div>
                    <div class="col-6 d-flex justify-content-end  align-items-center" >
                        <a class="btn btn-outline-primary mx-4" href="#" >
                            <em class="icon ni ni-clock"></em>
                            <span>تتبُّع الطلب</span>
                        </a>
                        @guest
                            <a class="btn btn-outline-primary" href="{{route('login')}}">
                                <em class="icon ni ni-user"></em>
                                <span>تسجيل الدخول</span>
                            </a>
                        @else
                            <a class="btn btn-outline-danger" href="javascript:void(0);" onclick="event.preventDefault(); document.getElementById('logout_form').submit();">
                                <em class="icon ni ni-signout"></em>
                                <span>تسجيل خروج</span>
                            </a>

                            <form action="{{route('logout')}}" method="post" id="logout_form" class="d-none">
                                @csrf
                            </form>

                        @endguest
                    </div>

                </div>
                <div class="nk-block pt-5">
                    <div class="row g-gs d-flex justify-content-center justify-items-center">

                        <div class="col-lg-4">
                            <div class="card card-bordered h-100" id="otpNumber" >
                                <div class="card-inner">
                                    <div class="card-head">
                                        <h5 class="card-title">كود التحقق</h5>
                                    </div>
                                    <form action="{{route('otp_validate')}}" method="post" autocomplete="off">
                                        @csrf
                                        <div class="form-group">
                                            <label class="form-label" for="otp">رقم التحقق
                                                <br>
                                                <span class="text-danger">يرجى ادخال رقم التحقق المكون من 6 ارقام المرسل علي الواتساب</span>
                                            </label>
                                            <div class="form-control-wrap">
                                                <input type="number" class="form-control fs-3" id="otp" name="otp"  placeholder="XXXXXX">
                                                <input type="hidden" class="form-control fs-3" id="mobileIs" name="mobile" value="{{$mobile}}"   placeholder="XXXXXX">
                                            </div>
                                        </div>
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                        <div class="form-group d-flex justify-content-center">
                                            <button type="submit" class="btn btn-lg btn-primary">
                                                دخول
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('#otp').on('input', function() {
            var value = $(this).val();

            // Remove any non-digit characters
            value = value.replace(/\D/g, '');

            // Limit the length to 6 digits
            if (value.length > 6) {
                value = value.substring(0, 6);
            }

            $(this).val(value);
        });

    });

</script>


@endsection


