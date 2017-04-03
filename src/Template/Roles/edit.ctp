<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li id="delete"><?= $this->Form->postLink(
                __('Delete this role permanently'),
                ['action' => 'delete', $role->id],
                ['confirm' => __('Are you sure you want to delete role: {0}?', $role->description)]
            )
        ?></li>

    </ul>
</nav>
<div class="smallForm">
    <?= $this->Form->create($role) ?>
    <fieldset>
        <legend><?= __('Edit role') ?></legend>
        <?php
            echo $this->Form->control('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
