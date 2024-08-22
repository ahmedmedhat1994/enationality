@extends('Frontend.layout.master')
@section('title')
    مراجعة الطلب
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
                                        <h5 class="card-title">مراجعة الطلب رقم : {{$data->code}}</h5>
                                    </div>

                                    <form id="loginForm" action="{{route('review_update')}}" method="post" autocomplete="off" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label class="form-label">أختر الجنسية</label>
                                            <div class="form-control-wrap">
                                                <select class="form-select  js-select2" name="nationality" required>
                                                    <option value="0" selected>اختر الجنسية</option>
                                                    <option value="1" {{old('nationality',$data->nationality) == 1 ? 'selected' : ' '}} >سوري</option>
                                                    <option value="2" {{old('nationality',$data->nationality) == 2 ? 'selected' : ' '}} >سودانى</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">نوع الاقامة</label>
                                            <div class="form-control-wrap">
                                                <select class="form-select  js-select2" id="type" name="type" placement="اختر نوع الاقامة" required>
                                                    <option value="0" selected>اختر نوع الاقامة</option>
                                                    <option value="1"  {{old('type',$data->type) == 1 ? 'selected' : ' '}}  >سياحة</option>
                                                    <option value="2"  {{old('type',$data->type) == 2 ? 'selected' : ' '}} >دراسة</option>
                                                    <option value="3"  {{old('type',$data->type) == 3 ? 'selected' : ' '}} >مؤقتة</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div id="info" style="display: none">
                                            <span  class="text-danger fs-4 fw-bold">* البيانات المطلوبة</span>
                                            <br>

                                            <div class="form-group pt-3">
                                                <label class="form-label" for="name_ar">الاسم ( عربي )</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="name_ar" name="name_ar" required value="{{old('name_ar',$data->name_ar)}}" placeholder="اكتب اسمك كامل باللغة العربية">
                                                    <input type="hidden" class="form-control" id="id" name="id" required value="{{old('id',$data->id)}}" placeholder="اكتب اسمك كامل باللغة العربية">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="name_en">الاسم ( انجليزي )</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="name_en" name="name_en" required value="{{old('name_en',$data->name_en)}}" placeholder="اكتب اسمك كامل باللغة الانجليزية">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="birth_date">تاريخ الميلاد</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control date-picker" id="birth_date" required value="{{date('m/d/Y',strtotime(old('birth_date',$data->birth_date)))}}" name="birth_date" >
                                                </div>
                                                <div class="form-note">Date format <code>mm/dd/yyyy</code></div>

                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="mobile">رقم الموبايل</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="mobile" required name="mobile" value="{{old('mobile',$data->mobile)}}" placeholder="رقم الموبايل الشخصي">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="address">العنوان </label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="address" required name="address" value="{{old('address',$data->address)}}" placeholder="يرجي كتابة عنوان الاقامة فى مصر تفصيلي">
                                                </div>
                                            </div>
                                            @foreach($data->files as $x)
                                            <div class="mb-5">
                                            <div class="form-group">
                                                @if($x->name == 'personal_photo')
                                                <label class="form-label" for="{{$x->name}}">صورة شخصية</label>
                                                @elseif($x->name == 'passport')
                                                    <label class="form-label" for="{{$x->name}}">جواز السفر</label>
                                                @elseif($x->name == 'stamp_paper')
                                                    <label class="form-label" for="{{$x->name}}">صورة الختم</label>
                                                @endif

                                                    <div class=" row">
                                                        <div class="col-md-8 d-flex align-items-center align-content-center text-center ">
                                                            <span class="text-center">{{$x->name}}</span>
                                                        </div>
                                                        @if($x->file != '')
                                                        <div class="col-md-4">
                                                            <a href="{{asset('uploads/requests/'.$x->file)}}" download="{{$x->name.'_'.$data->code}}" class="btn btn-dim btn-primary">تحميل</a>
                                                            <a href="{{asset('uploads/requests/'.$x->file)}}" class="btn btn-dim btn-info" target="_blank">عرض</a>
                                                        </div>
                                                        @else
                                                            <span class="lead-text bg-danger text-white text-center">لم يتم تحميل ملف </span>
                                                        @endif
                                                    </div>
                                                    <input type="hidden" class="" id="{{$x->name}}" name="id_{{$x->name}}" value="{{$x->id}}" required>

                                            </div>
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label class="form-label" for="comment_{{$x->name}}">ملاحظات</label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control fs-5 fw-bold" id="comment_{{$x->name}}" name="comment_{{$x->name}}" value="{{old('comment_'.$x->name)}}" placeholder="فى حالة رفض المستند اترك تعليق">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="form-label">حالة المستند</label>
                                                            <div class="form-control-wrap">
                                                                <select class="form-select  js-select2" name="status_{{$x->name}}">
                                                                    <option value="0" selected>اختر حالة المستند</option>
                                                                    <option value="1"  {{old('status_'.$x->name,$data->status) == 1 ? 'selected' : ' '}}  >مقبول</option>
                                                                    <option value="2"  {{old('status_'.$x->name,$data->status) == 1 ? 'selected' : ' '}}  >مرفوض</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                            @endforeach

                                        </div>
                                        @if($data->status == 5)
                                            <input type="hidden" class="form-control fs-5 fw-bold"  name="paid" value="1" placeholder="فى حالة رفض المستند اترك تعليق">

                                            <div class="form-group d-flex justify-content-center mt-5">
                                            <button type="submit" class="btn btn-lg btn-success">
                                                تاكيد الدفع
                                            </button>
                                        </div>
                                        @else
                                            <div class="form-group d-flex justify-content-center mt-5">
                                                <button type="submit" class="btn btn-lg btn-primary">
                                                    إرسال
                                                </button>
                                            </div>
                                        @endif
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


        if ($('#type').val() != 0) {
            $('#info').slideDown(400);
        }

        $('#type').on('change', function() {
           $('#info').slideDown(400);
        });

    });

</script>


@endsection


