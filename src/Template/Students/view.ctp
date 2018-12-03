<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Student $student
 */

?>
<?= $this->Html->script("https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js") ?>
<div class="students view large-9 medium-8 columns content">
    <h3><?= h($student->id) ?></h3>

    <?php
        $role = $this->Session->read('Auth.User.role');
        if($role === 'company'){
            // TODO Need to be translate
            echo $this->Html->link('Notifier l\'étudiant pour céduler une rencontre', ['controller' => 'Students', 'action' => 'notify', $student->id], array('class' => 'button'));
        }
    ?>

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
        <h4><?= __('Files') ?></h4>
        <tr>
          <span class="filename">Nothing selected</span>
          <?php
            echo $this->Form->create($file, ['type' => 'file']);
            echo $this->Form->input('ad_photos[]', ['type' => 'file', 'multiple' => 'true', 'label' => 'Add Some Photos']);
            echo $this->Form->button('Add another', array('type' => 'button', 'title' => 'Add another file upload'));
            echo $this->Form->button(__('Submit'));
            echo $this->Form->end();
          ?>
        </tr>
    </div>
    <div class="row">
        <h4><?= __('More Info') ?></h4>
        <?= $this->Text->autoParagraph(h($student->more_info)); ?>
    </div>
</div>


<script type="text/javascript">
  $(function() {
     $("input:file").change(function (){
       var fileName = $(this).val();
       $(".filename").html("fileName");
     });
  });
</script>
