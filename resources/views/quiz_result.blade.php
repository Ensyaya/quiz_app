<x-app-layout>
    <x-slot name="header_title">Quiz Results Page</x-slot>
    <x-slot name="header">
        <strong>{{$quiz->title}} Results</strong>
    </x-slot>

    <div class="card">
        <div class="card-body text-lg row">
            <h2 class="mb-2"><strong>Your Score: {{$quiz->myResult->point}}</strong></h2>
            @foreach ($quiz->questions as $question)
            <div class="mb-3 col-md-8">
                @if ($question->correct_answer == $question->myAnswer->answer)
                <i class="fa fa-check text-success"></i>
                @else
                <i class="fa fa-times text-danger"></i>
                @endif
                <strong>{{$loop->iteration}}. {{$question->question}}</strong>
                <div>
                    <span class="badge bg-warning text-dark rounded-pill mx-1">
                        {{$question->true_percent}}% answered correctly
                    </span>
                </div>
                <div class="form-check mb-2 mt-2">
                    <input class="form-check-input" type="radio" value="answer1" disabled
                        @if($question->myAnswer->answer == 'answer1')
                    checked
                    @endif>
                    <label class="form-check-label" for="quiz{{$question->id}}1">
                        {{$question->answer1}}
                    </label>
                    @if ('answer1' == $question->correct_answer)
                    <i class="fa fa-check text-success"></i>
                    @endif
                    @if ($question->myAnswer->answer == 'answer1' && 'answer1' !== $question->correct_answer )
                    <i class="fa fa-times text-danger"></i>
                    @endif
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" value="answer2" disabled
                        @if($question->myAnswer->answer == 'answer2')
                    checked
                    @endif>
                    <label class="form-check-label" for="quiz{{$question->id}}2">
                        {{$question->answer2}}
                    </label>
                    @if ('answer2' == $question->correct_answer)
                    <i class="fa fa-check text-success"></i>
                    @endif
                    @if ($question->myAnswer->answer == 'answer2' && 'answer2' !== $question->correct_answer )
                    <i class="fa fa-times text-danger"></i>
                    @endif
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" value="answer3" disabled
                        @if($question->myAnswer->answer == 'answer3')
                    checked
                    @endif>
                    <label class="form-check-label" for="quiz{{$question->id}}3">
                        {{$question->answer3}}
                    </label>
                    @if ('answer3' == $question->correct_answer)
                    <i class="fa fa-check text-success"></i>
                    @endif
                    @if ($question->myAnswer->answer == 'answer3' && 'answer3' !== $question->correct_answer )
                    <i class="fa fa-times text-danger"></i>
                    @endif
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" value="answer4" disabled
                        @if($question->myAnswer->answer == 'answer4')
                    checked
                    @endif>
                    <label class="form-check-label" for="quiz{{$question->id}}4">
                        {{$question->answer4}}
                    </label>
                    @if ('answer4' == $question->correct_answer)
                    <i class="fa fa-check text-success"></i>
                    @endif
                    @if ($question->myAnswer->answer == 'answer4' && 'answer4' !== $question->correct_answer )
                    <i class="fa fa-times text-danger"></i>
                    @endif
                </div>
            </div>
            @if ($question->image)
            <div class="col-md-4">
                <a href="{{ asset($question->image) }}" target="_blank">
                    <img class="rounded float-end img-responsive m-2" src="{{asset($question->image)}}"
                        alt="{{$question->name}}" width="170">
                </a>
            </div>
            @endif
            @if (!$loop->last)
            <hr>
            @endif
            @endforeach
        </div>
    </div>

</x-app-layout>