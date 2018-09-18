<?php

namespace DareToConquer\Http\Controllers;

use Illuminate\Http\Request;
use DareToConquer\Question;

class QuestionCategoryController extends Controller
{
    public function show($category)
    {
        $cat = ucwords($category);

        $questions = Question::where('category', $cat)->orderBy('updated_at', 'DESC')->get();

        return view('question.category.show', compact('questions', 'cat'));
    }
}
