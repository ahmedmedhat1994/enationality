@extends('Backend.layout.master')
@section('title')
    {{trans('page_title.customer_addresses')}}
@endsection
@section('css')

@endsection
@section('content')
    <div class="container-xl wide-xl">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">{{trans('page_title.customer_addresses')}}</h3>
                        <div class="nk-block-des text-soft">
                            <p>{{trans('categories.You have total')}} {{$customer_addresses_count}} {{trans('page_title.customer_addresses')}}</p>
                        </div>
                    </div><!-- .nk-block-head-content -->
                    <div class="nk-block-head-content">
                        <div class="toggle-wrap nk-block-tools-toggle">
                            <div class="toggle-expand-content" data-content="pageMenu">
                                <ul class="nk-block-tools g-3">
                                    @ability('admin','create_customer_addresses')
                                    <li><a href="javascript:void(0)" class="btn btn-white btn-outline-light "
                                           data-bs-toggle="modal" data-bs-target="#createAddress"><em
                                                class="icon ni ni-tag"></em><span>{{trans('page_title.create customer addresses')}}</span></a>
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
                        @if($customer_addresses_count > 0)
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
                                        <div class="nk-tb-col"><span>{{trans('customers.Customer')}}</span></div>
                                        <div class="nk-tb-col"><span>{{trans('customers.Title')}}</span></div>
                                        <div class="nk-tb-col"><span>{{trans('customers.Shipping Info')}}</span></div>
                                        <div class="nk-tb-col"><span>{{trans('customers.Location')}}</span></div>
                                        <div class="nk-tb-col"><span>{{trans('customers.Address')}}</span></div>
                                        <div class="nk-tb-col"><span>{{trans('customers.Zip code')}}</span></div>
                                        <div class="nk-tb-col"><span>{{trans('customers.POBox')}}</span></div>
                                        <div class="nk-tb-col"><span>{{trans('customers.action')}}</span></div>
                                        {{--                                        <div class="nk-tb-col nk-tb-col-tools text-end">--}}
                                        {{--                                            <div class="dropdown">--}}
                                        {{--                                                <a href="#" class="btn btn-xs btn-outline-light btn-icon dropdown-toggle" data-bs-toggle="dropdown" data-offset="0,5"><em class="icon ni ni-plus"></em></a>--}}
                                        {{--                                                <div class="dropdown-menu dropdown-menu-xs dropdown-menu-end">--}}
                                        {{--                                                    <ul class="link-tidy sm no-bdr">--}}
                                        {{--                                                        <li>--}}
                                        {{--                                                            <div class="custom-control custom-control-sm custom-checkbox">--}}
                                        {{--                                                                <input type="checkbox" class="custom-control-input" checked="" id="bl">--}}
                                        {{--                                                                <label class="custom-control-label" for="bl">Balance</label>--}}
                                        {{--                                                            </div>--}}
                                        {{--                                                        </li>--}}
                                        {{--                                                        <li>--}}
                                        {{--                                                            <div class="custom-control custom-control-sm custom-checkbox">--}}
                                        {{--                                                                <input type="checkbox" class="custom-control-input" checked="" id="ph">--}}
                                        {{--                                                                <label class="custom-control-label" for="ph">Phone</label>--}}
                                        {{--                                                            </div>--}}
                                        {{--                                                        </li>--}}
                                        {{--                                                        <li>--}}
                                        {{--                                                            <div class="custom-control custom-control-sm custom-checkbox">--}}
                                        {{--                                                                <input type="checkbox" class="custom-control-input" id="vri">--}}
                                        {{--                                                                <label class="custom-control-label" for="vri">Verified</label>--}}
                                        {{--                                                            </div>--}}
                                        {{--                                                        </li>--}}
                                        {{--                                                        <li>--}}
                                        {{--                                                            <div class="custom-control custom-control-sm custom-checkbox">--}}
                                        {{--                                                                <input type="checkbox" class="custom-control-input" id="st">--}}
                                        {{--                                                                <label class="custom-control-label" for="st">Status</label>--}}
                                        {{--                                                            </div>--}}
                                        {{--                                                        </li>--}}
                                        {{--                                                    </ul>--}}
                                        {{--                                                </div>--}}
                                        {{--                                            </div>--}}
                                        {{--                                        </div>--}}
                                    </div><!-- .nk-tb-item -->
                                    @foreach($customer_addresses as $address)
                                        <div class="nk-tb-item">
                                            <div class="nk-tb-col nk-tb-col-check">
                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                    <input type="checkbox" class="select_all custom-control-input"
                                                           value="{{$address->id}}}" id="uid{{$address->id}}">
                                                    <label class="custom-control-label"
                                                           for="uid{{$address->id}}"></label>
                                                </div>
                                            </div>

                                            <div class="nk-tb-col tb-col-md">
                                                <span>{{$address->user->full_name}}</span>
                                            </div>
                                            <div class="nk-tb-col tb-col-md">
                                                <span>{{$address->address_title}}</span>
                                                <p class="text-gray-100"><b>{{ $address->defaultAddress() }}</b></p>

                                            </div>
                                            <div class="nk-tb-col tb-col-md">
                                                {{ $address->first_name . ' ' . $address->last_name }}
                                                <small class="text-gray-400">{{ $address->email }}<br/>{{ $address->mobile }}</small>
                                            </div>
                                            <div class="nk-tb-col tb-col-md">
                                                <span>{{ $address->country->name . ' - ' . $address->state->name .' - ' . $address->city->name }}</span>
                                            </div>
                                            <div class="nk-tb-col tb-col-md">
                                                <span>{{ $address->address }}</span>
                                            </div>
                                            <div class="nk-tb-col tb-col-md">
                                                <span>{{ $address->zip_code }}</span>
                                            </div>
                                            <div class="nk-tb-col tb-col-md">
                                                <span>{{ $address->po_box }}</span>
                                            </div>

                                            <div class="nk-tb-col nk-tb-col-tools">
                                                <ul class="nk-tb-actions gx-1">
                                                    @ability('admin','update_customer_addresses')

                                                    <li class="nk-tb-action-hidden">
                                                        <a href="javascript:void(0)"
                                                           data-bs-toggle="modal"
                                                           data-bs-target="#editAddress{{$address->id}}"
                                                           class="btn btn-trigger btn-icon">
                                                            <em class="icon ni ni-edit" data-bs-toggle="tooltip"
                                                                data-bs-placement="top"
                                                                title="{{trans('page_title.edit')}}"></em>
                                                        </a>
                                                    </li>
                                                    @endability
                                                    @ability('admin','delete_customer_addresses')

                                                    <li class="nk-tb-action-hidden">
                                                        <a href="javascript:void(0)"
                                                           onclick="deleteType({{$address->id}})"
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
                                {{$customer_addresses->links()}}
                            </div>

                        @else
                            <div class="card-inner p-0">
                                <div class="text-center" style="padding: 50px">
                                    <div>
                                        <img src="{{asset('backend/images/empty.png')}}">

                                    </div>
                                    <div>
                                        <a><span>{{trans('categories.No Categories Info Found')}}</span></a>
                                    </div>

                                </div>
                            </div>
                        @endif
                    </div><!-- .card-inner-group -->
                </div><!-- .card -->
            </div><!-- .nk-block -->
        </div>
    </div>
    @ability('admin','create_customer_addresses')

    <!-- Create Category -->
    <div class="modal fade modal-lg" id="createAddress">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{trans('customers.create new customer address')}}</h5>
                    <a href="" class="close" data-bs-dismiss="modal"
                       aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.customer_addresses.store')}}" method="post"
                          class="form-validate is-alter" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-gs pb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="full-name">{{trans('customers.name')}} </label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control typeahead" data-provide="typeahead" id="search" name="customer_name"
                                               value="{{ old('customer_name', request()->input('customer_name'))}}"
                                               placeholder="{{trans('customers.Start typing something to search customer...')}}" autocomplete="off">
                                        <input type="hidden" class="form-control" name="user_id" id="user_id" value="{{ old('user_id', request()->input('user_id')) }}" readonly>

                                        @error('user_id')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="full-name">{{trans('customers.Address title')}} </label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="address_title" name="address_title"
                                               value="{{ old('address_title')}}" placeholder="{{trans('customers.select address type ( home - work )')}}">
                                        @error('address_title')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="full-name">{{trans('customers.Default address')}}</label>
                                    <div class="form-control-wrap">
                                        <select class="form-select js-select2" name="default_address">
                                            <option value="default" disabled selected>
                                                ----- {{trans('customers.select Default address')}}
                                                -----
                                            </option>
                                            <option value="0"
                                                {{old('default_address') == 0 ? 'selected' : ''}}>{{trans('customers.no')}}</option>
                                            <option value="1"
                                                 {{old('default_address') == 1 ? 'selected' : ''}}>{{trans('customers.yes')}}</option>
                                        </select>
                                        @error('default_address')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="full-name">{{trans('customers.first_name')}} </label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="first_name" name="first_name"
                                               value="{{ old('first_name')}}">
                                        @error('first_name')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="full-name">{{trans('customers.last_name')}} </label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="last_name" name="last_name"
                                               value="{{ old('last_name')}}">
                                        @error('last_name')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="full-name">{{trans('customers.email')}} </label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="email" name="email"
                                               value="{{ old('email')}}">
                                        @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="full-name">{{trans('customers.mobile')}} </label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="mobile" name="mobile"
                                               value="{{ old('mobile')}}">
                                        @error('mobile')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="country_id">{{trans('customers.country')}}</label>
                                    <div class="form-control-wrap">
                                        <select class="form-select js-select2"  id="country_id" name="country_id" data-minimum-results-for-search="Infinity">
                                            <option value="0" disabled selected>----- {{trans('customers.select country')}}-----</option>
                                            @foreach($countries as $country)
                                            <option value="{{$country->id}}" {{ old('country_id') == $country->id ? 'selected' : null }}>{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('country_id')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="state_id">{{trans('customers.state')}}</label>
                                    <div class="form-control-wrap">
                                        <select class="form-select js-select2" name="state_id" id="state_id" data-minimum-results-for-search="Infinity">

                                        </select>
                                        @error('state_id')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="state_id">{{trans('customers.city')}}</label>
                                    <div class="form-control-wrap">
                                        <select class="form-select js-select2" name="city_id" id="city_id" data-minimum-results-for-search="Infinity">

                                        </select>
                                        @error('city_id')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="address">{{trans('customers.address')}} </label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="address" name="address"
                                               value="{{ old('address')}}">
                                        @error('address')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="address">{{trans('customers.address2')}} </label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="address2" name="address2"
                                               value="{{ old('address2')}}">
                                        @error('address2')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="address">{{trans('customers.zip_code')}} </label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="zip_code" name="zip_code"
                                               value="{{ old('zip_code')}}">
                                        @error('zip_code')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="po_box">{{trans('customers.po_box')}} </label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="po_box" name="po_box"
                                               value="{{ old('po_box')}}">
                                        @error('po_box')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row g-gs pb-3">
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
                                                    @if(old('status') == 1) selected @endif>{{trans('categories.Active')}}</option>
                                            <option value="0"
                                                    @if(old('status') == 0) selected @endif>{{trans('categories.Inactive')}}</option>
                                        </select>
                                        @error('status')<span class="text-danger">{{ $message }}</span>@enderror
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

    @ability('admin','update_customer_addresses')

    @foreach($customer_addresses as $address)
    <div class="modal fade modal-lg" id="editAddress{{$address->id}}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{trans('customers.update customer address')}} ( {{$address->user->full_name}} )</h5>
                    <a href="" class="close" data-bs-dismiss="modal"
                       aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.customer_addresses.update',$address->id)}}" method="post"
                          class="form-validate is-alter" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="row g-gs pb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="full-name">{{trans('customers.name')}} </label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" name="customer_name"
                                               value="{{ old('customer_name',$address->user->full_name)}}"
                                               readonly>
                                        <input type="hidden" class="form-control" name="user_id" id="user_id" value="{{ old('user_id', $address->user_id) }}" readonly>

                                        @error('user_id')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="full-name">{{trans('customers.Address title')}} </label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="address_title" name="address_title"
                                               value="{{ old('address_title',$address->address_title)}}" placeholder="{{trans('customers.select address type ( home - work )')}}">
                                        @error('address_title')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="full-name">{{trans('customers.Default address')}}</label>
                                    <div class="form-control-wrap">
                                        <select class="form-select js-select2" name="default_address">
                                            <option value="default" disabled selected>
                                                ----- {{trans('customers.select Default address')}}
                                                -----
                                            </option>
                                            <option value="0"
                                                {{old('default_address',$address->default_address) == 0 ? 'selected' : ''}}>{{trans('customers.no')}}</option>
                                            <option value="1"
                                                {{old('default_address',$address->default_address) == 1 ? 'selected' : ''}}>{{trans('customers.yes')}}</option>
                                        </select>
                                        @error('default_address')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="full-name">{{trans('customers.first_name')}} </label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="first_name" name="first_name"
                                               value="{{ old('first_name',$address->first_name)}}">
                                        @error('first_name')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="full-name">{{trans('customers.last_name')}} </label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="last_name" name="last_name"
                                               value="{{ old('last_name',$address->last_name)}}">
                                        @error('last_name')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="full-name">{{trans('customers.email')}} </label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="email" name="email"
                                               value="{{ old('email',$address->email)}}">
                                        @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="full-name">{{trans('customers.mobile')}} </label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="mobile" name="mobile"
                                               value="{{ old('mobile',$address->mobile)}}">
                                        @error('mobile')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="full-name">{{trans('customers.country')}}</label>
                                    <div class="form-control-wrap">
                                        <select class="form-select js-select2"  id="country_id2" name="country_id"  data-minimum-results-for-search="Infinity">
                                            <option value="0" disabled selected>----- {{trans('customers.select country')}}-----</option>
                                            @foreach($countries as $country)
                                                <option value="{{$country->id}}" {{ old('country_id',$address->country_id) == $country->id ? 'selected' : null }}>{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('country_id')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="state_id">{{trans('customers.state')}}</label>
                                    <div class="form-control-wrap">
                                        <select class="form-select js-select2" name="state_id" id="state_id2" data-minimum-results-for-search="Infinity">

                                        </select>
                                        @error('state_id')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="state_id">{{trans('customers.city')}}</label>
                                    <div class="form-control-wrap">
                                        <select class="form-select js-select2" name="city_id" id="city_id2" data-minimum-results-for-search="Infinity">

                                        </select>
                                        @error('city_id')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="address">{{trans('customers.address')}} </label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="address" name="address"
                                               value="{{ old('address',$address->address)}}">
                                        @error('address')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="address">{{trans('customers.address2')}} </label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="address2" name="address2"
                                               value="{{ old('address2',$address->address2)}}">
                                        @error('address2')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="address">{{trans('customers.zip_code')}} </label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="zip_code" name="zip_code"
                                               value="{{ old('zip_code',$address->zip_code)}}">
                                        @error('zip_code')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="po_box">{{trans('customers.po_box')}} </label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="po_box" name="po_box"
                                               value="{{ old('po_box',$address->po_box)}}">
                                        @error('po_box')<span class="text-danger">{{ $message }}</span>@enderror
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
    @endforeach

    @endability

@endsection
@section('script')
{{--    <script src="{{asset('backend/js/typeahead.bundle.js')}}">--}}
    <script src="{{asset('backend/js/typehead/bootstrap3-typeahead.min.js')}}">
    </script>
    <script>

        $(document).ready(function() {
            $('#country_id').select2();
            $('#state_id').select2();
            $('#city_id').select2();
        });


        $(function () {
            $(".typeahead").typeahead({
                autoSelect: true,
                minLength: 3,
                delay: 400,
                displayText: function (item) { return item.full_name + ' - ' + item.email; },
                source: function (query, process) {
                    return $.get("{{ route('admin.get_customers') }}", { 'query': query }, function (data) {
                        return process(data);
                    });
                },
                afterSelect: function (data) {
                    $('#user_id').val(data.id);
                }
            });


            populateStates();
            populateCities();
            populateStates2();
            populateCities2();

            $("#country_id").change(function () {
                populateStates();
                populateCities();
                return false;
            });

            $("#state_id").change(function () {
                populateCities();
                return false;
            });

            function populateStates()
            {
                let countryIdVal = $('#country_id').val() != null ? $('#country_id').val() : '{{ old('country_id') }}';
                $.get("{{ route('admin.states.get_states') }}", {country_id: countryIdVal}, function (data) {
                    $('option', $("#state_id")).remove();
                    $("#state_id").append($('<option disabled selected></option>').val('').html('{{trans('customers.select state')}}'));
                    $.each(data, function (val, text) {
                        let selectedVal = text.id == '{{ old('state_id') }}' ? "selected" : "";
                        $("#state_id").append($('<option ' + selectedVal + '></option>').val(text.id).html(text.name));
                    });
                }, "json");
            }

            function populateCities()
            {
                let stateIdVal = $('#state_id').val() != null ? $('#state_id').val() : '{{ old('state_id') }}';
                $.get("{{ route('admin.cities.get_cities') }}", {state_id: stateIdVal}, function (data) {
                    $('option', $("#city_id")).remove();
                    $("#city_id").append($('<option disabled selected></option>').val('').html('{{trans('customers.select city')}}'));
                    $.each(data, function (val, text) {
                        let selectedVal = text.id == '{{ old('city_id') }}' ? "selected" : "";
                        $("#city_id").append($('<option ' + selectedVal + '></option>').val(text.id).html(text.name));
                    });
                }, "json");
            }




            $("#country_id2").change(function () {
                populateStates2();
                populateCities2();
                return false;
            });

            $("#state_id2").change(function () {
                populateCities2();
                return false;
            });

            function populateStates2()
            {
                let countryIdVal = $('#country_id2').val() != null ? $('#country_id2').val() : '{{ old('country_id',$address->country_id) }}';
                $.get("{{ route('admin.states.get_states') }}", {country_id: countryIdVal}, function (data) {
                    $('option', $("#state_id2")).remove();
                    $("#state_id2").append($('<option disabled selected></option>').val('').html('{{trans('customers.select state')}}'));
                    $.each(data, function (val, text) {
                        let selectedVal = text.id == '{{ old('state_id',$address->state_id) }}' ? "selected" : "";
                        $("#state_id2").append($('<option ' + selectedVal + '></option>').val(text.id).html(text.name));
                    });
                }, "json");
            }

            function populateCities2()
            {
                let stateIdVal = $('#state_id2').val() != null ? $('#state_id2').val() : '{{ old('state_id',$address->state_id) }}';
                $.get("{{ route('admin.cities.get_cities') }}", {state_id: stateIdVal}, function (data) {
                    $('option', $("#city_id2")).remove();
                    $("#city_id2").append($('<option disabled selected></option>').val('').html('{{trans('customers.select city')}}'));
                    $.each(data, function (val, text) {
                        let selectedVal = text.id == '{{ old('city_id',$address->city_id) }}' ? "selected" : "";
                        $("#city_id2").append($('<option ' + selectedVal + '></option>').val(text.id).html(text.name));
                    });
                }, "json");
            }

        });
    </script>
    <script>


        function deleteType(id) {

            var name = $('#name_delete').text();

            Swal.fire({
                title: '{{trans('categories.Delete!')}}',
                text: '{{trans('categories.Are you sure to delete')}}' + "(" + name + ")؟",
                icon: 'warning',
                showCancelButton: true,
                cancelButtonColor: '#d33',
                cancelButtonText: '{{trans('categories.cancel')}}',
                confirmButtonColor: '#3085d6',
                confirmButtonText: '{{trans('categories.ok')}}'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#file' + id).hide();
                    $.get('admin/product_categories/delete/' + id, function (deleted) {

                        if (deleted.exists == true) {
                            toastr.clear();
                            NioApp.Toast('<h5>{{trans('categories.success')}}</h5><p>{{trans('categories.category deleted successfully')}}</p>', 'success', {position: 'top-center'});
                            setInterval('location.reload()', 1000);
                        } else {


                        }

                    })


                }
            })


        }
    </script>

@endsection
