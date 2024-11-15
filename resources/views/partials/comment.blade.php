<div class="post-list" id="post-detail">

    @foreach ($posts as $post)
        <div class="post-detail">
            <b>
                <p>{{ $post->username }}</p>

            </b>
        </div>
        <div class="post-detail" >
            <p>{{ $post->post_title }}</p>

            <p>{{ $post->post_content }}</p>
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

            <div class="comment-section">

                <div class="comment-list">

                    <b>
                        <p> {{ $post->post_commenter }}</p>
                    </b>

                    <p>{{ $post->post_comment }} </p>
                </div>


            </div>
            <div class="add-comment-container">
                <form hx-post="comment" hx-target="#post-detail">
                    @csrf
                    <input name="post_id" value="{{ $post->id }}">
                    <input name="comment" type="text">
                    <button type="submit">Send</button>
                </form>
            </div>

        </div>
        <hr>
    @endforeach
   
</div> 