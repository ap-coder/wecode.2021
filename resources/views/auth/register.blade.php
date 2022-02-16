@extends('site.layouts.app')
@section('content')

  <!--=================================
intro-title -->
<section class="intro-title black-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-left">
                <div class="intro-content">
                    <div class="intro-name">
                        <h3 class="text-white">Register</h3>
                        <ul class="breadcrumb mt-1 p-0">
                            <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
                            <li class="breadcrumb-item active">Register</li>
                        </ul>
                    </div>
                    <div class="intro-img">
                        <img class="img-fluid" src="{{ asset('site/images/breadcrumb/02.png') }}" alt="Register">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=================================
intro-title -->

<!--=================================
register-form  -->
<section class="login-form page-section-ptb">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-3">Register An Account</h4>
                <form class="gray-form" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="name">Name*</label>
                            <input class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" placeholder="Enter your name" name="name" value="{{ old('name', null) }}" id="name">
                            @if($errors->has('name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                        </div>
                       
                    <div class="form-group col-md-12">
                        <label for="username">User Name* </label>
                        <input class="form-control {{ $errors->has('username') ? ' is-invalid' : '' }}" type="text" placeholder="Enter your user name" name="username" id="username" value="{{ old('username', null) }}">
                        @if($errors->has('username'))
                            <div class="invalid-feedback">
                                {{ $errors->first('username') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group col-md-6">
                        <label for="password">Password* </label>
                        <input class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" placeholder="Password" name="password" id="password" value="{{ old('password', null) }}">
                        @if($errors->has('password'))
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group col-md-6">
                        <label for="password_confirmation">Re-enter Password*</label>
                        <input id="password_confirmation" class="form-control { $errors->has('password_confirmation') ? ' is-invalid' : '' }}" type="password" placeholder="Password" name="password_confirmation" value="{{ old('password_confirmation', null) }}">
                        @if($errors->has('password_confirmation'))
                            <div class="invalid-feedback">
                                {{ $errors->first('password_confirmation') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">Email *</label>
                        <input class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" placeholder="Enter your email" name="email" value="{{ old('email', null) }}" id="email">
                        @if($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group col-md-6">
                        <label for="phone_number">Phone</label>
                        <input id="phone_number" class="form-control" type="text" placeholder="Enter your phone number" name="phone_number" value="{{ old('phone_number', null) }}">
                    </div>
                    
                    <div class="form-group col-lg-12">
                        <label for="country">Select Country</label>
                        <div class="selected-box auto-hight">
                          @include('auth.country-list')
                       </div>
                    </div>
                    
                    <div class="form-group col-md-12">
                        <label for="captcha">Please enter an answer in digits:</label>
                        <div class="form-group mt-4 mb-4">
                            <div class="captcha">
                                <span>{!! captcha_img() !!}</span>
                                <button type="button" class="btn btn-danger" class="reload" id="reload">
                                    &#x21bb;
                                </button>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <input id="captcha" type="text" class="form-control {{ $errors->has('captcha') ? ' is-invalid' : '' }}" placeholder="Enter Captcha" name="captcha">
                            @if($errors->has('captcha'))
                            <div class="invalid-feedback">
                                {{ $errors->first('captcha') }}
                            </div>
                        @endif
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group remember-checkbox">
                            <input type="checkbox" name="remember" id="remember" value="1" {{ old('remember') ? ' checked' : '' }} />
                            <label for="remember">Accept our <a href="#"> privacy policy</a> and <a href="#"> customer agreement</a></label>
                            @if($errors->has('remember'))
                            <div class="invalid-feedback" style="display: block;">
                                {{ $errors->first('remember') }}
                            </div>
                        @endif
                        </div>
                        <button type="submit" class="button mt-3">Register an account</button>
                        <p class="link pull-right mt-4">Already have an account please <a href="#"> login here </a></p>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!--=================================
register-form  -->

@endsection

@section('scripts')
@parent
<script type="text/javascript">
    $('#reload').click(function () {
        $.ajax({
            type: 'POST',
            url: '{{ route("api.users.reloadCaptcha") }}',
            data:{_token:$('meta[name="csrf-token"]').attr('content')},
            success: function (data) {
                $(".captcha span").html(data.captcha);
            }
        });
    });
</script>

@endsection