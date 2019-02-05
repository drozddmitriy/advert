<div id="templatemo_right_column">

    <div id="templatemo_main">

        @foreach($adverts as $advert)
            <div class="post_section">

                <h2><a href="{{route('page', $advert->id)}}">{{$advert->title}}</a></h2>

                <strong>Date: </strong><span>{{$advert->created_at}}</span> | <strong>Author: </strong>
                <span>{{$advert->author_name}}</span>

                <p>{{$advert->description}}</p>
                @if(Auth::check() && Auth::user()->username == $advert->author_name)
                    {!! Form::open(['url'=>route('delete',$advert->id), 'method' => 'POST']) !!}
                    {!! Form::hidden('_method', 'delete') !!}
                    {{method_field('DELETE')}}
                    {!! Form::button('Delete',['type'=>'submit']) !!}
                    {!! Form::close() !!}
                    <div class="button"><a href="{{route('edit', $advert->id)}}">Edit</a></div>
                @endif

            </div>
        @endforeach

    </div>
    <div id="paginate">
        {{($adverts->links())}}
    </div>
    <div class="cleaner"></div>
</div>


