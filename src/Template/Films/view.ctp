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
    <ul class="side-nav"></ul>
</nav>
<div class="films view large-9 medium-8 columns content">
    <?php if ($isAdmin || $isDataAdmin) { ?>
        <h3><?= h($film->title) ?><?= $this->Html->link(__(' edit'), ['action' => 'edit', $film->id]) ?></h3>
    <?php } else { ?>
        <h3><?= h($film->title) ?></h3>
     <?php } ?>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Year') ?></th>
            <td><?= h($film->year) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Director') ?></th>
            <td><?= h($film->director) ?></td>
        </tr>
        <tr>
            <?php // summary is not sanitized due to use of TinyMCE ?>
            <th scope="row"><?= __('Summary') ?></th>
            <td><?= ($film->summary) ?></td>
        </tr>

    </table>
    <ul class="myLinks">
        <li><?= $this->Html->link(__('Write a review!'), ['controller' => 'Reviews', 'action' => 'add', $film->id, $film->title]) ?> </li>
    </ul>
    <div class="related">
        <h4><?= __('Reviews') ?></h4>
        <?php if (!empty($film->reviews)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Date') ?></th>
                <th scope="col"><?= __('Rating') ?></th>
                <th scope="col" colspan="5"><?= __('Review') ?></th>
                <!--<th scope="col"><?= __('User Id') ?></th>-->
            </tr>
            <?php foreach ($film->reviews as $reviews): ?>
            <tr>
                <td><?= h($reviews->created_at->format('d.m.Y')) ?></td>
                <td><?= h($reviews->rating) ?></td>
                <td colspan="5"><?= $this->Html->link(__(h($reviews->body)), ['controller' => 'Reviews', 'action' => 'view', $reviews->id]) ?></td>
                <!--<td><?= h($reviews->user_id) ?></td>-->
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
