<?php

class Post
{
    public $title;
    public $author;
    public $published;

    public function __construct(String $title, String $author, bool $published)
    {
        $this->title = $title;
        $this->author = $author;
        $this->published = $published;
    }
}

$posts = [
    new Post('My First Post', 'ET', true),
    new Post('My Second Post', 'ET', true),
    new Post('My Third Post', 'RA', true),
    new Post('My Fourth Post', 'PB', false)
];

// Filters down a collection by returning a boolean for if that item
// gets included
// In this case, all posts that are unpublished.
$unpublishedPosts = array_filter($posts, function (Post $post) : bool {
    return !$post->published;
});

$publishedPosts = array_filter($posts, function (Post $post) : bool {
    return $post->published;
});

// Note: callback and array are in reverse order
// from array_filter. Oftentimes, you'll use wrapper
// functions to deal with PHP's inconsistencies
// array_map is useful when you need to modify what
// gets returned. This returns an array of posts
// that are converted to arrays
$modified = array_map(function (Post $post) : array {
    return (array) $post;
}, $posts);

// For every post, set it's published status to true.
foreach ($posts as $post)
    $post->published = true;

// These two do the same thing, but you can see the
// array_column function feels more natural.
$titlesForEach = array_map(function (Post $post) : string {
    return $post->title;
}, $posts);
$titles = array_column($posts, 'title');

$authors = array_column($posts, 'author', 'title');

// Again, the next two do the same thing.
// The second one just might feel a little
// cleaner or more natural to some.
foreach ($posts as $index => $post)
    $posts[$index] = (array) $post;

$posts = array_map(function(Post $post) : array {
    return (array) $post;
}, $posts);