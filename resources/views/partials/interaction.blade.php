@foreach ($posts as $post)
    <div class="like">
        <form hx-post="like/{{ $post->id }}" hx-target="#interaction-detail-{{ $post->id }}">
            @csrf

            <button type="submit"><i class="fa-solid fa-circle-up"></i></button>
        </form>
        <p>{{ $post->likes }}</p>
    </div>
    <div class="dislike">
        <form hx-post="dislike/{{ $post->id }}" hx-target="#interaction-detail-{{ $post->id }}">
            @csrf
            <button type="submit"> <i class="fa-solid fa-circle-down"></i></i></button>
        </form>
        <p>{{ $post->dislikes }}</p>
    </div>
    <div class="share">
        <i class="fa-solid fa-share"></i>
        <p>{{ $post->shares }}</p>
    </div>
    <p> {{ $post->total_comment }} komentar</p>
    </div>
@endforeach
