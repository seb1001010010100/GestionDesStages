<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Internship $internship
 */
?>
<div class="internships view large-9 medium-8 columns content">
    <h3><?= h($internship->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Company') ?></th>
            <td><?= $internship->has('company') ? $this->Html->link($internship->company->name, ['controller' => 'Companies', 'action' => 'view', $internship->company->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Session') ?></th>
            <td><?= $internship->has('session') ? $this->Html->link($internship->session->season.' '.$internship->session->year, ['controller' => 'Sessions', 'action' => 'view', $internship->session->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($internship->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Task') ?></th>
            <td><?= h($internship->task) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Precision Facility') ?></th>
            <td><?= h($internship->precision_facility) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Precision Task') ?></th>
            <td><?= h($internship->precision_task) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Adress') ?></th>
            <td><?= h($internship->adress) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('City') ?></th>
            <td><?= h($internship->city) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Province') ?></th>
            <td><?= h($internship->province) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Postal Code') ?></th>
            <td><?= h($internship->postal_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($internship->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($internship->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('OwnerStatus') ?></th>
            <td><?= h($internship->ownership_status->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Region') ?></th>
            <td><?= h($internship->region->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ClientType Id') ?></th>
            <td><?= $this->Number->format($internship->clientType_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= $this->Number->format($internship->phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fax') ?></th>
            <td><?= $this->Number->format($internship->fax) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($internship->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($internship->modified) ?></td>
        </tr>
    </table>
</div>
