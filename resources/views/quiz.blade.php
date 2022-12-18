<x-app-layout>
    <x-slot name="header_title">Quiz Page</x-slot>
    <x-slot name="header">
        <strong>{{$quiz->title}}</strong>
    </x-slot>

    <div class="card">
        <div class="card-body text-lg">
            <form action="{{route('quiz.result',$quiz->slug)}}" method="POST" class="row">
                @csrf
                @foreach ($quiz->questions as $question)
                <div class="mb-3 col-md-8">
                    <strong>{{$loop->iteration}}. {{$question->question}}</strong>
                    <div class="form-check mb-2 mt-2">
                        <input class="form-check-input" type="radio" name="{{$question->id}}"
                            id="quiz{{$question->id}}1" value="answer1" required>
                        <label class="form-check-label" for="quiz{{$question->id}}1">
                            {{$question->answer1}}
                        </label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="{{$question->id}}"
                            id="quiz{{$question->id}}2" value="answer2" required>
                        <label class="form-check-label" for="quiz{{$question->id}}2">
                            {{$question->answer2}}
                        </label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="{{$question->id}}"
                            id="quiz{{$question->id}}3" value="answer3" required>
                        <label class="form-check-label" for="quiz{{$question->id}}3">
                            {{$question->answer3}}
                        </label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="{{$question->id}}"
                            id="quiz{{$question->id}}4" value="answer4" required>
                        <label class="form-check-label" for="quiz{{$question->id}}4">
                            {{$question->answer4}}
                        </label>
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
                <div class="card-footer bg-white d-grid gap-2">
                    <button type="submit" class="btn bg-success btn-success mt-3">Submit</button>
                </div>
            </form>

        </div>
    </div>

</x-app-layout>