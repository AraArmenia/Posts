@extends('layouts.app')

@section('content')

   
    <div class="flex justify-center  mx-auto">
        <div class="bg-white p-6" style="margin: 0px auto; width:500px">
        <form action="{{route('register')}}" method="post">
                {{ csrf_field() }}
                {{-- @csrf --}}

                <div class="mb-4">
                    <label for="name" class="sr-only">Name</label>
                    <input type="text" name="name" id="name" placeholder="Name" class="bg-gray-100 border-2 w-full p-4 rounded-lg  @error('name') border-red-500 @enderror " value="{{old("name")}}"> 

                    @error('name')
                        <div class="text-red-500 mt-2 text-sm">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="username" class="sr-only">Username</label>
                    <input type="text" name="username" id="username" placeholder="Username" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('username') border-red-500 @enderror" value="{{old("username")}}"> 

                    @error('username')
                        <div class="text-red-500 mt-2 text-sm">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" name="email" id="email" placeholder="Email" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email') border-red-500 @enderror" value="{{old("email")}}"> 

                    @error('email')
                        <div class="text-red-500 mt-2 text-sm">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" placeholder="Password" class="bg-gray-100 border-2 w-full p-4 rounded-lg  @error('password') border-red-500 @enderror"> 

                    @error('password')
                        <div class="text-red-500 mt-2 text-sm">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="sr-only">Repeat Password</label>
                    <input type="password" name="password_confirmation" id="password_repeat" placeholder="Repeat Password" class="bg-gray-100 border-2 w-full p-4 rounded-lg ">
                    

                </div>

                <div class="mb-4">
                    <button type="submit" class="w-full bg-blue-500 text-white px-4 py-3 rounded">Submit</button>
                </div>

            </form>
        </div>
    </div>

    
@endsection