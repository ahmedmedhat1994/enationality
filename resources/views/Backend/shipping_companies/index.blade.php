@extends('Backend.layout.master')
@section('title')
    {{trans('page_title.shipping companies')}}
@endsection
@section('css')

@endsection
@section('content')
    <div class="container-xl wide-xl">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">{{trans('page_title.shipping companies')}}</h3>
                        <div class="nk-block-des text-soft">
                            <p>{{trans('reviews.You have total')}} {{$totalCompaines}} {{trans('page_title.shipping companies')}}</p>
                        </div>
                    </div><!-- .nk-block-head-content -->
                    <div class="nk-block-head-content">
                        <div class="toggle-wrap nk-block-tools-toggle">
                            <div class="toggle-expand-content" data-content="pageMenu">
                                <ul class="nk-block-tools g-3">
                                    @ability('admin','create_shipping_companies')
                                    <li><a href="javascript:void(0)" class="btn btn-white btn-outline-light" data-bs-toggle="modal" data-bs-target="#createShipping"
                                        ><em
                                                class="icon ni ni-property-add"></em><span>{{trans('shipping.create shipping company')}}</span></a>
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
                        @if($totalCompaines > 0)
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
                                        <div class="nk-tb-col"><span>{{trans('shipping.name')}}</span></div>
                                        <div class="nk-tb-col"><span>{{trans('shipping.code')}}</span></div>
                                        <div class="nk-tb-col"><span>{{trans('shipping.Description')}}</span></div>
                                        <div class="nk-tb-col"><span>{{trans('shipping.fast')}}</span></div>
                                        <div class="nk-tb-col"><span>{{trans('shipping.cost')}}</span></div>
                                        <div class="nk-tb-col"><span>{{trans('shipping.countries count')}}</span></div>
                                        <div class="nk-tb-col"><span>{{trans('shipping.status')}}</span></div>
                                        <div class="nk-tb-col"><span>{{trans('shipping.action')}}</span></div>

                                    </div><!-- .nk-tb-item -->
                                    @foreach($shipping_companies as $shipping)
                                        <div class="nk-tb-item">
                                            <div class="nk-tb-col nk-tb-col-check">
                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                    <input type="checkbox" class="select_all custom-control-input"
                                                           value="{{$shipping->id}}}" id="uid{{$shipping->id}}">
                                                    <label class="custom-control-label"
                                                           for="uid{{$shipping->id}}"></label>
                                                </div>
                                            </div>

                                            <div class="nk-tb-col">
                                                <span class="tb-amount"  id="name_delete_{{$shipping->id}}">{{$shipping->name}}</span>

                                            </div>
                                            <div class="nk-tb-col">
                                                <span class="tb-amount"  >{{$shipping->code}}</span>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span class="tb-amount"  >{{$shipping->description}}</span>
                                            </div>

                                            <div class="nk-tb-col">
                                                <span   >{!! $shipping->fast() !!}</span>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span class="tb-amount"  >{{$shipping->cost}}</span>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span class="tb-amount"  >{{$shipping->countries_count}}</span>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span>{!! $shipping->statusLabel() !!}</span>
                                            </div>


                                            <div class="nk-tb-col nk-tb-col-tools">
                                                <ul class="nk-tb-actions gx-1">
                                                    @ability('admin','update_shipping_companies')

                                                    <li class="nk-tb-action-hidden">
                                                        <a href="javascript:void(0)"
                                                           data-bs-toggle="modal"
                                                           data-bs-target="#editShipping{{$shipping->id}}"
                                                           class="btn btn-trigger btn-icon">
                                                            <em class="icon ni ni-edit" data-bs-toggle="tooltip"
                                                                data-bs-placement="top"
                                                                title="{{trans('page_title.edit')}}"></em>
                                                        </a>
                                                    </li>
                                                    @endability
                                                    @ability('admin','delete_shipping_companies')
                                                    <li class="nk-tb-action-hidden">
                                                        <a href="javascript:void(0)"
                                                           onclick="deleteType({{$shipping->id}})"
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
                                {!! $shipping_companies->appends(request()->all())->links() !!}
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="name">{{trans('shipping.name')}} </label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control"  id="name" name="name" value="{{ old('name')}}">
                                        @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="code">{{trans('shipping.code')}} </label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control"  id="code" name="code" value="{{ old('code')}}">
                                        @error('code')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="description">{{trans('shipping.description')}} </label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control"  id="description" name="description" value="{{ old('description')}}">
                                        @error('description')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="fast">{{trans('shipping.fast')}}</label>
                                    <div class="form-control-wrap">
                                        <select class="form-select js-select2" name="fast">
                                            <option value="5" disabled selected>
                                                ----- {{trans('categories.select status')}}
                                                -----
                                            </option>
                                            <option value="0" {{old('fast') == 0 ?'selected' : ''}}>{{trans('shipping.normal')}}</option>
                                            <option value="1" {{old('fast') == 1 ?'selected' : ''}}>{{trans('shipping.isFast')}}</option>
                                        </select>
                                        @error('fast')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="cost">{{trans('shipping.cost')}} </label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control"  id="cost" name="cost" value="{{ old('cost')}}">
                                        @error('cost')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
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
                                                    @if(old('status') == 1) selected @endif>{{trans('categories.Active')}}</option>
                                            <option value="0"
                                                    @if(old('status') == 0) selected @endif>{{trans('categories.Inactive')}}</option>
                                        </select>
                                        @error('status')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">{{trans('shipping.countries')}}</label>
                                    <div class="form-control-wrap">
                                        <select class="form-select js-select2 select-multiple-tags" multiple="multiple" name="countries[]"
                                                data-placeholder="Select Multiple options">
                                            <option value="0" disabled>----- {{trans('shipping.select countries')}}
                                                -----
                                            </option>
                                            @foreach($countries as $country)
                                                <option
                                                    value="{{$country->id}}" {{in_array($country->id, old('countries')??[] ) ? 'selected' : null }} >{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @error('countries')<span class="text-danger">{{ $message }}</span>@enderror

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
    @foreach($shipping_companies as $shipping)
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
                            <div class="row g-gs pb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="name">{{trans('shipping.name')}} </label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control"  id="name" name="name" value="{{ old('name',$shipping->name)}}">
                                            @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="code">{{trans('shipping.code')}} </label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control"  id="code" name="code" value="{{ old('code',$shipping->code)}}">
                                            @error('code')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="description">{{trans('shipping.description')}} </label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control"  id="description" name="description" value="{{ old('description',$shipping->description)}}">
                                            @error('description')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="fast">{{trans('shipping.fast')}}</label>
                                        <div class="form-control-wrap">
                                            <select class="form-select js-select2" name="fast">
                                                <option value="5" disabled selected>
                                                    ----- {{trans('categories.select status')}}
                                                    -----
                                                </option>
                                                <option value="0" {{old('fast',$shipping->fast) == 0 ?'selected' : ''}}>{{trans('shipping.normal')}}</option>
                                                <option value="1" {{old('fast',$shipping->fast) == 1 ?'selected' : ''}}>{{trans('shipping.isFast')}}</option>
                                            </select>
                                            @error('fast')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="cost">{{trans('shipping.cost')}} </label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control"  id="cost" name="cost" value="{{ old('cost',$shipping->cost)}}">
                                            @error('cost')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
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
                                                        @if(old('status',$shipping->status) == 1) selected @endif>{{trans('categories.Active')}}</option>
                                                <option value="0"
                                                        @if(old('status',$shipping->status) == 0) selected @endif>{{trans('categories.Inactive')}}</option>
                                            </select>
                                            @error('status')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">{{trans('shipping.countries')}}</label>
                                        <div class="form-control-wrap">
                                            <select class="form-select js-select2 select-multiple-tags" multiple="multiple" name="countries[]"
                                                    data-placeholder="Select Multiple options">
                                                <option value="0" disabled>----- {{trans('shipping.select countries')}}
                                                    -----
                                                </option>
                                                @foreach($countries as $country)
                                                    <option
                                                        value="{{$country->id}}" {{in_array($country->id, old('countries',$shipping->countries->pluck('id')->toArray())??[] ) ? 'selected' : null }} >{{$country->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @error('countries')<span class="text-danger">{{ $message }}</span>@enderror

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
