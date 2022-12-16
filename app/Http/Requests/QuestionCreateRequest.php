<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'question' => 'required | min:3 | max:255',
            'image' => 'image | nullable | max:1024 |mimes:jpg,png,jpeg ',
            'answer1' => 'required | min:1 | max:255',
            'answer2' => 'required | min:1 | max:255',
            'answer3' => 'required | min:1 | max:255',
            'answer4' => 'required | min:1 | max:255',
            'correct_answer' => 'required',
        ];
    }
    public function attributes()
    {
        return [
            'question' => 'Question Content',
            'image' => 'Question Image',
            'answer1' => 'Question 1. Answer',
            'answer2' => 'Question 2. Answer',
            'answer3' => 'Question 3. Answer',
            'answer4' => 'Question 4. Answer',
            'correct_answer' => 'Question Correct Answer',
        ];
    }
}
