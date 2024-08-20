@extends('Backend.layout.master')
@section('title')
    {{trans('page_title.coupons')}}
@endsection
@section('css')

@endsection
@section('content')
    <div class="container-xl wide-xl">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">{{trans('page_title.coupons')}}</h3>
                        <div class="nk-block-des text-soft">
                            <p>{{trans('coupons.You have total')}} {{$coupons->count()}} {{trans('page_title.coupons')}}</p>
                        </div>
                    </div><!-- .nk-block-head-content -->
                    <div class="nk-block-head-content">
                        <div class="toggle-wrap nk-block-tools-toggle">
                            <div class="toggle-expand-content" data-content="pageMenu">
                                <ul class="nk-block-tools g-3">
                                    @ability('admin','create_product_coupons')
                                    <li><a href="javascript:void(0)" class="btn btn-white btn-outline-light "
                                           data-bs-toggle="modal" data-bs-target="#createCoupon"><em
                                                class="icon ni ni-percent"></em><span>{{trans('coupons.create coupon')}}</span></a>
                                    </li>
                                    @endability
                                    {{--                                    <li>--}}
                                    {{--                                        <a href="javascript:void(0)" class="btn btn-icon btn-primary d-md-none"  data-bs-toggle="modal" data-bs-target="#createCategory"><em--}}
                                    {{--                                                class="icon ni ni-plus"></em></a>--}}
                                    {{--                                    </li>--}}

                                </ul>
                            </div>
                        </div><!-- .toggle-wrap -->
                    </div><!-- .nk-block-head-content -->
                </div><!-- .nk-block-between -->
            </div><!-- .nk-block-head -->
            <div class="nk-block">
                <div class="card card-stretch">
                    <div class="card-inner-group">
                        @if($coupons->count() > 0)
                            <div class="card-inner position-relative card-tools-toggle">
                                <div class="card-title-group">
                                    <div class="card-tools me-n1">
                                        <ul class="btn-toolbar gx-1">
                                            <li>
                                                <a href="#" class="btn btn-icon search-toggle toggle-search"
                                                   data-target="search"><em class="icon ni ni-search"></em></a>
                                            </li><!-- li -->
                                            <li class="btn-toolbar-sep"></li><!-- li -->

                                        </ul><!-- .btn-toolbar -->
                                    </div><!-- .card-tools -->
                                </div><!-- .card-title-group -->
                                <div class="card-search search-wrap" data-search="search">
                                    <div class="card-body">
                                        <div class="search-content">
                                            <a href="#" class="search-back btn btn-icon toggle-search"
                                               data-target="search"><em class="icon ni ni-arrow-left"></em></a>
                                            <input type="text" class="form-control border-transparent form-focus-none"
                                                   id="search" placeholder="Search by user or email">
                                            <button class="search-submit btn btn-icon"><em
                                                    class="icon ni ni-search"></em></button>
                                        </div>
                                    </div>
                                </div><!-- .card-search -->
                            </div><!-- .card-inner -->
                            <div class="card-inner p-0">
                                <div class="nk-tb-list nk-tb-ulist date_request">
                                    <div class="nk-tb-item nk-tb-head">
                                        <div class="nk-tb-col nk-tb-col-check">
                                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                                <input type="checkbox" class="select_all custom-control-input" id="uid">
                                                <label class="custom-control-label" for="uid"></label>
                                            </div>
                                        </div>
                                        <div class="nk-tb-col"><span>{{trans('coupons.code')}}</span></div>
                                        <div class="nk-tb-col"><span>{{trans('coupons.value')}}</span></div>
                                        <div class="nk-tb-col"><span>{{trans('coupons.description')}}</span></div>
                                        <div class="nk-tb-col"><span>{{trans('coupons.use times')}}</span></div>
                                        <div class="nk-tb-col"><span>{{trans('coupons.validity data')}}</span></div>
                                        <div class="nk-tb-col"><span>{{trans('coupons.greater than')}}</span></div>
                                        <div class="nk-tb-col"><span>{{trans('coupons.status')}}</span></div>
                                        <div class="nk-tb-col"><span>{{trans('coupons.created at')}}</span></div>
                                        <div class="nk-tb-col"><span>{{trans('coupons.action')}}</span></div>

                                    </div><!-- .nk-tb-item -->
                                    @foreach($coupons as $coupon)
                                        <div class="nk-tb-item">
                                            <div class="nk-tb-col nk-tb-col-check">
                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                    <input type="checkbox" class="select_all custom-control-input"
                                                           value="{{$coupon->id}}}" id="uid{{$coupon->id}}">
                                                    <label class="custom-control-label"
                                                           for="uid{{$coupon->id}}"></label>
                                                </div>
                                            </div>
                                            <div class="nk-tb-col">
                                                <a onclick="copyToClipboard({{$coupon->id}})">
                                                    <span class="tb-amount user-select-all-{{$coupon->id}}" id="name_delete_{{$coupon->id}}" >{{$coupon->code}}</span>
                                                </a>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span>{{$coupon->value}} {{$coupon->type == 'fixed'? '$' : '%'}}</span>
                                            </div>
                                            <div class="nk-tb-col text-truncate" style="max-width: 150px;">
                                                <span data-bs-toggle="tooltip"
                                                      data-bs-placement="top" title="{{$coupon->description ?? ' - '}}" >{{$coupon->description ?? ' - '}}
                                                </span>
                                            </div>

                                            <div class="nk-tb-col">
                                                <span>{{$coupon->used_times . ' / '. $coupon->use_times}}</span>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span>{{$coupon->start_date != '' ? date('Y-m-d',strtotime($coupon->start_date)). ' - ' . date('Y-m-d',strtotime($coupon->expire_date)): ' - '}}</span>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span>{{$coupon->greater_than*1 . '$' ?? ' - '}}</span>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span>{!! $coupon->statusLabel() !!}</span>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span>{!! $coupon->createdAt() !!}</span>
                                            </div>


                                            <div class="nk-tb-col nk-tb-col-tools">
                                                <ul class="nk-tb-actions gx-1">
                                                    @ability('admin','update_product_coupons')

                                                    <li class="nk-tb-action-hidden">
                                                        <a href="javascript:void(0)"
                                                           data-bs-toggle="modal"
                                                           data-bs-target="#editCoupon{{$coupon->id}}"
                                                           class="btn btn-trigger btn-icon">
                                                            <em class="icon ni ni-edit" data-bs-toggle="tooltip"
                                                                data-bs-placement="top"
                                                                title="{{trans('page_title.edit')}}"></em>
                                                        </a>
                                                    </li>
                                                    @endability
                                                    @ability('admin','delete_product_coupons')

                                                    <li class="nk-tb-action-hidden">
                                                        <a href="javascript:void(0)"
                                                           onclick="deleteType({{$coupon->id}})"
                                                           class="btn btn-trigger btn-icon">
                                                            <em class="icon ni ni-delete" data-bs-toggle="tooltip"
                                                                data-bs-placement="top"
                                                                title="{{trans('page_title.delete')}}"></em>
                                                        </a>
                                                    </li>

                                                    @endability

                                                </ul>
                                            </div>
                                        </div><!-- .nk-tb-item -->
                                    @endforeach
                                </div><!-- .nk-tb-list -->
                            </div><!-- .card-inner -->
                            <div class="p-3">
                                {!! $coupons->appends(request()->all())->links() !!}
                            </div>

                        @else
                            <div class="card-inner p-0">
                                <div class="text-center" style="padding: 50px">
                                    <div>
                                        <img src="{{asset('backend/images/empty.png')}}">

                                    </div>
                                    <div>
                                        <a><span>{{trans('coupons.No coupons Info Found')}}</span></a>
                                    </div>

                                </div>
                            </div>
                        @endif
                    </div><!-- .card-inner-group -->
                </div><!-- .card -->
            </div><!-- .nk-block -->
        </div>
    </div>
    @ability('admin','create_product_coupons')

    <!-- Create Category -->
    <div class="modal fade modal-lg" id="createCoupon">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{trans('coupons.create new coupon')}}</h5>
                    <a href="" class="close" data-bs-dismiss="modal"
                       aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.product_coupons.store')}}" method="post"
                          class="form-validate is-alter"  autocomplete="off">
                        @csrf
                        <div class="row g-gs pb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="full-name">{{trans('coupons.code')}}</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control coupon_code" id="code" name="code"
                                               value="{{old('code')}}" required>
                                        @error('code')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="full-name">{{trans('coupons.type')}}</label>
                                    <div class="form-control-wrap">
                                        <select class="form-select js-select2" name="type">
                                            <option value="0" disabled selected>
                                                ----- {{trans('coupons.select type')}}
                                                -----
                                            </option>
                                            <option value="fixed"
                                                {{old('type') == 'fixed' ? 'selected' : null}}>{{trans('coupons.fixed')}}</option>
                                            <option value="percentage"
                                                {{old('type') == 'percentage' ? 'selected' : null}}>{{trans('coupons.percentage')}}</option>
                                        </select>
                                        @error('type')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="full-name">{{trans('coupons.value')}}</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="full-name" name="value" id="value"
                                               value="{{old('value')}}" required>
                                        @error('value')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="full-name">{{trans('coupons.Use times')}}</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" name="use_times" id="use_times"
                                               value="{{old('use_times')}}" required>
                                        @error('use_times')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="full-name">{{trans('coupons.start date')}}</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control date-picker"  name="start_date"  id="start_date"
                                               value="{{old('start_date')}}" data-date-format="yyyy-mm-dd" required>
                                        @error('start_date')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="full-name">{{trans('coupons.expire date')}}</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control date-picker"  name="expire_date" id="expire_date"
                                               value="{{old('expire_date')}}" data-date-format="yyyy-mm-dd" required>
                                        @error('expire_date')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="full-name">{{trans('coupons.greater than')}}</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control"  name="greater_than" id="greater_than"
                                               value="{{old('greater_than')}}" >
                                        @error('greater_than')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                    <span class="text-primary fs-12px">{{trans('coupons.here input the value of use this coupon')}}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="full-name">{{trans('categories.status')}}</label>
                                    <div class="form-control-wrap">
                                        <select class="form-select js-select2" name="status">
                                            <option value="0" disabled selected>
                                                ----- {{trans('categories.select status')}}
                                                -----
                                            </option>
                                            <option value="1"
                                                {{old('status') == '1' ? 'selected' : null}}>{{trans('coupons.Active')}}</option>
                                            <option value="0"
                                                {{old('status') == '0' ? 'selected' : null}}>{{trans('coupons.Inactive')}}</option>
                                        </select>
                                        @error('status')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>




                        </div>

                        <div class="row g-gs pb-3">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="full-name">{{trans('coupons.description')}} <span
                                            class="text-danger">( {{trans('coupons.ar')}} )</span></label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="full-name" name="description[ar]"
                                               value="{{old('description.ar')}}" required>
                                        @error('description[ar]')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="full-name">{{trans('coupons.description')}} <span
                                            class="text-danger">( {{trans('coupons.en')}} )</span></label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="full-name" name="description[en]"
                                               value="{{old('description.en')}}" required>
                                        @error('description[en]')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary">{{trans('categories.save')}}</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- End create Category -->
    @endability

    @ability('admin','update_product_coupons')

    <!-- Edit Category -->
    @foreach($coupons as $coupon)
        <div class="modal fade modal-lg" id="editCoupon{{$coupon->id}}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{trans('coupons.update coupon')}}
                            ( {{$coupon->code}} )</h5>
                        <a href="" class="close" data-bs-dismiss="modal"
                           aria-label="Close">
                            <em class="icon ni ni-cross"></em>
                        </a>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('admin.product_coupons.update',$coupon->id)}}" method="post"
                              class="form-validate is-alter" autocomplete="off">
                            @csrf
                            @method('PUT')
                            <div class="row g-gs pb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="full-name">{{trans('coupons.code')}}</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control coupon_code" id="code" name="code"
                                                   value="{{old('code',$coupon->code)}}" required>
                                            @error('code')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="full-name">{{trans('coupons.type')}}</label>
                                        <div class="form-control-wrap">
                                            <select class="form-select js-select2" name="type">
                                                <option value="0" disabled selected>
                                                    ----- {{trans('coupons.select type')}}
                                                    -----
                                                </option>
                                                <option value="fixed"
                                                    {{old('type',$coupon->type) == 'fixed' ? 'selected' : null}}>{{trans('coupons.fixed')}}</option>
                                                <option value="percentage"
                                                    {{old('type',$coupon->type) == 'percentage' ? 'selected' : null}}>{{trans('coupons.percentage')}}</option>
                                            </select>
                                            @error('type')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="full-name">{{trans('coupons.value')}}</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control"  name="value" id="value"
                                                   value="{{old('value',$coupon->value)}}" required>
                                            @error('value')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="full-name">{{trans('coupons.Use times')}}</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" name="use_times" id="use_times"
                                                   value="{{old('use_times',$coupon->use_times)}}" required>
                                            @error('use_times')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="full-name">{{trans('coupons.start date')}}</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control date-picker"  name="start_date" id="start_date"
                                                   value="{{old('start_date',$coupon->start_date)}}" data-date-format="yyyy-mm-dd" required>
                                            @error('start_date')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="full-name">{{trans('coupons.expire date')}}</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control date-picker"  name="expire_date" id="expire_date"
                                                   value="{{old('expire_date',$coupon->expire_date)}}"  data-date-format="yyyy-mm-dd" required>
                                            @error('expire_date')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="full-name">{{trans('coupons.greater than')}}</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control"  name="greater_than" id="greater_than"
                                                   value="{{old('greater_than',$coupon->greater_than*1)}}"  required>
                                            @error('greater_than')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                        <span class="text-primary fs-12px">{{trans('coupons.here input the value of use this coupon')}}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="full-name">{{trans('categories.status')}}</label>
                                        <div class="form-control-wrap">
                                            <select class="form-select js-select2" name="status">
                                                <option value="0" disabled selected>
                                                    ----- {{trans('categories.select status')}}
                                                    -----
                                                </option>
                                                <option value="1"
                                                    {{old('status',$coupon->status) == '1' ? 'selected' : null}}>{{trans('coupons.Active')}}</option>
                                                <option value="0"
                                                    {{old('status',$coupon->status) == '0' ? 'selected' : null}}>{{trans('coupons.Inactive')}}</option>
                                            </select>
                                            @error('status')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>




                            </div>

                            <div class="row g-gs pb-3">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="full-name">{{trans('coupons.description')}} <span
                                                class="text-danger">( {{trans('coupons.ar')}} )</span></label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="full-name" name="description[ar]"
                                                   value="{{old('description.ar',$coupon->getTranslation('description','ar'))}}" required>
                                            @error('description[ar]')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="full-name">{{trans('coupons.description')}} <span
                                                class="text-danger">( {{trans('coupons.en')}} )</span></label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="full-name" name="description[en]"
                                                   value="{{old('description.en',$coupon->getTranslation('description','en'))}}" required>
                                            @error('description[en]')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <button type="submit"
                                        class="btn btn-lg btn-primary">{{trans('categories.update')}}</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    @endforeach
    <!-- End edit Category -->
    @endability

