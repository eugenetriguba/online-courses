<?php declare(strict_types=1);

namespace App\Controllers;

use App\Core\App;

class UsersController
{
    public function index()
    {
        $users = App::get('database')->selectAll('users');
        return view('users', ["users" => $users]);
    }

    /**
     * Inserts the user associated with the request
     * and then redirects back to all users.
     *
     * @throws Exception
     */
    public function store()
    {
        App::get('database')->insert('users', [
            'name' => htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8')
        ]);

        return redirect('users');
    }
}