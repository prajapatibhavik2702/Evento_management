
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-10">

    {{-- status view file success,, --}}
    @if (Session::has('success'))
    <div id="successMessage" class="alert alert-success">
        {{ Session::get('success') }}
    </div>
    @endif


    @push('scripts')
    <script>
        // Remove success message after 5 seconds
        setTimeout(function () {
            var successMessage = document.getElementById('successMessage');
            if (successMessage) {
                successMessage.remove();
            }
        }, 1000);
    </script>
    @endpush


    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>


    <title>company invoice - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        body {
            margin-top: 20px;
            color: #484b51;
        }

        .text-secondary-d1 {
            color: #728299 !important;
        }

        .text-secondary-d2 {
            color: #57851c !important;
        }

        .text-secondary-d3 {
            color: black !important;
            font-weight: bold;
        }


        .page-header {
            margin: 0 0 1rem;
            padding-bottom: 1rem;
            padding-top: .5rem;
            border-bottom: 1px dotted #e2e2e2;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-pack: justify;
            justify-content: space-between;
            -ms-flex-align: center;
            align-items: center;
        }

        .page-title {
            padding: 0;
            margin: 0.5;
            font-size: 2rem;
            font-weight: 600;
        }

        .brc-default-l1 {
            border-color: #dce9f0 !important;
        }

        .ml-n1,
        .mx-n1 {
            margin-left: -.25rem !important;
        }

        .mr-n1,
        .mx-n1 {
            margin-right: -.25rem !important;
        }

        .mb-4,
        .my-4 {
            margin-bottom: 1.5rem !important;
        }

        hr {
            margin-top: 1rem;
            margin-bottom: 1rem;
            border: 0;
            border-top: 1px solid rgba(0, 0, 0, .1);
        }

        .text-grey-m2 {
            color: #888a8d !important;
        }

        .text-success-m2 {
            color: #86bd68 !important;
        }

        .font-bolder,
        .text-600 {
            font-weight: 700 !important;
        }

        .text-110 {
            font-size: 110% !important;
        }

        .text-blue {
            color: #478fcc !important;
        }

        .pb-25,
        .py-25 {
            padding-bottom: .75rem !important;
        }

        .pt-25,
        .py-25 {
            padding-top: .75rem !important;
        }

        .bgc-default-tp1 {
            background-color: rgba(121, 169, 197, .92) !important;
        }

        .bgc-default-l4,
        .bgc-h-default-l4:hover {
            background-color: #f3f8fa !important;
        }

        .page-header .page-tools {
            -ms-flex-item-align: end;
            align-self: flex-end;
        }

        .btn-light {
            color: #757984;
            background-color: #f5f6f9;
            border-color: #dddfe4;
        }

        .w-2 {
            width: 1rem;
        }

        .text-120 {
            font-size: 120% !important;
        }

        .text-primary-m1 {
            color: #4087d4 !important;
        }

        .text-danger-m1 {
            color: #dd4949 !important;
        }

        .text-blue-m2 {
            /* color: #68a3d5 !important; */
            color: #331391 !important;
        }

        .text-150 {
            font-size: 150% !important;
        }

        .text-60 {
            font-size: 60% !important;
        }

        .text-grey-m1 {
            color: #7b7d81 !important;
        }

        .align-bottom {
            vertical-align: bottom !important;
        }
        .stripe-button-el{
            display:none;
        }
    </style>
</head>

