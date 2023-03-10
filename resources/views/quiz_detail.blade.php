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
                        @if ($quiz->my_rank)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Your Rank
                            <span class="badge bg-success rounded-pill">#{{$quiz->my_rank}}</span>
                        </li>
                        @endif
                        @if ($quiz->myResult)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Your Point
                            <span class="badge bg-success rounded-pill">{{$quiz->myResult->point}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Correct / Wrong
                            <div class="float-end">
                                <span class="badge bg-success rounded-pill">{{$quiz->myResult->correct}} True</span>
                                <span class="badge bg-danger rounded-pill">{{$quiz->myResult->wrong}} False</span>
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
                    @if (count($quiz->topTen)> 0)
                    <div class="card mt-3">
                        <div class="card-body">
                            <h5 class="card-title">Top 10</h5>
                            <ul class="list-group">
                                @foreach ($quiz->topTen as $result)
                                <li class="list-group-item d-flex justify-content-between align-items-center"><strong
                                        class="h4 mt-1">{{$loop->iteration}}.
                                    </strong>
                                    <img class="h-8 w-8 rounded-full object-cover mx-2"
                                        src="{{$result->user->profile_photo_url}}" alt="">
                                    <div class="me-auto">
                                        <span @if (auth()->user()->id == $result->user_id) class="text-success fs-4"
                                            @endif>{{$result->user->name}}</span>
                                    </div>

                                    <div class="float-end">
                                        <span class="badge bg-success rounded-pill">{{$result->point}}</span>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="col-md-8">
                    <h5 class="card-title text-lg"><strong>{{$quiz->title}}</strong></h5>
                    <p class="card-text text-lg">{{$quiz->description}}</p>
                    @if ($quiz->myResult)
                    <a href="{{ route('quiz.join',$quiz->slug) }}" class="btn btn-warning mt-2 float-end">View Quiz</a>
                    @elseif($quiz->finished_at>now() || $quiz->finished_at == null)
                    <a href="{{ route('quiz.join',$quiz->slug) }}" class="btn btn-primary mt-2 float-end">Join the
                        Quiz</a>
                    @endif
                </div>
            </div>
        </div>
    </div>



</x-app-layout>