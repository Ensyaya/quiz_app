<x-app-layout>
    <x-slot name="header_title">Quiz Detail Page</x-slot>
    <x-slot name="header">
        <strong>{{$quiz->title}}</strong>. Details
    </x-slot>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 text-lg">
                    <ul class="list-group">
                        @if ($quiz->my_result)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Your Point
                            <span class="badge bg-success rounded-pill">{{$quiz->my_result->point}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Correct / Wrong
                            <div class="float-end">
                                <span class="badge bg-success rounded-pill">{{$quiz->my_result->correct}} True</span>
                                <span class="badge bg-danger rounded-pill">{{$quiz->my_result->wrong}} False</span>
                            </div>
                        </li>
                        @endif
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Number of questions
                            <span class="badge bg-secondary rounded-pill">{{$quiz->questions_count}}</span>
                        </li>
                        @if ($quiz->details)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            The number of participants
                            <span class="badge bg-secondary rounded-pill">{{$quiz->details['join_count']}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Average score
                            <span class="badge bg-secondary rounded-pill">{{$quiz->details['average']}}</span>
                        </li>
                        @endif
                        @if ($quiz->finished_at)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Last date of participation
                            <span title="{{$quiz->finished_at}}"
                                class="badge bg-secondary rounded-pill">{{$quiz->finished_at->diffForHumans()}}</span>
                        </li>
                        @endif
                    </ul>
                </div>
                <div class="col-md-8">
                    <h5 class="card-title text-lg"><strong>{{$quiz->title}}</strong></h5>
                    <p class="card-text text-lg">{{$quiz->description}}</p>
                    @if ($quiz->my_result)
                    <a href="{{ route('quiz.join',$quiz->slug) }}" class="btn btn-primary mt-2 float-end">View Quiz</a>
                    @else
                    <a href="{{ route('quiz.join',$quiz->slug) }}" class="btn btn-primary mt-2 float-end">Join the
                        Quiz</a>
                    @endif
                </div>
            </div>
        </div>
    </div>



</x-app-layout>