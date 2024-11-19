@foreach ($posts as $post)
    <div class="like">
        <form hx-post="like/{{ $post->id }}" hx-target="#interaction-detail-{{ $post->id }}">
            @csrf
            @if ($like->likes == 'false' )
            <button type="submit"><i class="fa-regular fa-thumbs-up fa-2x"></i></button>
            @else
            <button type="submit"><i class="fa-solid fa-thumbs-up fa-2x"></i></button>
            @endif
           
        </form>
        <p>{{ $post->likes }}</p>
    </div>
    <div class="dislike">
        <form hx-post="dislike/{{ $post->id }}" hx-target="#interaction-detail-{{ $post->id }}">
            @csrf
            @if ($like->dislikes == 'false' )
            <button type="submit"><i class="fa-regular fa-thumbs-down fa-2x"></i></button>
            @else
            <button type="submit"><i class="fa-solid fa-thumbs-down fa-2x"></i></button>
            @endif
            {{-- <button type="submit"><i
                class="fa-regular fa-thumbs-down fa-2x"></i></button> --}}
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
