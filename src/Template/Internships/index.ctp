<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Internship[]|\Cake\Collection\CollectionInterface $internships
 */
?>
<div class="internships index large-9 medium-8 columns content">
    <h3><?= __('Internships') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('company') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('city') ?></th>
                <th scope="col"><?= $this->Paginator->sort('task') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($internships as $internship): ?>
            <tr>
                <td><?= h($internship->company->name) ?></td>
                <td><?= h($internship->name) ?></td>
                <td><?= h($internship->adress) ?></td>
                <td><?= h($internship->city) ?></td>
                <td><?= h($internship->task) ?></td>
                <td><?= h($internship->email) ?></td>
                <td><?= h($internship->created) ?></td>
                <td><?= h($internship->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $internship->id]) ?>
                    <!--Make it so that only the administrator can edit and delete internships-->
                    <?php if ($this->request->session()->read('Auth.User.role') == 'administrator'){ ?>
                      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $internship->id]) ?>
                      <?= $this->Html->link(__('Delete'), ['action' => 'delete', $internship->id]) ?>
                    <?php } ?>
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
