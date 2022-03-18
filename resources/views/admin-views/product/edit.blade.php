@extends('layouts.admin.app')

@section('title','Update product')




@push('css_or_js')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{asset('public/assets/admin/css/tags-input.min.css')}}" rel="stylesheet">
@endpush

@section('content')
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm mb-2 mb-sm-0">
                    <h1 class="page-header-title"><i
                            class="tio-edit"></i> {{trans('messages.product')}} {{trans('messages.update')}}</h1>
                </div>
            </div>
        </div>
        <!-- End Page Header -->
        <div class="row gx-2 gx-lg-3">
            <div class="col-sm-12 col-lg-12 mb-3 mb-lg-2">
                <form action="javascript:" method="post" id="product_form"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="input-label" for="exampleFormControlInput1">{{trans('messages.name')}}</label>
                        <input type="text" name="name" value="{{$product['name']}}" class="form-control"
                               placeholder="New Product" required>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="input-label"
                                       for="exampleFormControlInput1">{{trans('messages.price')}}</label>
                                <input type="number" value="{{$product['price']}}" min="1" max="100000" name="price"
                                       class="form-control" step="0.01"
                                       placeholder="Ex : 100" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="input-label"
                                       for="exampleFormControlInput1">{{trans('messages.unit')}}</label>
                                <select name="unit" class="form-control js-select2-custom">
                                    <option value="kg" {{$product['unit']=='kg'?'selected':''}}>
                                        {{trans('messages.kg')}}
                                    </option>
                                    <option value="gm" {{$product['unit']=='gm'?'selected':''}}>
                                        {{trans('messages.gm')}}
                                    </option>
                                    <option value="ltr" {{$product['unit']=='ltr'?'selected':''}}>
                                        {{trans('messages.ltr')}}
                                    </option>
                                    <option value="pc" {{$product['unit']=='pc'?'selected':''}}>
                                        {{trans('messages.pc')}}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="input-label"
                                       for="exampleFormControlInput1">{{trans('messages.tax')}}</label>
                                <input type="number" value="{{$product['tax']}}" min="0" max="100000" name="tax"
                                       class="form-control" step="0.01"
                                       placeholder="Ex : 7" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="input-label"
                                       for="exampleFormControlInput1">{{trans('messages.tax')}} {{trans('messages.type')}}</label>
                                <select name="tax_type" class="form-control js-select2-custom">
                                    <option
                                        value="percent" {{$product['tax_type']=='percent'?'selected':''}}>{{trans('messages.percent')}}
                                    </option>
                                    <option
                                        value="amount" {{$product['tax_type']=='amount'?'selected':''}}>{{trans('messages.amount')}}
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="input-label"
                                       for="exampleFormControlInput1">{{trans('messages.discount')}}</label>
                                <input type="number" min="0" value="{{$product['discount']}}" max="100000"
                                       name="discount" class="form-control"
                                       placeholder="Ex : 100">
                            </div>
                        </div>
                        <div class="col-md-6 col-6">
                            <div class="form-group">
                                <label class="input-label"
                                       for="exampleFormControlInput1">{{trans('messages.discount')}} {{trans('messages.type')}}</label>
                                <select name="discount_type" class="form-control js-select2-custom">
                                    <option value="percent" {{$product['discount_type']=='percent'?'selected':''}}>
                                        {{trans('messages.percent')}}
                                    </option>
                                    <option value="amount" {{$product['discount_type']=='amount'?'selected':''}}>
                                        {{trans('messages.amount')}}
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-6">
                            <div class="form-group">
                                <label class="input-label"
                                       for="exampleFormControlSelect1">{{trans('messages.category')}}<span
                                        class="input-label-secondary">*</span></label>
                                <select name="category_id" id="category-id" class="form-control js-select2-custom"
                                        onchange="getRequest('{{url('/')}}/admin/product/get-categories?parent_id='+this.value,'sub-categories')">
                                    @foreach($categories as $category)
                                        <option
                                            value="{{$category['id']}}" {{ $product->id==$product['category_ids'] ? 'selected' : ''}} >{{$category['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-6">
                        <div class="form-group">
                        <label class="input-label" for="exampleFormControlInput1">{{trans('sku')}}</label>
                        <input type="text" name="sku" value="{{$product['sku']}}" class="form-control"
                               placeholder="sku" required>
                    </div>
                    </div>
                      
                    <div class="col-6">
                        <div class="form-group">
                        <label class="input-label" for="exampleFormControlInput1">{{trans('quantity')}}</label>
                        <input type="text" name="quantity" value="{{$product['quantity']}}" class="form-control"
                               placeholder="quantity" required>
                    </div>
                    </div>
                    </div>
                 <div class="form-group pt-4">
                        <label class="input-label"
                               for="exampleFormControlInput1">{{trans('messages.short')}} {{trans('messages.description')}}</label>
                        <div id="editor" style="min-height: 15rem;">{!! $product['description'] !!}</div>
                        <textarea name="description" style="display:none" id="hiddenArea"></textarea>
                    </div>

                     <div class="form-group">
                        <label>{{trans('messages.product_images')}} {{trans('messages.images')}}</label><small
                            style="color: red">* ( {{trans('messages.ratio')}} 1:1 )</small>
                        <div>
                            <div class="row mb-3">
                                @foreach($images as $image)
                                    <div class="col-3">
                                  
                                        <img src="../../../storage/product/{{$image['images']}}" height="200px" width="100%">
                                        <a href="{{route('admin.product.remove-image',[$product['id'],$image])}}"
                                           style="margin-top: -35px;border-radius: 0"
                                           class="btn btn-danger btn-block btn-sm">Remove</a>
                                   
                                    </div>
                                @endforeach
                            </div>
                            <div class="row" id="coba"></div>
                        </div>
                    </div> 
              
            
                    <hr>
                    <button type="submit" class="btn btn-primary">{{trans('messages.update')}}</button>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('script')

@endpush

@push('script_2')
    <script src="{{asset('public/assets/admin/js/spartan-multi-image-picker.js')}}"></script>

    <script type="text/javascript">
        $(function () {
            $("#coba").spartanMultiImagePicker({
                fieldName: 'images[]',
                maxCount: 4,
                rowHeight: '215px',
                groupClassName: 'col-3',
                maxFileSize: '',
                placeholderImage: {
                    image: '{{asset('public/assets/admin/img/400x400/img2.jpg')}}',
                    width: '100%'
                },
                dropFileLabel: "Drop Here",
                onAddRow: function (index, file) {

                },
                onRenderedPreview: function (index) {

                },
                onRemoveRow: function (index) {

                },
                onExtensionErr: function (index, file) {
                    toastr.error('Please only input png or jpg type file', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                },
                onSizeErr: function (index, file) {
                    toastr.error('File size too big', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                }
            });
        });
    </script>



    <script>
        $(document).on('ready', function () {
            $('.js-select2-custom').each(function () {
                var select2 = $.HSCore.components.HSSelect2.init($(this));
            });
        });
    </script>


    <script src="{{asset('public/assets/admin')}}/js/tags-input.min.js"></script>

    
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <script>
        var container = $('#editor').get(0);
        var quill = new Quill(container, {
            theme: 'snow'
        });

        $('#product_form').on('submit', function () {

            var myEditor = document.querySelector('#editor')
            $("#hiddenArea").val(myEditor.children[0].innerHTML);

            var formData = new FormData(this);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.post({
                url: '{{route('admin.product.update',[$product['id']])}}',
                data: $('#product_form').serialize(),
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    if (data.errors) {
                        for (var i = 0; i < data.errors.length; i++) {
                            toastr.error(data.errors[i].message, {
                                CloseButton: true,
                                ProgressBar: true
                            });
                        }
                    } else {
                        toastr.success('product updated successfully!', {
                            CloseButton: true,
                            ProgressBar: true
                        });
                        setTimeout(function () {
                            location.href = '{{route('admin.product.list')}}';
                        }, 2000);
                    }
                }
            });
        });
    </script>
@endpush


