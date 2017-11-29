@extends('layouts.app')

@section('additional_styles')
    <link href="{{ captcha_layout_stylesheet_url() }}" type="text/css" rel="stylesheet">
@endsection

@section('body')
<body class="sign-in-up">
    <section>
            <div id="page-wrapper" class="sign-in-wrapper">
                <div class="graphs">
                    <div class="sign-in-form">
                        <div class="sign-in-form-top">
                            <p><span>Sign In to</span> <a href="{{ url('dashboard') }}">PMS</a></p>
                        </div>
                        <div class="signin">
                            <div class="signin-rit">
                                <span class="checkbox1">
                                     <label class="checkbox"><input type="checkbox" name="checkbox" checked="">Forgot Password ?</label>
                                </span>
                                <p><a href="#">Click Here</a> </p>
                                <div class="clearfix"> </div>
                            </div>
                            <form method="POST" action="{{ url('/login') }}">
                                {{ csrf_field() }}
                                <div class="log-input">
                                    <div class="log-input-left">
                                       <input type="text" class="user" name="email" value="{{ old('email') }}" placeholder="Your email address" />
                                       @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                                <div class="log-input">
                                    <div class="log-input-left">
                                       <input type="password" name="password" class="lock" value="{{ old('password') }}" placeholder="Your password" />
                                       @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                                {!! captcha_image_html('ExampleCaptcha') !!}
                                <div class="log-input">
                                    <div class="log-input-left">
                                        <input type="text" id="CaptchaCode" name="CaptchaCode">
                                        @if ($errors->has('CaptchaCode'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('CaptchaCode') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                                <input type="submit" value="Login to your account">
                            </form>  
                        </div>
                        
                    </div>
                </div>
            </div>
        <!--footer section start-->
            <footer>
               <p>&copy {{ date('Y') }} Easy Admin Panel. All Rights Reserved | Design by <a href="https://w3layouts.com/" target="_blank">w3layouts.</a></p>
            </footer>
        <!--footer section end-->
    </section>
    
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
</body>
@endsection
