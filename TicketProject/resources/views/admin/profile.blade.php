<x-admin-layout>
    <x-slot name="title">Admin - Profile</x-slot>

    <x-slot name='main'>
    <div class="container m-t-20">
        {{-- status profile update --}}
        @if(session('message'))
            <div class="alert alert-success" id="successMessage">{{ session('message') }}</div>
        @endif
        {{-- validation error data store --}}
        @if(session('error'))
            <div class="alert alert-danger" id="successMessage">{{ session('error') }}</div>
        @endif
        {{-- view code body --}}



        <div class="wrap-login100 p-l-40 p-r-40 p-t-40 p-b-40" style="margin-left: 12%; width: 750px">
            <form class="login100-form validate-form flex-sb flex-w" action="{{ route('admin.profile.update') }}" method="post">
                @csrf
                <span class="login100-form-title p-b-30">
                    Edit Your Details
                </span>

                <div class="wrap-input100 validate-input m-b-30" data-validate="Name is required">
                    <input class="input100" type="text" name="name" placeholder="Your Name" value="{{ $admin->name}}">
                    <span class="focus-input100"></span>
                    {{-- error message validation  --}}
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>

                <div class="wrap-input100 validate-input m-b-30" data-validate="Email is required">
                    <input class="input100" type="text" name="email" placeholder="Your Email" value="{{ $admin->email}}">
                    <span class="focus-input100"></span>
                    {{-- error message validation  --}}
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>

                <div class="wrap-input100 m-b-30" >
                    <input class="input100" type="password" name="crpassword" placeholder="Current Password">
                    <span class="focus-input100"></span>
                    {{-- error message validation  --}}
                        @error('crpassword')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>

                <div class="wrap-input100 m-b-30">
                    <input class="input100" type="password" name="newpassword" placeholder="New Password">
                    <span class="focus-input100"></span>
                    {{-- error message validation  --}}
                        @error('newpassword')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>

                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn">
                        Save Your Details
                    </button>
                </div>
            </form>
        </div>
    </div>

    </x-slot>
</x-admin-layout>
