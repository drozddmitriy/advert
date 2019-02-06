@extends('layout.site')

@section('content')
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <strong>Date: </strong><span>{{$advert->created_at}}</span> | <strong>Author: </strong>
                <span>{{$advert->author_name}}</span>
            </div>
            <div class="card-body">
                <h5 class="card-title"><a href="{{route('page', $advert->id)}}">{{$advert->title}}</a></h5>
                <p class="card-text">{{$advert->description}}</p>
                @if(Auth::check() && Auth::user()->username == $advert->author_name)
                    <div class="row">
                        {!! Form::open(['url'=>route('delete',$advert->id), 'method' => 'POST']) !!}
                        {!! Form::hidden('_method', 'delete') !!}
                        {{method_field('DELETE')}}
                        {!! Form::button('Delete',['class' => 'btn btn-danger','type'=>'submit' ]) !!}
                        {!! Form::close() !!}
                        <a href="{{route('edit', $advert->id)}}" class="btn btn-primary" >Edit</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div style="height: 200px"></div>

@endsection