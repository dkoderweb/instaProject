@extends('layouts.app')



<!-- index profile view  -->
@section('content')
<div class="container_style">
    <div class="row ">

        <!-- profile header  -->
        <div class="col-3 p-5">
            <!-- profile header image  -->
            <img src="{{ asset($user->profile->getProfileImage()) }}" class="rounded-circle w-100">
        </div>

        <!-- profile header username  -->
        <div class="col-9 pt-5">
            <div class="d-flex d-flex justify-content-between ">
                <div>
                    <h4 class="fs-2 ps-2">{{$user['username']}}</h1>
                </div>

                <!-- only profile user can edit post and submit post  -->
                <div>
                    @can('update', $user->profile)
                    <button type="button" class="btn btn-outline-secondary ml-3"><a href="/p/create">Add new
                            post</a></button>
                    <button type="button" class="btn btn-outline-secondary ml-3"><a
                            href="/profile/{{$user->id}}/edit">Edit
                            Profile</a></button>
                    @else
                    <!-- other user can folllow profile  -->
                    <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                    @endcan
                </div>
            </div>

            <!-- post, followes and following count  -->
        <div class="d-flex">
                <button type="button" class="btn btn-light">
                    <strong>{{$user->posts->count()}} </strong>Posts
                </button>
                <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#followerslist">
                    <strong>{{$user->profile->followers->count()}}</strong>Followers
                </button>
                <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#followerslist">
                    {{$user->following->count()}}</strong> Following
                </button>
            </div>
            <!-- profile bio  -->
            <div class="pt-4 fw-bolder fs-5 ">{{$user->profile->title}}</div>
            <div class="">{{$user->profile->description}} <br> </div>
            <div class="pb-4"><a href="#">{{$user->profile->url}}</a></div>
        </div>




        <!-- Followers Modal -->
        <!-- <div class="modal fade" id="followerslist" tabindex="-1" aria-labelledby="followerslistLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="followerslistLabel">Followers</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <div class="px-3 border bg-light">
                     User Info
                     
                    <div class="d-flex align-items-center my-3 ">
                        <a href="/profile/{{$user->username}}" style="width: 56px; height: 56px;">
                            <img src="{{ asset($user->profile->getProfileImage()) }} " class="rounded-circle w-100">
                        </a>
                        <div class='d-flex flex-column pl-3'>
                            <a href="/profile/{{$user->username}}" class='h5 m-0 text-dark text-decoration-none' >
                                <strong> </strong>
                            </a>
                            <span class="text-muted">{{ $user->username }}</span>
                        </div>
                    </div>
 
            </div>
                       
                    </div>
                    <div class="modal-footer">
                      </div>
                </div>
            </div>
        </div> -->


        <!-- profile post view  -->
        <hr>
        <div class="row pt-4  ">
            @forelse ($user->posts as $post)
            <div class="col-4 col-md-4 mb-4 align-self-stretch">
                <a href="/p/{{ $post->id }}">
                    <img class="img border ronded-circle" height="300" src="{{ asset("storage/$post->image") }}">
                </a>
            </div>
            <!-- if there is no post  -->
            @empty
            <div class="col-12 d-flex justify-content-center text-muted">
                <div class="card border-0 text-center bg-transparent">
                    <img src="{{asset('img/noimage.png')}}" class="card-img-top" alt="...">
                    <div class="card-body ">
                        <h1 class="mx-0">No Posts Yet</h1>
                    </div>
                </div>
            </div>
            @endforelse

        </div>
    </div>
    @endsection