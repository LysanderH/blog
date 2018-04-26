<?php
// https://laravel.com/docs/5.6/controllers#resource-controllers

// la liste des posts

function index()
{
    include 'models/post.php';

    $posts = getAllPosts();
    return [
        'view' => 'postIndex.php',
        'data' => ['pageTitle' => 'liste des posts',
            'posts' => $posts]
    ];
}


// affiche le formulaire de creation pour un ressource

function create()
{
    return [
        'view' => 'postCreate.php'
    ];
}


// enrigstre la ressource dans la base de donnée
// apres il y aura une redirection

/**
 *
 */
function store()
{
    if (!isset($_POST['title']) || !isset($_POST['content'])) {
        header('Location: index.php?a=create&r=post');
        die();
    }
    include 'models/post.php';

    $title = $_POST['title'];
    $content = $_POST['content'];

    $id = storePost($title, $content);
    header('Location: index.php?a=index&r=post');
    die();

}


// affiche une ressource par rapport a un identifiant

function show()
{
    if (!isset($_GET['id']) || !ctype_digit($_GET['id'])) return false;
    $id = $_GET['id'];
    include 'models/post.php';

    $post = getOnePost($id);

    return [
        'view' => 'postShow.php',
        'data' => [
            'pageTitle' => $post->title,
            'post' => $post
        ]
    ];
}


// afficher le formulaire d'edition par rapport a un identifiant

function edit()
{
    if (!isset($_GET['id']) || !ctype_digit($_GET['id'])) return false;
    $id = $_GET['id'];
    include 'models/post.php';

    $post = getOnePost($id);

    return [
        'view' => 'postEdit.php',
        'data' => [
            'post' => $post
        ]
    ];
}


// modifier une ressource dans la base de donnée par rapport a un identifiant

function update()
{
    if (!isset($_POST['id']) || !ctype_digit($_GET['id']) || !isset($_POST['title']) || !isset($_POST['body'])) {
        header('Location: index.php?a=index&r=post');
        die();
    }
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    include 'models/post.php';
    updatePost($id, $title, $body);

    header('Location: index.php?a=show&r=post&id=' . $id);


}


// supprime un element de la base de donnée
function confirmDelete()
{
    if (!isset($_GET['id']) || !ctype_digit($_GET['id'])) return false;
    $id = $_GET['id'];
    include 'models/post.php';

    $post = getOnePost($id);

    return [
        'view' => 'postConfirmDelete.php',
        'data' => [
            'post' => $post
        ]
    ];
}


function destroy()
{
    if (!isset($_POST['id']) || !ctype_digit($_POST['id'])) {
        return false;
    };
    $id = $_POST['id'];
    include 'models/post.php';
    header('Location: index.php?a=index&r=post');
}








