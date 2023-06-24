<x-admin-layout>
    <x-slot name="title">Admin - UpdateCategory</x-slot>

    <x-slot name='main'>

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
        <div class="wrap-login100 p-l-40 p-r-40 p-t-40 p-b-40" style="margin-left: 25%">
            <form class="login100-form validate-form flex-sb flex-w" action="{{ route('admin.category.update',$categorys->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <span class="login100-form-title p-b-30">
                    Update Category
                </span>

                <div class="wrap-input100 validate-input m-b-30" data-validate="Category is required">
                    <input class="input100" type="text" name="name" placeholder="Category Name" value="{{ $categorys->name }}">
                    <span class="focus-input100"></span>
                    {{-- error validation --}}
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>

                <div class="wrap-input100 m-b-30">
                    <div class="input100 m-t-10" style="color:black">Category Image</div>
                    <input class="input100 m-t-10" type="file" name="image">
                    <span class=" focus-input100"></span>
                    {{-- error validation --}}
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>

                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn" name="submit">
                        Update New Category
                    </button>
                </div>
            </form>
        </div>
    </div>
    </x-slot>
</x-admin-layout>
