@extends('layouts.app')
                         

                                     <!-- profile edit view  -->
@section('content')
<div class="container_style">
<form action="/profile/{{$user->id}}" enctype="multipart/form-data" method="POST">
   <div class="row">
       <div class="col-8 offset-2">

            <div class="row">
               <h1  >Edit Profile</h1> @csrf @method('PATCH')   
            <!-- PATCH method for old input fetch  -->              
            </div>

            <div class="row mb-3">
                <label for="title" class="col-md-4 col-form-label  "><strong>Title</strong></label>
                <input id="title" type="text" name="title" class=" mx-2 form-control @error('title') is-invalid @enderror" caption="title" value="{{ old('title') ?? $user->profile->title}}"  >
                @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="row mb-3">
                <label for="description" class="col-md-4 col-form-label  "><strong>Description</strong></label>
                <input id="description" type="text" name="description" class=" mx-2 form-control @error('description') is-invalid @enderror" caption="description" value="{{ old('description')??  $user->profile->description }}"  >                     
                @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="row mb-3">
                <label for="url" class="col-md-4 col-form-label  "><strong>URL</strong></label>
                <input id="url" type="text" name="url" class=" mx-2 form-control @error('url') is-invalid @enderror" caption="url" value="{{ old('url')??  $user->profile->url }}"  >        
                   @error('url')
                   <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
                   </span>
                   @enderror
            </div>   

            <div class="row pb-4 mx-0">
                 <label for="image" class="col-md-4 col-form-label  "><strong>Profile Image</strong></label>
                 <input class="form-control" type="file" class="form-control-file" id="image" name="image">
                     @error('image')
                     <strong style="color:red;">{{ $message }}</strong>
                     @enderror
             </div>


            <button type="submit" class="btn btn-primary">Save Profile</button>            
             </div>
         </div>
    </form>
</div>
@endsection