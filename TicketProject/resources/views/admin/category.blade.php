<x-admin-layout>
    <x-slot name="title">Admin - Category</x-slot>

    <x-slot name='main'>
        <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>

    <main class="dash-content">
        <div class="container m-t-20">
            {{-- validation data succces store  --}}
                @if (Session::has('success'))
                    <div id="successMessage" class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif
            {{-- data validated error --}}
                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif


        {{-- body part addorganiser --}}
        <div class="container-fluid">
            <b><h1 class="dash-title" style="color: black">Categories</h1></b>
            <p><a href="{{ route('admin.category.create') }}" class="btn btn-success"> + Add New Category</a></p>

            <div class="card spur-card">
                <div class="card-body ">
                    <table class="table table-hover table-in-card" style="text-align: center;">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- data fatch category --}}
                            @foreach ($categorys as $category)
                                <tr>
                                    <th scope="row">{{ $category->id }}</th>
                                    <td><img src="{{ asset('storage/admin/category/'.$category->image) }}" width="100" height="100" alt="Category Image" /></td>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        {{-- update category --}}
                                        <form action="{{ route('admin.category.edit',$category->id) }}" method="GET" style="margin-bottom: 5px;">
                                            @csrf
                                            <button class="group relative h-12 w-48 overflow-hidden rounded-lg bg-white text-lg shadow" type='submit' name='update' class='form-control btn btn-success' style="font-weight: bold;">
                                                <div class="absolute inset-0 w-3 bg-green-600 transition-all duration-[250ms] ease-out group-hover:w-full"></div>
                                                <span class="relative text-black group-hover:text-white">Update</span>
                                            </button>
                                        </form>
                                        {{-- deleted category --}}
                                        <form action="{{ route('admin.category.destroy',$category->id) }}" method="post">
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
    </x-slot>
</x-admin-layout>
