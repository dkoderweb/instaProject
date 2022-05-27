@extends('layouts.app')



<!-- index of post  -->

@section('content')
<div class="container_style ">
    <div class="row d-flex justify-content-center .flex-column">

        <!-- for all available post  -->
        @foreach($posts as $post)
        <main class="main  d-flex flex-column">
            <div class="card mx-auto custom-card mb-5" id="prova">
                <div class="card-header d-flex justify-content-between align-items-center bg-white pl-3 pr-1 py-2">

                    <!-- card header  -->
                    <div class="d-flex align-items-center">
                        <!-- card header profile image with link   -->
                        <a href="/profile/{{$post->user->id}}" style="width: 50px; height: 50px;">
                            <img src="{{ asset($post->user->profile->getProfileImage()) }}"
                                class="rounded-circle w-100">
                        </a>
                        <!-- card header username with link  -->
                        <a href="/profile/{{$post->user->id}}" class="my-0 ml-3 text-dark fs-3 text-decoration-none">
                            {{ $post->user->name }}
                        </a>
                     </div>

                 </div>

                <!-- Card Image -->      <!--onclick like function -->
                <div class="js-post" ondblclick="showLike(this, 'like_{{ $post->id }}')">
                     <img class="card-img" src="{{ asset("storage/$post->image") }}" alt="post image"
                        style="max-height: 767px">
                </div>

                <!-- Card Body -->
                <div class="card-body px-3 py-2">
                    <!-- like function  -->
                    <div class="d-flex flex-row">
                        <form method="POST" action="/like/{like}">
                            @csrf
                            @if (true)
                            <input id="inputid" name="update" type="hidden" value="1">
                            @else
                            <input id="inputid" name="update" type="hidden" value="0">
                            @endif

                            @if($post->like->isEmpty())
                            <button type="submit" class="btn pl-0">
                                <i class="far fa-heart fa-2x"></i>
                            </button>
                            @else



                            @if($state)
                            <button type="submit" class="btn pl-0">
                                <i class="fas fa-heart fa-2x" style="color:red"></i>
                            </button>
                            @else
                            <button type="submit" class="btn pl-0">
                                <i class="far fa-heart fa-2x"></i>
                            </button>
                            @endif

                            @endif

                            <!-- comment icon  -->
                            <a href="/p/{{ $post->id }}" class="btn pl-0">
                                <i class="far fa-comment fa-2x"></i>
                            </a>
                        </form>
                    </div>

                    <!-- like count  -->
                    <div class="flex-row">
                        <!-- Likes -->
                        @if (count($post->like->where('State',true)) > 0)
                        <h6 class="card-title">
                            <strong>{{ count($post->like->where('State',true)) }} likes</strong>
                        </h6>
                        @endif


                       <!-- card caption  -->
                        <div class="d-flex">
                            <a href="/profile/{{$post->user->id}}" class="  text-dark text-decoration-none">
                                <strong style=" font-size: 1.2rem;">{{ $post->user->name }} : </strong>
                            </a>
                            <span style=" font-size: 1.2rem;"> {{ $post->caption }}</span>
                        </div>


                        <!-- Comment count -->
                        <div class="comments">
                            @if (count($post->comments) > 0)
                            <a href="/p/{{ $post->id }}" class="text-muted">View all {{count($post->comments)}}
                                comments</a>
                            @endif
                            @foreach ($post->comments->sortByDesc("created_at")->take(2) as $comment)
                            <p class="mb-1"><strong>{{ $comment->user->name }}</strong> {{ $comment->body }}</p>
                            @endforeach
                        </div>


                        <!-- card post time   -->
                        <p class="card-text text-muted">{{ $post->created_at->diffForHumans() }}</p>

                        <!-- Card Footer -->
                        <div class="card-footer p-0">
                            <!-- Add Comment -->
                            <form action="/comment/store" method="POST">
                                @csrf
                                <div class="form-group mb-0  text-muted">
                                    <div class="input-group is-invalid">
                                        <input type="hidden" name="post_id" value="{{$post->id}}">
                                        <input type="text" class="form-control" id="body" name='body' rows="1" cols="1"
                                            placeholder="Add a comment...">
                                        <div class="input-group-append">
                                            <button class="btn btn-md btn-outline-info" type="submit">Post</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
  @endforeach


         
        @endsection

        <!-- javascript for like  -->
        @section('exscript')
        <script>
        function copyToClipboard(id) {
            var copyText = document.getElementById(id);
            copyText.select();
            copyText.setSelectionRange(0, 99999)
            document.execCommand("copy");
        }

        function showLike(e, id) {
            console.log("Like: ", id);
            var heart = e.firstChild;
            heart.classList.add('fade');
            setTimeout(() => {
                heart.classList.remove('fade');
            }, 2000);
        }
        </script>


        @endsection