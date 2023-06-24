<x-admin-layout>
    <x-slot name="title">Admin - AddSpeaker</x-slot>

    <x-slot name='main'>

    <div class="container m-t-20">
         {{-- status view file success,, --}}
         @if (Session::has('success'))
         <div id="successMessage" class="alert alert-success">
             {{ Session::get('success') }}
         </div>
     @endif
     {{-- error validation --}}
     @if(session('error'))
         <div class="alert alert-danger">{{ session('error') }}</div>
     @endif
     {{-- view file contener --}}
        <div class="wrap-login100 p-l-40 p-r-40 p-t-40 p-b-40" style="margin-left: 25%">
            <form class="login100-form validate-form flex-sb flex-w" action="{{ route('admin.speaker.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('post')
                <span class="login100-form-title p-b-30">
                    Add Speaker
                </span>

                <div class="wrap-input100 validate-input m-b-30" data-validate="Name is required">
                    <input class="input100" type="text" name="name" placeholder="Speaker Name" value="{{ old('name') }}">
                    <span class="focus-input100"></span>
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>

                <div class="wrap-input100 validate-input m-b-30" data-validate="Description is required">
                    <input class="input100" type="text" name="description" placeholder="Speaker Description" value="{{ old('description') }}">
                    <span class="focus-input100"></span>
                    @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>

                <div class="wrap-input100 m-b-30">
                    <div class="input100 m-t-10" style="color:black">Speaker Image</div>
                    <input class="input100 m-t-10" type="file" name="image">
                    <span class=" focus-input100"></span>
                    @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>

                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn" name="submit">
                        Add New Speaker
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div id="dropDownSelect1"></div>

    </x-slot>
</x-admin-layout>
