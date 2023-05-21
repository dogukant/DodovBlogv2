@extends('back.layouts.master')
@section('content')

    <h1><div class="sidebar-brand-text mx-5 my-5">Kategori Oluştur<hr></div></h1>

    <div class="col-md-9 mx-auto">
    <form method="post" action="{{route('admin.categorypost')}}">
        @csrf
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Kategori Adı</span>
            </div>
            <input name="name" type="text" class="form-control">
        </div>
        <br>
    <div align="right">
    <button type="submit" class="btn btn-primary">Oluştur</button>
    </div>
    </div>
    </form>
    <br>
    </div>
@endsection
