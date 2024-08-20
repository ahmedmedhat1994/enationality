@extends('Backend.layout.master')
@section('title')
    {{trans('page_title.tags')}}
@endsection
@section('css')

@endsection
@section('content')
    <div class="container-xl wide-xl">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">{{trans('page_title.tags')}}</h3>
                        <div class="nk-block-des text-soft">
                            <p>{{trans('tags.You have total')}} {{$tags->count()}} {{trans('page_title.tags')}}</p>
                        </div>
                    </div><!-- .nk-block-head-content -->
                    <div class="nk-block-head-content">
                        <div class="toggle-wrap nk-block-tools-toggle">
                            <div class="toggle-expand-content" data-content="pageMenu">
                                <ul class="nk-block-tools g-3">
                                    @ability('admin','create_tags')
                                    <li><a href="javascript:void(0)" class="btn btn-white btn-outline-light "
                                           data-bs-toggle="modal" data-bs-target="#createTags"><em
                                                class="icon ni ni-tag"></em><span>{{trans('page_title.create tag')}}</span></a>
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
                        @if($tags->count() > 0)
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
                                        <div class="nk-tb-col"><span>{{trans('categories.name')}}</span></div>
                                        <div class="nk-tb-col"><span>{{trans('categories.products count')}}</span></div>
                                        <div class="nk-tb-col"><span>{{trans('categories.status')}}</span></div>
                                        <div class="nk-tb-col"><span>{{trans('categories.created_at')}}</span></div>
                                        <div class="nk-tb-col"><span>{{trans('categories.action')}}</span></div>
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
                                    @foreach($tags as $tag)
                                        <div class="nk-tb-item">
                                            <div class="nk-tb-col nk-tb-col-check">
                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                    <input type="checkbox" class="select_all custom-control-input"
                                                           value="{{$tag->id}}}" id="uid{{$tag->id}}">
                                                    <label class="custom-control-label"
                                                           for="uid{{$tag->id}}"></label>
                                                </div>
                                            </div>
                                            <div class="nk-tb-col">
                                                <a href="{{route('admin.tags.edit',$tag->id)}}">
                                                    <span class="tb-amount" id="name_delete">{{$tag->name}}</span>
                                                </a>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span>{{$tag->products_count}}</span>
                                            </div>

                                            <div class="nk-tb-col">
                                                <span>{!! $tag->statusLabel() !!}</span>
                                            </div>
                                            <div class="nk-tb-col">
                                                <span>{!! $tag->createdAt() !!}</span>
                                            </div>

                                            <div class="nk-tb-col nk-tb-col-tools">
                                                <ul class="nk-tb-actions gx-1">
                                                    @ability('admin','update_tags')

                                                    <li class="nk-tb-action-hidden">
                                                        <a href="javascript:void(0)"
                                                           data-bs-toggle="modal"
                                                           data-bs-target="#editTags{{$tag->id}}"
                                                           class="btn btn-trigger btn-icon">
                                                            <em class="icon ni ni-edit" data-bs-toggle="tooltip"
                                                                data-bs-placement="top"
                                                                title="{{trans('page_title.edit')}}"></em>
                                                        </a>
                                                    </li>
                                                    @endability
                                                    @ability('admin','delete_tags')

                                                    <li class="nk-tb-action-hidden">
                                                        <a href="javascript:void(0)"
                                                           onclick="deleteType({{$tag->id}})"
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
                                {{$tags->links()}}
                            </div>

                        @else
                            <div class="card-inner p-0">
                                <div class="text-center" style="padding: 50px">
                                    <div>
                                        <img src="{{asset('backend/images/empty.png')}}">

                                    </div>
                                    <div>
                                        <a><span>{{trans('tags.No tags Info Found')}}</span></a>
                                    </div>

                                </div>
                            </div>
                        @endif
                    </div><!-- .card-inner-group -->
                </div><!-- .card -->
            </div><!-- .nk-block -->
        </div>
    </div>
    @ability('admin','create_tags')

    <!-- Create Category -->
    <div class="modal fade modal-lg" id="createTags">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{trans('tags.create new tag')}}</h5>
                    <a href="" class="close" data-bs-dismiss="modal"
                       aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.tags.store')}}" method="post"
                          class="form-validate is-alter" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-gs pb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="full-name">{{trans('tags.name')}} <span
                                            class="text-danger">( {{trans('tags.ar')}} )</span></label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="full-name" name="name[ar]"
                                               value="{{old('name.ar')}}" required>
                                        @error('name[ar]')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="full-name">{{trans('tags.name')}} <span
                                            class="text-danger">( {{trans('tags.en')}} )</span></label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="full-name" name="name[en]"
                                               value="{{old('name.en')}}" required>
                                        @error('name[en]')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row g-gs pb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="full-name">{{trans('tags.status')}}</label>
                                    <div class="form-control-wrap">
                                        <select class="form-select js-select2" name="status">
                                            <option value="0" disabled selected>
                                                ----- {{trans('tags.select status')}}
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
                            <button type="submit" class="btn btn-lg btn-primary">{{trans('tags.save')}}</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- End create Category -->
    @endability

    @ability('admin','update_tags')

    <!-- Edit Category -->
    @foreach($tags as $tag)
        <div class="modal fade modal-lg" id="editTags{{$tag->id}}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{trans('tags.update tag')}}
                            ( {{$tag->getTranslation('name','ar')}} )</h5>
                        <a href="" class="close" data-bs-dismiss="modal"
                           aria-label="Close">
                            <em class="icon ni ni-cross"></em>
                        </a>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('admin.tags.update',$tag->id)}}" method="post"
                              class="form-validate is-alter" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row g-gs pb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="full-name">{{trans('tags.name')}} <span
                                                class="text-danger">( {{trans('tags.ar')}} )</span></label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="full-name" name="name[ar]"
                                                   value="{{old('name.ar',$tag->getTranslation('name','ar'))}}"
                                                   required>
                                            <input type="hidden" class="form-control" name="id"
                                                   value="{{$tag->id}}">
                                            @error('name[ar]')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="full-name">{{trans('tags.name')}} <span
                                                class="text-danger">( {{trans('tags.en')}} )</span></label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="full-name" name="name[en]"
                                                   value="{{old('name.en',$tag->getTranslation('name','en'))}}"
                                                   required>
                                            @error('name[en]')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row g-gs pb-3">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="full-name">{{trans('tags.status')}}</label>
                                        <div class="form-control-wrap">
                                            <select class="form-select js-select2 " name="status">
                                                <option value="0" disabled selected>
                                                    ----- {{trans('tags.select status')}}
                                                    -----
                                                </option>
                                                <option value="0"
                                                        @if(old('status',$tag->status) == 0) selected @endif>{{trans('tags.Inactive')}}</option>
                                                <option value="1"
                                                        @if(old('status',$tag->status) == 1) selected @endif>{{trans('tags.Active')}}</option>
                                            </select>
                                            @error('status')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <div class="form-group">
                                <button type="submit"
                                        class="btn btn-lg btn-primary">{{trans('tags.update')}}</button>
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


        function deleteType(id) {

            var name = $('#name_delete').text();

            Swal.fire({
                title: '{{trans('tags.Delete!')}}',
                text: '{{trans('tags.Are you sure to delete')}}' + "(" + name + ")؟",
                icon: 'warning',
                showCancelButton: true,
                cancelButtonColor: '#d33',
                cancelButtonText: '{{trans('tags.cancel')}}',
                confirmButtonColor: '#3085d6',
                confirmButtonText: '{{trans('tags.ok')}}'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#file' + id).hide();
                    $.get('admin/tags/delete/' + id, function (deleted) {

                        if (deleted.exists == true) {
                            toastr.clear();
                            NioApp.Toast('<h5>{{trans('tags.success')}}</h5><p>{{trans('tags.tag deleted successfully')}}</p>', 'success', {position: 'top-center'});
                            setInterval('location.reload()', 1000);
                        } else {


                        }

                    })


                }
            })


        }
    </script>

@endsection
