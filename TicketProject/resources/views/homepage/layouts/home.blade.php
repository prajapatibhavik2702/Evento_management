
<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $title }}</title>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">


    <!-- Favicons -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('homepagefrontend/assets/img/favicon.ico') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">
    <link href="https://eventright.saasmonks.in/frontend/css/ionicons.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
    <link href="https://eventright.saasmonks.in/frontend/css/animate.min.css" rel="stylesheet">
    <link href="https://eventright.saasmonks.in/frontend/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="https://eventright.saasmonks.in/frontend/css/owl.carousel.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- Template Main CSS File -->
    <link href="https://eventright.saasmonks.in/frontend/css/style.css" rel="stylesheet">
    <link href="https://eventright.saasmonks.in/frontend/css/custom.css" rel="stylesheet">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('homepagefrontend/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('homepagefrontend/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('homepagefrontend/assets/css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ asset('homepagefrontend/assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('homepagefrontend/assets/css/gijgo.css') }}">
    <link rel="stylesheet" href="{{ asset('homepagefrontend/assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('homepagefrontend/assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('homepagefrontend/assets/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('homepagefrontend/assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('homepagefrontend/assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('homepagefrontend/assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('homepagefrontend/assets/css/style.css') }}">

 

    <!-- ionicons scripts -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <style>
        .introbtn {
            font-family: "Sarabun", sans-serif;
            font-size: 14px;
            font-weight: 400;
            border: 2px solid #331391;
            background: #331391;
        }
    </style>
      <style>
        :root {
            --primary_color: #313131;
            --light_primary_color: #313131;
            --profile_primary_color: #313131;
            --middle_light_primary_color: #313131;
        }
    </style>


</head>
<body>

{{-- @include('homepage.header') --}}
{{-- @include('homepage.loader') --}}
{{ $main }}


 <!-- Footer Ends -->
 <a href="#" class="back-to-top" style="background:#331391"><i class="fa fa-chevron-up"></i></a>
 <!-- <div id="preloader" style="border: #331391"></div> -->

 <!-- Vendor JS Files -->
 <script src="https://eventright.saasmonks.in/frontend/js/jquery.min.js"></script>

 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
 <script src="https://eventright.saasmonks.in/frontend/js/bootstrap.bundle.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
 <script src="https://eventright.saasmonks.in/frontend/js/jquery.easing.min.js"></script>
 <script src="https://eventright.saasmonks.in/frontend/js/validate.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
 <script src="https://eventright.saasmonks.in/frontend/js/owl.carousel.min.js"></script>
 <script src="https://eventright.saasmonks.in/frontend/js/scrollreveal.min.js"></script>
 <script src="https://eventright.saasmonks.in/frontend/js/map.js"></script>

 <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

 <script src="https://www.paypal.com/sdk/js?client-id=AY8AEr0kVPWZiN6fCDNWf8RhWeLhzjStJs3lSz1FrN1Sx62-j5HTP1zDiTzfmL7EkAdcP2HZkoBkEeNh&currency=INR" data-namespace="paypal_sdk"></script>
 <script src="https://maps.googleapis.com/maps/api/js?key=&callback=initAutocomplete&libraries=places" async defer></script>
 <script src="https://eventright.saasmonks.in/frontend/js/main.js"></script>
 <script src="https://eventright.saasmonks.in/frontend/js/custom.js"></script>

 <!-- Scroll Up -->
 <!-- <div id="back-top">
     <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
 </div> -->

 <!-- JS here -->

 <script src="{{ asset('homepagefrontend/assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
 <!-- Jquery, Popper, Bootstrap -->
 <script src="{{ asset('homepagefrontend/assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
 <script src="{{ asset('homepagefrontend/assets/js/popper.min.js') }}"></script>
 <script src="{{ asset('homepagefrontend/assets/js/bootstrap.min.js') }}"></script>
 <script src="{{ asset('homepagefrontend/assets/js/abc.js') }}"></script>

 <!-- Jquery Mobile Menu -->
 <script src="{{ asset('homepagefrontend/assets/js/jquery.slicknav.min.js') }}"></script>

 <!-- Jquery Slick , Owl-Carousel Plugins -->
 <script src="{{ asset('homepagefrontend/assets/js/owl.carousel.min.js') }}"></script>
 <script src="{{ asset('homepagefrontend/assets/js/slick.min.js') }}"></script>
 <!-- One Page, Animated-HeadLin -->
 <script src="{{ asset('homepagefrontend/assets/js/wow.min.js') }}"></script>
 <script src="{{ asset('homepagefrontend/assets/js/animated.headline.js') }}"></script>
 <script src="{{ asset('homepagefrontend/assets/js/jquery.magnific-popup.js') }}"></script>

 <!-- Date Picker -->
 <script src="{{ asset('homepagefrontend/assets/js/gijgo.min.js') }}"></script>
 <!-- Nice-select, sticky -->
 <script src="{{ asset('homepagefrontend/assets/js/jquery.nice-select.min.js') }}"></script>
 <script src="{{ asset('homepagefrontend/assets/js/jquery.sticky.js') }}"></script>

 <!-- counter , waypoint -->
 <script src="{{ asset('homepagefrontend/assets/js/jquery.counterup.min.js') }}"></script>
 <script src="{{ asset('homepagefrontend/assets/js/waypoints.min.js') }}"></script>
 <script src="{{ asset('homepagefrontend/assets/js/jquery.countdown.min.js') }}"></script>
 <!-- contact js -->
 <script src="{{ asset('homepagefrontend/assets/js/contact.js') }}"></script>
 <script src="{{ asset('homepagefrontend/assets/js/jquery.form.js') }}"></script>
 <script src="{{ asset('homepagefrontend/assets/js/jquery.validate.min.js') }}"></script>
 <script src="{{ asset('homepagefrontend/assets/js/mail-script.js') }}"></script>
 <script src="{{ asset('homepagefrontend/assets/js/jquery.ajaxchimp.min.js') }}"></script>

 <!-- Jquery Plugins, main Jquery -->
 <script src="{{ asset('homepagefrontend/assets/js/plugins.js') }}"></script>
 <script src="{{ asset('homepagefrontend/assets/js/main.js') }}"></script>

 @include('homepage.footer')
</body>

</html>
