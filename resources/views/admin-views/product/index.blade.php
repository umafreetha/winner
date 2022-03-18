@extends('layouts.admin.app')

@section('title','Add new product')

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
                            class="tio-add-circle-outlined"></i> {{trans('messages.add')}} {{trans('messages.new')}} {{trans('messages.product')}}
                    </h1>
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
                        <input type="text" name="name" class="form-control" placeholder="New Product" required>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="input-label"
                                       for="exampleFormControlInput1">{{trans('messages.price')}}</label>
                                <input type="number" min="1" max="100000" step="0.01" value="1" name="price"
                                       class="form-control"
                                       placeholder="Ex : 100" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="input-label"
                                       for="exampleFormControlInput1">{{trans('messages.unit')}}</label>
                                <select name="unit" class="form-control js-select2-custom">
                                    <option value="kg">{{trans('messages.kg')}}</option>
                                    <option value="gm">{{trans('messages.gm')}}</option>
                                    <option value="ltr">{{trans('messages.ltr')}}</option>
                                    <option value="pc">{{trans('messages.pc')}}</option>
                                </select>
                            </div>
                        </div>


                    </div>
                    <div class="row">
                        <div class="col-md-6 col-6">
                            <div class="form-group">
                                <label class="input-label"
                                       for="exampleFormControlInput1" readonly>{{trans('GST')}}</label>
                                <input type="number" min="0" value="" step="0.01" max="100000" name="tax"
                                       class="form-control price-input"
                                       placeholder="GST">
                            </div>
                        </div>
                        <div class="col-md-6 col-6">
                            <div class="form-group">
                                <label class="input-label"
                                       for="exampleFormControlInput1">{{trans('messages.tax')}} {{trans('messages.type')}}</label>
                                <select name="Stax_type" class="form-control js-select2-custom">
                                    <option value="percent">{{trans('messages.percent')}}</option>
                                    <option value="amount">{{trans('messages.amount')}}</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-6">
                            <div class="form-group">
                                <label class="input-label"
                                       for="exampleFormControlInput1">{{trans('messages.discount')}}</label>
                                <input type="number" min="0" max="100000" value="0" name="discount" class="form-control"
                                       placeholder="Ex : 100">
                            </div>
                        </div>
                        <div class="col-md-6 col-6">
                            <div class="form-group">
                                <label class="input-label"
                                       for="exampleFormControlInput1">{{trans('messages.discount')}} {{trans('messages.type')}}</label>
                                <select name="discount_type" class="form-control js-select2-custom">
                                    <option value="percent">{{trans('messages.percent')}}</option>
                                    <option value="amount">{{trans('messages.amount')}}</option>
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
                                <select name="category_id" class="form-control js-select2-custom vehicle-type"
                                        onchange="getRequest('{{url('/')}}/admin/product/get-categories?parent_id='+this.value,'sub-categories')">
                                    <option value="">---{{trans('messages.select')}}---</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category['id']}}" data-price="{{$category['tax']}}">{{$category['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-6">
                        <div class="form-group">
                        <label class="input-label" for="exampleFormControlInput1">{{trans('sku')}}</label>
                        <input type="text" name="sku" class="form-control" placeholder="Sku" required>
                    </div>
                        </div>
                        <div class="col-6">
                        <div class="form-group">
                        <label class="input-label" for="exampleFormControlInput1">{{trans('quantity')}}</label>
                        <input type="text" name="quantity" class="form-control" placeholder="quantity" required>
                    </div>
                        </div>

                    </div>



                    <div class="form-group pt-4">
                        <label class="input-label"
                               for="exampleFormControlInput1">{{trans('messages.short')}} {{trans('messages.description')}}</label>
                        <div id="editor" style="min-height: 15rem;"></div>
                        <textarea name="description" style="display:none" id="hiddenArea"></textarea>
                    </div>

                    <div class="form-group">
                        <label>{{trans('messages.product')}} {{trans('messages.image')}}</label><small
                            style="color: red">* ( {{trans('messages.ratio')}} 1:1 )</small>
                        <div>
                            <div class="row" id="coba"></div>
                        </div>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-primary">{{trans('messages.submit')}}</button>
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
        function getRequest(route, id) {
            $.get({
                url: route,
                dataType: 'json',
                success: function (data) {
                    $('#' + id).empty().append(data.options);
                },
            });
        }
    </script>

<script>
   $('.vehicle-type').on('change', function() {
  $('.price-input')
  .val(
    $(this).find(':selected').data('price')
  );
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
        var quill = new Quill('#editor', {
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
                url: '{{route('admin.product.store')}}',
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
                        toastr.success('product uploaded successfully!', {
                            CloseButton: true,
                            ProgressBar: true
                        });
                        // setTimeout(function () {
                        //     location.href = '{{route('admin.product.list')}}';
                        // }, 2000);
                    }
                }
            });
        });
    </script>
@endpush


