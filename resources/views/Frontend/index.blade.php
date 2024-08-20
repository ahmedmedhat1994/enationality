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
                    <div class="row g-gs d-inline-flex justify-content-center justify-items-center">
                        <div class="col-xl-4">
                            <div class="card card-bordered">
                                <div class="card-inner">
                                    <div class="align-center flex-wrap g-4 text-center">
                                        <div class="nk-block-image w-120px flex-shrink-0 mx-auto">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 90 90">
                                                <rect x="15" y="5" width="56" height="70" rx="6" ry="6" fill="#e3e7fe" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></rect>
                                                <path d="M69.88,85H30.12A6.06,6.06,0,0,1,24,79V21a6.06,6.06,0,0,1,6.12-6H59.66L76,30.47V79A6.06,6.06,0,0,1,69.88,85Z" fill="#fff" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                                                <polyline points="60 16 60 31 75 31.07" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></polyline>
                                                <line x1="58" y1="50" x2="32" y2="50" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></line>
                                                <line x1="46" y1="38" x2="32" y2="38" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></line>
                                                <line x1="68" y1="44" x2="32" y2="44" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></line>
                                                <line x1="68" y1="56" x2="32" y2="56" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></line>
                                                <line x1="58" y1="62" x2="32" y2="62" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></line>
                                                <line x1="68" y1="68" x2="32" y2="68" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></line>
                                                <line x1="58" y1="75" x2="32" y2="75" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></line>
                                            </svg>                                        </div>
                                        <div class="nk-block-content">
                                            <div class="nk-block-content-head">
                                                <h5>طلب إقامة</h5>
                                                <p class="text-soft">تقديم طلب الاقامه الان اسهل قم بتقديم طلب وارفاق الاوراق المطلوب وسيتم تحديد موعد التوجة الى الادارة العامه للجوازات</p>
                                            </div>
                                        </div>
                                        <div class="nk-block-content flex-shrink-0 mt-lg-4 mx-auto">
                                            <a href="{{route('request')}}" class="btn btn-lg btn-outline-primary">تقديم طلب</a>
                                        </div>
                                    </div>
                                </div><!-- .card-inner -->
                            </div><!-- .card -->
                        </div>
                        <div class="col-xl-4">
                            <div class="card card-bordered">
                                <div class="card-inner">
                                    <div class="align-center flex-wrap g-4 text-center">
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
                                        <div class="nk-block-content">
                                            <div class="nk-block-content-head">
                                                <h5>تتبع الطلب</h5>
                                                <p class="text-soft">قم بتتبع الطلب ومعرفة المطلوب من اوراق وما تم الوصول الية من قبل الادارة العامه للجوازات والهجرة والجنسية </p>
                                            </div>
                                        </div>
                                        <div class="nk-block-content flex-shrink-0 mt-lg-4 mx-auto">
                                            <a href="{{route('tracking')}}" class="btn btn-lg btn-outline-primary">تتبع طلب</a>
                                        </div>
                                    </div>
                                </div><!-- .card-inner -->
                            </div><!-- .card -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')


@endsection


