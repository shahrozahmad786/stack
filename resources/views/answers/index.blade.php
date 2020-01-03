  <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h2>{{$answers_count."  ".str_plural('Answer',$answers_count)}}</h2>

                        <hr>
                       @include('layouts.messages')
                        @foreach($answers as $answer)

                        <div class="media">
                             <div class="d-flex flex-column vote-controls">
                        <a title="This answer is useful" class="vote-up ">
                          <strong><h3> ⮝ </h3></strong>
                           
                        </a>
                        <span class="votes-count">123</span>
                        <a title="This answer is not useful" class="vote-down off">
                          <strong><h3>⮟</h3></strong>
                        </a>

                        <a title="Mark As Best Answer" class="vote-accepted">
                         <strong><h2>✔</h2></strong>
                         
                        </a>
                        
                    </div> 
                            <div class="media-body">
                                {!! $answer->body_html!!}

                                <div class="float-right">
                                    <span class="text-muted">
                                       <strong> Answered:</strong> {{$answer->created_date}}
                                    </span>

                                    <div class="media mt-2">
                                        <a href="{{$answer->user->url}}" class="pr-2">
                                            <img src="{{$answer->user->avatar}}">
                                        </a>

                                        <div class="media-body mt-1">
                                            <a href="{{$answer->user->url}}">{{$answer->user->name}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <hr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>