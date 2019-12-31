@extends('layout')

@section('main')


<div class="home">
    @foreach($works as $work)
    <article class="works">
        <img src="{{$work['img']}}" alt="">
        <ul>
            <li><a href="{{$work['pv']}}" target="_blank"><i class="fas fa-long-arrow-alt-left"></i> visit this site</a></li>
            <li><a href="https://github.com/{{$git}}/{{$repository}}/tree/master/{{$work['project']}}" target="_blank">view sorce code <i class="fas fa-long-arrow-alt-right"></i></a></li>
        </ul>
    </article>
    @endforeach
</div>


@endsection
