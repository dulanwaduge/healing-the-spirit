<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Blog $blog
 */
?>
<div class="row">

    <div class="column-responsive column-80">

        <div class="blog view content container">
            <h1><?= h($blog->title) ?></h1>

            <p class='date-author'><?= h($blog->author) ?> <?= h($blog->date->format('d/m/Y')) ?> </p>

            <div class="blog-header"  >
                <img src="<?=$this->Url->image("/".$blog->featured_image) ?>">
            </div>


            <?= ($blog->content) ?>

        </div>
    </div>
</div>

