<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ClientType $clientType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $clientType->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $clientType->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Client Types'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="clientTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($clientType) ?>
    <fieldset>
        <legend><?= __('Edit Client Type') ?></legend>
        <?php
            echo $this->Form->control('type');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
