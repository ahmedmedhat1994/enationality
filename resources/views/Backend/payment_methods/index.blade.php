@extends('Backend.layout.master')
@section('title')
    {{trans('page_title.Payment Methods')}}
@endsection
@section('css')

@endsection
@section('content')
    <div class="container-xl wide-xl">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">{{trans('page_title.Payment Methods')}}</h3>
                        <div class="nk-block-des text-soft">
                            <p>{{trans('payment.You have total')}} {{$totalMethods}} {{trans('page_title.Payment Methods')}}</p>
                        </div>
                    </div><!-- .nk-block-head-content -->
                    <div class="nk-block-head-content">
                        <div class="toggle-wrap nk-block-tools-toggle">
                            <div class="toggle-expand-content" data-content="pageMenu">
                                <ul class="nk-block-tools g-3">
                                    @ability('admin','create_payment_methods')
                                    <li><a href="javascript:void(0)" class="btn btn-white btn-outline-light" data-bs-toggle="modal" data-bs-target="#createShipping"
                                        ><em
                                                class="icon ni ni-property-add"></em><span>{{trans('payment.create new method')}}</span></a>
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
                        @if($totalMethods > 0)
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
                                        <div class="nk-tb-col"><span>{{trans('payment.name')}}</span></div>
                                        <div class="nk-tb-col"><span>{{trans('payment.code')}}</span></div>
                                        <div class="nk-tb-col"><span>{{trans('payment.SandBox')}}</span></div>
                                        <div class="nk-tb-col"><span>{{trans('payment.status')}}</span></div>
                                        <div class="nk-tb-col"><span>{{trans('payment.action')}}</span></div>

                                    </div><!-- .nk-tb-item -->
                                    @foreach($payment_methods as $mehod)
                                        <div class="nk-tb-item">
                                            <div class="nk-tb-col nk-tb-col-check">
                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                    <input type="checkbox" class="select_all custom-control-input"
                                                           value="{{$mehod->id}}}" id="uid{{$mehod->id}}">
                                                    <label class="custom-control-label"
                                                           for="uid{{$mehod->id}}"></label>
                                                </div>
                                            </div>

                                            <div class="nk-tb-col">
                                                <span class="tb-amount"  id="name_delete_{{$mehod->id}}">{{$mehod->name}}</span>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span class="tb-amount"  >{{$mehod->code}}</span>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span class="tb-amount"  >{{$mehod->sandbox}}</span>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span>{!! $mehod->statusLabel() !!}</span>
                                            </div>


                                            <div class="nk-tb-col nk-tb-col-tools">
                                                <ul class="nk-tb-actions gx-1">
                                                    @ability('admin','update_payment_methods')

                                                    <li class="nk-tb-action-hidden">
                                                        <a href="javascript:void(0)"
                                                           data-bs-toggle="modal"
                                                           data-bs-target="#editShipping{{$mehod->id}}"
                                                           class="btn btn-trigger btn-icon">
                                                            <em class="icon ni ni-edit" data-bs-toggle="tooltip"
                                                                data-bs-placement="top"
                                                                title="{{trans('page_title.edit')}}"></em>
                                                        </a>
                                                    </li>
                                                    @endability
                                                    @ability('admin','delete_payment_methods')
                                                    <li class="nk-tb-action-hidden">
                                                        <a href="javascript:void(0)"
                                                           onclick="deleteType({{$mehod->id}})"
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
                                {!! $payment_methods->appends(request()->all())->links() !!}
                            </div>

                        @else
                            <div class="card-inner p-0">
                                <div class="text-center" style="padding: 50px">
                                    <div>
                                        <img src="{{asset('backend/images/empty.png')}}">

                                    </div>
                                    <div>
                                        <a><span>{{trans('payment.No payment methods Info Found')}}</span></a>
                                    </div>

                                </div>
                            </div>
                        @endif
                    </div><!-- .card-inner-group -->
                </div><!-- .card -->
            </div><!-- .nk-block -->
        </div>
    </div>

    @ability('admin','create_shipping_companies')
    <div class="modal fade modal-lg" id="createShipping">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{trans('shipping.create new shipping company')}}</h5>
                    <a href="" class="close" data-bs-dismiss="modal"
                       aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.shipping_companies.store')}}" method="post"
                          class="form-validate is-alter" enctype="multipart/form-data" autocomplete="off">
                        @csrf
                        <div class="row g-gs pb-3">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label" for="name">{{trans('payment.name')}} </label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control"  id="name" name="name" value="{{ old('name')}}">
                                        @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label" for="name">{{trans('payment.code')}} </label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control"  id="code" name="code" value="{{ old('code')}}">
                                        @error('code')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label" for="full-name">{{trans('payment.sandbox')}}</label>
                                    <div class="form-control-wrap">
                                        <select class="form-select js-select2" name="sandbox">
                                            <option value="0" disabled selected>
                                                ----- {{trans('payment.select status')}}
                                                -----
                                            </option>
                                            <option value="1"
                                                {{ old('sandbox') == '1' ? 'selected' : null }}>{{trans('categories.Sandbox')}}</option>
                                            <option value="0"
                                                {{ old('sandbox') == '0' ? 'selected' : null }}>{{trans('categories.Live')}}</option>
                                        </select>
                                        @error('sandbox')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label" for="full-name">{{trans('categories.status')}}</label>
                                    <div class="form-control-wrap">
                                        <select class="form-select js-select2" name="status">
                                            <option value="0" disabled selected>
                                                ----- {{trans('categories.select status')}}
                                                -----
                                            </option>
                                            <option value="1"
                                                {{ old('status') == '1' ? 'selected' : null }}>{{trans('categories.Active')}}</option>
                                            <option value="0"
                                                {{ old('status') == '0' ? 'selected' : null }}>{{trans('categories.Inactive')}}</option>
                                        </select>
                                        @error('status')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="name">{{trans('payment.merchant_email')}} </label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control"  id="merchant_email" name="merchant_email" value="{{ old('merchant_email')}}">
                                        @error('merchant_email')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="name">{{trans('payment.clint Id')}} </label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control"  id="client_id" name="client_id" value="{{ old('client_id')}}">
                                        @error('client_id')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="name">{{trans('payment.clint secret')}} </label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control"  id="client_secret" name="client_secret" value="{{ old('client_secret')}}">
                                        @error('client_secret')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="name">{{trans('payment.Sandbox Merchant Email')}} </label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control"  id="sandbox_merchant_email" name="sandbox_merchant_email" value="{{ old('sandbox_merchant_email')}}">
                                        @error('sandbox_merchant_email')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="name">{{trans('payment.Sandbox client id')}} </label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control"  id="sandbox_client_id" name="sandbox_client_id" value="{{ old('sandbox_client_id')}}">
                                        @error('sandbox_client_id')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="name">{{trans('payment.Sandbox client secret')}} </label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control"  id="sandbox_client_secret" name="sandbox_client_secret" value="{{ old('sandbox_client_secret')}}">
                                        @error('sandbox_client_secret')<span class="text-danger">{{ $message }}</span>@enderror
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
    @endability

    @ability('admin','update_shipping_companies')
    @foreach($payment_methods as $shipping)
        <div class="modal fade modal-lg" id="editShipping{{$shipping->id}}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{trans('shipping.create new shipping company')}}</h5>
                        <a href="" class="close" data-bs-dismiss="modal"
                           aria-label="Close">
                            <em class="icon ni ni-cross"></em>
                        </a>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('admin.shipping_companies.update',$shipping->id)}}" method="post"
                              class="form-validate is-alter" enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            @method('put')



                            <div class="form-group">
                                <button type="submit" class="btn btn-lg btn-primary">{{trans('categories.save')}}</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    @endforeach
    @endability



