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
        <ul class="myLinks">
        <?php // admins can delete any user account, others can only delete their own accounts 
        if ($isAdmin || ($user->id == $userID)) { ?>
               
        <?php } ?>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <?php if ($isAdmin || $isModerator || ($userID == $user->id)) { ?>
    <h3><?= h($user->username) ?><?= $this->Html->link(__(' edit user account - '), ['action' => 'edit', $user->id]) ?> <?= $this->Html->link(__('change password'), ['action' => 'changepassword', $user->id]) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Role') ?></th>
            <?php if (!empty($user->roles)): ?>
                <td>
                <?php foreach ($user->roles as $roles): ?>
                    <?= h($roles->description) ?>
                    <br>
                <?php endforeach; ?>
                </td>
            <?php endif; ?>
        </tr>
        <tr>
            <th scope="row"><?= __('Since') ?></th>
            <td><?= h($user->created_at->format('d.m.Y')) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
    </table>
    <?php } ?>
    <div class="related">
        <?php if (!empty($user->reviews)): ?>
            <h4><?= __('Reviews by') ?>
            <?= h($user->username) ?></h4>
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <th scope="col"><?= __('Created At') ?></th>                    
                    <th scope="col"><?= __('Film') ?></th>
                    <th scope="col"><?= __('Rating') ?></th>
                    <th scope="col" colspan="2"><?= __('Body') ?></th>
                    <th scope="col"></th>
                </tr>
                <?php foreach ($user->reviews as $reviews): ?>
                <tr>
                    <td><?= h($reviews->created_at->format('d.m.Y')) ?></td>
                    <td><?= h($reviews->film_id) ?></td>
                    <td><?= h($reviews->rating) ?></td>
                    <td colspan="2"><?= h($reviews->body) ?></td>
                    <td><?= $this->Html->link(__('Read review'), ['controller' => 'Reviews', 'action' => 'view', $reviews->id]) ?></td>
                    
                </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>
</div>
