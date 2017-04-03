<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?php
$session = $this->request->session();
$userID = $session->read('userid');
$isAdmin = $session->read('isAdmin');
$isDataAdmin = $session->read('isDataAdmin');
$isModerator = $session->read('isModerator');
$isFilmReviewer = $session->read('isFilmReviewer');
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class='side-nav'>
    <?php if (($isAdmin || $isModerator) || ($userID == $review->user_id)) { ?>
        <li><?= $this->Html->link(__('Edit review'), ['action' => 'edit', $review->id]) ?></li>
    <?php } 
    if ($isAdmin || $isModerator || $isFilmReviewer) { ?>
        <li><?= $this->Html->link(__('Write a review!'), 
                ['action' => 'add', $review->film_id, $review->film->title]) ?></li>
    <?php } ?>    
    </ul>
</nav>
<div class="reviews view large-9 medium-8 columns content">
    <h3><?= h($review->film->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Created on') ?></th>
            <td><?= h($review->created_at->format('d.m.Y')) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reviewed by') ?></th>
            <td><?= $review->has('user') ? $this->Html->link($review->user->username, ['controller' => 'Users', 'action' => 'view', $review->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rating') ?></th>
            <td><?= $this->Number->format($review->rating) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Review') ?></th>
            <td><?= h($review->body) ?></td>
        </tr>
    </table>
</div>
