@props(['posts'])
<x-post-featured-card :post="$posts[0]"/>
@if($posts->count())
    <div class="lg:grid lg:grid-cols-12">
        @foreach($posts->skip(1) as $post)
            <x-post-card :post="$post" class="{{$loop->iteration <=3 ? 'col-span-4' : 'col-span-3'}}" />
        @endforeach
    </div>
@endif
