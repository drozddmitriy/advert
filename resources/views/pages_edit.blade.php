@extends('layout.site')

@section('content')
    <div class="post_section">

        {!! Form::open(['url' => route('pagesEdit'),'method'=>'POST','enctype'=>'multipart/form-data']) !!}

        <div class="form-group">
            {!! Form::label('title','Title:') !!}
            <div class="col-xs-8">
                {!! Form::text('title',old('title'),['class' => 'form-control','placeholder'=>'Enter title'])!!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('description', 'Description:') !!}
            <div class="col-xs-8">
                {!! Form::textarea('description', old('description'), ['class' => 'form-control','placeholder'=>'Enter description']) !!}
            </div>
        </div>

        <div class="form-group">
            <div class="col-xs-offset-2 col-xs-10">
                {!! Form::button('Create', ['class' => 'btn btn-primary','type'=>'submit']) !!}
            </div>
        </div>

    </div>
@endsection


