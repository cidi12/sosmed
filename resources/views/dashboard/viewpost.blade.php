<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{ asset('css/post.css') }}">
        <link rel="stylesheet" href="{{ asset('icon/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/mediaquerypost.css') }}">
        <script src="{{ asset('js/htmx.min.js') }}"></script>
        <title>Dashboard</title>
    </head>

    <body>

        <header>
            @include('partials.navbar')
        </header>
        <main>
            <div class="left-section-body">
                <div class="upper-left-container">

                </div>
            </div>
            <div class="mid-section-body" id="post-detail">

                <div class="post-list">

                    {{-- </div> --}}
                    <div class="post-detail">
                        <div class="post-header">
                            <img src="{{ asset('img/logo.jpg') }}" alt="">
                          <b>
                            <a href="{{ url('viewprofile/' . $posts->user_id) }}">{{ $posts->username }}</a>
                        </b>  
                        </div>
                        
                        <p>{{ $posts->post_title }}</p>
                        <p>{{ $posts->post_content }}</p>

                        <div class="comment-section" id="comment-detail-{{ $posts->id }}">
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
                        </div>
                        <div class="add-comment-container">
                            <form hx-post="{{ url('postcomment/' . $posts->id) }}"
                                hx-target="#comment-detail-{{ $posts->id }}">
                                @csrf
                                {{-- <input name="post_id" value="{{ $posts->id }}"> --}}
                                <textarea class="txtarea input" name="comment" id="post-input"></textarea>
                                    {{-- <p><span class="textarea input" role="textbox" contenteditable></span></p> --}}
                                    <button class="button confirm">Send</button>
                            </form>

                        </div>
                    </div>


                </div>

            </div>

            </div>
            <div class="right-section-body">
                <div class="upper-right-container">

                </div>
            </div>
        </main>
        {{-- <div>
  Halo {{ Auth::user()->email }}
    </div> --}}




    <script src="{{ asset('js/navburger.js') }}"></script>

    </body>

</html>
