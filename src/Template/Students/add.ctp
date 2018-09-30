<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Student $student
 */
?>

<div class="students form large-9 medium-8 columns content">
    <?= $this->Form->create($student) ?>
    <fieldset>
        <legend><?= __('Inscription Étudiant') ?></legend>
        <?php
            echo $this->Form->control('first_name');
            echo $this->Form->control('last_name');
			echo $this->Form->control('phone_sms');
            echo $this->Form->control('email');
            echo $this->Form->control('password');
            echo $this->Form->control('more_info');
            
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
