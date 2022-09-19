@extends('layouts.app')

@section('content')
    
    <div class="flex justify-center mx-auto">
        <div class="bg-white p-6 w-8/12 rounded-lg">
            Posts

            {{-- @if ($errors->any())
                <div>
                    
                    @foreach ($errors->all() as $error)
                        <p class="text-red-500">{{ $error }}</p>
                    @endforeach
                
                </div>
            @endif --}}


            @auth
                <form action="{{route("posts")}}" method="post">
                    {{csrf_field()}}
                    <div class="my-4">
                        <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror" placeholder="Post something!"></textarea>

                        @error('body')
                            <div class="text-red-500 mt-2 text-sm">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <button type="submit" class=" bg-blue-500 text-white px-4 py-2 rounded">Post</button>
                    </div>
                
                </form>
            @endauth
            

            @if ($posts->count())
                @foreach ($posts as $post)
                    <x-post :post="$post" />
                    
                @endforeach

                {{ $posts->links("pagination::tailwind")}}
                
            @else
                <p>No posts</p>
            @endif
        </div>
    </div>
   
    
@endsection