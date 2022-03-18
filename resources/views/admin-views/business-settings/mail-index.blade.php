@extends('layouts.admin.app')

@section('title','Settings')

@push('css_or_js')

@endpush

@section('content')
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm mb-2 mb-sm-0">
                    <h1 class="page-header-title">{{trans('messages.smtp')}} {{trans('messages.mail')}} {{trans('messages.setup')}}</h1>
                </div>
            </div>
        </div>
        <!-- End Page Header -->
        <div class="row gx-2 gx-lg-3">
            @php($config=\App\Model\BusinessSetting::where(['key'=>'mail_config'])->first())
            @php($data=json_decode($config['value'],true))
            <div class="col-sm-12 col-lg-12 mb-3 mb-lg-2">
                <form action="{{route('admin.business-settings.mail-config')}}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    @if(isset($config))
                        <div class="form-group mb-2">
                            <label style="padding-left: 10px">{{trans('messages.mailer')}} {{trans('messages.name')}}</label><br>
                            <input type="text" placeholder="ex : Alex" class="form-control" name="name"
                                   value="{{$data['name']}}" required>
                        </div>

                        <div class="form-group mb-2">
                            <label style="padding-left: 10px">{{trans('messages.host')}}</label><br>
                            <input type="text" class="form-control" name="host" value="{{$data['host']}}" required>
                        </div>
                        <div class="form-group mb-2">
                            <label style="padding-left: 10px">{{trans('messages.driver')}}</label><br>
                            <input type="text" class="form-control" name="driver" value="{{$data['driver']}}" required>
                        </div>
                        <div class="form-group mb-2">
                            <label style="padding-left: 10px">{{trans('messages.port')}}</label><br>
                            <input type="text" class="form-control" name="port" value="{{$data['port']}}" required>
                        </div>

                        <div class="form-group mb-2">
                            <label style="padding-left: 10px">{{trans('messages.username')}}</label><br>
                            <input type="text" placeholder="ex : ex@yahoo.com" class="form-control" name="username"
                                   value="{{$data['username']}}" required>
                        </div>

                        <div class="form-group mb-2">
                            <label style="padding-left: 10px">{{trans('messages.email')}} {{trans('messages.id')}}</label><br>
                            <input type="text" placeholder="ex : ex@yahoo.com" class="form-control" name="email"
                                   value="{{$data['email_id']}}" required>
                        </div>

                        <div class="form-group mb-2">
                            <label style="padding-left: 10px">{{trans('messages.encryption')}}</label><br>
                            <input type="text" placeholder="ex : tls" class="form-control" name="encryption"
                                   value="{{$data['encryption']}}" required>
                        </div>

                        <div class="form-group mb-2">
                            <label style="padding-left: 10px">{{trans('messages.password')}}</label><br>
                            <input type="text" class="form-control" name="password" value="{{$data['password']}}" required>
                        </div>

                        <button type="submit" class="btn btn-primary mb-2">{{trans('messages.save')}}</button>
                    @else
                        <button type="submit" class="btn btn-primary mb-2">{{trans('messages.configure')}}</button>
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script_2')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#viewer').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#customFileEg1").change(function () {
            readURL(this);
        });
    </script>
@endpush
