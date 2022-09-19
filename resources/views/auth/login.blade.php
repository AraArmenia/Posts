@extends('layouts.app')

@section('content')

   
    <div class="flex justify-center  mx-auto">
        <div class="bg-white p-6" style="margin: 0px auto; width:500px">
            @if (session("status"))
                <p class="my-2">{{session("status")}}</p>
            @endif

            <form action="{{route('login')}}" method="post">
                {{ csrf_field() }}
                {{-- @csrf --}}


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
                    <input type="checkbox" name="remember" id="remember"> 
                    <label for="remember">Remember Me</label>
                </div>

                <div class="mb-4">
                    <button type="submit" class="w-full bg-blue-500 text-white px-4 py-3 rounded">Submit</button>
                </div>

            </form>
        </div>
    </div>

    
@endsection