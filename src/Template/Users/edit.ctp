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
    <ul class="side-nav">
        <?php // admins can delete any user account, others can only delete their own accounts 
        if ($isAdmin || ($userID == $user->id)) { ?>
        <li id="delete">
            <?= $this->Form->postLink(__('Delete user account permanently'),
            ['action' => 'delete', $user->id],
                ['confirm' => __('Are you sure you want to delete user: {0}?', $user->username)])?></li>
        <?php } ?>
    </ul>    
</nav>

<div class="smallForm">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Edit user information') ?></legend>
        <?php
            echo $this->Form->control('username');
            echo $this->Form->control('email');
            if ($isAdmin) { 
                echo $this->Form->control('password');
                echo $this->Form->input('roles._ids', ['options' => $roles, 
                    'type' => 'select', 'multiple' => 'checkbox']);
            }
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>


