 @foreach ($posts as $post)
     <div class="interaction-button" id="interaction-detail-{{ $post->id }}">
         <div class="like">
             <form hx-post="like/{{ $post->id }}" hx-target="#interaction-detail-{{ $post->id }}">
                 @csrf

                 <button type="submit"><i class="fa-solid fa-circle-up"></i></button>
             </form>
             <p>{{ $post->likes }}</p>
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
