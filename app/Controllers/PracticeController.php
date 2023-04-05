<?php

namespace App\Controllers;

class PracticeController extends BaseController
{

    public function PracticeGrammar()
    {
        return view('User/Practice/practicegrammar');
    }
    public function PracticeVocabulary()
    {
        return view('User/Practice/practiceVocabulary');
    }
    public function PracticeListen()
    {
        return view('User/Practice/practiceListen');
    }
    public function PracticeRead()
    {
        return view('User/Practice/practiceRead');
    }

}
