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
        <title>View Profile</title>
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
                <div class="profile-bgimage">
                    <img src="{{ asset('img/logo.jpg') }}">
                </div>
                <div class="profile-bar">
                    <div class="profile-details-container">
                        <div class="circle-container">
                            <div class="image-container">
                                <img src="{{ asset('img/hijau.jpg') }}">
                            </div>
                            <div class="animated-border"></div>

                        </div>
                        <div class="profile-intro">
                            <div>{{ $profile->username }}</div>
                            <div>intro singkat</div>
                            <div>{{ $friendlist }}</div>
                        </div>
                    </div>
                    <div class="add-friend-container">
                        <div>
                            @if ($profile->user_id == Auth::guard('member')->user()->id)
                            @else
                                <form action="{{ url('addfriend/' . $profile->user_id) }}" method="POST">
                                    @csrf
                                    @if (!isset($friendstatus->email) || $friendstatus->friend == 'false')
                                        <button type="submit">Tambah pertemanan</button>
                                    @elseif ($friendstatus->friend == 'true' && $friendstatus->email == Auth::guard('member')->user()->email)
                                        <button type="submit">Putus perteman</button>
                                    @endif


                                </form>
                            @endif

                        </div>
                        <div><button>Kirim pesan</button></div>
                    </div>

                </div>


                <div class="post-list">
                    @foreach ($posts as $post)
                        {{-- </div> --}}
                        <div class="post-detail">
                            <div class="post-header">
                                <img src="{{ asset('img/logo.jpg') }}" alt=""> 
                                <b>
                                <p>{{ $post->username }}</p>
                            </b>
                            </div>
                           
                            <p>{{ $post->post_title }}</p>
                            <p>{{ $post->post_content }}</p>

                            <div class="comment-section" id="comment-detail-{{ $post->id }}">
                                <div class="interaction-button" id="interaction-detail-{{ $post->id }}">
                                    <div class="like">

                                        <form hx-post="{{ url('like/' . $post->id) }}"
                                            hx-target="#interaction-detail-{{ $post->id }}">
                                            @csrf

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
                                        <form hx-post="{{ url('dislike/' . $post->id) }}"
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
                                <a href="{{ url('viewpost/' . $post->id) }}">Lihat komentar lain</a>
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
                                <form hx-post="{{ url('comment/' . $post->id) }}"
                                    hx-target="#comment-detail-{{ $post->id }}">
                                    @csrf
                                    {{-- <input name="post_id" value="{{ $posts->id }}"> --}}
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





        <script src="{{ asset('js/navburger.js') }}"></script>
    </body>

</html>
