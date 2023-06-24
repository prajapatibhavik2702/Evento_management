<x-admin-layout>
    <x-slot name="title">Admin - Organiser</x-slot>

    <x-slot name='main'>
        <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>

    <!-- <button style='width: 160px; border:2px solid black;font-size: 10px; background-color: rgb(51,19,145);'><a style='color: white; ' href='http://localhost/Event-Master/View/LoginPage/org-login.php?email=$email'>
            <h3>Login Here</h3>
        </a></button> -->

    <main class="dash-content">
        {{-- status view file success,, --}}
        @if (Session::has('success'))
            <div id="successMessage" class="alert alert-danger">
                {{ Session::get('success') }}
            </div>
        @endif
        @if (Session::has('message'))
        <div id="successMessage" class="alert alert-success">
            {{ Session::get('message') }}
        </div>
    @endif
        {{-- error validation --}}
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        {{-- view file contener --}}
        <div class="container-fluid">
            <h1 class="dash-title">Organisers Login Requests</h1>
            <p><a href="{{ route('admin.organiser.create') }}" class="btn btn-success"> + Add New Organiser</a></p>
            <div class="card spur-card">
                <div class="card-body ">
                    <table class="table table-hover table-in-card" style="text-align: center;">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Description</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- data store one variable fatching --}}
                            @foreach ($organisers as $organiser)
                                <tr>
                                    <th scope="row">{{ $organiser->id }}</th>
                                    <td>{{ $organiser->name }}</td>
                                    <td>{{ $organiser->email }}</td>
                                    <td>{{ $organiser->number }}</td>
                                    <td>{{ $organiser->description }}</td>
                                    <td>{{ $organiser->status}}</td>
                                    <td>
                                        {{-- status allow code --}}
                                        @if ( $organiser->status == 'inactive')
                                            <form action="{{ route('admin.organiser.update',$organiser->id) }}" method="post" style="margin-bottom: 5px;">
                                                @csrf
                                                @method('put')
                                                <button class="group relative h-12 w-48 overflow-hidden rounded-lg bg-white text-lg shadow" type="hidden" name="org_email" value="" class='form-control btn btn-danger' onclick="return confirm('Are you sure? You want to Alllow?')">
                                                    <div class="absolute inset-0 w-3 bg-green-600 transition-all duration-[250ms] ease-out group-hover:w-full"></div>
                                                    <span class="relative text-black group-hover:text-white">Allow</span>
                                                </button>
                                            </form>

                                        @else
                                        {{-- status reject code --}}
                                            <form action="{{ route('admin.organiser.destroy',$organiser->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')

                                                <button class="group relative h-12 w-48 overflow-hidden rounded-lg bg-white text-lg shadow" type='submit' name='reject' style="font-weight: bold;" class='form-control btn btn-danger' onclick="return confirm('Are you sure? You want to reject?')">
                                                    <div class="absolute inset-0 w-3 bg-red-600 transition-all duration-[250ms] ease-out group-hover:w-full"></div>
                                                    <span class="relative text-black group-hover:text-white">Reject</span>
                                                </button>
                                            </form>
                                        @endif
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
