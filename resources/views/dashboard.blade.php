<x-app-layout>
    <x-slot name="header_title">Home Page</x-slot>
    <x-slot name="header">
        Home Page
    </x-slot>
    <div class="row">
        <div class="col-md-8">
            <div class="list-group text-lg">
                @foreach ($quizzes as $quiz)
                <a href="{{ route('quiz.detail', $quiz->slug) }}"
                    class="list-group-item list-group-item-action rounded mb-3">
                    <div class="d-flex w-full justify-content-between">
                        <h5 class="mb-1"><strong>{{$quiz->title}}</strong></h5>
                        <span class="badge bg-secondary rounded-pill">{{$quiz->finished_at ? 'Ends
                            '.$quiz->finished_at->diffForHumans() : null}}</span>
                    </div>
                    <p class="mb-1">{{Str::limit($quiz->description,120)}}</p>
                    <small>Number of questions: {{$quiz->questions_count}}</small>
                </a>
                @endforeach
                {{$quizzes->links()}}
            </div>
        </div>
        <div class="col-md-4">
            test
        </div>
    </div>

</x-app-layout>