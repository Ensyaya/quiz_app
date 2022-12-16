<x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <x-slot name="header_title">Create Question Page</x-slot>
    <x-slot name="header">
        <a href="{{ route('quizzes.index') }}" style="text-decoration: none"><strong>{{$quiz->title}}</strong></a>
        for Create Question
    </x-slot>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('questions.store',$quiz->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <label for="question" class="form-label">Question</label>
                    <textarea type="text" name="question" class="form-control" id="question"
                        rows="4">{{old('question')}}</textarea>
                </div>
                <div class="form-group mb-3">
                    <label for="image" class="form-label">Question Image</label>
                    <input type="file" name="image" class="form-control" id="image" rows="4" value="{{old('image')}}" />
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="answer1" class="form-label">1. Answer</label>
                            <textarea type="text" name="answer1" class="form-control" id="answer1"
                                rows="4">{{old('answer1')}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="answer2" class="form-label">2. Answer</label>
                            <textarea type="text" name="answer2" class="form-control" id="answer2"
                                rows="4">{{old('answer2')}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="answer3" class="form-label">3. Answer</label>
                            <textarea type="text" name="answer3" class="form-control" id="answer3"
                                rows="4">{{old('answer3')}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="answer4" class="form-label">4. Answer</label>
                            <textarea type="text" name="answer4" class="form-control" id="answer4"
                                rows="4">{{old('answer4')}}</textarea>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="finished_at" class="form-label">Correct Answer</label>
                    <select name="correct_answer" id="correct_answer" class="form-control">
                        <option @if (old('correct_answer')==='answer1' ) selected @endif value="answer1">1. Answer</option>
                        <option @if (old('correct_answer')==='answer2' ) selected @endif value="answer2">2. Answer</option>
                        <option @if (old('correct_answer')==='answer3' ) selected @endif value="answer3">3. Answer</option>
                        <option @if (old('correct_answer')==='answer4' ) selected @endif value="answer4">4. Answer</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-block">Create</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>