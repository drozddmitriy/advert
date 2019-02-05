@extends('layout.site')

@section('content')
    <div class="post_section">
        {!! Form::open(['url' => route('edit',['id'=>$data['id']]),'method'=>'POST','enctype'=>'multipart/form-data']) !!}
        {{--{{!! Form::hidden('_method', 'patch') !!}}--}}
        <div class="form-group">
            {!! Form::label('title','Title:') !!}
            <div class="col-xs-8">
                {!! Form::text('title',$data['title'],['class' => 'form-control','placeholder'=>'Enter title'])!!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('description', 'Description:') !!}
            <div class="col-xs-8">
                {!! Form::textarea('description', $data['description'], ['class' => 'form-control','placeholder'=>'Enter description']) !!}
            </div>
        </div>

        <div class="form-group">
            <div class="col-xs-offset-2 col-xs-10">
                {!! Form::button('Save', ['type'=>'submit']) !!}
            </div>
        </div>

        {!! Form::close() !!}
    </div>
@endsection


