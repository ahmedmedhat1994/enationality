@extends('Backend.layout.master')
@section('title')
    {{trans('supervisors.create new supervisor')}}
@endsection
@section('css')

@endsection
@section('content')
    <div class="container-xl wide-xl">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">{{trans('supervisors.create new supervisor')}}</h3>
                        <div class="nk-block-des text-soft">
                        </div>
                    </div><!-- .nk-block-head-content -->
                    <div class="nk-block-head-content">
                        <div class="toggle-wrap nk-block-tools-toggle">
                            <div class="toggle-expand-content" data-content="pageMenu">

                            </div>
                        </div><!-- .toggle-wrap -->
                    </div><!-- .nk-block-head-content -->
                </div><!-- .nk-block-between -->
            </div><!-- .nk-block-head -->
            <div class="nk-block">
                <div class="card card-stretch">
                    <div class="card-inner-group">
                            <div class="card-inner">
                                <form action="{{route('admin.supervisors.store')}}" method="post"
                                      class="form-validate is-alter" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row g-gs pb-3">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="full-name">{{trans('customers.first_name')}} </label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="full-name" name="first_name"
                                                           value="{{old('first_name')}}" required>
                                                    <input type="hidden" name="permissions[]" class="inputSelected" id="inputSelected"/>
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


                                        <div class="col-md-12 row py-5">
                                            <table class="table table-flush-spacing">
                                                <tbody>
                                                <tr>
                                                    <td class="text-nowrap fw-medium">{{trans('page_title.Administrator Access')}}<i class="bx bx-info-circle bx-xs" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Allows a full access to the system" data-bs-original-title="Allows a full access to the system"></i></td>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input select_all" type="checkbox" id="uid">
                                                            <label class="form-check-label" for="selectAll">
                                                                {{trans('page_title.select all')}}
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @foreach($permissions as $permission)
                                                        <tr>
                                                        <td class="text-nowrap fw-medium">{{$permission->display_name}}</td>
                                                        @if($permission->appeardChildren && $permission->appeardChildren->count()  > 0 !== null)
                                                            <td>
                                                                <div class="d-flex row">
                                                                    @foreach($permission->appeardChildren2 as $sub_menu)
                                                                        <div class="form-check me-3 me-lg-5 col">
                                                                            <input class="form-check-input checkbox" name="selectedRows" value="{{$sub_menu->id}}" type="checkbox"  id="uid{{$sub_menu->id}}">
                                                                            <label class="form-check-label" for="uid{{$sub_menu->id}}">
                                                                                {{$sub_menu->display_name}}
                                                                            </label>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </td>
                                                        @endif
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>

                                        </div>

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

                                    </div>


                                    <div class="form-group">
                                        <button type="submit" class="btn btn-lg btn-primary">{{trans('customers.save')}}</button>
                                    </div>
                                </form>


                            </div><!-- .card-inner -->


                    </div><!-- .card-inner-group -->
                </div><!-- .card -->
            </div><!-- .nk-block -->
        </div>
    </div>


@endsection
@section('script')


    <script>

        $('.select_all').on('change', function () {
            $('.checkbox').prop('checked', $(this).prop("checked"));
            var array = [];
            $('input:checkbox[name=selectedRows]:checked').each(function () {
                array.push($(this).val());
                console.log($(this).val());
            });
            $('.inputSelected').val(array);


        });
        $('.checkbox').on('change', function (e) {
            e.preventDefault();
            var array = [];
            $('input:checkbox[name=selectedRows]:checked').each(function () {
                array.push($(this).val());
                console.log($(this).val());
            });
            $('.inputSelected').val(array);


        });



        // $('.checkbox').on('change', function () {
        //     $('.checkbox').prop('checked', $(this).prop("checked"));
        //     var array = [];
        //     $('input:checkbox[name=selectedRows]:checked').each(function () {
        //         array.push($(this).val());
        //         console.log($(this).val());
        //     });
        //     $('.inputSelected').val(array);
        //     if (array.length > 0) {
        //     } else {
        //     }
        //
        // });
        //deselect "checked all", if one of the listed checkbox category is unchecked amd select "checked all" if all of the listed checkbox category is checked
        // $('.checkbox').change(function(){ //".checkbox" change
        //     if($('.checkbox:checked').length == $('.checkbox').length){
        //         $('.select_all').prop('checked',true);
        //     }else{
        //         $('.select_all').prop('checked',false);
        //     }
        // });


            // $('.checkbox').on('change', function (e) {
            //     e.preventDefault();
            //     var array = [];
            //     $('input:checkbox[name=selectedRows]:checked').each(function () {
            //         array.push($(this).val());
            //         console.log($(this).val());
            //     });
            //     $('.inputSelected').val(array);
            //     if (array.length > 0) {
            //
            //     } else {
            //
            //     }
            //
            // });

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
