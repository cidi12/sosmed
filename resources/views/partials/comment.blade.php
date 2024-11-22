 @foreach ($posts as $post)
 <div class="interaction-button" id="interaction-detail-{{ $post->id }}">
    <div class="like">

        <form hx-post="like/{{ $post->id }}"
            hx-target="#interaction-detail-{{ $post->id }}">
            @csrf
            {{-- <button type="submit"><i
                class="fa-regular fa-thumbs-up fa-2x"></i></button> --}}
            {{-- @foreach ($likes as $like)
                @if ($like->likes == 'false' && $like->post_id == $post->id)
                    <button type="submit"><i
                            class="fa-regular fa-thumbs-up fa-2x"></i></button>
                @elseif ($like->likes == 'true' && $like->post_id == $post->id)
                    <button type="submit"><i
                            class="fa-solid fa-thumbs-up fa-2x"></i></button>
                
                @endif

            @endforeach --}}
            @foreach ($likes as $like)
                @if ($like->likes == 'false' && $like->post_id == $post->id)
                    <button type="submit" class="interaction-button-detail"><i
                            class="fa-regular fa-thumbs-up fa-2x"></i></button>
                @elseif ($like->likes == 'true' && $like->post_id == $post->id)
                    <button type="submit" class="interaction-button-detail"><i
                            class="fa-solid fa-thumbs-up fa-2x"></i></button>
                @endif
            @endforeach
            <button type="submit"><i
                    class="fa-regular fa-thumbs-up fa-2x"></i></button>
        </form>
        
        <p>{{ $post->likes }}</p>
    </div>
    <div class="dislike">
        <form hx-post="dislike/{{ $post->id }}"
            hx-target="#interaction-detail-{{ $post->id }}">
            @csrf
            @foreach ($likes as $like)
            @if ($like->dislikes == 'false' && $like->post_id == $post->id)
                <button type="submit" class="interaction-button-detail"><i
                        class="fa-regular fa-thumbs-down fa-2x"></i></button>
            @elseif ($like->dislikes == 'true' && $like->post_id == $post->id)
                <button type="submit" class="interaction-button-detail"><i
                        class="fa-solid fa-thumbs-down fa-2x"></i></button>
            @endif
        @endforeach
        <button type="submit"><i
                class="fa-regular fa-thumbs-down fa-2x"></i></button>
        </form>
        <p>{{ $post->dislikes }}</p>
    </div>
    <div class="share">
        <i class="fa-solid fa-share"></i>
        <p>{{ $post->shares }}</p>
    </div>
    <p> {{ $post->total_comment }} komentar</p>
</div>
     <p>Komentar</p>
     <div class="comment-list">
         <b>
             <p> {{ $post->post_commenter }}</p>
         </b>
         <p>{{ $post->post_comment }} </p>
     </div>
 @endforeach
