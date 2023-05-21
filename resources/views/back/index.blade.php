@extends('back.layouts.master')
@section('content')

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

<div class="sidebar-brand-text mx-3 my-3">
    <h1>ANASAYFA<sup>homepage</sup></h1>
    <div align="right">
        <a href="{{route('admin.logout')}}"><button class="btn btn-danger">Çıkış</button></a>
    </div>
    </div>



    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Kategori Adı</th>
            <th scope="col">Açıklama</th>

        </tr>
        </thead>
        @foreach($categories as $category)
            <tbody>
            <tr>
                <th scope="row"></th>
                <td>{{$category->name}}</td>
                <td>Bu kategoriye ait {{$category->articleCount->count()}} adet yazı bulunuyor.</td>
            </tr>
            </tbody>
        @endforeach
    </table>
    </div>


@endsection
