
<div class="container">
    <?php echo  $this->Session->flash(); ?>
    <h2>Edit Your Account</h2>

    <?php echo $this->Form->create(); ?>
        <div>
            <?php if (!empty($this->validationErrors['User']['form'])): ?>
            <div class="mypage_error_message">
                <p><?php echo $this->Form->error('User.form'); ?></p>
            </div>
            <?php endif; ?>
            <div>
                <table>
                    <tr <?php if (!empty($this->validationErrors['User']['adress'])) echo 'class="error"';?>>
                        <th><b>住所</b></th>
                        <td>
                            <?php echo $this->Form->input('User.adress', array('label' => false, 'div' => false, 'id' => false, 'type' => 'text', 'class' => 'span6', 'error'=>false)); ?>
                            <?php if (!empty($this->validationErrors['User']['adress'])): ?>
                                <span class="error"><?php echo $this->Form->error('User.adress');?></span>
                            <?php endif; ?>
                        </td>
                    </tr>
                     <tr <?php if (!empty($this->validationErrors['User']['phone'])) echo 'class="error"';?>>
                        <th><b>電話番号</b></th>
                        <td>
                            <?php echo $this->Form->input('User.phone', array('label' => false, 'div' => false, 'id' => false, 'type' => 'text', 'class' => 'span6', 'error'=>false)); ?>
                            <?php if (!empty($this->validationErrors['User']['phone'])): ?>
                                <span class="error"><?php echo $this->Form->error('User.phone');?></span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr <?php if (!empty($this->validationErrors['Student']['guarantor_name'])) echo 'class="error"';?>>
                        <th><b>保証人氏名</b></th>
                        <td>
                            <?php echo $this->Form->input('Student.guarantor_name', array('label' => false, 'div' => false, 'id' => false, 'type' => 'text', 'class' => 'span6', 'error'=>false)); ?>
                            <?php if (!empty($this->validationErrors['Student']['guarantor_name'])): ?>
                                <span class="error"><?php echo $this->Form->error('Student.guarantor_name');?></span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr <?php if (!empty($this->validationErrors['Student']['guarantor_adress'])) echo 'class="error"';?>>
                        <th><b>保証人氏名</b></th>
                        <td>
                            <?php echo $this->Form->input('Student.guarantor_adress', array('label' => false, 'div' => false, 'id' => false, 'type' => 'text', 'class' => 'span6', 'error'=>false)); ?>
                            <?php if (!empty($this->validationErrors['Student']['guarantor_adress'])): ?>
                                <span class="error"><?php echo $this->Form->error('Student.guarantor_adress');?></span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr <?php if (!empty($this->validationErrors['Student']['guarantor_email'])) echo 'class="error"';?>>
                        <th><b>保証人連絡先</b></th>
                        <td>
                            <?php echo $this->Form->input('Student.guarantor_email', array('label' => false, 'div' => false, 'id' => false, 'type' => 'text', 'class' => 'span6', 'error'=>false)); ?>
                            <?php if (!empty($this->validationErrors['Student']['guarantor_email'])): ?>
                                <span class="error"><?php echo $this->Form->error('Student.guarantor_email');?></span>
                            <?php endif; ?>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="row" style="padding-top: 30px;">
                <p>
                    <?php echo $this->Form->submit('編集を完了する', array('class' => 'btn btn-primary', 'name' => 'confirm', 'div' => false)); ?>
                    <input type="hidden" name="token" value="<?php echo session_id();?>">
                </p>
            </div>
        </div>
    <?php echo $this->Form->end(); ?>
</div>