@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                @if(isset($posts) && $posts -> count() > 0)
                    @foreach($posts as $post)
                        <div class="card-body">
                            @if(session('status'))
                                <div class="alert alert-access" role="alert">
                                    {{session('status')}}
                                </div>
                            @endif

                            <h3>{{ $post->title }} @if(Auth::id() == $post->user->id)-المالك  @endif</h3>
                            <br>
                            {{ $post->content }}
                            <br>
                            <br>

                            <form method="POST" action="" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control" name="content">
                                    @error('name_ar')
                                    <small class="form-text text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <button type="submin" class="btn btn-primary">اضافة ردك</button>
                            </form>
                        </div>
                    @endforeach
                @endif                
            </div>
        </div>
    </div>
</div>
@endsection
