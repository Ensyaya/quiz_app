<x-app-layout>
    <x-slot name="header">
        Quizzes Page
    </x-slot>
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">
                <a href="{{route('quizzes.create')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Make Quiz</a>
            </h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Quiz</th>
                        <th scope="col">Status</th>
                        <th scope="col">Finished At</th>
                        <th scope="col">Transactions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($quizzes as $quiz)

                    <tr>
                        <td scope="row">{{$quiz->title}}</td>
                        <td>{{$quiz->status}}</td>
                        <td>{{$quiz->finished_at}}</td>
                        <td>
                            <a href="{{route('quizzes.edit',$quiz->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></a>
                            <a href="{{ route('quizzes.destroy', $quiz->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$quizzes->links()}}
        </div>
    </div>
</x-app-layout>