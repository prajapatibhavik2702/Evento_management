<x-organiser-layout>
    <x-slot name="title">Organiser - Payments</x-slot>

    <x-slot name='main'>
<body>


    <main class="dash-content">
        <div class="container-fluid">
            <h1 class="dash-title">Payments</h1>
            <!-- <div class="card spur-card"> -->
            <div class="" style="background: white; border:1px solid #d3d3d3">
                <div class="card-body ">
                    <table class="table table-hover table-in-card" style="text-align: center;">
                        <thead>
                            <tr>
                                <th scope="col">Payment Id</th>
                                <th scope="col">Payment Number</th>
                                <th scope="col">User Email</th>
                                <th scope="col">Event Name</th>
                                <th scope="col">Event Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Ticket Price</th>
                                <th scope="col">Method</th>
                                <th scope="col">Date / Time</th>
                                <th scope="col">status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payments as $payment)
                            <tr>

                                @php $userData =  App\models\User::where('id', $payment->user_id)->first() @endphp

                                <th scope="row">{{ $payment->id }}</th>
                                <td>{{ $payment->payment_no }}</td>
                                <td>{{ $userData->email }}</td>
                                <td>{{ $payment->event->name }}</td>
                                <td>{{ $payment->price }}</td>
                                <td>{{ $payment->qnt }}</td>
                                <td>{{ $payment->price*$payment->qnt }}</td>
                                <td>{{ $payment->payment_method }}</td>
                                <td>{{ date('d-m-Y l', strtotime($payment->created_at)) }}</td>
                                <td>{{ $payment->status }}</td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
    </main>
</body>
    </x-slot>
</x-organiser-layout>
