@extends('Backend.layout.master')
@section('title')
    {{trans('page_title.customers')}}
@endsection
@section('css')

@endsection
@section('content')
    <div class="container-xl wide-xl">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">{{trans('page_title.customers')}}</h3>
                        <div class="nk-block-des text-soft">
                            <p>{{trans('reviews.You have total')}} {{$customerCount}} {{trans('page_title.customers')}}</p>
                        </div>
                    </div><!-- .nk-block-head-content -->
                    <div class="nk-block-head-content">
                        <div class="toggle-wrap nk-block-tools-toggle">
                            <div class="toggle-expand-content" data-content="pageMenu">
                                <ul class="nk-block-tools g-3">
                                    @ability('admin','create_customers')
                                    <li><a href="javascript:void(0)" class="btn btn-white btn-outline-light "
                                           data-bs-toggle="modal" data-bs-target="#createCustomer"><em
                                                class="icon ni ni-percent"></em><span>{{trans('customers.create customer')}}</span></a>
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
                        @if($customerCount > 0)
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
                                        <div class="nk-tb-col"><span>{{trans('customers.image')}}</span></div>
                                        <div class="nk-tb-col"><span>{{trans('customers.name')}}</span></div>
                                        <div class="nk-tb-col"><span>{{trans('customers.email & mobile')}}</span></div>
                                        <div class="nk-tb-col"><span>{{trans('customers.status')}}</span></div>
                                        <div class="nk-tb-col"><span>{{trans('customers.created at')}}</span></div>
                                        <div class="nk-tb-col"><span>{{trans('customers.action')}}</span></div>

                                    </div><!-- .nk-tb-item -->
                                    @foreach($customers as $customer)
                                        <div class="nk-tb-item">
                                            <div class="nk-tb-col nk-tb-col-check">
                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                    <input type="checkbox" class="select_all custom-control-input"
                                                           value="{{$customer->id}}}" id="uid{{$customer->id}}">
                                                    <label class="custom-control-label"
                                                           for="uid{{$customer->id}}"></label>
                                                </div>
                                            </div>
                                            <div class="nk-tb-col ">
                                                <div class="user-card">
                                                    <div class=" bg-primary">
                                                        <span><img
                                                                src="@if(isset($customer->photo)){{asset('uploads/'.$customer->photo)}} @else {{asset('backend/images/empty2.png')}} @endif"
                                                                class="img-thumbnail" style="max-width: 50px;"
                                                                alt="{{$customer->name}}"></span>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="nk-tb-col">
                                                <span class="tb-amount"  id="name_delete_{{$customer->id}}">{{$customer->full_name}}</span>
                                                <span class="tb-amount">{{$customer->username}}</span>

                                            </div>
                                            <div class="nk-tb-col">
                                                    <span class="tb-amount"  >{{$customer->email}}</span>
                                                    <span class="tb-amount"  >{{$customer->mobile}}</span>
                                            </div>

                                            <div class="nk-tb-col">
                                                <span>{!! $customer->statusLabel() !!}</span>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span>{!! $customer->createdAt() !!}</span>
                                            </div>


                                            <div class="nk-tb-col nk-tb-col-tools">
                                                <ul class="nk-tb-actions gx-1">
                                                    @ability('admin','update_customers')

                                                    <li class="nk-tb-action-hidden">
                                                        <a href="javascript:void(0)"
                                                           data-bs-toggle="modal"
                                                           data-bs-target="#editCustomer{{$customer->id}}"
                                                           class="btn btn-trigger btn-icon">
                                                            <em class="icon ni ni-edit" data-bs-toggle="tooltip"
                                                                data-bs-placement="top"
                                                                title="{{trans('page_title.edit')}}"></em>
                                                        </a>
                                                    </li>
                                                    @endability
                                                    @ability('admin','delete_customers')
                                                    <li class="nk-tb-action-hidden">
                                                        <a href="javascript:void(0)"
                                                           onclick="deleteType({{$customer->id}})"
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
                                {!! $customers->appends(request()->all())->links() !!}
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

    @ability('admin','create_customers')
    <!-- Create customer -->
    <div class="modal fade modal-lg" id="createCustomer">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{trans('customers.create new customer')}}</h5>
                    <a href="" class="close" data-bs-dismiss="modal"
                       aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.customers.store')}}" method="post"
                          class="form-validate is-alter" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-gs pb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="full-name">{{trans('customers.first_name')}} </label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="full-name" name="first_name"
                                               value="{{old('first_name')}}" required>
                                        @error('first_name')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="last_name">{{trans('customers.last_name')}} </label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="last_name" name="last_name"
                                               value="{{old('last_name')}}" required>
                                        @error('last_name')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="username">{{trans('customers.username')}} </label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="username" name="username"
                                               value="{{old('username')}}" required>
                                        @error('username')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="email">{{trans('customers.email')}} </label>
                                    <div class="form-control-wrap">
                                        <input type="email" class="form-control" id="email" name="email"
                                               value="{{old('email')}}" required>
                                        @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="mobile">{{trans('customers.mobile')}} </label>
                                    <div class="form-control-wrap">
                                        <input type="number" class="form-control" id="mobile" name="mobile"
                                               value="{{old('mobile')}}" required>
                                        @error('mobile')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="password">{{trans('customers.password')}} </label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="password" name="password"
                                               value="{{old('password')}}" required>
                                        @error('password')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>



                        </div>

                        <div class="row g-gs pb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="cover">{{trans('customers.image')}}</label>
                                    <div class="form-control-wrap">
                                        <input type="file" class="form-control" id="photo" name="photo"
                                               onchange="loadFile(event)">
                                        @error('photo')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="cover">-----------</label>
                                    <div class="user-avatar sq xl">
                                        <img class="img-thumbnail" src="{{asset('backend/images/empty2.png')}}"
                                             id="output"/>
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
                        </div>


                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary">{{trans('customers.save')}}</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- End create customer -->
    @endability

    @ability('admin','update_customers')
    @foreach($customers as $customer)
        <div class="modal fade modal-lg" id="editCustomer{{$customer->id}}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{trans('customers.edit customer')}} ( {{$customer->full_name}} )</h5>
                        <a href="" class="close" data-bs-dismiss="modal"
                           aria-label="Close">
                            <em class="icon ni ni-cross"></em>
                        </a>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('admin.customers.update',$customer->id)}}" method="post"
                              class="form-validate is-alter" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row g-gs pb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="full-name">{{trans('customers.first_name')}} </label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="full-name" name="first_name" value="{{old('first_name',$customer->first_name)}}" required>
                                            <input type="hidden" class="form-control" id="full-name" name="id" value="{{$customer->id}}" >
                                            @error('first_name')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="last_name">{{trans('customers.last_name')}} </label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="last_name" name="last_name"
                                                   value="{{old('last_name',$customer->last_name)}}" required>
                                            @error('last_name')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="username">{{trans('customers.username')}} </label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="username" name="username"
                                                   value="{{old('username',$customer->username)}}" required>
                                            @error('username')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="email">{{trans('customers.email')}} </label>
                                        <div class="form-control-wrap">
                                            <input type="email" class="form-control" id="email" name="email"
                                                   value="{{old('email',$customer->email)}}" required>
                                            @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="mobile">{{trans('customers.mobile')}} </label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="mobile" name="mobile"
                                                   value="{{old('mobile',$customer->mobile)}}" required>
                                            @error('mobile')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="password">{{trans('customers.password')}} </label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="password" name="password"
                                                   value="{{old('password')}}">
                                            @error('password')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>



                            </div>

                            <div class="row g-gs pb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="cover">{{trans('customers.image')}}</label>
                                        <div class="form-control-wrap">
                                            <input type="file" class="form-control" id="photo" name="photo"
                                                   onchange="loadFileEdit(event)">
                                            @error('photo')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="cover">-----------</label>
                                        <div class="user-avatar sq xl">
                                            <img class="img-thumbnail" src="@if(isset($customer->photo)) {{asset('uploads/'.$customer->photo)}} @else {{asset('backend/images/empty2.png')}} @endif"
                                                 id="output2"/>
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
                                                        @if(old('status',$customer->status) == 1) selected @endif>{{trans('categories.Active')}}</option>
                                                <option value="0"
                                                        @if(old('status',$customer->status) == 0) selected @endif>{{trans('categories.Inactive')}}</option>
                                            </select>
                                            @error('status')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <button type="submit" class="btn btn-lg btn-primary">{{trans('customers.update')}}</button>
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

        {{--const copyToClipboard = async (id) => {--}}
        {{--    var name = $('#name_delete_'+id).text();--}}

        {{--    try {--}}
        {{--        const element = document.querySelector(".user-select-all-"+id);--}}
        {{--        await navigator.clipboard.writeText(element.textContent);--}}
        {{--        toastr.clear();--}}
        {{--        NioApp.Toast('<p>{{trans('coupons.Text copied to clipboard!')}} ('+name+')</p>', 'success', {position: 'top-center'});--}}
        {{--        console.log("Text copied to clipboard!");--}}
        {{--        // Optional: Display a success message to the user--}}
        {{--    } catch (error) {--}}
        {{--        toastr.clear();--}}
        {{--        NioApp.Toast('<p>{{trans('coupons.Failed to copy to clipboard:')}}'+error+'</p>', 'error', {position: 'top-center'});--}}
        {{--        console.error("Failed to copy to clipboard:", error);--}}
        {{--        // Optional: Display an error message to the user--}}
        {{--    }--}}
        {{--};--}}

        var loadFile = function (event) {
            var reader = new FileReader();
            reader.onload = function () {
                var output = document.getElementById('output');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };

        var loadFileEdit = function (event) {
            var reader = new FileReader();
            reader.onload = function () {
                var output = document.getElementById('output2');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };

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
                    $.get('admin/product_reviews/delete/' + id, function (deleted) {

                        if (deleted.exists == true) {
                            toastr.clear();
                            NioApp.Toast('<h5>{{trans('reviews.success')}}</h5><p>{{trans('reviews.review deleted successfully')}}</p>', 'success', {position: 'top-center'});
                            setInterval('location.reload()', 1000);
                        } else {


                        }

                    })


                }
            })


        }
    </script>

@endsection
