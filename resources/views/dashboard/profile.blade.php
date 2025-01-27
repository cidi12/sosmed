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
                <div class="post-status-container">
                    <div class="circle-container">
                        <div class="image-container">
                            <img src="{{ asset('img/profile.png') }}">
                        </div>
                        <div class="animated-border"></div>
                    </div>
                    <div>
                        <a href="post"><button class="button confirm">Tuliskan sesuatu yang menarik !</button></a>
                    </div>

                </div>
                <div class="post-list">
                    @foreach ($posts as $post)
                        {{-- </div> --}}
                        <div class="post-detail">
                            <div class="post-header">
                                <img src="{{ asset('img/logo.jpg') }}" alt="">
                                <b>
                                    <a href="viewprofile/{{ Auth::guard('member')->user()->id }}">{{ $post->username }}</a>
                                </b>
                            </div>
                            <p>{{ $post->post_title }}</p>
                            <p>{{ $post->post_content }}</p>

                            <div class="comment-section" id="comment-detail-{{ $post->id }}">
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
                                <a href="viewpost/{{ $post->id }}">Lihat komentar lain</a>
                               
                                <div class="comment-list">
                                    <div class="post-header">
                                        <img src="{{ asset('img/logo.jpg') }}" alt="">

                                    </div>
                                    <div class="comment-body">
                                        <b>
                                            <p> {{ $post->post_commenter }}</p>
                                        </b>
                                        
                                        <p>{{ $post->post_comment }} </p>
                                    </div>
                                </div>
                            </div>
                            <div class="add-comment-container">
                                <form hx-post="comment/{{ $post->id }}"
                                    hx-target="#comment-detail-{{ $post->id }}">
                                    @csrf
                                    {{-- <input name="post_id" value="{{ $post->id }}"> --}}
                                    <textarea class="txtarea input" name="comment" id="post-input"></textarea>
                                    {{-- <p><span class="textarea input" role="textbox" contenteditable></span></p> --}}
                                    <button class="button confirm">Send</button>
                                </form>

                            </div>
                        </div>
                
                @endforeach
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





    <script src="{{ asset('js/post.js') }}"></script>
    </body>

</html>
