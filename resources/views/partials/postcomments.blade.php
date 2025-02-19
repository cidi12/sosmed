<div class="interaction-button" id="interaction-detail-{{ $posts->id }}">
    <div class="like">

        <form hx-post="{{ url('like/' . $posts->id) }}"
            hx-target="#interaction-detail-{{ $posts->id }}">
            @csrf

            @foreach ($likes as $like)
                @if ($like->likes == 'false' && $like->post_id == $posts->id)
                    <button type="submit" class="interaction-button-detail"><i
                            class="fa-regular fa-thumbs-up fa-2x"></i></button>
                @elseif ($like->likes == 'true' && $like->post_id == $posts->id)
                    <button type="submit" class="interaction-button-detail"><i
                            class="fa-solid fa-thumbs-up fa-2x"></i></button>
                @endif
            @endforeach
            <button type="submit"><i class="fa-regular fa-thumbs-up fa-2x"></i></button>
        </form>
        <p>{{ $posts->likes }}</p>
    </div>
    <div class="dislike">
        <form hx-post="{{ url('dislike/' . $posts->id) }}"
            hx-target="#interaction-detail-{{ $posts->id }}">
            @csrf
            @foreach ($likes as $like)
                @if ($like->dislikes == 'false' && $like->post_id == $posts->id)
                    <button type="submit" class="interaction-button-detail"><i
                            class="fa-regular fa-thumbs-down fa-2x"></i></button>
                @elseif ($like->dislikes == 'true' && $like->post_id == $posts->id)
                    <button type="submit" class="interaction-button-detail"><i
                            class="fa-solid fa-thumbs-down fa-2x"></i></button>
                @endif
            @endforeach
            <button type="submit"><i
                    class="fa-regular fa-thumbs-down fa-2x"></i></button>
        </form>
        <p>{{ $posts->dislikes }}</p>
    </div>
    <div class="share">
        <i class="fa-solid fa-share"></i>
        <p>{{ $posts->shares }}</p>
    </div>
    <p> {{ $posts->total_comment }} komentar</p>
</div>

<div class="post-comment-list">
    @foreach ($comments as $comment)
        {{-- <b>
            <a href="{{ url('viewprofile/'.$comment->user_id) }}">{{ $comment->commenter }}</a>
        </b>
        <p>{{ $comment->comment }}</p> --}}
        <div class="post-comment-body">
            <div class="post-header">
                <img src="{{ asset('img/logo.jpg') }}" alt="">
    
            </div>
            <div class="comment-body">
               
                <b>
                    <a href="{{ url('viewprofile/'.$comment->user_id) }}">{{ $comment->commenter }}</a>
                </b> 
                <p>{{ $comment->comment }}</p>
            </div>
          </div>
        
    @endforeach
</div>