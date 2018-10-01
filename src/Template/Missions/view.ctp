<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Mission $mission
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Mission'), ['action' => 'edit', $mission->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Mission'), ['action' => 'delete', $mission->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mission->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Missions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Mission'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="missions view large-9 medium-8 columns content">
    <h3><?= h($mission->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($mission->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($mission->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= $this->Number->format($mission->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= $this->Number->format($mission->modified) ?></td>
        </tr>
    </table>
</div>
