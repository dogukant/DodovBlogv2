@extends('back.layouts.master')
@section('content')

<div class="col-md-6 mx-auto">
    <form method="post" action="{{route('admin.aboutupdate')}}">
        @csrf
        <input type="hidden" name="about_id" value="{{$about->id}}">
    <div class="form-group" >
        <label>Başlık</label>
    <input type="text" name="title" class="form-control" value="{{$about->title}}" aria-describedby="emailHelp">
    </div>
    <div class="form-group" >
        <label>Açıklama</label>
        <input type="text" name="description" class="form-control" value="{{$about->content}}" aria-describedby="emailHelp">
    </div>
        <div align="right">
            <button type="submit" class="btn btn-primary">Güncelle</button>
        </div>
    </div>
    </div>
</form>
@endsection
