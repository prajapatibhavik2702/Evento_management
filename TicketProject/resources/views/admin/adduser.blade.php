<x-admin-layout>
    <x-slot name="title">Admin - AddUsers</x-slot>

    <x-slot name='main'>
    <div class="container m-t-20">
        {{-- condition success data code--}}
            @if (Session::has('success'))
                <div id="successMessage" class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif
        {{-- data validation code error --}}
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

        {{-- Add user body code format --}}
        <div class="wrap-login100 p-l-40 p-r-40 p-t-40 p-b-40" style="margin-left: 25%">
            <form class="login100-form validate-form flex-sb flex-w" action="{{ route('admin.users.store') }}" method="post">
                @csrf
                <span class="login100-form-title p-b-30">
                     Add User
                </span>
                <div class="form_group" style="width: 100%;">

                <div class="wrap-input100 validate-input m-b-30" data-validate="Name is required">
                    <input class="input100" type="text" name="name" placeholder="User Name" value="{{ old('name') }}">
                    <span class="focus-input100"></span>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>

                <div class="wrap-input100 validate-input m-b-30" data-validate="Email is required">
                    <input class="input100" type="text" name="email" placeholder="User Email">
                    <span class="focus-input100"></span>
                        @error('email')
                             <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>

                <div class="wrap-input100 validate-input m-b-30" data-validate="Phone Number is required">
                    <input class="input100" type="text" name="mobilenumber" placeholder="User Phone Number">
                    <span class="focus-input100"></span>
                        @error('mobilenumber')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>

                <div class="wrap-input100 validate-input m-b-30" data-validate="Password is required">
                    <input class="input100" type="password" name="password" placeholder="User Password">
                    <span class="focus-input100"></span>
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>

                <div class="wrap-input100 validate-input m-b-30" data-validate="Password is required">
                    <input class="input100" type="password" name="password_confirmation" placeholder="Repeat Password">
                    <span class="focus-input100"></span>
                        @error('password_confirmation')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>

                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn">
                        Add New User
                    </button>
                </div>
            </form>
        </div>
    </div>
    </x-slot>
</x-admin-layout>
