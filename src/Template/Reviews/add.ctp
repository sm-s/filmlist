<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?php
echo $this->Html->css('jquery-ui.min');
echo $this->Html->script('jquery');
echo $this->Html->script('jquery-ui.min');
?>
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
            echo $this->Form->control('rating', ['title' => '5 is the highest, 1 the lowest', 'empty' => true, 
                'options' => array('5' => '5', '4' => '4', '3' => '3', '2' => '2', '1' => '1')]);
            //echo $this->Form->input('rating', array('type' => 'radio', 
            //    'options' => array('1' => '*', '2' => '**', '3' => '***', '4' => '****', '5' => '*****')));
            echo $this->Form->textarea('body', ['title' => 'Write the review here (optional)']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
  <script>
  $( function() {
    $( document ).tooltip();
  } );
  </script>
 
