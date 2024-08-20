@extends('Backend.layout.master')
@section('title')
    {{trans('page_title.edit product')}}
@endsection
@section('css')

@endsection
@section('content')
    <div class="container-xl wide-xl">
        <div class="nk-content-body">
            <div class="nk-block nk-block-lg">
                <div class="nk-block-head">
                    <div class="nk-block-head-content">
                        <h4 class="title nk-block-title">{{trans('page_title.edit product')}}</h4>
                        <div class="nk-block-des">
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-inner">
                        <form method="post" action="{{route('admin.products.update',$product->id)}}" class="form form-validate"  enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row g-gs">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="fv-full-name">{{trans('products.arabic name')}}</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="fv-full-name" name="name[ar]" value="{{old('name.ar',$product->getTranslation('name','ar'))}}" required>
                                            <input type="hidden" class="form-control" id="fv-full-name" name="id" value="{{$product->id}}" required>
                                        </div>
                                    </div>
                                    @error('name[ar]')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="fv-full-name">{{trans('products.english name')}}</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="fv-full-name" name="name[en]" value="{{old('name.en',$product->getTranslation('name','en'))}}" required>
                                        </div>
                                    </div>
                                    @error('name[en]')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="fv-full-name">{{trans('products.categories')}}</label>
                                        <div class="form-control-wrap">
                                            <select class="form-select js-select2" name="product_category_id">
                                                <option value="0" disabled selected>----- {{trans('products.select category')}} -----</option>
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}" @if(old('product_category_id',$product->product_category_id) == $category->id) selected @endif>{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @error('product_category_id')<span class="text-danger">{{ $message }}</span>@enderror

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">{{trans('products.tags')}}</label>
                                        <div class="form-control-wrap">
                                            <select class="form-select js-select2" multiple="multiple" name="tags[]" data-placeholder="Select Multiple options">
                                                <option value="0" disabled >----- {{trans('products.select tags')}} -----</option>
                                                @foreach($tags as $tag)
                                                    <option value="{{$tag->id}}" {{in_array($tag->id, $product->tags->pluck('id')->toArray() ) ? 'selected' : null }}>{{$tag->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @error('tags')<span class="text-danger">{{ $message }}</span>@enderror

                                </div>

                                <div class="col-md-12">
                                    <label class="form-label" for="fv-full-name">{{trans('products.description')}}</label>
                                    <div class="form-group">
                                        <textarea class="summernote-basic" name="description">{{old('description',$product->description)}}</textarea>
                                    </div>
                                    @error('description')<span class="text-danger">{{ $message }}</span>@enderror

                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label" for="fv-full-name">{{trans('products.qty')}}</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="fv-full-name" name="quantity" value="{{old('quantity',$product->quantity)}}"  oninput="this.value=this.value.replace(/[^0-9.]/g,'');" required>
                                        </div>
                                    </div>
                                    @error('quantity')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label" for="fv-full-name">{{trans('products.price')}}</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="fv-full-name" name="price" value="{{old('price',$product->price)}}"  oninput="this.value=this.value.replace(/[^0-9.]/g,'');" required>
                                        </div>
                                    </div>
                                    @error('price')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label" for="fv-full-name">{{trans('products.sale_price')}}</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="fv-full-name" name="sale_price"
                                                   value="{{old('sale_price',$product->sale_price)}}"
                                                   oninput="this.value=this.value.replace(/[^0-9.]/g,'');" required>
                                        </div>
                                    </div>
                                    @error('sale_price')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label" for="full-name">{{trans('products.status')}}</label>
                                        <div class="form-control-wrap">
                                            <select class="form-select js-select2" name="status">
                                                <option value="0" disabled selected>
                                                    ----- {{trans('products.select status')}}
                                                    -----
                                                </option>
                                                <option value="1"
                                                        @if(old('status',$product->status) == 1) selected @endif>{{trans('products.active')}}</option>
                                                <option value="0"
                                                        @if(old('status',$product->status) == 0) selected @endif>{{trans('products.inactive')}}</option>
                                            </select>
                                            @error('status')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 pt-5">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" value="1" @if(old('featured',$product->featured)==1) checked @endif  name="featured" id="customCheck2">
                                        <label class="custom-control-label"  for="customCheck2">{{trans('products.featured')}}</label>
                                    </div>
                                    @error('featured')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>

                                <div class="col-md-4 pt-5">
                                    <h6 class="title mb-2">{{trans('products.choice color')}}</h6>
                                    <ul class="custom-control-group g-1">
                                        <li>
                                            <div class="custom-control color-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="productColor1"  value="#754c24" name="productColor[]"
                                                    {{in_array('#754c24', old('productColor',$product->colors->pluck('color')->toArray()) ) ? 'checked' : null }}
                                                >
                                                <label class="custom-control-label dot dot-xl" data-bg="#754c24" for="productColor1"></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control color-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="productColor2" value="#636363" name="productColor[]"
                                                    {{in_array('#636363', old('productColor',$product->colors->pluck('color')->toArray()) ) ? 'checked' : null }}
                                                >
                                                <label class="custom-control-label dot dot-xl" data-bg="#636363" for="productColor2"></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control color-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="productColor3" value="#ba6ed4" name="productColor[]"
                                                    {{in_array('#ba6ed4', old('productColor',$product->colors->pluck('color')->toArray()) ) ? 'checked' : null }}

                                                >
                                                <label class="custom-control-label dot dot-xl" data-bg="#ba6ed4" for="productColor3"></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control color-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="productColor4" value="#ff87a3" name="productColor[]"
                                                    {{in_array('#ff87a3', old('productColor',$product->colors->pluck('color')->toArray()) ) ? 'checked' : null }}

                                                >
                                                <label class="custom-control-label dot dot-xl" data-bg="#ff87a3" for="productColor4"></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control color-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="productColor5" value="#f2426e" name="productColor[]"
                                                    {{in_array('#f2426e', old('productColor',$product->colors->pluck('color')->toArray()) ) ? 'checked' : null }}

                                                >
                                                <label class="custom-control-label dot dot-xl " data-bg="#f2426e" for="productColor5"></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control color-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="productColor6" value="#323f9e" name="productColor[]"
                                                    {{in_array('#323f9e', old('productColor',$product->colors->pluck('color')->toArray()) ) ? 'checked' : null }}

                                                >
                                                <label class="custom-control-label dot dot-xl" data-bg="#323f9e" for="productColor6"></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control color-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="productColor7" value="#058efc" name="productColor[]"
                                                    {{in_array('#058efc', old('productColor',$product->colors->pluck('color')->toArray()) ) ? 'checked' : null }}

                                                >
                                                <label class="custom-control-label dot dot-xl" data-bg="#058efc" for="productColor7"></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control color-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="productColor8" value="#fd9722" name="productColor[]"
                                                    {{in_array('#fd9722', old('productColor',$product->colors->pluck('color')->toArray()) ) ? 'checked' : null }}

                                                >
                                                <label class="custom-control-label dot dot-xl " data-bg="#fd9722" for="productColor8"></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control color-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="productColor9" value="#20c997" name="productColor[]"
                                                    {{in_array('#20c997', old('productColor',$product->colors->pluck('color')->toArray()) ) ? 'checked' : null }}

                                                >
                                                <label class="custom-control-label dot dot-xl" data-bg="#20c997" for="productColor9"></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control color-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="productColor10" value="#816bff" name="productColor[]"
                                                    {{in_array('#816bff', old('productColor',$product->colors->pluck('color')->toArray()) ) ? 'checked' : null }}

                                                >
                                                <label class="custom-control-label dot dot-xl " data-bg="#816bff" for="productColor10"></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control color-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="productColor11" value="#ff63a5" name="productColor[]"
                                                    {{in_array('#ff63a5', old('productColor',$product->colors->pluck('color')->toArray()) ) ? 'checked' : null }}

                                                >
                                                <label class="custom-control-label dot dot-xl " data-bg="#ff63a5" for="productColor11"></label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-4 pt-5">
                                    <div class="form-group">
                                        <label class="form-label">{{trans('products.choice size')}}</label>
                                        <div class="form-control-wrap">
                                            <select class="form-select js-select2" multiple="multiple" data-placeholder="Select Multiple options" name="size[]">
                                                <option value="s" {{in_array('s', old('size',$product->sizes->pluck('size')->toArray()) ) ? 'selected' : null }}>Small</option>
                                                <option value="m" {{in_array('m', old('size',$product->sizes->pluck('size')->toArray()) ) ? 'selected' : null }}>medium</option>
                                                <option value="l" {{in_array('l', old('size',$product->sizes->pluck('size')->toArray()) ) ? 'selected' : null }} >larg</option>
                                                <option value="xl" {{in_array('xl', old('size',$product->sizes->pluck('size')->toArray()) ) ? 'selected' : null }} >x large</option>
                                                <option value="xxl" {{in_array('xxl', old('size',$product->sizes->pluck('size')->toArray()) ) ? 'selected' : null }} >xx large</option>
                                                <option value="xxxl" {{in_array('xxxl', old('size',$product->sizes->pluck('size')->toArray()) ) ? 'selected' : null }} >xxx large</option>
                                                <option value="xxxxl" {{in_array('xxxxl', old('size',$product->sizes->pluck('size')->toArray()) ) ? 'selected' : null }} >xxxx large</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-12">
                                    <label class="form-label">Dropzone with only Image Upload</label>
                                    <div class="dropzone" id="document-dropzone" >
                                        <div class="dz-message" data-dz-message>

                                                <span class="dz-message-text h-150px pb-3"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 90 90">
                                                        <rect x="15" y="5" width="56" height="70" rx="6" ry="6" fill="#e3e7fe" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></rect>
                                                        <path d="M69.88,85H30.12A6.06,6.06,0,0,1,24,79V21a6.06,6.06,0,0,1,6.12-6H59.66L76,30.47V79A6.06,6.06,0,0,1,69.88,85Z" fill="#fff" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                                                        <polyline points="60 16 60 31 75 31.07" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></polyline>
                                                        <rect x="40" y="45" width="23" height="19" fill="#e3e7fe" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></rect>
                                                        <rect x="36" y="49" width="23" height="19" fill="#fff" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></rect>
                                                        <polyline points="37 62.88 45.12 55.94 52.81 63.06 55.99 59.44 59 62.76" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></polyline>
                                                        <circle cx="52.11" cy="54.98" r="2.02" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></circle>
                                                    </svg></span>
                                            <span class="dz-message-text">Drag and drop file</span>
                                            {{--                                                <span class="dz-message-or">or</span>--}}
                                            {{--                                                <a onclick="e.preventDefault()" class="btn btn-primary">SELECT</a>--}}
                                        </div>
                                    </div>
                                </div>






                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-lg btn-primary">{{trans('page_title.save')}}</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- .nk-block -->
        </div>
    </div>
{{--{{dd(json_encode($product->media))}}--}}
@endsection
@section('script')
    <script>
        @php             $uploadedFiles = $product->attachments->toArray();
        @endphp
        var uploadedDocumentMap = {}
        Dropzone.options.documentDropzone = {
            url: '{{ route('admin.products_upload_images') }}',
            maxFilesize: 5, // MB
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function (file, response) {
                $('form').append('<input type="hidden" name="document[]" value="' + response.name + '">')
                uploadedDocumentMap[file.name] = response.name
            },
            removedfile: function (file) {
                file.previewElement.remove()
                var name = ''
                if (typeof file.filename !== 'undefined') {
                    name = file.filename
                } else {
                    name = uploadedDocumentMap[file.name]
                }
                $('form').find('input[name="document[]"][value="' + name + '"]').remove()
            },
            init: function () {
                @if(isset($uploadedFiles) && $uploadedFiles)
                var files =
                    {!! json_encode($uploadedFiles) !!}
                    for (var i in files) {
                    var file = files[i]
                    this.options.addedfile.call(this, file)
                    var imageUrl = "{{ asset('uploads/products') }}" + '/' + file.filename; // Constructing asset URL
                    $(file.previewElement).find(".dz-image img").attr("src", imageUrl);
                    $(file.previewElement).find(".dz-filename span").append(file.filename);
                    $(file.previewElement).find(".dz-size span ").remove();
                    // $(file.previewElement).find(".dz-size").append('<span>'+file.size+'</span>');

                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="document[]" value="' + file.filename + '">')
                }
              @endif
        }
        }
    </script>





@endsection
