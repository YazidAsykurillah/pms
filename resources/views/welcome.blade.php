@extends('layouts.app')

@section('body')
<body class="sign-in-up">
    <section>
            <div id="page-wrapper" class="sign-in-wrapper">
                <div class="graphs">
                    <div class="sign-in-form">
                        <div class="sign-in-form-top">
                            <p><span>Welcome</span> <a href="{{ url('/login') }}">Please Sign In</a></p>
                        </div>
                       
                    </div>
                </div>
            </div>
        <!--footer section start-->
            <footer>
               <p>&copy 2015 Easy Admin Panel. All Rights Reserved | Design by <a href="https://w3layouts.com/" target="_blank">w3layouts.</a></p>
            </footer>
        <!--footer section end-->
    </section>
    
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
</body>
@endsection
