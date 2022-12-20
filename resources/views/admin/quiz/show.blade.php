<x-app-layout>
    <x-slot name="header_title">Quiz Detail Page</x-slot>
    <x-slot name="header">
        <strong>{{$quiz->title}}</strong>. Details
    </x-slot>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <h3 class="card-title float-start">
                    <a href="{{route('quizzes.index')}}" class="btn btn-secondary"><i
                            class="fa-sharp fa-solid fa-arrow-left"></i> Quiz
                        Page</a>
                </h3>
                <div class="col-md-4 text-lg">
                    <ul class="list-group">

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
                                        <span>{{$result->user->name}}</span>
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
                <div class="col-md-8 text-lg">
                    <h5 class="card-title text-lg"><strong>{{$quiz->title}}</strong></h5>
                    <p class="card-text text-lg">{{$quiz->description}}</p>
                    @if ($quiz->results)
                    <table class="table table-bordered my-3">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Point</th>
                                <th class="text-success" scope="col">True</th>
                                <th class="text-danger" scope="col">False</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($quiz->results as $result)
                            <tr>
                                <td>{{$result->user->name}}</td>
                                <td>{{$result->point}}</td>
                                <td class="text-success">{{$result->correct}}</td>
                                <td class="text-danger">{{$result->wrong}}</td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>



</x-app-layout>