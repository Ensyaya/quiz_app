<x-app-layout>
    <x-slot name="header_title">Quiz Questions Page</x-slot>
    <x-slot name="header">
        <a href="{{ route('quizzes.index') }}"><strong>{{$quiz->title}}</strong></a>
        Quiz Questions Page
    </x-slot>
    <div class="card">
        <div class="card-body">
            <h3 class="card-title float-start">
                <a href="{{route('quizzes.index')}}" class="btn btn-secondary"><i
                        class="fa-sharp fa-solid fa-arrow-left"></i> Quiz
                    Page</a>
            </h3>
            <h3 class="card-title float-end">
                <a href="{{route('questions.create',$quiz->id)}}" class="btn btn-primary"><i
                        class="fa fa-plus"></i> Make
                    Questions</a>
            </h3>
            <table class="table table-bordered table-sm">
                <thead>
                    <tr>
                        <th scope="col">Question</th>
                        <th scope="col">Image</th>
                        <th scope="col">1. Answer</th>
                        <th scope="col">2. Answer</th>
                        <th scope="col">3. Answer</th>
                        <th scope="col">4. Answer</th>
                        <th scope="col">Correct Answer</th>
                        <th scope="col">Transactions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($quiz->questions as $question )

                    <tr>
                        <td scope="row">{{$question->question}}</td>
                        <td>
                            @if ($question->image)
                            <a href="{{ asset($question->image) }}" target="_blank">
                                <img src="{{ asset($question->image) }}" width="80"></a>
                            @endif
                        </td>
                        <td>{{$question->answer1}}</td>
                        <td>{{$question->answer2}}</td>
                        <td>{{$question->answer3}}</td>
                        <td>{{$question->answer4}}</td>
                        <td class="text-success">{{substr($question->correct_answer,-1)}}. Answer</td>
                        <td>
                            <div class="d-flex justify-items-between">
                                <a href="{{route('questions.edit',[$quiz->id , $question->id])}}"
                                    class="btn btn-sm btn-primary mx-3"><i class="fa fa-pencil"></i></a>
                                <form action="{{ route('questions.destroy',[$question->quiz_id,$question->id])}}"
                                    method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="bg-red-500 py-1 px-2 rounded text-white"><i
                                            class="fa fa-times"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>