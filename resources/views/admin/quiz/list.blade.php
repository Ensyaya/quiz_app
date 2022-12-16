<x-app-layout>
    <x-slot name="header_title">Quizzes Page</x-slot>
    <x-slot name="header">
        <a href="{{ route('quizzes.index') }}"><strong>Quizzes Page</strong></a>
    </x-slot>
    <div class="card">
        <div class="card-header d-flex justify-content-between mb-2">
            <form action="" method="GET" class="row col-md-10">
                <div class="col-md-4">
                    <input type="text" value="{{request()->get('title')}}" name="title" placeholder="Quiz name"
                        class="rounded w-full ">
                </div>
                <div class="col-md-4 ml-2">
                    <select name="status" se onchange="this.form.submit()" class="rounded w-full">
                        <option value="">Choose Status</option>
                        <option @if (request()->get('status')==='publish' ) selected @endif value="publish">Active
                        </option>
                        <option @if (request()->get('status')==='passive' ) selected @endif value="passive">Passive
                        </option>
                        <option @if (request()->get('status')==='draft' ) selected @endif value="draft">Draft</option>
                    </select>
                </div>
                @if (request()->get('title') || request()->get('status'))
                <div class="col-md-2">
                    <a href="{{route('quizzes.index')}}" class="btn btn-secondary" style="margin-top: 2px"><i
                            class="fa-sharp fa-solid fa-rotate"></i> Reset</a>
                </div>
                @endif
            </form>
            <h3 class="card-title col-md-2 flex flex-row-reverse">
                <a href="{{route('quizzes.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Make
                    Quiz</a>
            </h3>
        </div>
        <div class="card-body">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Quiz</th>
                        <th scope="col">Number of Questions</th>
                        <th scope="col">Status</th>
                        <th scope="col">Finished At</th>
                        <th scope="col">Transactions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($quizzes as $quiz)

                    <tr>
                        <td scope="row">{{$quiz->title}}</td>
                        <td>{{$quiz->questions_count}}</td>
                        <td>
                            @switch($quiz->status)
                            @case('publish')
                            <h5><span class="badge rounded-pill text-dark bg-success text-sm px-2 py-1">Active</span>
                            </h5>
                            @break
                            @case('passive')
                            <h5><span class="badge rounded-pill text-dark bg-danger text-sm px-2 py-1">Passive</span>
                            </h5>
                            @break
                            @case('draft')
                            <h5><span class="badge rounded-pill text-dark bg-warning text-sm px-2 py-1">Draft</span>
                            </h5>
                            @break
                            @endswitch
                        </td>
                        <td>
                            <span title="{{ $quiz->finished_at}}">
                                {{ $quiz->finished_at ? $quiz->finished_at->diffForHumans() : '-'}}
                            </span>
                        </td>
                        <td>
                            <div class="d-flex justify-items-between">
                                <a href="{{route('questions.index',$quiz->id)}}" class="btn btn-sm btn-warning"><i
                                        class="fa fa-question"></i></a>
                                <a href="{{route('quizzes.edit',$quiz->id)}}" class="btn btn-sm btn-primary mx-3"><i
                                        class="fa fa-pencil"></i></a>
                                <form action="{{ route('quizzes.destroy',$quiz->id)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="bg-red-500 py-1 px-2 rounded text-white">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </form>
                            </div>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$quizzes->withQueryString()->links()}}
        </div>
    </div>
</x-app-layout>