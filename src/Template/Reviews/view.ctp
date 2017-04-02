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

</nav>
<div class="reviews view large-9 medium-8 columns content">
    <?php if (($isAdmin || $isModerator) || ($userID == $review->user_id)) { ?>
        <h3><?= h($review->film->title) ?><?= $this->Html->link(__(' edit review'), ['action' => 'edit', $review->id]) ?></h3>
    <?php } else { ?>
        <h3><?= h($review->film->title) ?></h3>
     <?php } ?>
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
            <th scope="row"><?= __('Body') ?></th>
            <td><?= h($review->body) ?></td>
        </tr>
    </table>
    <ul class="myLinks">
        <li><?= $this->Html->link(__('Write a review!'), ['action' => 'add', $review->film_id, $review->film->title]) ?></li>
    </ul>
</div>
