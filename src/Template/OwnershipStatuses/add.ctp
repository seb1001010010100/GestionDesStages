<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OwnershipStatus $ownershipStatus
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Ownership Statuses'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="ownershipStatuses form large-9 medium-8 columns content">
    <?= $this->Form->create($ownershipStatus) ?>
    <fieldset>
        <legend><?= __('Add Ownership Status') ?></legend>
        <?php
            echo $this->Form->control('type');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
