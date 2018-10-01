<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Mission $mission
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Missions'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="missions form large-9 medium-8 columns content">
    <?= $this->Form->create($mission) ?>
    <fieldset>
        <legend><?= __('Add Mission') ?></legend>
        <?php
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
