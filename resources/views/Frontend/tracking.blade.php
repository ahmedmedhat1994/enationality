@extends('Frontend.layout.master')
@section('title')
    الصفحة الرئيسية
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

                        @guest
                        <a class="btn btn-outline-primary" href="{{route('login')}}">
                            <em class="icon ni ni-user"></em>
                            <span>تسجيل الدخول</span>
                        </a>
                        @else
                            <a class="btn btn-outline-primary mx-4" href="{{route('tracking')}}" >
                                <em class="icon ni ni-clock"></em>
                                <span>تتبُّع الطلب</span>
                            </a>

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
                    <form action="{{route('trackingGo')}}" method="post" autocomplete="off">
                        @csrf
                    <div class="row g-gs d-block justify-content-center justify-items-center">
                        <div class="col-xl-12">
                            <div class="card card-bordered">
                                <div class="card-inner">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <div class="nk-block-image w-120px flex-shrink-0 mx-auto">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 90 90">
                                                <rect x="3" y="10" width="70" height="50" rx="7" ry="7" fill="#e3e7fe" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></rect>
                                                <rect x="13" y="24" width="70" height="50" rx="7" ry="7" fill="#fff" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></rect>
                                                <line x1="20" y1="33" x2="31" y2="33" fill="none" stroke="#9cabff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></line>
                                                <line x1="75" y1="33" x2="77" y2="33" fill="none" stroke="#9cabff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></line>
                                                <line x1="66" y1="33" x2="67" y2="33" fill="none" stroke="#9cabff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></line>
                                                <line x1="70" y1="33" x2="72" y2="33" fill="none" stroke="#9cabff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></line>
                                                <rect x="19" y="40" width="56" height="7" rx="2" ry="2" fill="#eff1ff"></rect>
                                                <rect x="20" y="51" width="24" height="8" rx="2" ry="2" fill="#eff1ff"></rect>
                                                <rect x="48" y="51" width="7" height="8" rx="2" ry="2" fill="#eff1ff"></rect>
                                                <ellipse cx="69" cy="61.98" rx="18" ry="18.02" fill="#fff" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></ellipse>
                                                <circle cx="69" cy="62" r="7" fill="#e3e7fe"></circle>
                                                <polyline points="77 56 77 60 73 60" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></polyline>
                                                <path d="M62.26,59.17a6.81,6.81,0,0,1,11.25-2.55L77,59.92" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                                                <polyline points="61 67 61 63 65 63" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></polyline>
                                                <path d="M61.43,64l3.51,3.31A6.83,6.83,0,0,0,76.2,64.79" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                                            </svg>
                                        </div>

                                    </div>

                                    <div class="col-lg-8 d-flex">
                                        <div class="form-group w-100">
                                            <label class="form-label" for="code"></label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control fs-3 fw-bold" name="code" value="{{old('code')}}"  id="code" placeholder="اكتب رقم الطلب المرسل لك على الواتساب" style="height: 80px;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 d-flex  justify-content-center justify-items-center align-content-center mt-3">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-lg btn-primary" style="height: 80px;">تتبُّع الطلب</button>
                                        </div>
                                    </div>
                                    @if ($errors->any())
                                        <div class="col-12 d-flex text-center mt-3">
                                            <div class="alert alert-danger w-100">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li class="fs-5 fw-bold">{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                </div><!-- .card-inner -->
                            </div><!-- .card -->
                        </div>
                    </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('#code').on('input', function() {
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


