<x-organiser-layout>
    <x-slot name="title">Organiser - Event</x-slot>

    <x-slot name='main'>
<body>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>

    <main class="dash-content">
        <div class="container m-t-20">
            {{-- status view file success,, --}}
                @if (Session::has('success'))
                    <div id="successMessage" class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
        @endif
        {{-- deleted danger error --}}
            @if (Session::has('message'))
                <div id="successMessage" class="alert alert-danger">
                    {{ Session::get('message') }}
                </div>
        @endif

        {{-- body part --}}
        <div class="container-fluid">
            <h1 class="dash-title">Events</h1>
            <p><a href="{{ route('organiser.events.create') }}" class="btn btn-success" > + Add New Event</a></p>

            <!-- <div class="card spur-card"> -->
                <div class="" style="background: white; border:1px solid #d3d3d3; width:max-content">
                <div class="card-body ">
                    <table class="table table-hover table-in-card" style="text-align: center;">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Category</th>
                                <th scope="col">Date</th>
                                <th scope="col">Start Time</th>
                                <th scope="col">End Time</th>
                                <th scope="col">Available Ticket</th>
                                <th scope="col">Total Ticket</th>
                                <th scope="col">Price</th>
                                <th scope="col">Speaker Name</th>
                                <th scope="col">Address</th>
                                <th scope="col">City</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($events as $event)
                            {{-- @php
                            $speaker = App\models\Speaker::where('id',$event->eventable_id)->first();
                        @endphp --}}
                                <tr>
                                    <th scope="row">  {{ $event->id }} </th>
                                    <td><img src="{{ asset('storage/organiser/event/'.$event->image) }}" width="90" height="100" alt="Event Image" /></td>
                                    <td>{{ $event->name }}</td>
                                    <td>{{ $event->description }}</td>
                                    <td>{{ $event->category }}</td>
                                    <td>{{ $event->date }}</td>
                                    <td>{{ $event->start_time }}</td>
                                    <td>{{ $event->end_time }}</td>
                                    <td>{{ $event->available_ticket }}</td>
                                    <td>{{ $event->total_ticket }}</td>
                                    <td>{{ $event->price }}</td>
                                    <td>
                                        @foreach($event->speaker as $sp)
                                        {{ $sp->name }}
                                        @endforeach
                                    </td>
                                    <td>{{ $event->address }}</td>
                                    <td>{{ $event->city }}</td>
                                    <td>{{ $event->state }}</td>
                                    <td>

                                        <form action="{{ route('organiser.events.edit',$event->id) }}" method="post" style="margin-bottom: 5px;">
                                            @method('get')
                                            @csrf
                                            <button class="group relative h-12 w-48 overflow-hidden rounded-lg bg-white text-lg shadow" type='submit' name='update' class='form-control btn btn-success' style="font-weight: bold;">
                                                <div class="absolute inset-0 w-3 bg-green-600 transition-all duration-[250ms] ease-out group-hover:w-full"></div>
                                                <span class="relative text-black group-hover:text-white">Update</span>
                                            </button>

                                        </form>

                                        <form action="{{ route('organiser.events.destroy',$event->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="group relative h-12 w-48 overflow-hidden rounded-lg bg-white text-lg shadow" type='submit' name='delete' class='form-control btn btn-danger' onclick="return confirm('Are you sure? You want to delete?')" style="font-weight: bold;">
                                                <div class="absolute inset-0 w-3 bg-red-600 transition-all duration-[250ms] ease-out group-hover:w-full"></div>
                                                <span class="relative text-black group-hover:text-white">Delete</span>
                                            </button>

                                        </form>

                                    </td>

                                </tr>

                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </main>
</body>
    </x-slot>
</x-organiser-layout>
