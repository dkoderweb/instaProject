@extends('layouts.app')




                                            <!-- one singal post show view  -->
@section('content')
<div class="container_style">
    <div class="post">
        <div class="row mt-3">
            <div class="card w-100">
                <div class="row no-gutters" >

                    <!-- Card Image -->
                    <div class="col-md-8 h-100">
                        <img src="{{ asset("storage/$post->image") }}" class="w-100 h-100">
                    </div>
                    
                    <!-- aside part of card  -->
                    <div class="col-md-4 h-100">
                        <div class="d-flex flex-column h-100">

                            <!-- Card Header -->
                            <div class="card-header">
                                <div class="d-flex align-items-center   ">
                                    <!-- card header with profile image and username  -->
                                    <a href="/profile/{{$post->user->id}}" style="width: 32px; height: 32px;">
                                        <img src="{{ asset($post->user->profile->getProfileImage()) }}"
                                            class="rounded-circle w-100">
                                    </a>
                                    <a href="/profile/{{$post->user->id}}" class=" text-dark ms-2 text-decoration-none">
                                        <strong> {{ $post->user->name }}</strong>
                                    </a>                                     
                                </div>
                            </div> 
 
                            <!-- Card Body -->
                            <div class="card-body px-2" style="overflow-y: auto; overflow-x: hidden;">
                                <!-- Post Caption  -->
                                <div class="row">
                                    <div class="col-2">
                                        <a href="/profile/{{$post->user->id}}">
                                            <img src="{{ asset($post->user->profile->getProfileImage()) }}"
                                                class="rounded-circle w-100">
                                        </a>
                                    </div>
                                    <div class="col-10 pl-0">
                                        <p class="m-0 text-dark">
                                            <a href="/profile/{{$post->user->id}}"
                                                class="my-0 text-dark text-decoration-none">
                                                <strong> {{ $post->user->name }}</strong>
                                            </a>
                                            {{ $post->caption }}
                                        </p>
                                    </div>
                                </div>
                                

                                <!-- Comment show  (all available)-->
                                @foreach ($post->comments as $comment)
                                <div class="row my-3">
                                    <div class="col-2">
                                        <a href="/profile/{{$comment->user->id}}">
                                            <img src="{{ asset($comment->user->profile->getProfileImage()) }}"
                                                class="rounded-circle w-100">
                                        </a>
                                    </div>
                                    <div class="col-10 pl-0">
                                        <p class="m-0 text-dark">
                                            <a href="/profile/{{$comment->user->id}}"
                                                class="my-0 text-dark text-decoration-none">
                                                <strong> {{ $comment->user->name }}</strong>
                                            </a>
                                            {{ $comment->body }}
                                        </p>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            <!-- Add Comment   -->
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
             @endsection