<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?php
$session = $this->request->session();
$isAdmin = $session->read('isAdmin');
$isModerator = $session->read('isModerator')
        ;?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
    <?php if($isAdmin) { ?>
        <li><?= $this->Html->link(__('Add a new user'), ['action' => 'add']) ?></li>
    <?php } ?>
    </ul>
</nav>
<div class="users index large-9 medium-8 columns content">
    <?php if (!($isAdmin || $isModerator)) {?>
        <?= __('Dead end.') ?>
        <?= $this->Html->link(__('Go to reviews instead.'), ['controller' => 'Reviews','action' => 'index']) ?>
    <?php } else { ?>
    <h3><?= __('Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('username') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_at') ?></th>
                <?php if ($isAdmin) { ?>
                    <th scope="col"></th>
                <?php } ?> 
            </tr>
        </thead>
        
        <tbody>
            <?php foreach ($users as $user): ?> 
            <tr>

                <td><?= $this->Html->link(__(h($user->username)), ['action' => 'view', $user->id]) ?> </td>
                <td><?= h($user->email) ?></td>
                <td><?= h($user->created_at->format('d.m.Y')) ?></td>
                <?php if ($isAdmin) { ?>
                <td class="actions">
                    <?= $this->Html->link(__('Edit user'), ['action' => 'edit', $user->id]) ?>
                </td>
                <?php } ?> 
            </tr>
                
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}')]) ?></p>
    </div>
    <?php } ?>
</div>
