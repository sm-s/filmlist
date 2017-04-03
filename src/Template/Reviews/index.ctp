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
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
</nav>
<div class="reviews index large-9 medium-8 columns content">
    <h3><?= __('All reviews') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('Date') ?></th>
                <th scope="col"></th>
                <th scope="col" style="text-align: center;"><?= $this->Paginator->sort('rating') ?></th>
                <th scope="col" colspan="3"><?= $this->Paginator->sort('film_id') ?></th>
                <th scope="col"><?= __('Reviewed by') ?></th>
                
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reviews as $review): ?>
            <tr>
                <td><?= h($review->created_at->format('d.m.Y')) ?></td>
                <td><?= $this->Html->link(__('Read review'), ['action' => 'view', $review->id]) ?></td>
                <td style="text-align: center;"><?= $this->Number->format($review->rating) ?></td> 
                <td colspan="3"><?= $review->has('film') ? $this->Html->link($review->film->title, ['controller' => 'Films', 'action' => 'view', $review->film->id]) : '' ?></td>
                <td><?= $review->has('user') ? $this->Html->link($review->user->username, ['controller' => 'Users', 'action' => 'view', $review->user->id]) : '' ?></td>             
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
</div>
