@extends('Backend.layout.master')
@section('title')
    {{trans('page_title.reviews')}}
@endsection
@section('css')

@endsection
@section('content')
    <div class="container-xl wide-xl">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">{{trans('page_title.reviews')}}</h3>
                        <div class="nk-block-des text-soft">
                            <p>{{trans('reviews.You have total')}} {{$reviewsCounts}} {{trans('page_title.reviews')}}</p>
                        </div>
                    </div><!-- .nk-block-head-content -->
                    <div class="nk-block-head-content">
                        <div class="toggle-wrap nk-block-tools-toggle">
                            <div class="toggle-expand-content" data-content="pageMenu">
                                <ul class="nk-block-tools g-3">
                                    @ability('admin','create_product_reviews')
{{--                                    <li><a href="javascript:void(0)" class="btn btn-white btn-outline-light "--}}
{{--                                           data-bs-toggle="modal" data-bs-target="#createCoupon"><em--}}
{{--                                                class="icon ni ni-percent"></em><span>{{trans('reviews.create review')}}</span></a>--}}
{{--                                    </li>--}}
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
                        @if($reviews->count() > 0)
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
                                        <div class="nk-tb-col"><span>{{trans('reviews.name')}}</span></div>
                                        <div class="nk-tb-col"><span>{{trans('reviews.message')}}</span></div>
                                        <div class="nk-tb-col"><span>{{trans('reviews.rating')}}</span></div>
                                        <div class="nk-tb-col"><span>{{trans('reviews.product')}}</span></div>
                                        <div class="nk-tb-col"><span>{{trans('reviews.status')}}</span></div>
                                        <div class="nk-tb-col"><span>{{trans('reviews.created at')}}</span></div>
                                        <div class="nk-tb-col"><span>{{trans('reviews.action')}}</span></div>

                                    </div><!-- .nk-tb-item -->
                                    @foreach($reviews as $review)
                                        <div class="nk-tb-item">
                                            <div class="nk-tb-col nk-tb-col-check">
                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                    <input type="checkbox" class="select_all custom-control-input"
                                                           value="{{$review->id}}}" id="uid{{$review->id}}">
                                                    <label class="custom-control-label"
                                                           for="uid{{$review->id}}"></label>
                                                </div>
                                            </div>
                                            <div class="nk-tb-col">
                                                    <span class="tb-amount user-select-all-{{$review->id}}" id="name_delete_{{$review->id}}" >{{$review->name}}</span>
                                                    <span class="tb-amount"  >{{$review->email}}</span>
                                                <br>
                                                <small>{!! $review->user_id != '' ? $review->user->full_name : '' !!}</small>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span>{{$review->title}}</span>

                                            </div>
                                            <div class="nk-tb-col">
                                                <span class="badge badge-sm bg-success fw-bold fs-15px" >{{$review->rating . ' / 5'}}</span>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span>{{$review->product->name}}</span>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span>{!! $review->statusLabel() !!}</span>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span>{!! $review->createdAt() !!}</span>
                                            </div>


                                            <div class="nk-tb-col nk-tb-col-tools">
                                                <ul class="nk-tb-actions gx-1">
                                                    @ability('admin','update_product_reviews')

                                                    <li class="nk-tb-action-hidden">
                                                        <a href="javascript:void(0)"
                                                           data-bs-toggle="modal"
                                                           data-bs-target="#editReview{{$review->id}}"
                                                           class="btn btn-trigger btn-icon">
                                                            <em class="icon ni ni-edit" data-bs-toggle="tooltip"
                                                                data-bs-placement="top"
                                                                title="{{trans('page_title.edit')}}"></em>
                                                        </a>
                                                    </li>
                                                    @endability
                                                    @ability('admin','delete_product_reviews')
                                                    <li class="nk-tb-action-hidden">
                                                        <a href="javascript:void(0)"
                                                           onclick="deleteType({{$review->id}})"
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
                                {!! $reviews->appends(request()->all())->links() !!}
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

    @ability('admin','update_product_reviews')

    <!-- Edit Category -->
    @foreach($reviews as $review)
        <div class="modal fade modal-lg" id="editReview{{$review->id}}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{trans('reviews.update coupon')}}
                            ( {{$review->title}} )</h5>
                        <a href="" class="close" data-bs-dismiss="modal"
                           aria-label="Close">
                            <em class="icon ni ni-cross"></em>
                        </a>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('admin.product_reviews.update',$review->id)}}" method="post"
                              class="form-validate is-alter" autocomplete="off">
                            @csrf
                            @method('PUT')
                            <div class="row g-gs pb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="full-name">{{trans('reviews.name')}}</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control coupon_code" id="code" name="name"
                                                   value="{{old('name',$review->name)}}" required>
                                            @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="full-name">{{trans('reviews.email')}}</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control coupon_code" id="email" name="email"
                                                   value="{{old('email',$review->email)}}" required>
                                            @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="full-name">{{trans('reviews.rating')}}</label>
                                        <div class="form-control-wrap">
                                            <select class="form-select js-select2" name="rating">
                                                <option value="0" disabled selected>
                                                    ----- {{trans('reviews.select rating')}}
                                                    -----
                                                </option>
                                                <option value="1"{{old('rating',$review->rating) == '1' ? 'selected' : null}}>1</option>
                                                <option value="2"{{old('rating',$review->rating) == '2' ? 'selected' : null}}>2</option>
                                                <option value="3"{{old('rating',$review->rating) == '3' ? 'selected' : null}}>3</option>
                                                <option value="4"{{old('rating',$review->rating) == '4' ? 'selected' : null}}>4</option>
                                                <option value="5"{{old('rating',$review->rating) == '1' ? 'selected' : null}}>5</option>
                                            </select>
                                            @error('rating')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="full-name">{{trans('reviews.product')}}</label>
                                        <div class="form-control-wrap">
                                            <input type="text" disabled class="form-control coupon_code" id="product_id" name="product_id" value="{{$review->product->name}}" >
                                            <input type="hidden" class="form-control coupon_code" id="product_id" name="product_id" value="{{$review->product_id}}" >
                                            @error('product_id')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="full-name">{{trans('reviews.customer')}}</label>
                                        <div class="form-control-wrap">
                                            <input type="text" disabled class="form-control coupon_code"  value="{{ $review->user_id != '' ? $review->user->full_name : ''}}" >
                                            <input type="hidden" class="form-control coupon_code" id="user_id" name="user_id" value="{{$review->user_id}}" >
                                            @error('user_id')<span class="text-danger">{{ $message }}</span>@enderror
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
                                                    {{old('status',$review->status) == '1' ? 'selected' : null}}>{{trans('coupons.Active')}}</option>
                                                <option value="0"
                                                    {{old('status',$review->status) == '0' ? 'selected' : null}}>{{trans('coupons.Inactive')}}</option>
                                            </select>
                                            @error('status')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label" for="full-name">{{trans('reviews.title')}}</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control coupon_code" id="title" name="title"
                                                   value="{{old('title',$review->title)}}" required>
                                            @error('title')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label" for="full-name">{{trans('reviews.message')}}</label>
                                        <div class="form-control-wrap">
                                            <textarea  type="text" class="form-control" id="message" name="message"
                                            >{{$review->message}}</textarea>
                                            @error('message')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>


                            </div>


                            <div class="form-group">
                                <button type="submit"
                                        class="btn btn-lg btn-primary">{{trans('reviews.update')}}</button>
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
