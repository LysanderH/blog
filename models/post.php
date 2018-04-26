<?php

include 'model.php';

function getAllPosts()
{
    $cx = getConnectionToDb();
    $sql = 'SELECT * FROM blog.posts';
    $pst = $cx->query($sql);
    return $pst->fetchAll();

}

function getOnePost($id)
{
    $cx = getConnectionToDb();
    $sql = 'SELECT * FROM blog.posts WHERE id = :id';
    $pst = $cx->prepare($sql);
    $pst->execute([':id' => $id]);
    return $pst->fetch();
}

function storePost($title, $body)
{
    $cx = getConnectionToDb();
    $sql = 'INSERT INTO blog.posts(`title`, `body`) VALUES (:title, :body)';
    $pst = $cx->prepare($sql);
    $pst->execute([':title' => $title, ':body' => $body]);
    return $cx->lastInsertId();
}

function updatePost($id, $title, $content)
{
    $cx = getConnectionToDb();
    $sql = 'UPDATE blog.posts SET title = :title, content = :content WHERE id = :id';
    $pst = $cx->prepare($sql);
    $pst->execute([':title' => $title, ':content' => $content, ':id' => $id]);
}

function deletePost($id)
{
    $cx = getConnectionToDb();
    $sql = 'DELETE FROM blog.posts WHERE id = :id';
    $pst = $cx->prepare($sql);
    $pst->execute([':id' => $id]);
}
function storeUser($id, $name, $password){
    $cx = getConnectionToDb();
    $sql = 'INSERT INTO blog.users WHERE id = :id';
    $pst = $cx->prepare($sql);
    $pst->execute([':id' => $id]);
}