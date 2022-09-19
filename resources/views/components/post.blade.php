@props(['post'=>$post])

<div class="mb-4">
    <a href="{{route('users.posts', $post->user)}}" class="font-bold">{{$post->user->name}}</a> <span class="text-gray-600 text-sm">{{$post->created_at->diffForHumans()}}</span>

    <p class="mb-2">{{$post->body}}</p>

    {{-- @if ($post->ownedBy(auth()->user())) --}}
    {{-- @auth
        @if ($post->user_id == auth()->user()->id) --}}

    @can('delete', $post)
        <div>
            <form action="{{route('posts.delete', $post)}}" method="post">
                @csrf
                @method('Delete')

                <button type="submit" class="text-blue-500">Delete</button>
            </form>
        </div>  
    @endcan
        
        {{-- @endif
    @endauth --}}

    
    

    <div class="flex items-center">
        @auth
            @if (!$post->likedBy(auth()->user()))
                <form action="{{route("posts.likes", $post)}}" method="post" class="mr-1">
                @csrf       
                <button type="submit" class="text-blue-500">Like</button>
            </form>
            @else
                <form action="{{route("posts.unlikes", $post)}}" method="post" class="mr-1">
                @csrf   
                @method("Delete")
                <button type="submit" class="text-blue-500">Unlike</button>
            </form>
            @endif
        @endauth
        
        
        <span>{{$post->likes->count()}} {{Str::plural('like', $post->likes->count())}}</span>
    </div>
</div>