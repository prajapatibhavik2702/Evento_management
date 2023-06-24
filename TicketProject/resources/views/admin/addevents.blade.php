<x-admin-layout>
    <x-slot name="title">Admin - AddEvents</x-slot>

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
        <div class="wrap-login101 p-l-40 p-r-40 p-t-40 p-b-40" style="margin-left: 15px">
            <form class="login100-form validate-form flex-sb flex-w" action="{{ route('admin.events.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('POST')

                <span class="login100-form-title p-b-30">
                    Create Event
                </span>
                <div class="wrap-input101 m-b-30" >
                    <div class="input101 m-t-10" style="color:black">Event Name</div>
                    <input class="input101" type="text" name="name" placeholder="Enter Here"  value="{{ old('name') }}">
                    <span class="focus-input101"></span>
                    {{-- error validation --}}
                    @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>

                <div class="wrap-input101 m-b-30"  default>
                    <div class="input101 m-t-10" style="color:black">Event Category</div>
                    <select name="category" id="category" class="input101" >
                        <option value="" selected disabled hidden>Choose Here</option>
                            @foreach ($categorys as $category)
                                <option value="{{ $category->name }}">{{ $category->name }}</option>
                            @endforeach
                    </select>
                    <span class="focus-input101"></span>
                    {{-- error validation --}}
                            @error('category')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                </div>

                <div class="wrap-input100 m-b-30 p-t-10" >
                    <div class="input101 m-t-10" style="color:black">Event Description</div>
                    <textarea class="input100" type="text" rows="25" cols="50" name="description" placeholder="Tell Us Something More About Event">{{ old('description') }}</textarea>
                    <span class="focus-input100"></span>
                    {{-- error validation --}}
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>

                <div class="wrap-input101 m-b-30" >
                    <div class="input101 m-t-10" style="color:black">Event Date</div>
                    <input class="input101" type="text" name="date" placeholder="dd-mm-yyyy " onfocus="(this.type='date')"  value="{{ old('date') }}">
                    <span class="focus-input101"></span>
                    {{-- error validation --}}
                        @error('date')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>

                <div class="wrap-input101 m-b-30">
                    <div class="input101 m-t-10" style="color:black">Event Image</div>
                    <input class="input101 m-t-10" type="file" name="image" placeholder="Event Image" value="{{ old('image') }}">
                    <span class=" focus-input101"></span>
                    {{-- error validation --}}
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>

                <div class="wrap-input101 m-b-30">
                    <div class="input101 m-t-10" style="color:black">Event Start Time</div>
                    <input class="input101" type="text" name="start_time" placeholder="hh:mm am/pm" onfocus="(this.type='time')"  value="{{ old('start_time') }}">
                    <span class="focus-input101"></span>
                    {{-- error validation --}}
                        @error('start_time')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>

                <div class="wrap-input101 m-b-30">
                    <div class="input101 m-t-10" style="color:black">Event End Time</div>
                    <input class="input101" type="text" name="end_time" placeholder="hh:mm am/pm" onfocus="(this.type='time')"  value="{{ old('end_time') }}">
                    <span class="focus-input101"></span>
                    {{-- error validation --}}
                        @error('end_time')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>

                <div class="wrap-input101 m-b-30">
                    <div class="input101 m-t-10" style="color:black">Event Total Ticket To Sell</div>
                    <input class="input101" type="number" name="total_ticket" placeholder="Enter Here"  value="{{ old('total_ticket') }}">
                    <span class="focus-input101"></span>
                    {{-- error validation --}}
                        @error('total_ticket')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>

                <div class="wrap-input101 m-b-30" >
                    <div class="input101 m-t-10" style="color:black">Event Price Per Ticket</div>
                    <input class="input101" type="number" name="price" placeholder="Enter Here"  value="{{ old('price') }}">
                    <span class="focus-input101"></span>
                    {{-- error validation --}}
                        @error('price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>

                <div class="wrap-input101 m-b-30" >
                    <div class="input101 m-t-10" style="color:black">Event Address</div>
                    <input class="input101" type="text" name="address" placeholder="Enter Here"  value="{{ old('address') }}">
                    <span class="focus-input101"></span>
                    {{-- error validation --}}
                        @error('address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>

                <div class="wrap-input101 m-b-30">
                    <div class="input101 m-t-10" style="color:black">Event Pin Code</div>
                    <input class="input101" type="text" name="pincode" placeholder="Enter Here"  value="{{ old('pincode') }}">
                    <span class="focus-input101"></span>
                    {{-- error validation --}}
                        @error('pincode')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>

                <div class="wrap-input101 m-b-30" >
                    <div class="input101 m-t-10" style="color:black">Event City</div>
                    <input class="input101" type="text" name="city" placeholder="Enter Here"  value="{{ old('city') }}">
                    <span class="focus-input101"></span>
                    {{-- error validation --}}
                        @error('city')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>

                <div class="wrap-input101 m-b-30" >
                    <div class="input101 m-t-10" style="color:black">Event State</div>
                    <input class="input101" type="text" name="state" placeholder="Enter Here"  value="{{ old('state') }}">
                    <span class="focus-input101"></span>
                    {{-- error validation --}}
                        @error('state')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>

                <div class="wrap-input100 m-b-30">
                    <div class="input100 m-t-10" style="color:black">Event Speaker
                        <a href="{{ route('admin.speaker.create') }}" class="btn"> + Add New Speaker</a>
                    </div>

                        @foreach ($speakers as $speaker)
                        <div class="form-check input100 checkbox-lg m-l-25 m-t-5">
                            <input class="form-check-input" type="checkbox" value="{{ $speaker->id }}" id="flexCheckDefault" name="speaker[]" style="scale:1.5;">
                            <label class="form-check-label" for="flexCheckDefault">
                                {{ $speaker->name }}
                            </label>
                        </div>
                        @endforeach
                </div>
                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn" name="submit">
                        Create Event
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-slot>
</x-admin-layout>
