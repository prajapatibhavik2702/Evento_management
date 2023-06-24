<x-home-layout>
    <x-slot name="title">Evento Home</x-slot>

    <x-slot name='main'>
        @include('homepage.mainheader')

    <main>
        <!--? Hero Start -->
        <div class="slider-area2">
            <div class="slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap hero-cap2 text-center">
                                <h2>My Tickets</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <section class="section-property section-t8 section-b4">
            <div class="container">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="title-wrap d-flex justify-content-between">
                                <div class="title-box">
                                    <h2 class="title-a">My Bookings</h2>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div id="" class="event-section owl-theme">
                        <div class="row">



                            @foreach ($payments as $payment)

                                <div class="carousel-item-b col-lg-4 col-md-6 col-sm-6 mb-4">
                                    <div class="card-box-a card-shadow box-shadow radius-10">
                                        <div class="img-box-a">

                                            @if(file_exists('storage/admin/event/'.$payment->event->image))
                                            <img src="{{ asset('storage/admin/event/'.$payment->event->image) }}" alt="" class="img-a img-fluid">
                                        @else
                                            <img src="{{ asset('storage/organiser/event/'.$payment->event->image) }}" alt="" class="img-a img-fluid">
                                        @endif

                                        </div>
                                        <div class="card-overlay">
                                            <div class="card-overlay-a-content">
                                                <div class="card-header-a">
                                                    <h2 class="card-title-a">
                                                        <a href="{{ route('event',$payment->event->id) }}">  {{ $payment->event->name }} </a>
                                                    </h2>
                                                </div>
                                                <div class="card-body-a">
                                                    <div class="price-box d-flex">
                                                        <span class="price-a">
                                                            {{ date('d-m-Y l', strtotime($payment->event->date)) }}
                                                        </span>
                                                    </div>
                                                    <a href="{{ route('checkout',$payment->id) }}" class="link-a" style="color:white">More Detail </a>
                                                </div>
                                                <div class="card-footer-a" style="background:#331391">
                                                    <ul class="card-info d-flex justify-content-around">
                                                        <li>
                                                            <h4 class="card-info-title" style="color: black; font-weight:bold">Ticket Number</h4>
                                                            <span> {{ $payment->payment_no }}</span>
                                                        </li>
                                                        <li>
                                                            <h4 class="card-info-title" style="color: black; font-weight:bold">Price</h4>
                                                            <span> {{ $payment->event->price}} </span>
                                                        </li>
                                                        <li>
                                                            <h4 class="card-info-title" style="color: black; font-weight:bold">Quantity</h4>
                                                            <span> {{ $payment->qnt }} </span>
                                                        </li>
                                                        <li>
                                                            <h4 class="card-info-title" style="color: black; font-weight:bold">Total Amount</h4>
                                                            <span>{{ $payment->payment_amount }}</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             @endforeach
                        </div>
                    </div>
                </div>
        </section>
    </main>
    </x-slot>
</x-home-layout>
