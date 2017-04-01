<?php
$session = $this->request->session();
$userID = $session->read('userid');
$isAdmin = $session->read('isAdmin');
$isDataAdmin = $session->read('isDataAdmin');
$isModerator = $session->read('isModerator');
$isFilmReviewer = $session->read('isFilmReviewer');
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="delete">
            <?php if ($isAdmin || $isModerator || ($userID == $user->id)) { ?>
            <?= $this->Form->postLink(__('Delete this review'),
            ['action' => 'delete', $review->id],
                ['confirm' => __('Are you sure you want to delete review with title: {0}?', $review->title)])?></li>
        <?php } ?>    
    </ul>
</nav>
<div class="reviews form large-9 medium-8 columns content">
    <?= $this->Form->create($review) ?>
    
    <fieldset>
        <legend><?= __('Edit review') ?></legend>
        <?php
            //echo $this->Form->control('film_id', ['options' => $films]);
            //echo $this->Form->control('user_id', ['options' => $users]);
            //echo $this->Form->control('title');
            
            echo $this->Form->control('rating', ['label' => 'Rate the film (5 is the highest)', 'empty' => true, 
                'options' => array('5' => '5', '4' => '4', '3' => '3', '2' => '2', '1' => '1')]);    
            echo $this->Form->textarea('body');
            
            //echo $this->Form->control('created_at', ['empty' => true]);
            echo $this->Form->control('is_public');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
