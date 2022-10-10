<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Blog[]|\Cake\Collection\CollectionInterface $blog
 * * @var \App\Model\Entity\Blog $blog
 */
?>

<div class="page-header">
    <h2><?= __(' Our Blog') ?></h2>
    <?php  echo $this->Html->image('25.png', ['alt' => 'service']); ?>

    </div>



<div class="blog index content">

    <div class="container">
                <?php foreach ($blog as $blog): ?>
                    <div class="blog-item row">

                     <h3 class="col-12"><?= h($blog->title) ?> </h3>
                     <div class="blog-author">
                     <h5> <small><?= h($blog->date->format('d-m-Y')) ?> by <?= h($blog->author) ?></small></h5>

                     </div>
                     <!-- use this to get img url -->

                    <img class="col-6 image" src=" <?=$this->Url->image("/".$blog->featured_image) ?>">  </img>
                    <div class="col-12 excerpt"> <?= substr(($blog->content), 0, 400) . ((strlen($blog->content)>400)?'...':""); ?></div>


                        <div class="btn"><?= $this->Html->link(__('Read More'), ['action' => 'view', $blog->id]) ?></div>
                        </div>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
         <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p> -->
    </div>

</div>
</div>
