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
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="col-lg-8">
                            <div class="card card-bordered h-100" id="mobileNumer">
                                <div class="card-inner">
                                    <div class="card-head">
                                        <h5 class="card-title">تقديم طلب استخراج/ تجديد إقامة</h5>
                                    </div>
                                    <div class="alert alert-info alert-icon fw-bold fs-6">
                                        <em class="icon ni ni-cross-circle"></em> <strong>يرجي التاكد </strong>! من صحة البيانات لتجنب رفض الطلب.
                                    </div>
                                    <form id="loginForm" action="{{route('request.store')}}" method="post" autocomplete="off" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label class="form-label">أختر الجنسية</label>
                                            <div class="form-control-wrap">
                                                <select class="form-select  js-select2" name="nationality">
                                                    <option value="0" selected>اختر الجنسية</option>
                                                    <option value="1" >سوري</option>
                                                    <option value="2" >سودانى</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">نوع الاقامة</label>
                                            <div class="form-control-wrap">
                                                <select class="form-select  js-select2" id="type" name="type" placement="اختر نوع الاقامة">
                                                    <option value="0" selected>اختر نوع الاقامة</option>
                                                    <option value="1" >سياحة</option>
                                                    <option value="2" >دراسة</option>
                                                    <option value="3" >مؤقتة</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div id="info" style="display: none">
                                            <span  class="text-danger fs-4 fw-bold">* الاوراق المطلوبة</span>
                                            <br>
                                            <span  class="text-danger ">يرجى ارفاق الملفات المطلوبه بغد نسخها من خلال الماسح الضوئي</span>

                                            <div class="form-group pt-3">
                                                <label class="form-label" for="name_ar">الاسم ( عربي )</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="name_ar" name="name_ar" placeholder="اكتب اسمك كامل باللغة العربية">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="name_en">الاسم ( انجليزي )</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="name_en" name="name_en" placeholder="اكتب اسمك كامل باللغة الانجليزية">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="birth_date">تاريخ الميلاد</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control date-picker" id="birth_date" name="birth_date" >
                                                </div>
                                                <div class="form-note">Date format <code>mm/dd/yyyy</code></div>

                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="mobile">رقم الموبايل</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="رقم الموبايل الشخصي">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="address">العنوان </label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="address" name="address" placeholder="يرجي كتابة عنوان الاقامة فى مصر تفصيلي">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="personal_photo">صورة شخصية</label>
                                                <div class="form-control-wrap">
                                                    <div class="form-file">
                                                        <input type="file" class="form-file-input" id="personal_photo" name="personal_photo">
                                                        <label class="form-file-label" for="customFile">اختر الملف</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="passport">جواز السفر</label>
                                                <div class="form-control-wrap">
                                                    <div class="form-file">
                                                        <input type="file" class="form-file-input" id="passport" name="passport">
                                                        <label class="form-file-label" for="customFile">اختر الملف</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mb-5">
                                                <label class="form-label" for="stamp_paper">صفحة الختم</label>
                                                <div class="form-control-wrap">
                                                    <div class="form-file">
                                                        <input type="file" class="form-file-input" id="stamp_paper" name="stamp_paper">
                                                        <label class="form-file-label" for="customFile">اختر الملف</label>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                        <div class="form-group d-flex justify-content-center">
                                            <button type="submit" class="btn btn-lg btn-primary">
                                                إرسال للمراجعه
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
        $('#type').on('change', function() {
           $('#info').slideDown(400);
        });

    });

</script>


@endsection


