@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                      <div class="card-title">
                  <div class="d-flex align-items-center">
                    <h1>{{$question->title}}</h1>

                    <div class="ml-auto">
                      <a href="{{route('questions.index')}}" class="btn btn-outline-secondary">ALL Questions</a>
                    </div>
                  </div>
                  


                </div>
                    <hr>
                <div class="media">

                    <div class="d-flex flex-column vote-controls">
                        <a title="This Question is useful" class="vote-up ">
                          <strong><h3> ⮝ </h3></strong>
                           
                        </a>
                        <span class="votes-count">123</span>
                        <a title="This question is not useful" class="vote-down off">
                          <strong><h3>⮟</h3></strong>
                        </a>

                <a title="Click to mark as favourite question ( Click again to undo)" 
        class="favourite {{Auth::guest() ? 'off' : ($question->is_favourited ? 'favourited' : '') }}"
    onclick="event.preventDefault();document.getElementById('favourite-question-{{$question->id}}').submit()"
                    >
                         <strong><h3>★</h3></strong>
                         <span class="favourite-count">{{$question->favourites_count}}</span>
                        </a>


<form id ="favourite-question-{{$question->id}}" 
    action="/questions/{{$question->id}}/favourites" method="POST" style="display: none">
      @csrf 

      @if($question->is_favourited)

           @method ('DELETE')


      @endif
      

      
    </form>
                        
                    </div> 
                    <div class="media-body">
                        {!!$question->body_html!!}  

                <div class="float-right">
                                    <span class="text-muted">
                                        <strong>Questioned:</strong> {{$question->created_date}}
                                    </span>

                                    <div class="media mt-2">
                                        <a href="{{$question->user->url}}" class="pr-2">
                                            <img src="{{$question->user->avatar}}">
                                        </a>

                                        <div class="media-body mt-1">
                                            <a href="{{$question->user->url}}">{{$question->user->name}}</a>
                                        </div>
                                    </div>
                                </div>    
                    </div>
                
                </div>
                </div>
              

            </div>
        </div>
    </div>
    
    @include('answers.index',[
        'answers'=>$question->answers,
        'answers_count'=>$question->answers_count])
  
    @include('answers.create')

</div>
@endsection
