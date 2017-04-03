<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li id="delete"><?= $this->Form->postLink(
                __('Delete film'),
                ['action' => 'delete', $film->id],
                ['confirm' => __('Are you sure you want to delete film: # {0}?', $film->title)]
            )
        ?></li>
    </ul>
</nav>
<div class="films form large-9 medium-8 columns content">
    <?= $this->Form->create($film) ?>
    <fieldset>
        <legend><?= __('Edit film') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('year');
            echo $this->Form->control('director');
            echo $this->Form->textarea('summary');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
  <script src="//cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>