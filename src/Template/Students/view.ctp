<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Student $student
 */
$urlSaveChk = $this->Url->build('/students/save-chk-internship', true);
echo $this->Html->scriptBlock('var urlSaveChk = "' . $urlSaveChk . '";', ['block' => true]);
echo $this->Html->scriptBlock('var csrfToken = '.json_encode($this->request->getParam('_csrfToken')).';', ['block' => true]);
?>
<?= $this->Html->script("https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js") ?>
<?= $this->Html->script('Students/view'); ?>

<div class="students view large-9 medium-8 columns content">
    <h3><?= h($student->id) ?></h3>

    <?php
        $role = $this->Session->read('Auth.User.role');
        if($role === 'company'){
            echo $this->Html->link('Notifier l\'étudiant pour céduler une rencontre', ['controller' => 'Students', 'action' => 'notify', $student->id], array('class' => 'button'));
            ?>
            <p>
                <?= __('Internship') ?>
                <input type="checkbox" name="chkInternship" <?= $student->internship ? 'checked' : ""?> onclick="hello()">
                <input type="hidden" id="student-id" name="student_id" value="<?=$student->id?>" >
            </p>
            <?php
        }
    ?>

    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('First Name') ?></th>
            <td><?= h($student->first_name) ?></td>
            <td><?= h($student->internship) ?></td>
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
        <table>
          <?php foreach($file as $f): ?>
            <tr>
              <td ><?= h($f->titre) ?></td>
              <td><?= $this->Html->link(__('Download'), ['controller' => 'files', 'action' => 'download', $f->id]) ?></td>
              <?php if($role === 'student'){ ?>
              <td><?= $this->Html->link(__('Delete'), ['controller' => 'files', 'action' => 'delete', $f->id], ['confirm' => __('Are you sure you want to delete # {0}?', $f->id)]) ?></td>
            <?php }?>
            </tr>
          <?php endforeach; ?>
        <tr>
          <?php
          if($role === 'student'){
            echo $this->Form->create('File', array('url' => array('controller' => 'Files', 'action' => 'add', $student->id), 'enctype' => 'multipart/form-data'));
            echo $this->Form->file('file.', array('type'=>'file','multiple'=>'true','label' => 'Pdf', 'docx'));
            echo $this->Form->submit('Upload', ['type'=>'submit', 'class' => 'form-controlbtn btn-default']);
            echo $this->Form->end();
          }
          ?>
        </tr>
      </table>
    </div>
    <div class="row">
        <h4><?= __('More Info') ?></h4>
        <?= $this->Text->autoParagraph(h($student->more_info)); ?>
    </div>
</div>
