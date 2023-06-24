<x-home-layout>

    <x-slot name="title">User Event</x-slot>

    <x-slot name='main'>


    <main>
        <script>
            let x = setInterval(function() {
                    let dest = new Date("{{ $event->date }}").getTime();
                    // console.log(dest);
                    // let dest = new Date("25/04/2023 19:00:00").getTime();
                    let now = new Date().getTime();

                    let diff = dest - now;
                    // console.log(diff);
                    let days = Math.floor(diff / (1000 * 60 * 60 * 24));
                    let hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    let minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
                    let second = Math.floor((diff % (1000 * 60)) / (1000))

                    document.getElementById("day").innerHTML = days;
                    document.getElementById("hour").innerHTML = hours;
                    document.getElementById("min").innerHTML = minutes;
                    document.getElementById("second").innerHTML = second;
                },
                1000);
        </script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

        @include('homepage.header')
        <!--? slider Area Start-->
        <div class="slider-area position-relative">

            <div class="slider-active">
                <!-- Single Slider -->
                <div class="single-slider slider-height d-flex align-items-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-8 col-lg-8 col-md-9 col-sm-10">
                                <div class="hero__caption">
                                    <span data-animation="fadeInLeft" data-delay=".1s">Evento</span>
                                    <h1 data-animation="fadeInLeft" data-delay=".5s">{{ $event->name }}
                                    </h1>
                                    <!-- Hero-btn -->
                                    <div class="slider-btns">
                                        <a data-animation="fadeInLeft" data-delay="1.0s" href="#price" class="btn hero-btn">Book Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Single Slider -->
                {{-- <div class="single-slider slider-height d-flex align-items-center">
                    <div class="container">
                        <div class="row">

                            <div class="col-xl-8 col-lg-8 col-md-9 col-sm-10">
                                <div class="hero__caption">
                                    <span data-animation="fadeInLeft" data-delay=".1s">Evento</span>
                                    <h1 data-animation="fadeInLeft" data-delay=".5s">  </h1>

                                    <!-- Hero-btn -->
                                    <div class="slider-btns">
                                        <a data-animation="fadeInLeft" data-delay="1.0s" href="" class="btn hero-btn">Book Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>

            <!-- Counter Section Begin -->
            <div class="counter-section d-none d-sm-block">
                <div class="cd-timer" id="">
                    <div class="cd-item">
                        <span id="day"></span>
                        <p>Days</p>
                    </div>
                    <div class="cd-item">
                        <span id="hour"></span>
                        <p>Hrs</p>
                    </div>
                    <div class="cd-item">
                        <span id="min"></span>
                        <p>Min</p>
                    </div>
                    <div class="cd-item">
                        <span id="second"></span>
                        <p>Sec</p>
                    </div>
                </div>
            </div>
            <!-- Counter Section End -->
        </div>
        <!-- slider Area End-->
        <!--? About Law Start-->
        <section class="about-low-area section-padding2" id="about" style="padding-top: 100px; margin-bottom:50px">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="about-caption mb-50">
                            <!-- Section Tittle -->
                            <div class="section-tittle mb-35">
                                <h2>{{ $event->name }}</h2>
                            </div>
                            <p>{{ $event->description }}</p>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-10">
                                <div class="single-caption mb-20">
                                    <div class="caption-icon">
                                        <span class="flaticon-communications-1"></span>
                                    </div>
                                    <div class="caption">
                                        <h5>Where</h5>
                                        <p>{{ $event->address."   ". $event->city ."   ". $event->state ."  --  ". $event->pincode }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-10">
                                <div class="single-caption mb-20">
                                    <div class="caption-icon">
                                        <span class="flaticon-education"></span>
                                    </div>
                                    <div class="caption">
                                        <h5>When</h5>
                                        <p>{{ date('d-m-Y l', strtotime($event->date)) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="#price" class="btn mt-50">Get Your Ticket</a>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <!-- about-img -->
                        <div class="about-img ">
                            <div class="about-font-img d-none d-lg-block">
                                <img src="{{ asset('homepagefrontend/assets/img/gallery/about2.png') }}" alt="">
                            </div>
                            <div class="about-back-img ">
                                <img src="{{ asset('homepagefrontend/assets/img/gallery/about1.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- About Law End-->
        <!--? Brand Area Start -->
        <section class="team-area pt-50 pb-50 section-bg" data-background="{{ asset('homepagefrontend/assets/img/gallery/section_bg02.png') }}" id="speaker" style="padding-top:190px; padding-bottom:0px">
            <div class="container">
                <div class="row" style="flex-direction: column; ">
                    <div class="col-md-9">
                        <!-- Section Tittle -->
                        <div class="section-tittle section-tittle2 mb-50">
                            <h2 style="align-items: center;">The Most Importent Speakers.</h2>
                            <!-- <a href="#" class="btn white-btn mt-30">View Speaker</a> -->
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single-team mb-30">
                            @foreach ($event->speaker as $speaker)
                            <div class="team-img">

                                @if(file_exists('storage/admin/speaker/'.$speaker->image))
                                    <img src="{{ asset('storage/admin/speaker/'.$speaker->image) }}" alt="">
                                @else
                                    <img src="{{ asset('storage/organiser/speaker/'.$speaker->image) }}" alt="">
                                @endif

                            </div>
                            <div class="team-caption">
                                <h3><a>{{ $speaker->name }}</a></h3>
                                <p> {{ $speaker->description }} </p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Brand Area End -->
        <!--? accordion -->
        <section class="accordion fix section-padding30" id="schedule" style="padding-top: 100px; padding-bottom: 0px">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-6 col-md-6">
                        <!-- Section Tittle -->
                        <div class="section-tittle text-center mb-50">
                            <h2>Event Schedule</h2>
                            <p> An event is not over until everyone is tired of talking about it.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <!-- Nav Card -->
                <div class="tab-content" id="nav-tabContent">
                    <!-- card one -->
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="row">
                            <div class="col-lg-11">
                                <div class="">
                                    <div class="" id="accordionExample">
                                        <!-- single-one -->
                                        <div class="card" style="background: #331391;">
                                            <div class=" card-header" id="headingTwo">
                                                <h2 class="mb-0" style="color: white">
                                                    <span>Date</span>
                                                    <p style="color: white">
                                                        {{ date('d-m-Y l', strtotime($event->date)) }}
                                                    </p>
                                                </h2>
                                            </div>
                                        </div>
                                        <!-- single-two -->
                                        <div class="card" style="background: #331391;">
                                            <div class=" card-header" id="headingTwo">
                                                <h2 class="mb-0" style="color: white">
                                                    <span>Time</span>
                                                    <p style="color: white">
                                                        {{ date('h:i A', strtotime($event->start_time)) }}
                                                        To
                                                        {{ date('h:i A', strtotime($event->end_time)) }}
                                                    </p>
                                                </h2>
                                            </div>
                                        </div>
                                        <!-- single-three -->
                                        <div class="card" style="background: #331391;">
                                            <div class=" card-header" id="headingTwo">
                                                <h2 class="mb-0" style="color: white">
                                                    <span>Venue</span>
                                                    <p style="color: white">
                                                        {{ $event->address."   ". $event->city ."   ". $event->state ."  --  ". $event->pincode }}
                                                    </p>
                                                </h2>
                                            </div>
                                        </div>
                                        <div class="card" style="background: #331391;">
                                            <div class=" card-header" id="headingTwo">
                                                <h2 class="mb-0" style="color: white">
                                                    <span>Organiser</span>
                                                    <p style="color: white; padding-top:10px">
                                                        @php
                                                        $organisers = App\models\Organiser::where('id',$event->eventable->id)->first();
                                                    @endphp

                                                    {{$organisers->name}}

                                                    </p>
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Nav Card -->
            </div>
        </section>
        <!-- accordion End -->

        <!--? Pricing Card Start -->
        <section class="pricing-card-area section-padding2" id="price" style="padding-top: 100px; padding-bottom: 150px;">



        <form action="{{ route('ticket_send',$event->id)}}" method="POST">

            @csrf
            @method('POST')
        <div class="container">
                <!-- Section Tittle -->
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-8">
                        <div class="section-tittle text-center mb-100">

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-10">
                        <div class=" mb-30">
                            <div class="">
                                <h4></h4>
                            </div>
                            <div class="card-bottom">
                                <ul>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                </ul>
                                <a href="services.php" class=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-10 " >
                        <div class="single-card active text-center mb-30" style="width:420px;">
                            <h2 style="color:white">Program Pricing</h2><br>
                            <div class="card-top">
                                <h4>Rs. {{ $event->price }}</h4>
                                <input type="hidden" name="price" id="eventprice" value="{{ $event->price }}">
                            </div>
                            <div class="card-bottom">
                                <ul>
                                    <li>Total Tickets : {{ $event->total_ticket }}</li>
                                    <li>Available Tickets :  {{ $event->available_ticket }} </li>


                                    <!-- <li>10 Free Optimization</li>
                                    <li>24/7 support</li> -->
                                </ul>
                                <div class="center" style="width:250px; margin:40px auto">
                        <div class="input-group" style="flex-direction:row; box-sizing:unset; padding-bottom:50px">
                            <span class="input-group-btn">
                                <button type="button" id="minus" class="btn btn-danger btn-number" data-type="minus" data-field="quant[2]" style="height:30px; width:25px; padding-top:12.5px;  background: red">
                                    <span class="fa fa-minus"></span>
                                </button>
                            </span>
                            <input type="text" name="quant[2]" name="quantity" id="quantity" class="form-control input-number" value="1" min="1" max="10" style="text-align:center; height:40px; width: 25px">
                            <span class="input-group-btn">
                                <button type="button" id="plus" class="btn btn-success btn-number" data-type="plus" data-field="quant[2]" style="height:30px; width:25px; padding-top:12.5px; background: green">
                                    <span class="fa fa-plus"></span>
                                </button>
                            </span>
                        </div>
                                <ul>
                                    <li >Total quantity : <input type="text" id="qty" style="width:30%; text-align:center; color:black" value="1" disabled></li>
                                    <li>Total Pay Amount :  <input type="text" id="amount" style="width:30%; text-align:center; color:black" value="{{ $event->price }} " disabled></li>
                                    <!-- <li>Total Pay Amount :  <a href="" id="amount"></a></li> -->

                                    <!-- <li>10 Free Optimization</li>
                                    <li>24/7 support</li> -->
                                </ul>
                            <p></p>
                        </div>

                                <button type="submit" class="black-btn">Book Now

                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-10">
                        <div class="mb-30">
                            <div class="">
                                <span></span>
                                <h4></h4>
                            </div>
                            <div class="card-bottom">
                                <ul>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                </ul>
                                <a href=" " class=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        </section>

<script>

        $('.btn-number').click(function(e) {
        e.preventDefault();

        fieldName = $(this).attr('data-field');
        type = $(this).attr('data-type');

        var input = $("input[name='" + fieldName + "']");
        var currentVal = parseInt(input.val());
        if (!isNaN(currentVal)) {
            if (type == 'minus') {

                if (currentVal > input.attr('min')) {
                    input.val(currentVal - 1).change();
                    $('#plus').attr('disabled', false);

                }
                if (parseInt(input.val()) == input.attr('min')) {
                    $(this).attr('disabled', true);
                }

            } else if (type == 'plus') {

                if (currentVal < input.attr('max')) {
                    input.val(currentVal + 1).change();
                    $('#minus').attr('disabled', false);
                }
                if (parseInt(input.val()) == input.attr('max')) {
                    $(this).attr('disabled', true);
                }

            }
        } else {
            input.val(0);
        }
    });
    $('.input-number').focusin(function() {
        $(this).data('oldValue', $(this).val());
    });
    $('.input-number').change(function() {

        minValue = parseInt($(this).attr('min'));
        maxValue = parseInt($(this).attr('max'));
        valueCurrent = parseInt($(this).val());

        name = $(this).attr('name');
        if (valueCurrent >= minValue) {
            $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
        } else {
            alert('Sorry, the minimum value was reached');
            $(this).val($(this).data('oldValue'));
        }
        if (valueCurrent <= maxValue) {
            $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
        } else {
            // alert('Sorry, the maximum value was reached');
            $(this).val($(this).data('oldValue'));
        }
    });
    $(".input-number").keydown(function(e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
            // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) ||
            // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
            // let it happen, don't do anything
            return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });


    $(document).ready(function() {
        $("#plus").click(function() {
            let input = $("input[name='" + fieldName + "']");
            let currentVal = parseInt(input.val());
            let amount = $("#eventprice").val();
            total = amount * currentVal;
            console.log(total);
            $("#amount").val(total);
            $("#qty").val(currentVal);
        });
    });

    $(document).ready(function() {
        $("#minus").click(function() {
            let input = $("input[name='" + fieldName + "']");
            let currentVal = parseInt(input.val());
            let amount = $("#eventprice").val();
            total = amount * currentVal;
            console.log(total);
            $("#amount").val(total);
            $("#qty").val(currentVal);
        });
    });

</script>
</main>


</x-slot>

</x-home-layout>

    <!-- JS here -->

