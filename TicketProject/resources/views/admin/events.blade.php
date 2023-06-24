<x-admin-layout>
    <x-slot name="title">Admin - Events</x-slot>

    <x-slot name='main'>
        <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>

    <main class="dash-content">
        {{-- status view file success,, --}}
            @if (Session::has('success'))
                <div id="successMessage" class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif
        {{-- eroro danger deleted --}}
            @if (Session::has('message'))
                <div id="successMessage" class="alert alert-danger">
                    {{ Session::get('message') }}
                </div>
            @endif
        {{-- error validation --}}
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
        <div class="container-fluid">
            <h1 class="dash-title">Events Created By You</h1>
            <p><a href="{{ route('admin.events.create') }}" class="btn btn-success"> + Add New Event</a></p>
            <!-- <div class="card spur-card"> -->
            <div class="" style="background: white; border:1px solid #d3d3d3">
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
                                <th scope="col">State</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                                {{-- data fatch  --}}
                                @foreach ($events as $event)
                                    <tr>
                                        <th scope="row">{{ $event->id }}</th>
                                        <td><img src="{{ asset('storage/admin/event/'.$event->image) }}" width="90" height="100" alt="Event Image" /></td>
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
                                            @foreach($event->speaker as $sp)    {{-- event speaker findout  --}}
                                                {{ $sp->name }}
                                            @endforeach
                                        </td>
                                        <td>{{ $event->address }}</td>
                                        <td>{{ $event->city }}</td>
                                        <td>{{ $event->state }}</td>
                                    <td>

                                        <form action="{{ route('admin.events.edit',$event->id) }}" style="margin-bottom: 5px;">
                                            @csrf
                                            @method('GET')
                                            {{-- Update event button--}}
                                            <button class="group relative h-12 w-48 overflow-hidden rounded-lg bg-white text-lg shadow"  type='submit' name='update' style="font-weight: bold;" class='form-control btn btn-success'>
                                                <div class="absolute inset-0 w-3 bg-green-600 transition-all duration-[250ms] ease-out group-hover:w-full"></div>
                                                <span class="relative text-black group-hover:text-white">Update</span>

                                            </form>

                                        <form action="{{ route('admin.events.destroy',$event->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            {{-- Delete Event --}}
                                            <button class="group relative h-12 w-48 overflow-hidden rounded-lg bg-white text-lg shadow" type='submit' name='delete' style="font-weight: bold;" class='form-control btn btn-danger' onclick="return confirm('Are you sure? You want to delete?')">
                                                <div class="absolute inset-0 w-3 bg-red-600 transition-all duration-[250ms] ease-out group-hover:w-full"></div>
                                                <span class="relative text-black group-hover:text-white">Delete</span>

                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    </main>
    <main class="dash-content">
        <div class="container-fluid">
            <h1 class="dash-title">All Events</h1>
            <!-- <div class="card spur-card"> -->
            <div class="" style="background: white; border:1px solid #d3d3d3">
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
                                <th scope="col">Org Email</th>
                                <th scope="col">Speaker Name</th>
                                <th scope="col">Address</th>
                                <th scope="col">City</th>
                                <th scope="col">State</th>
                            </tr>
                        </thead>
                        <tbody>
                                    {{-- data fatch  --}}
                                    @foreach ($orgevent as $event)
                                    {{-- organiser details use to id  --}}
                                    @php
                                        $organisers = App\models\Organiser::where('id',$event->eventable->id)->first();
                                    @endphp
                                      <tr>
                                          <th scope="row">{{ $event->id }}</th>
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
                                          <td>{{ $organisers->email }}</td>
                                          <td>
                                                @foreach($event->speaker as $sp)  {{-- speaker name find out --}}
                                                    {{ $sp->name }}
                                                @endforeach
                                            </td>
                                          <td>{{ $event->address }}</td>
                                          <td>{{ $event->city }}</td>
                                          <td>{{ $event->state }}</td>
                                      <td>
                                    </td>
                                  </tr>
                              @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
    </main>
    </x-slot>
</x-admin-layout>
