<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Administrator[]|\Cake\Collection\CollectionInterface $administrators
 */
?>

<div class="administrators index large-9 medium-8 columns content">
    <h3><?= __('Administrators') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('gender') ?></th>
                <th scope="col"><?= $this->Paginator->sort('first_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('last_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('place') ?></th>
                <th scope="col"><?= $this->Paginator->sort('adress') ?></th>
                <th scope="col"><?= $this->Paginator->sort('city') ?></th>
                <th scope="col"><?= $this->Paginator->sort('province') ?></th>
                <th scope="col"><?= $this->Paginator->sort('postal_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('phone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('position') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cell') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fax') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($administrators as $administrator): ?>
            <tr>
                <td><?= $this->Number->format($administrator->id) ?></td>
                <td><?= h($administrator->gender) ?></td>
                <td><?= h($administrator->first_name) ?></td>
                <td><?= h($administrator->last_name) ?></td>
                <td><?= h($administrator->title) ?></td>
                <td><?= h($administrator->place) ?></td>
                <td><?= h($administrator->adress) ?></td>
                <td><?= h($administrator->city) ?></td>
                <td><?= h($administrator->province) ?></td>
                <td><?= h($administrator->postal_code) ?></td>
                <td><?= h($administrator->email) ?></td>
                <td><?= $this->Number->format($administrator->phone) ?></td>
                <td><?= h($administrator->position) ?></td>
                <td><?= $this->Number->format($administrator->cell) ?></td>
                <td><?= $this->Number->format($administrator->fax) ?></td>
                <td><?= h($administrator->created) ?></td>
                <td><?= h($administrator->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $administrator->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $administrator->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $administrator->id], ['confirm' => __('Are you sure you want to delete # {0}?', $administrator->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
