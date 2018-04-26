<div>
    <h1>
        <?= $data['data']['post']->title ?>
    </h1>
    <div>
        <p>
            <?= $data['data']['post']->body ?>
        </p>
    </div>
</div>
<div>
    <a href="index.php?a=edit&r=post&id=<?= $data['data']['post']->id ?>">Modifier cet article</a>
    <a href="index.php?a=confirmDelete&r=<?= $data['data']['post']->id ?>">Demander la suppression de cet article</a>
</div>