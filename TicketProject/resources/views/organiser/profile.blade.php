<x-organiser-layout>
    <x-slot name="title">Organiser - Profile</x-slot>

    <x-slot name='main'>
<body>
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
            <form class="login100-form validate-form flex-sb flex-w" action="{{ route('organiser.organiserdetails.update',$organiser->id) }}" method="post">
                @csrf
                @method('PUT')
                <span class="login100-form-title p-b-30">
                    Edit Your Details
                </span>

                <input type="hidden" name="orgid" value="">

                <div class="wrap-input100 validate-input m-b-30" data-validate="Name is required">
                    <input class="input100" type="text" name="name" placeholder="Your Name" value="{{ $organiser->name }}">
                    <span class="focus-input100"></span>
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                </div>

                <div class="wrap-input100 validate-input m-b-30" data-validate="Email is required">
                    <input class="input100" type="text" name="email" placeholder="Your Email" value="{{ $organiser->email }}">
                    <span class="focus-input100"></span>
                    @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                </div>

                <div class="wrap-input100 validate-input m-b-30" data-validate="Phone Number is required">
                    <input class="input100" type="text" name="number" placeholder="Your Phone Number" value="{{ $organiser->number }}">
                    <span class="focus-input100"></span>
                    @error('number')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                </div>

                <div class="wrap-input100 validate-input m-b-30 p-t-10" data-validate="Description is required">
                    <textarea class="input100" type="text" rows="10" cols="50" name="description" placeholder="Describe Your Organisation">{{ $organiser->description }}</textarea>
                    <span class="focus-input100"></span>
                    @error('description')
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

    <!-- <div id="dropDownSelect1"></div> -->
</body>
    </x-slot>
</x-organiser-layout>
