<div>
    <h1>
        la liste des posts
    </h1>
    <ol>
        <?php foreach ($data['data']['posts'] as $post): ?>
            <li>
                <h2>
                    <a href="index.php?a=show&r=post&id=<?= $post->id; ?>"><?= $post->title; ?></a>
                </h2>
            </li>
        <?php endforeach; ?>
    </ol>
</div>
<div><a href="index.php?a=create&r=post">Créer un article</a></div>
<div>
    <a href="index.php?a=login&r=post">Se connecter</a>
</div>
