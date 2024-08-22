@extends('Frontend.layout.master')
@section('title')

@endsection

@section('style')
<style>
    .myImg {
        -webkit-animation: rotation 2s infinite linear;
    }

    @-webkit-keyframes rotation {
        from {-webkit-transform: rotate(0deg);}
        to   {-webkit-transform: rotate(359deg);}
    }
</style>
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
                        <div class="col-xl-10">
                            <div class="card card-bordered">
                                <div class="card-inner">
                                    @if($data['status'] == 0)
                                    <div class="d-flex justify-content-center justify-items-center">
                                    <span>
                                        <em class="icon ni ni-check-circle text-success" style="font-size: 150px;"></em>

                                    </span>
                                </div>
                                    <div class="d-flex justify-content-center justify-items-center">
                                        <span class="fw-bold fs-22px text-secondary">تم تقديم الطلب بنجاح</span>
                                    </div>
                                    @elseif($data['status'] == 1)
                                        <div class="d-flex justify-content-center justify-items-center py-2">
                                    <span>
                                        <em class="icon ni ni-cross-circle  text-danger "  style="font-size: 100px;"></em>

                                    </span>
                                        </div>
                                        <div class="d-flex justify-content-center justify-items-center">
                                            <span class="fw-bold fs-22px text-secondary">يرجي تعديل الطلب</span>
                                        </div>
                                    @elseif($data['status'] == 2)
                                        <div class="d-flex justify-content-center justify-items-center py-2">
                                    <span>
                                        <em class="icon ni ni-coin-alt  text-info "  style="font-size: 100px;"></em>

                                    </span>
                                        </div>
                                        <div class="d-flex justify-content-center justify-items-center">
                                            <span class="fw-bold fs-22px text-secondary">يرجي اتمام دفع الرسوم</span>
                                        </div>
                                    @elseif($data['status'] == 3)
                                        <div class="d-flex justify-content-center justify-items-center py-2">
                                    <span>
                                        <em class="icon ni ni-check-circle text-success" style="font-size: 150px;"></em>

                                    </span>
                                        </div>
                                        <div class="d-flex justify-content-center justify-items-center">
                                            <span class="fw-bold fs-22px text-secondary">تم الموافقة على طلبكم</span>
                                        </div>
                                    @elseif($data['status'] == 4)
                                        <div class="d-flex justify-content-center justify-items-center">
                                    <span>
                                        <em class="icon ni ni-check-circle text-success" style="font-size: 150px;"></em>

                                    </span>
                                        </div>
                                        <div class="d-flex justify-content-center justify-items-center">
                                            <span class="fw-bold fs-22px text-secondary">تم تقديم الطلب بنجاح</span>
                                        </div>
                                    @elseif($data['status'] == 5)
                                        <div class="d-flex justify-content-center justify-items-center">
                                    <span>
                                        <em class="icon ni ni-check-circle text-success" style="font-size: 150px;"></em>

                                    </span>
                                        </div>
                                        <div class="d-flex justify-content-center justify-items-center">
                                            <span class="fw-bold fs-22px text-secondary">تم دفع الرسوم بنجاح</span>
                                        </div>
                                    @endif
                                    <div class="row p-3">
                                        <div class="col-lg-3 d-flex align-content-center align-items-center justify-content-center  py-3">
                                        <div>
                                            <img src="data:image/png;base64,{{DNS2D::getBarcodePNG(route('sucssess',$data['code']), 'QRCODE',4,4)}}" alt="barcode" />

                                        </div>
                                        </div>
                                        <div class="col-lg-3 d-block align-content-center align-items-center justify-content-center  py-3">
                                            <div class="py-1">
                                           <span class="lead-text fs-18px fw-bold "> طلب رقم : {{$data['code']}} </span>
                                            </div>
                                            <div class="py-1">
                                         <span class="lead-text fs-18px fw-bold"> مقدم الطلب :  {{$data['name']}} </span>
                                            </div>
                                            <div class="py-1">
                                            <span class="lead-text fs-18px fw-bold">  تاريخ الطلب : {{$data['date']}} </span>
                                            </div>
                                            @if($data['update_date'] != null)
                                                <div class="py-1">
                                                    <span class="lead-text fs-18px fw-bold">  تاريخ التحديث : {{$data['update_date']}} </span>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 d-block align-content-center align-items-center justify-content-center  py-3">
                                            <div class="py-1">
                                                <span class="lead-text fs-18px fw-bold ">حالة الطلب </span>
                                            </div>
                                            <div class="py-1">
                                                @if($data['status'] == 0)
                                                <div class="alert alert-icon alert-secondary" role="alert">
                                                    <em class="icon ni ni-alert-circle"></em>
                                                    <span class="fw-bold fs-15px">جاري مراجعة الطلب</span>
                                                </div>
                                                    @elseif($data['status'] == 1)
                                                    <div class="alert alert-icon alert-danger" role="alert">
                                                        <em class="icon ni ni-cross-circle"></em>
                                                        <span class="fw-bold fs-15px">يرجي تصحيح الاخطاء واعادة ارسال الطلب</span>
                                                        <br>
                                                        <a href="{{route('request.edit',$data['code'])}}" class="btn btn-secondary mt-2">اضغط هنا</a>
                                                    </div>
                                                @elseif($data['status'] == 2)
                                                    <div class="alert alert-icon alert-success" role="alert">
                                                        <em class="icon ni ni-check-circle"></em>
                                                        <span class="fw-bold fs-15px">تم الموافقة على طلبكم يرجي دفع الرسوم</span>
                                                        <br>
                                                        <a href="{{route('pay',$data['code'])}}" class="btn btn-secondary mt-2">ادفع من هنا</a>
                                                    </div>
                                                @elseif($data['status'] == 3)
                                                    <div class="alert alert-icon alert-success" role="alert">
                                                        <em class="icon ni ni-check-circle"></em>
                                                        <span class="fw-bold fs-15px">  طلبكم الان مكتمل يرجي التوجة الى الادارة العامه للجوازات والهجرة فى تاريخ </span>
                                                        <br>
                                                        <span class="fw-bold fs-15px">{{$data['appointment_date']}} </span>
                                                        <br>
                                                        <span class="fw-bold fs-15px">مع احضار جميع اصول الاوراق المقدمة فى الطلب </span>

                                                    </div>
                                                    @elseif($data['status'] == 4)
                                                    <div class="alert alert-icon alert-secondary" role="alert">
                                                        <em class="icon ni ni-alert-circle"></em>
                                                        <span class="fw-bold fs-15px">جاري مراجعة الطلب</span>
                                                    </div>
                                                @elseif($data['status'] == 5)
                                                    <div class="alert alert-icon alert-info" role="alert">
                                                        <em class="icon ni ni-alert-circle"></em>
                                                        <span class="fw-bold fs-15px">جاري مراجعة حالة الدفع وسيتم ابلاغكم فور قبول الطلب</span>
                                                    </div>
                                                @endif
                                            </div>

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


