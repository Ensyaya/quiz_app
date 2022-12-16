<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionCreateRequest;
use App\Http\Requests\QuestionUpdateRequest;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $quiz = Quiz::whereId($id)->with('questions')->first() ?? abort(404, 'Quiz is not found');
        return view('admin.question.list', compact('quiz'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $quiz = Quiz::find($id);
        return view("admin/question/create", compact('quiz'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionCreateRequest $request, $id)
    {
        $quiz = Quiz::find($id);

        if ($request->hasFile('image')) {
            $fileName = Str::slug($request->question) . '.' . $request->image->extension();
            $request->image->move(public_path('uploads'), $fileName);
            $request->merge([
                'image' => 'uploads/' . $fileName
            ]);
        }

        $quiz->questions()->create($request->post());

        return redirect()
            ->route('questions.index', $id)
            ->withSuccess("Question Succesfully Created");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($quiz_id, $id)
    {
        return $quiz_id . '-' . $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($quiz_id, $question_id)
    {
        $question = Quiz::find($quiz_id)->questions()->whereId($question_id)->first() ?? abort(404, 'Quiz or Question is not found');

        return view('admin.question.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionUpdateRequest $request, $quiz_id, $question_id)
    {
        $question = Quiz::findOrFail($quiz_id)->questions()->findOrFail($question_id);

        $this->updateImage($request, $question);

        $question->update($request->post());

        return redirect()->route('questions.index', $quiz_id)->withSuccess("Question Succesfully Updated");
    }

    protected function updateImage(QuestionUpdateRequest $request, $question)
    {
        if ($request->hasFile('image')) {
            $deleted = $question->image;
            File::delete(public_path($deleted));

            $fileName = Str::slug($request->question) . '.' . $request->image->extension();
            $fileNameWithUpload = 'uploads/' . $fileName;

            $request->image->move(public_path('uploads'), $fileName);
            $request->merge([
                'image' => $fileNameWithUpload
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $quiz_id, $question_id)
    {
        $question = Quiz::find($quiz_id)->questions()->whereId($question_id) ?? abort(404, 'Quiz or Question is not found');
        // $this->deleteImage($request, $question);
        $question->delete($request->post());
        return redirect()->route('questions.index', $quiz_id)->withSuccess("Question Succesfully Deleted");
    }
    // protected function deleteImage(Request $request, $question)
    // {
    //     if ($request->hasFile('image')) {
    //         $deleted = $question->image;
    //         File::delete(public_path($deleted));
    //     }
    // }
}
