<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav"></ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add a new user') ?></legend>
        <?php
            echo $this->Form->control('username');
            echo $this->Form->control('email');
            echo $this->Form->control('password');
            //echo $this->Form->control('created_at', ['empty' => true]);
            echo $this->Form->input('roles._ids', ['options' => $roles, 
                'type' => 'select', 'multiple' => 'checkbox', 'default' => 4]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
