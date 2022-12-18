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
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Number of questions
                            <span class="badge bg-secondary rounded-pill">{{$quiz->questions_count}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            The number of participants
                            <span class="badge bg-secondary rounded-pill">2</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Average score
                            <span class="badge bg-secondary rounded-pill">1</span>
                        </li>
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
                    <a href="{{ route('quiz.join',$quiz->slug) }}" class="btn btn-primary mt-2 float-end">Join the
                        Quiz</a>
                </div>
            </div>
        </div>
    </div>



</x-app-layout>