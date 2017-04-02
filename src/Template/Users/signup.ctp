<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
    </ul>
</nav>
<div class="smallForm"> 
   <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Sign up') ?></legend>
        <?php
            echo $this->Form->control('username');
            echo $this->Form->control('email');
            echo $this->Form->control('password');
            echo $this->Form->control('roles._ids', ['value' => 4, 'hidden' => true, 'label' => '']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
