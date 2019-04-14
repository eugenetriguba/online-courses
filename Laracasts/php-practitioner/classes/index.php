<?php

/**
 * Helper function to format
 * var_dump more neatly
 *
 * @param $data
 */
function dataDump($data) : void
{
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
    die();
}

// Todo Application
// 
// Todo, Comment, User

class Task 
{
    protected $description;
    protected $completed;

    /**
     * Task constructor.
     * @param String $description
     */
    public function __construct(String $description)
    {
        $this->description = $description;
        $this->completed = false;
    }

    public function getDesc() : String
    {
        return $this->description;
    }

    public function isComplete() : bool
    {
        return $this->completed;
    }

    public function complete() : void
    {
        $this->completed = true;
    }
}

$tasks = [
    new Task('Go to the store'),
    new Task('Eat Breakfast'),
    new Task('Clean my room')
];

$tasks[0]->complete();

require 'index.view.php';