@endsection
@section('script')
    <script>
        $(function(){
            $('.coupon_code').keyup(function () {
                this.value = this.value.toUpperCase();
            });





        });
    </script>

    <script>

        const copyToClipboard = async (id) => {
            var name = $('#name_delete_'+id).text();

            try {
                const element = document.querySelector(".user-select-all-"+id);
                await navigator.clipboard.writeText(element.textContent);
                toastr.clear();
                NioApp.Toast('<p>{{trans('coupons.Text copied to clipboard!')}} ('+name+')</p>', 'success', {position: 'top-center'});
                console.log("Text copied to clipboard!");
                // Optional: Display a success message to the user
            } catch (error) {
                toastr.clear();
                NioApp.Toast('<p>{{trans('coupons.Failed to copy to clipboard:')}}'+error+'</p>', 'error', {position: 'top-center'});
                console.error("Failed to copy to clipboard:", error);
                // Optional: Display an error message to the user
            }
        };



        function deleteType(id) {

            var name = $('#name_delete_'+id).text();

            Swal.fire({
                title: '{{trans('coupons.Delete!')}}',
                text: '{{trans('coupons.Are you sure to delete')}}' + "(" + name + ")؟",
                icon: 'warning',
                showCancelButton: true,
                cancelButtonColor: '#d33',
                cancelButtonText: '{{trans('coupons.cancel')}}',
                confirmButtonColor: '#3085d6',
                confirmButtonText: '{{trans('coupons.ok')}}'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#file' + id).hide();
                    $.get('admin/product_coupons/delete/' + id, function (deleted) {

                        if (deleted.exists == true) {
                            toastr.clear();
                            NioApp.Toast('<h5>{{trans('coupons.success')}}</h5><p>{{trans('coupons.coupon deleted successfully')}}</p>', 'success', {position: 'top-center'});
                            setInterval('location.reload()', 1000);
                        } else {


                        }

                    })


                }
            })


        }
    </script>

@endsection
