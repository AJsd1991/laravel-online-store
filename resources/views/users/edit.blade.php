<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Edit') }}
            </h2>
            <a href="{{ route('dashboard') }}">
                <button class="btn btn-primary">Back</button>
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="mb-6 space-y-6">
                @if($errors->any)
                @foreach ($errors->all() as $error)
                <div class="alert alert-error">
                    <div class="flex-1">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="w-6 h-6 mx-2 stroke-current">    
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"></path>                      
                      </svg> 
                      <label>{{ $error }}</label>
                    </div>
                </div>
                @endforeach
                @endif
            </div>


            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <form action="{{ route('users.update', $user) }}" method="POST">
                    @csrf
                    @method('patch')
                    <div class="p-6 space-y-8">
                        <div class="form-control">
                            <label class="label" for="title">
                                <span class="label-text">Name</span>
                            </label>
                            <input type="text" name="name" id="title" placeholder="Name" class="input input-bordered" value="{{ old('name', $user->name) }}">
                        </div>
                        <div class="form-control">
                            <label class="label" for="title">
                                <span class="label-text">Email</span>
                            </label>
                            <input type="text" name="email" id="title" placeholder="Email" class="input input-bordered" value="{{ old('email', $user->email) }}">
                        </div>
                        <div class="form-control">
                            <label class="label" for="title">
                                <span class="label-text">Phone Number</span>
                            </label>
                            <input type="text" name="phone_number" id="title" placeholder="Phone Number" class="input input-bordered" value="{{ old('phone_number', $user->phone_number) }}">
                        </div>
                        <div class="form-control">
                            <label class="label" for="title">
                                <span class="label-text">Address</span>
                            </label>
                            <input type="text" name="address" id="title" placeholder="Address" class="input input-bordered" value="{{ old('address', $user->address) }}">
                        </div>
                        <button type="submit" class="w-full btn btn-lg">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
