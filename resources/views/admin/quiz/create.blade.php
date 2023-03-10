<x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <x-slot name="header_title">Create Quiz Page</x-slot>
    <x-slot name="header">
        Create Quiz
    </x-slot>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('quizzes.store')}}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label for="title" class="form-label">Quiz Title</label>
                    <input type="text" name="title" class="form-control" id="title" value="{{old('title')}}">
                </div>
                <div class="form-group mb-3">
                    <label for="description" class="form-label">Quiz Description</label>
                    <textarea type="text" name="description" class="form-control" id="description"
                        rows="4">{{old('description')}}</textarea>
                </div>
                <div class="form-group mb-3">
                    <input id="isFinished" @if(old('finished_at')) checked @endif type="checkbox"
                        class="form-check-input">
                    <label class="form-label">Is Quiz End Date ?</label>
                </div>
                <div @if(!old('finished_at')) style="display:none;" @endif id="finishedInput" class="form-group mb-3">
                    <label for="finished_at" class="form-label">Quiz End Date</label>
                    <input type="datetime-local" name="finished_at" class="form-control" value="{{old('finished_at')}}"
                        id="finished_at">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-block">Create</button>
                </div>
            </form>
        </div>
    </div>
    <x-slot name="js">
        <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

        <script>
            $("#isFinished").change(function(){
                if($("#isFinished").is(":checked")){
                    $("#finishedInput").show();
                }else{
                    $("#finishedInput").hide();
                }
            })
        </script>
    </x-slot>
</x-app-layout>