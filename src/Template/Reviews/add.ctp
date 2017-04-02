<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav"></ul></nav>
<div class="reviews form large-9 medium-8 columns content">
    <?= $this->Form->create($review) ?>
    <fieldset>
        <?php $parameter = $this->request->getParam('pass'); 
        $filmTitle = $parameter[1];
        ?>
        <legend><?= __('Add a review - ') ?><?= $filmTitle ?></legend>
            <?php
            echo $this->Form->control('rating', ['label' => 'Rate the film (5 is the highest)', 'empty' => true, 
                'options' => array('5' => '5', '4' => '4', '3' => '3', '2' => '2', '1' => '1')]);
            //echo $this->Form->input('rating', array('type' => 'radio', 
            //    'options' => array('1' => '*', '2' => '**', '3' => '***', '4' => '****', '5' => '*****')));
            echo $this->Form->textarea('body', ['label' => 'Write your review here']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

