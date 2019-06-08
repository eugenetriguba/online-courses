<?php declare(strict_types=1);

class PagesController
{
    public function home()
    {
        return view('index');
    }

    public function about()
    {
        $name = 'Eugene Triguba';
        return view('about', ["name" => $name]);
    }

    public function contact()
    {
        return view('contact');
    }
}