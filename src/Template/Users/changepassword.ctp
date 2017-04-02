<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?php
$session = $this->request->session();
$isAdmin = $session->read('isAdmin');
$isDataAdmin = $session->read('isDataAdmin');
$isModerator = $session->read('isModerator');
$isFilmReviewer = $session->read('isFilmReviewer');
$userID = $session->read('userid');
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav"></ul>
</nav>
<div class="smallForm"> 
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Change password') ?></legend>
        <?php
            echo $this->Form->input('password', ['label' => 'New password', 
                'value' => '', 'id' => 'key', 'empty']);
            echo $this->Form->input('newPassword', 
                    array('label' => 'Retype the new password', 'value' => '', 
                        'required' => true, 'type' => 'password', 'empty')); ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
