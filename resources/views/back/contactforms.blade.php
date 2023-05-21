@extends('back.layouts.master')
@section('content')

    <h1><div class="sidebar-brand-text mx-5 my-5">İLETİŞİM FORMU</div></h1>

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Ad Soyad</th>
            <th scope="col">Email</th>
            <th scope="col">Mesaj</th>
            <th scope="col">Tarih</th>
        </tr>
        </thead>
        @foreach($contacts as $contact)
        <tbody>
        <tr>
            <th scope="row"></th>
            <td>{{$contact->name}}</td>
            <td>{{$contact->email}}</td>
            <td>{{$contact->message}}</td>
            <td>{{$contact->created_at}}</td>
        </tr>
        </tbody>
        @endforeach
    </table>
    </div>

    @endsection
