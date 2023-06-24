<x-admin-layout>
    <x-slot name="title">Admin - AddOrganiser</x-slot>

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
            <form class="login100-form validate-form flex-sb flex-w" action="{{ route('admin.organiser.store') }}" method="post">
                    @csrf
                    <span class="login100-form-title p-b-30">
                        Add Organiser
                    </span>

                <div class="wrap-input100 validate-input m-b-30" data-validate="Name is required">
                    <input class="input100" type="text" name="name" placeholder="Organisation Name" value="{{ old('name') }}">
                    <span class="focus-input100"></span>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>

                <div class="wrap-input100 validate-input m-b-30" data-validate="Email is required">
                    <input class="input100" type="text" name="email" placeholder="Organisation Email" value="{{ old('email') }}">
                    <span class="focus-input100"></span>
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>

                <div class="wrap-input100 validate-input m-b-30" data-validate="Phone Number is required">
                    <input class="input100" type="text" name="number" placeholder="Phone Number"value="{{ old('number') }}">
                    <span class="focus-input100"></span>
                        @error('number')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>

                <div class="wrap-input100 validate-input m-b-30 p-t-10" data-validate="Description is required">
                    <textarea class="input100" type="text" rows="4" cols="50" name="description" placeholder="Describe Your Organisation" value="{{ old('description') }}"></textarea>
                    <span class="focus-input100"></span>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>

                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn">
                        Add Organiser & <br> Send Password Via Email
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div id="dropDownSelect1"></div>
    </x-slot>
</x-admin-layout>
