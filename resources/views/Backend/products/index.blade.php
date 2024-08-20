@extends('Backend.layout.master')
@section('title')
    {{trans('page_title.products')}}
@endsection
@section('css')

@endsection
@section('content')
    <div class="container-xl wide-xl">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">{{trans('page_title.products')}}</h3>
                        <div class="nk-block-des text-soft">
                            <p>{{trans('products.You have total')}} {{$products->count()}} {{trans('page_title.products')}}</p>
                        </div>
                    </div><!-- .nk-block-head-content -->
                    <div class="nk-block-head-content">
                        <div class="toggle-wrap nk-block-tools-toggle">
                            <div class="toggle-expand-content" data-content="pageMenu">
                                @ability('admin','create_products')
                                <ul class="nk-block-tools g-3">
                                    <li><a href="{{route('admin.products.create')}}"
                                           class="btn btn-white btn-outline-light"><em
                                                class="icon ni ni-tag"></em><span>{{trans('page_title.create product')}}</span></a>
                                    </li>
                                </ul>
                                @endability
                            </div>
                        </div><!-- .toggle-wrap -->
                    </div><!-- .nk-block-head-content -->
                </div><!-- .nk-block-between -->
            </div><!-- .nk-block-head -->
            <div class="nk-block">
                <div class="card card-stretch">
                    <div class="card-inner-group">
                        @if($products->count() > 0)
                            <div class="card-inner position-relative card-tools-toggle">
                                <div class="card-title-group">
                                    <div class="card-tools me-n1">
                                        <ul class="btn-toolbar gx-1">
                                            <li>
                                                <a href="#" class="btn btn-icon search-toggle toggle-search"
                                                   data-target="search"><em class="icon ni ni-search"></em></a>
                                            </li><!-- li -->
                                            <li class="btn-toolbar-sep"></li><!-- li -->
                                            <li>

                                            </li><!-- li -->
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
                                        <div class="nk-tb-col"><span>{{trans('products.image')}}</span></div>
                                        <div class="nk-tb-col"><span>{{trans('products.name')}}</span></div>
                                        <div class="nk-tb-col"><span>{{trans('products.Feature')}}</span></div>
                                        <div class="nk-tb-col"><span>{{trans('products.Quantity')}}</span></div>
                                        <div class="nk-tb-col"><span>{{trans('products.Price')}}</span></div>
                                        <div class="nk-tb-col"><span>{{trans('products.Tags')}}</span></div>
                                        <div class="nk-tb-col"><span>{{trans('products.status')}}</span></div>
                                        <div class="nk-tb-col"><span>{{trans('products.Created_at')}}</span></div>
                                        <div class="nk-tb-col"><span>{{trans('products.Actions')}}</span></div>
                                    </div><!-- .nk-tb-item -->
                                    @foreach($products as $product)
                                        <div class="nk-tb-item">
                                            <div class="nk-tb-col nk-tb-col-check">
                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                    <input type="checkbox" class="select_all custom-control-input"
                                                           value="{{$product->id}}}" id="uid{{$product->id}}">
                                                    <label class="custom-control-label"
                                                           for="uid{{$product->id}}"></label>
                                                </div>
                                            </div>
                                            <div class="nk-tb-col ">
                                                <div class="user-card">
                                                    <div class=" bg-primary">
                                                        <span><img
                                                                src="@if(isset($product->firstMedia->filename)){{asset('uploads/products/'.$product->firstMedia->filename)}} @else {{asset('backend/images/empty2.png')}} @endif"
                                                                class="img-thumbnail" style="max-width: 50px;"
                                                                alt="{{$product->name}}"></span>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="nk-tb-col">
                                                @ability('admin','update_products')
                                                <a href="{{route('admin.products.edit',$product->id)}}">
                                                    @endability

                                                    <span class="tb-amount" id="name_delete">{{$product->name}}</span>
                                                </a>
                                            </div>
                                            <div class="nk-tb-col tb-col-md">
                                                <span>{!! $product->featured() !!}</span>
                                            </div>
                                            <div class="nk-tb-col tb-col-md">
                                                <span class="tb-amount" id="name_delete">{{$product->quantity}}</span>
                                            </div>
                                            <div class="nk-tb-col tb-col-md">
                                                <span class="tb-amount" id="name_delete">{{$product->price}}</span>
                                            </div>
                                            <div class="nk-tb-col tb-col-md">
                                                <span class="tb-amount"
                                                      id="name_delete">{{$product->tags->pluck('name')->join(', ')}}</span>
                                            </div>
                                            <div class="nk-tb-col tb-col-md">
                                                <span>{!! $product->statusLabel() !!}</span>
                                            </div>
                                            <div class="nk-tb-col tb-col-md">
                                                <span>{!! $product->createdAt() !!}</span>
                                            </div>

                                            <div class="nk-tb-col nk-tb-col-tools">
                                                <ul class="nk-tb-actions gx-1">
                                                    @ability('admin','update_products')

                                                    <li class="nk-tb-action-hidden">
                                                        <a href="{{route('admin.products.edit',$product->id)}}"
                                                           class="btn btn-trigger btn-icon">
                                                            <em class="icon ni ni-edit" data-bs-toggle="tooltip"
                                                                data-bs-placement="top"
                                                                title="{{trans('page_title.edit')}}"></em>
                                                        </a>
                                                    </li>
                                                    @endability

                                                    {{--                                                    <li class="nk-tb-action-hidden">--}}
                                                    {{--                                                        <a href="{{route('admin.products.show',$product->id)}}" class="btn btn-trigger btn-icon" >--}}
                                                    {{--                                                            <em class="icon ni ni-eye" data-bs-toggle="tooltip" data-bs-placement="top" title="{{trans('page_title.view')}}"></em>--}}
                                                    {{--                                                        </a>--}}
                                                    {{--                                                    </li>--}}
                                                    @ability('admin','delete_products')

                                                    <li class="nk-tb-action-hidden">
                                                        <a href="javascript:void(0)"
                                                           onclick="deleteType({{$product->id}})"
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
                                {!! $products->appends(request()->all())->links() !!}

                            </div>

                        @else
                            <div class="card-inner p-0">
                                <div class="text-center" style="padding: 50px">
                                    <div>
                                        <img src="{{asset('backend/images/empty.png')}}">

                                    </div>
                                    <div>
                                        <a><span>{{trans('products.No Products Info Found')}}</span></a>
                                    </div>

                                </div>
                            </div>
                        @endif
                    </div><!-- .card-inner-group -->
                </div><!-- .card -->
            </div><!-- .nk-block -->
        </div>
    </div>

@endsection
@section('script')
    <script>


        function deleteType(id) {

            var name = $('#name_delete').text();

            Swal.fire({
                title: '{{trans('products.Delete!')}}',
                text: '{{trans('products.Are you sure to delete')}}' + "(" + name + ")?",
                icon: 'warning',
                showCancelButton: true,
                cancelButtonColor: '#d33',
                cancelButtonText: '{{trans('products.cancel')}}',
                confirmButtonColor: '#3085d6',
                confirmButtonText: '{{trans('products.ok')}}'
            }).then((result) => {
                if (result.isConfirmed) {
                    // $('#file'+id).hide();
                    $.get('admin/deleteProduct/' + id, function (deleted) {

                        if (deleted.exists == true) {
                            toastr.clear();
                            NioApp.Toast('<h5>{{trans('products.success')}}</h5><p>{{trans('products.product deleted successfully')}}</p>', 'success', {position: 'top-center'});
                            location.reload();
                            // setInterval('location.reload()', 1000);
                        } else {


                        }

                    })


                }
            })


        }
    </script>

@endsection
