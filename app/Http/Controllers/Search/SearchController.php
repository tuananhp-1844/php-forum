<?php

namespace App\Http\Controllers\Search;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Question;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->search;
        $questions = Question::search($search)->with('user', 'votes', 'category', 'answers');
        $questions = $questions->paginate(config('pagination.question_search'));

        return view('search.search', compact('questions', 'search'));
    }
}
