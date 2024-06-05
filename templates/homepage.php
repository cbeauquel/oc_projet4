<?php $title = "The ArtBox"; ?>
<?php ob_start(); ?>
           <div id="artwork-list">
                <?php foreach($artworks as $artwork): ?>
                    <article class="artwork">
                        <a href="index.php?action=artwork&id=<?= urlencode($artwork->id) ?>">
                            <img src="<?= $artwork->image ?>" alt="<?= $artwork->title ?>">
                            <h2><?= $artwork->title ?></h2>
                            <p class="description"><?= $artwork->author ?></p>
                        </a>
                    </article>
                <?php endforeach; ?>
            </div>
<?php $content = ob_get_clean(); ?>
<?php require('layout.php') ?>