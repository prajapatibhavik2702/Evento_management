<x-admin-layout>
    <x-slot name="title">Admin - USers</x-slot>

    <x-slot name='main'>
        <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>

    <main class="dash-content">
        <div class="container-fluid">

            {{-- condition success --}}
            @if (Session::has('success'))
                <div id="successMessage" class="alert alert-danger">
                     {{ Session::get('success') }}
                </div>
            @endif

            {{-- condition validation error --}}
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <h1 class="dash-title">Users</h1>
            <p><a href="{{ route('admin.users.create') }}" class="btn btn-success"> + Add New User</a></p>

            <div class="card spur-card">
                <div class="card-body ">
                    <table class="table table-hover table-in-card" style="text-align: center;">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)   {{-- data fatching variable --}}
                                <tr>
                                    <th scope="row">{{ $user->id }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->mobilenumber }}</td>
                                    <td>
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="post" >
                                            @csrf
                                            @method('DELETE')

                                            <button class="group relative h-12 w-48 overflow-hidden rounded-lg bg-white text-lg shadow" type='submit' name='reject' style="font-weight: bold;" class='form-control btn btn-danger' onclick="return confirm('Are you sure? You want to delete?')">
                                                <div class="absolute inset-0 w-3 bg-red-400 transition-all duration-[250ms] ease-out group-hover:w-full"></div>
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
    </x-slot>
</x-admin-layout>
