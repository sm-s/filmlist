<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit role'), ['action' => 'edit', $role->id]) ?></li>
    </ul>
</nav>
<div class="roles view large-9 medium-8 columns content">
    <h3><?= h($role->description) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="col"><?= __('Id') ?></th>
            <td><?= $this->Number->format($role->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Users') ?></h4>
        <?php if (!empty($role->users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Username') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Created At') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($role->users as $users): ?>
            <tr>
                <td><?= h($users->id) ?></td>
                <td><?= $this->Html->link(__(h($users->username)), ['controller' => 'Users', 'action' => 'view', $users->id]) ?></td>
                <td><?= h($users->email) ?></td>
                <td><?= h($users->created_at->format('d.m.Y')) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Edit user'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
