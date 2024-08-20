@extends('Backend.layout.master')
@section('title')
    {{trans('page_title.show product')}}
@endsection
@section('css')

@endsection
@section('content')
    <div class="container-xl wide-xl">
        <div class="nk-content-body">
            <div class="nk-block nk-block-lg">
                <div class="nk-block-head">
                    <div class="nk-block-head-content">
                        <h4 class="title nk-block-title">{{trans('page_title.show product')}}</h4>
                        <div class="nk-block-des">
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card">
                        <div class="card-inner">
                                <div class="row g-gs">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="fv-full-name">{{trans('products.categories')}}</label>
                                            <div class="form-control-wrap">
                                                <select class="form-select js-select2" disabled name="category_id">
                                                    <option value="0" disabled selected>----- {{trans('products.select category')}} -----</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->id}}" @if(old('category_id',$product->category_id) == $category->id) selected @endif>{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        @error('image')<span class="text-danger">{{ $message }}</span>@enderror

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="fv-full-name">{{trans('products.arabic name')}}</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" disabled id="fv-full-name" name="name_ar" value="{{old('name_ar',$product->getTranslation('name','ar'))}}" required>
                                            </div>
                                        </div>
                                        @error('name_ar')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="fv-full-name">{{trans('products.english name')}}</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" disabled id="fv-full-name" name="name_en" value="{{old('name_en',$product->getTranslation('name','en'))}}" required>
                                            </div>
                                        </div>
                                        @error('name_en')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="fv-full-name">{{trans('products.slug')}}</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" disabled id="fv-full-name" name="slug" value="{{old('slug',$product->slug)}}" required>
                                            </div>
                                        </div>
                                        @error('slug')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="fv-full-name">{{trans('products.image')}}</label>
                                            <div class="input-group mb-3 ">
                                                <img src="{{asset('uploads/'.$product->image)}}" alt="" class="thumb"style="max-width: 100px;">
                                            </div>
                                        </div>
                                        @error('image')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="fv-message">{{trans('products.arabic short description')}}</label>
                                            <div class="form-control-wrap">
                                                <textarea class="form-control form-control-sm" disabled id="fv-message" name="short_description_ar" placeholder="{{trans('products.arabic short description')}}" required>{{old('short_description_ar',$product->getTranslation('short_description','ar'))}}</textarea>
                                            </div>
                                        </div>
                                        @error('short_description_ar')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="fv-message">{{trans('products.english short description')}}</label>
                                            <div class="form-control-wrap">
                                                <textarea class="form-control form-control-sm" disabled id="fv-message" name="short_description_en" placeholder="{{trans('products.english short description')}}" required>{{old('short_description_en',$product->getTranslation('short_description','en'))}}</textarea>
                                            </div>
                                        </div>
                                        @error('short_description_en')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="fv-message">{{trans('products.arabic description')}}</label>
                                            <div class="form-control-wrap">
                                                <textarea class="form-control form-control-sm" disabled id="fv-message" name="description_ar" placeholder="{{trans('products.arabic description')}}" required>{{old('description_ar',$product->getTranslation('description','ar'))}}</textarea>
                                            </div>
                                        </div>
                                        @error('description_ar')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="fv-message">{{trans('products.english description')}}</label>
                                            <div class="form-control-wrap">
                                                <textarea class="form-control form-control-sm" disabled id="fv-message" name="description_en" placeholder="{{trans('products.english description')}}" required>{{old('description_ar',$product->getTranslation('description','en'))}}</textarea>
                                            </div>
                                        </div>
                                        @error('description_en')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>

                                    <div class="col-md-6">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" disabled @if(old('status',$product->status)=='1') checked @else @endif  value="1" name="status" id="customCheck1">
                                            <label class="custom-control-label"  for="customCheck1">{{trans('products.status')}}</label>
                                        </div>
                                        @error('status')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" disabled value="1" @if(old('trend',$product->trend)==1) checked @endif  name="trend" id="customCheck2">
                                            <label class="custom-control-label"  for="customCheck2">{{trans('products.trend')}}</label>
                                        </div>
                                        @error('trend')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="fv-full-name">{{trans('products.price')}}</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" disabled id="fv-full-name" name="price" value="{{old('price',$product->price)}}"  oninput="this.value=this.value.replace(/[^0-9.]/g,'');" required>
                                            </div>
                                        </div>
                                        @error('price')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="fv-full-name">{{trans('products.selling price')}}</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" disabled id="fv-full-name" name="selling_price" value="{{old('selling_price',$product->selling_price)}}"  oninput="this.value=this.value.replace(/[^0-9.]/g,'');" required>
                                            </div>
                                        </div>
                                        @error('selling_price')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="fv-full-name">{{trans('products.qty')}}</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" disabled id="fv-full-name" name="qty" value="{{old('qty',$product->qty)}}"  oninput="this.value=this.value.replace(/[^0-9.]/g,'');" required>
                                            </div>
                                        </div>
                                        @error('qty')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="fv-full-name">{{trans('products.tax')}}</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" disabled id="fv-full-name" name="tax" value="{{old('tax',$product->tax)}}"  oninput="this.value=this.value.replace(/[^0-9.]/g,'');" required>
                                            </div>
                                        </div>
                                        @error('tax')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="fv-full-name">{{trans('products.meta_title')}}</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" disabled id="fv-full-name" name="meta_title" value="{{old('meta_title',$product->meta_title)}}"   required>
                                            </div>
                                        </div>
                                        @error('meta_title')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="fv-message">{{trans('products.arabic meta_description')}}</label>
                                            <div class="form-control-wrap">
                                                <textarea class="form-control form-control-sm" disabled id="fv-message" name="meta_description_ar"  placeholder="{{trans('products.arabic description')}}" required>{{old('meta_description_ar',$product->getTranslation('meta_description','ar'))}}</textarea>
                                            </div>
                                        </div>
                                        @error('meta_description_ar')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="fv-message">{{trans('products.english meta_description')}}</label>
                                            <div class="form-control-wrap">
                                                <textarea class="form-control form-control-sm" disabled id="fv-message" name="meta_description_en" placeholder="{{trans('products.arabic description')}}" required>{{old('meta_description_en',$product->getTranslation('meta_description','en'))}}</textarea>
                                            </div>
                                        </div>
                                        @error('meta_description_en')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="fv-message">{{trans('products.meta_keywords')}} <span class="text-danger">{{trans('products.add_comma_between_keyword')}}</span></label>
                                            <div class="form-control-wrap">
                                                <textarea class="form-control form-control-sm" disabled id="fv-message" name="meta_keywords" placeholder="{{trans('products.add_comma_between_keyword')}}" required>{{old('meta_keywords',$product->meta_keywords)}}</textarea>
                                            </div>
                                        </div>
                                        @error('meta_keywords')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>


                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-lg btn-primary">{{trans('page_title.save')}}</button>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div><!-- .nk-block -->
        </div>
    </div>


@endsection
@section('script')


@endsection
