<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>

<title>
    @yield('page_title')
</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Easy Admin Panel Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
{!! Html::style('css/bootstrap.min.css') !!}


{!! Html::style('css/font-awesome.css') !!}

{!! Html::style('css/icon-font.min.css') !!}

<!--animate-->
{!! Html::style('css/animate.css') !!}

{!! Html::style('css/graph.css') !!}

<!--Datatables -->
{!! Html::style('css/jquery.dataTables.min.css') !!}


<!-- Easy admin custom CSS -->
{!! Html::style('css/style.css') !!}

<!-- PMS custom style -->
{!! Html::style('css/pms.css') !!}

@yield('additional_styles')

</head> 
   
 <body class="sticky-header">
    <section>
        @include('layouts.partials.sidebar')
    
        <!-- main content start-->
        <div class="main-content">
            <!-- header-starts -->
            @include('layouts.partials.header-section')
            <!-- //header-ends -->
            <div id="page-wrapper">
                @if(Session::has('successMessage'))
                  <div class="alert alert-success alert-dismissible" role="alert" id="alert-success">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <strong>Success...!</strong> <span id="success-info"> {{ Session::get('successMessage') }}</span>
                  </div>
                @endif
                @if(Session::has('errorMessage'))
                  <div class="alert alert-error alert-dismissible" role="alert" id="alert-error">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <strong>Error...!</strong> <span id="error-info"> {{ Session::get('errorMessage') }}</span>
                  </div>
                @endif
                @yield('main_content')
            </div>
        </div>
        <!--footer section start-->
        @include('layouts.partials.footer')
        <!--footer section end-->

      <!-- main content end-->
   </section>


{!! Html::script('js/jquery-1.12.4.js') !!}
<!-- Bootstrap Core JavaScript -->
{!! Html::script('js/bootstrap.min.js') !!}
<!-- chart -->
{!! Html::script('js/Chart.js') !!}
<!-- //chart -->
{!! Html::script('js/wow.min.js') !!}
<script>
     new WOW().init();
</script>

{!! Html::script('js/jquery.dataTables.min.js') !!}


{!! Html::script('js/jquery.nicescroll.js') !!}


{!! Html::script('js/scripts.js') !!}

                        
@yield('additional_scripts')
</body>
</html>