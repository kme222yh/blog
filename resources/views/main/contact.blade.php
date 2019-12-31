@extends('layout')

@section('main')
<div>
    <form action="contact" method="post">
        @csrf
        <p><label for="fname">name</label><input id="fname" type="text" name="name" value="{{old('name')}}" required></p>
        <p><label for="femail">e-mail</label><input type="email" name="email" value="{{old('email')}}" id="femail" required></p>
        <p><label for="fsubject">subject</label><input type="text" name="subject" value="{{old('subject')}}" id="fsubject"></p>
        <p><label for="fmessage">message</label><textarea name="message" rows="8" value="{{old('message')}}" id="fmessage"></textarea></p>
        <p><button type="submit" name="button">submit</button></p>
    </form>
</div>
@endsection