<body>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <div class="page-content container" style="max-width:70%" >


            {{-- $rand = (rand(10,100)); --}}


            <div class="page-header text-blue-d2" style="padding-top: 5.5rem">
                <h1 class="page-title text-secondary-d1">
                    Payemt
                    <small class="page-info" value="rand_id">
                        <i class="fa fa-angle-double-right text-80" ></i>
                        ID: {{ $payment->payment_no }}
                    </small>
                </h1>
            </div>
            <div class="container px-0">
                <div class="row mt-4">
                    <div class="col-12 col-lg-12 , max-width: 50%" >
                        <div class="row">
                            <div class="col-12">
                                <div class="text-center text-150" style="margin-bottom: 10px">
                                    <!-- <i class="fa fa-book fa-2x text-success-m2 mr-1"></i> -->
                                    <!-- <span class="text-default-d3">Evento</span> -->
                                    <a  href="{{ route('dashboard1') }}"><img src="{{ asset('homepagefrontend/assets/img/logo/logo.png') }}" alt=""></a>
                                </div>
                            </div>
                        </div>

                        <hr class="row brc-default-l1 mx-n1 mb-4" />
                        <div class="row">
                            <div class="col-sm-6">
                                <div>

                                    <span class="text-sm text-grey-m2 align-middle">Event Name : </span>
                                    <span class="text-600 text-110 text-darkblue align-middle"> {{ $payment->event->name }}</span>
                                </div>
                                <div class="text-grey-m2">

                                    <div class="my-1">Event Description : <b class="text-600"> {{ $payment->event->description }} </b></div>
                                    <div class="my-1">Event venue : <b class="text-600">  {{ $payment->event->address ."  ". $payment->event->city ."  ". $payment->event->state." - ". $payment->event->pincode }} </b></div>

                                </div>
                            </div>



                            <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                                <hr class="d-sm-none" />
                                <div class="text-grey-m2">
                                    <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                                        Ticket
                                    </div>
                                    <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">ID : {{ $payment->event->id }} </span> </div>
                                    <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Event Date : {{ date('d-m-Y l', strtotime($payment->event->date)) }}</span> </div>
                                    <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1" ></i> <span class="text-600 text-90" >Status: </span><a style="background-color: 4BB543; color:black; border-radius:10px; margin:5px; padding: 3px; font-weight:bold; background-color:#57851c">Success Payment</a></div>
                                </div>
                            </div>

                        </div>
                        <div class="mt-4">
                            <div class="row text-600 text-white  py-25" style="background-color: #331391;">
                                <div class="d-none d-sm-block col-1">#</div>
                                <div class="col-9 col-sm-5">User Name</div>
                                <div class="d-none d-sm-block col-4 col-sm-2">Qty</div>
                                <div class="d-none d-sm-block col-sm-2">Price</div>
                                <div class="col-2">Amount</div>
                            </div>
                            <div class="text-95 ">
                                {{-- {{ dd($data) }} --}}
                                <div class="row mb-2 mb-sm-0 py-25">
                                    <div class="d-none d-sm-block col-1">1</div>
                                    <div class="col-9 col-sm-5"> {{ auth()->user()->name }}</div>
                                        {{-- {{ dd($data['price']) }} --}}
                                    <div class="d-none d-sm-block col-2">{{ $payment->qnt }}</div>
                                    <div class="d-none d-sm-block col-2 text-95">{{ $payment->price }}</div>
                                    <div class="col-2">{{ $payment->payment_amount }}</div>
                                </div>
                            </div>
                            <div class="row border-b-2 brc-default-l2"></div>


                            <div class="row mt-3" >
                                <div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0">
                                    <!-- Payment Number :  <br> -->
                                    <!-- Payment Method :  <br> -->
                                </div>
                                <div class="col-12 col-sm-5 text-green text-90 order-first order-sm-last" style="margin-left:56%">
                                    <div class="row my-2">
                                        <div class="col-7 text-right">
                                            SubTotal
                                        </div>
                                        <div class="col-5">
                                            <span class="text-120 text-secondary-d1">Rs. {{ $payment->payment_amount }}</span>
                                        </div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col-7 text-right">
                                            Tax (0%)
                                        </div>
                                        <div class="col-5">
                                            <span class="text-110 text-secondary-d1">Rs. 0</span>
                                        </div>
                                    </div>
                                    <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                                        <div class="col-7 text-right">
                                            Total Amount
                                        </div>
                                        <div class="col-5">
                                            <span class="text-150 text-success-d3 opacity-2 text-secondary-d3" >Rs. {{ $payment->payment_amount }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr />
                            <div>
                                <!-- <span class="text-secondary-d1 text-105">Thank you for ticket booking.</span> -->
                                <div class="page-header text-blue-d2"  style="margin-right:5%";>
                                    <h1 class="page-title text-secondary-d2" style="margin-bottom:5%; color:4BB543;">
                                       Payment Success Download Your Ticket,,,
                                    </h1>
                                    <div class="page-tools">
                                        <div class="" href="#" data-title="Print" style="margin-bottom:20%;">
                                               <!-- <button style="height:45px; width:120px; font-weight: bold; border-radius:20%; font-size:20px; background-color:2DA94F;">
                                                    Pay Now
                                               </button> -->
                                               <button class="group relative h-12 w-48 overflow-hidden rounded-lg bg-white text-lg shadow" onclick="window.print()">
                                                        <div class="absolute inset-0 w-3 bg-amber-400 transition-all duration-[250ms] ease-out group-hover:w-full"></div>
                                                        <span class="relative text-black group-hover:text-white" style="font-weight: bold; font-size:20px;"><i class="fa fa-print" aria-hidden="true"></i> Print Ticket</span>
                                                </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">



</script>
</body>

</html>
