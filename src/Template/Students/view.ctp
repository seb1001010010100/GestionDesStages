<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Student $student
 */

?>

<div class="students view large-9 medium-8 columns content">
    <h3><?= h($student->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('First Name') ?></th>
            <td><?= h($student->first_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Name') ?></th>
            <td><?= h($student->last_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($student->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($student->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone Sms') ?></th>
            <td><?= h($student->phone_sms) ?></td>
        </tr>
        <!-- Restrict the view so that only the administrator see the active/notes -->
        <?php if ($this->request->session()->read('Auth.User.role') == 'administrator'){ ?>
         <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($student->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($student->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $student->active ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Notes') ?></th>
            <td><?= h($student->notes) ?></td>
        </tr>
       <?php }?>
    </table>
    <div class="row">
        <h4><?= __('More Info') ?></h4>
        <?= $this->Text->autoParagraph(h($student->more_info)); ?>
    </div>
</div>
