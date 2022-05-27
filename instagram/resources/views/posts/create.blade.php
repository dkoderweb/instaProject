@extends('layouts.app')


                                              <!-- post create view  -->

@section('content')
<div class="container_style">
   <form action="/p" enctype="multipart/form-data" method="POST">
   <div class="row">
       <div class="col-8 offset-2">
            <div class="row">
            <h1  >Add new post</h1>
            @csrf
     
            </div>
            <div class="row mb-3">
                <label for="caption" class="col-md-4 col-form-label  "><strong>Post Caption</strong></label>

                <input id="caption" type="text" name="caption" class=" mx-2 form-control @error('caption') is-invalid @enderror"
                    caption="caption" value="{{ old('caption') }}"  autofocus>

                @error('caption')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>
            <div class="row pb-4">
            <label for="image" class="col-md-4 col-form-label  "><strong>Post Image</strong></label>
                <input class="form-control" type="file" class="form-control-file" id="image" name="image">
                @error('image')
                     <strong style="color:red;">{{ $message }}</strong>
                 @enderror
             </div>
            <button type="submit" class="btn btn-primary">Add new post</button>
            
        </div>
    </div>
   </form>
</div>
@endsection