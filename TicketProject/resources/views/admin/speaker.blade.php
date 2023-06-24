<x-admin-layout>
    <x-slot name="title">Admin - Speaker</x-slot>

    <x-slot name='main'>
        <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>

    <main class="dash-content">
                {{-- status view file success,, --}}
                @if (Session::has('success'))
                <div id="successMessage" class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif

            @if (Session::has('message'))
            <div id="successMessage" class="alert alert-danger">
                {{ Session::get('message') }}
            </div>
        @endif
            {{-- error validation --}}
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            {{-- view file contener --}}
        <div class="container-fluid">
            <h1 class="dash-title">Speakers</h1>
            <p><a href="{{ route('admin.speaker.create') }}" class="btn btn-success"> + Add New Speaker</a></p>
            <div class="card spur-card">
                <div class="card-body ">
                    <table class="table table-hover table-in-card" style="text-align: center;">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($speakers as $speaker)
                                <tr>
                                    <th scope="row">{{ $speaker->id }}</th>
                                    <td><img src="{{ asset('storage/admin/speaker/'.$speaker->image) }}"  width="90" height="100" /></td>
                                    <td>{{ $speaker->name }}</td>
                                    <td>{{ $speaker->description }}</td>
                                    <td>

                                        <form action="{{ route('admin.speaker.edit',$speaker->id)}}" method="GET" style="margin-bottom: 5px;">
                                            <!-- <button type='submit' name='update' class='form-control btn btn-success'>Update</button> -->
                                            @csrf

                                            <button class="group relative h-12 w-48 overflow-hidden rounded-lg bg-white text-lg shadow" type='submit' name='update' class='form-control btn btn-success' style="font-weight: bold;">
                                                <div class="absolute inset-0 w-3 bg-green-600 transition-all duration-[250ms] ease-out group-hover:w-full"></div>
                                                <span class="relative text-black group-hover:text-white">Update</span>
                                            </button>

                                        </form>

                                        <form action="{{ route('admin.speaker.destroy',$speaker->id)}}" method="post">
                                            <!-- <button type='submit' name='delete' class='form-control btn btn-danger' onclick="return confirm('Are you sure? You want to delete?')">Delete</button> -->
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
    </main>

    <main class="dash-content">
        <div class="container-fluid">
            <h1 class="dash-title">All Speakers</h1>
            <!-- <div class="card spur-card"> -->
            <div class="" style="background: white; border:1px solid #d3d3d3">
                <div class="card-body ">
                    <table class="table table-hover table-in-card" style="text-align: center;">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Organiser Name</th>
                                <th scope="col">Organiser Email</th>
                                <th scope="col">Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $speakers = App\models\Organiser::where('id',$speaker->speakerable_id)->first();
                            @endphp
                            @foreach ($orgspeaker as $speaker)

                                <tr>
                                    <th scope="row">{{ $speaker->id }}</th>
                                    <td><img src="{{ asset('storage/organiser/speaker/'.$speaker->image) }}"  width="90" height="100" /></td>
                                    <td>{{ $speaker->name }}</td>
                                    <td>{{ $speakers->name }}</td>
                                    <td>{{ $speakers->email }}</td>
                                    <td>{{ $speaker->description }}</td>



                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    </main>
    </x-slot>
</x-admin-layout>
