@extends('Frontend.layout.master')
@section('title')
    لوحة التحكم
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
                    <div class="row g-gs d-inline-flex justify-content-center justify-items-center w-100">
                        <div class="col-md-10 d-flex justify-content-around align-content-center mx-2">
                            <a href="{{route('dashboard')}}" class="btn btn-gray  d-block justify-content-center align-content-center" style="width: 150px; height: 150px;"><em class="icon ni ni-layers-fill" style="font-size: 40px;"></em><span class="px-0 pt-3 d-block fs-4 fw-bold"> الكل</span> </a>
                            <a href="{{route('dashboard').'?type=0'}}" class="btn btn-primary  d-block justify-content-center align-content-center" style="width: 150px; height: 150px;"><em class="icon ni ni-layers-fill" style="font-size: 40px;"></em><span class="px-0 pt-3 d-block fs-4 fw-bold"> جديدة</span> </a>
                            <a href="{{route('dashboard').'?type=4'}}" class="btn btn-info  d-block justify-content-center align-content-center" style="width: 150px; height: 150px;"><em class="icon ni ni-swap" style="font-size: 40px;"></em><span class="px-0 pt-3 d-block fs-4 fw-bold">عائد مراجعة </span> </a>
                            <a href="{{route('dashboard').'?type=5'}}" class="btn btn-warning d-block justify-content-center align-content-center" style="width: 150px; height: 150px;"><em class="icon ni ni-sign-dollar" style="font-size: 40px;"></em><span class="px-0 pt-3 d-block fs-4 fw-bold">تاكيد الدفع </span> </a>
                            <a href="{{route('dashboard').'?type=3'}}" class="btn btn-success  d-block justify-content-center align-content-center" style="width: 150px; height: 150px;"><em class="icon ni ni-check-round-cut" style="font-size: 40px;"></em><span class="px-0 pt-3 d-block fs-4 fw-bold">منتهي </span> </a>
                            <a href="{{route('dashboard').'?type=6'}}" class="btn btn-danger  d-block justify-content-center align-content-center" style="width: 150px; height: 150px;"><em class="icon ni ni-cross-circle" style="font-size: 40px;"></em><span class="px-0 pt-3 d-block fs-4 fw-bold">مرفوض </span> </a>
                        </div>
                        <div class="col-md-12">
                            <div class="nk-block">
                                <div class="card card-bordered card-stretch">
                                    <div class="card-inner-group">
                                        <div class="card-inner p-0">
                                            @if(count($datas)>0)
                                            <table class="nk-tb-list nk-tb-ulist">
                                                <thead>
                                                <tr class="nk-tb-item nk-tb-head">
                                                    <th class="nk-tb-col nk-tb-col-check">
                                                        <div class="custom-control custom-control-sm custom-checkbox notext">
                                                            <input type="checkbox" class="custom-control-input" id="pid-all">
                                                            <label class="custom-control-label" for="pid-all"></label>
                                                        </div>
                                                    </th>
                                                    <th class="nk-tb-col"><span class="sub-text">البيانات</span></th>
                                                    <th class="nk-tb-col tb-col-xxl"><span class="sub-text">تاريخ الطلب</span></th>
                                                    <th class="nk-tb-col tb-col-lg"><span class="sub-text">تحديث الطلب</span></th>
                                                    <th class="nk-tb-col tb-col-lg"><span class="sub-text">مدفوع</span></th>
                                                    <th class="nk-tb-col tb-col-xxl"><span class="sub-text">حالة الطلب</span></th>
                                                    <th class="nk-tb-col tb-col-md"><span class="sub-text">مسئول الطلب</span></th>
{{--                                                    <th class="nk-tb-col nk-tb-col-tools text-end">--}}
{{--                                                        <div class="dropdown">--}}
{{--                                                            <a href="#" class="btn btn-xs btn-trigger btn-icon dropdown-toggle me-n1" data-bs-toggle="dropdown" data-offset="0,5"><em class="icon ni ni-more-h"></em></a>--}}
{{--                                                            <div class="dropdown-menu dropdown-menu-end">--}}
{{--                                                                <ul class="link-list-opt no-bdr">--}}
{{--                                                                    <li><a href="#"><em class="icon ni ni-check-round-cut"></em><span>Mark As Done</span></a></li>--}}
{{--                                                                    <li><a href="#"><em class="icon ni ni-archive"></em><span>Mark As Archive</span></a></li>--}}
{{--                                                                    <li><a href="#"><em class="icon ni ni-trash"></em><span>Remove Projects</span></a></li>--}}
{{--                                                                </ul>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </th>--}}
                                                </tr><!-- .nk-tb-item -->
                                                </thead>
                                                <tbody>
                                                @foreach($datas as $data)
                                                <tr class="nk-tb-item">
                                                    <td class="nk-tb-col nk-tb-col-check">
                                                        <div class="custom-control custom-control-sm custom-checkbox notext">
                                                            <input type="checkbox" class="custom-control-input" id="pid-{{$data->id}}">
                                                            <label class="custom-control-label" for="pid-01"></label>
                                                        </div>
                                                    </td>
                                                    <td class="nk-tb-col">
                                                        <a href="{{route('review',$data->id)}}" class="project-title">
                                                            <div class="project-info">
                                                                <h6 class="title">{{$data->name_ar}}</h6>
                                                                <span class="sub-text">#{{$data->code}}</span>
                                                            </div>
                                                        </a>
                                                    </td>
                                                    <td class="nk-tb-col">
                                                        <span>{{date('Y-m-d',strtotime($data->submit_date))}}</span>
                                                    </td>
                                                    <td class="nk-tb-col ">
                                                        <span>{{date('Y-m-d',strtotime($data->update_date))}}</span>
                                                    </td>
                                                    <td class="nk-tb-col ">
                                                        @if($data->payed == 1)
                                                        <span class="badge bg-success fw-bold fs-15px">تم الدفع</span>
                                                        @else
                                                            <span class="badge bg-info fw-bold fs-15px">-</span>
                                                        @endif
                                                    </td>
                                                    <td class="nk-tb-col">
                                                        <span>{!! $data->statusLabel() !!}</span>
                                                    </td>
                                                    <td class="nk-tb-col">
                                                        @if($data->updated_by != null)
                                                        <span>{{$data->user_review->name}}</span>
                                                        @else
                                                            <span>-</span>
                                                        @endif
                                                    </td>
{{--                                                    <td class="nk-tb-col nk-tb-col-tools">--}}
{{--                                                        <ul class="nk-tb-actions gx-1">--}}
{{--                                                            <li>--}}
{{--                                                                <div class="drodown">--}}
{{--                                                                    <a href="#" class="dropdown-toggle btn btn-sm btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>--}}
{{--                                                                    <div class="dropdown-menu dropdown-menu-end">--}}
{{--                                                                        <ul class="link-list-opt no-bdr">--}}
{{--                                                                            <li><a href="html/apps-kanban.html"><em class="icon ni ni-eye"></em><span>View Project</span></a></li>--}}
{{--                                                                            <li><a href="#"><em class="icon ni ni-edit"></em><span>Edit Project</span></a></li>--}}
{{--                                                                            <li><a href="#"><em class="icon ni ni-check-round-cut"></em><span>Mark As Done</span></a></li>--}}
{{--                                                                        </ul>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </li>--}}
{{--                                                        </ul>--}}
{{--                                                    </td>--}}
                                                </tr><!-- .nk-tb-item -->
                                                @endforeach
                                                </tbody>
                                            </table><!-- .nk-tb-list -->
                                            @else
                                                <div class="card-inner p-0">
                                                    <div class="text-center" style="padding: 50px">
                                                        <div>
                                                            <img src="{{asset('empty.png')}}">

                                                        </div>
                                                        <div class="pt-3">
                                                            <a><span>لايوجد طلبات لعرضها</span></a>
                                                        </div>

                                                    </div>
                                                </div>

                                            @endif
                                        </div><!-- .card-inner -->
                                    </div><!-- .card-inner-group -->
                                </div><!-- .card -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')


@endsection


