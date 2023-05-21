@extends('front.layouts.master')
@section('title','İletişim Formu')
@section('content')

    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
    <form method="post" action="{{route('contactpost')}}">
        @csrf
        <div class="form-group">
            <label for="exampleFormControlInput1">Ad Soyad</label>
            <input type="name" class="form-control" name="name" placeholder="Name">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Mesajınız</label>
            <textarea class="form-control" name="message" rows="3"></textarea>
        </div>
        <br>
        <div style="text-align:right">
        <button type="submit"  class="btn btn-primary btn-lg btn-block">Gönder</button>
        </div>
        <br>
    </form>
        </div>
    </div>
</div>

@endsection
