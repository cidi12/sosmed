 @foreach ($posts as $post)
 <div class="interaction-button">
    <div class="like">
        <i class="fa-solid fa-circle-up"></i>
        <p>{{ $post->like }}</p>
    </div>
    <div class="dislike">
        <i class="fa-solid fa-circle-down"></i>
        <p>{{ $post->dislike }}</p>
    </div>
    <div class="share">
        <i class="fa-solid fa-share"></i>
        <p>{{ $post->share }}</p>
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
