@foreach($posts as $post)

    {{ $post->title }}
    {{ Str::limit($post->body) }}
    {{ $post->createdAt() }}
    <a href="/post/{{$post->id}}">View post details</a>

@endforeach