@endsection
@section('script')

    <script>
        $(function(){
            function matchStart(params, data) {
                // If there are no search terms, return all of the data
                if ($.trim(params.term) === '') {
                    return data;
                }

                // Skip if there is no 'children' property
                if (typeof data.children === 'undefined') {
                    return null;
                }

                // `data.children` contains the actual options that we are matching against
                var filteredChildren = [];
                $.each(data.children, function (idx, child) {
                    if (child.text.toUpperCase().indexOf(params.term.toUpperCase()) == 0) {
                        filteredChildren.push(child);
                    }
                });

                // If we matched any of the timezone group's children, then set the matched children on the group
                // and return the group object
                if (filteredChildren.length) {
                    var modifiedData = $.extend({}, data, true);
                    modifiedData.children = filteredChildren;

                    // You can return modified objects from here
                    // This includes matching the `children` how you want in nested data sets
                    return modifiedData;
                }

                // Return `null` if the term should not be displayed
                return null;
            }

            $('.select-multiple-tags').select2({
                minimumResultsForSearch: Infinity,
                tags: true,
                closeOnSelect: false,
                match: matchStart
            });
        });
    </script>
    <script>


        function deleteType(id) {

            var name = $('#name_delete_'+id).text();

            Swal.fire({
                title: '{{trans('reviews.Delete!')}}',
                text: '{{trans('reviews.Are you sure to delete')}}' + "(" + name + ")؟",
                icon: 'warning',
                showCancelButton: true,
                cancelButtonColor: '#d33',
                cancelButtonText: '{{trans('reviews.cancel')}}',
                confirmButtonColor: '#3085d6',
                confirmButtonText: '{{trans('reviews.ok')}}'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#file' + id).hide();
                    $.get('admin/shipping_companies/delete/' + id, function (deleted) {

                        if (deleted.exists == true) {
                            toastr.clear();
                            NioApp.Toast('<h5>{{trans('shipping.success')}}</h5><p>{{trans('shipping.company deleted successfully')}}</p>', 'success', {position: 'top-center'});
                            location.reload()
                        } else {


                        }

                    })


                }
            })


        }
    </script>

@endsection
