@props(['comment'])
<x-pane class="bg-gray-100">
<article class="flex space-x-4">
        <div class="flex-shrink-0">
            <img src="https://i.pravatar.cc/100/?u={{$comment}}}" alt="" width="60" height="60" class="rounded-xl">
        </div>
        <div class="">
            <header>
                <h3 class="font-bold">{{$comment->author->username}}</h3>
                <p class="text-xs mb-4">Posted
                    <time>{{$comment->created_at->diffForHumans()}}</time>
                </p>
                <p>
                    {{$comment->body}}
                </p>
            </header>
        </div>
</article>
</x-pane>
