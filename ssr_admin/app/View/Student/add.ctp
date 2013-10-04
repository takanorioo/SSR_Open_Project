
<div class="container">
    <?php echo  $this->Session->flash(); ?>
    <h2>新規学生追加</h2>

    <?php echo $this->Form->create(); ?>
        <div>
            <?php if (!empty($this->validationErrors['User']['form'])): ?>
            <div class="mypage_error_message">
                <p><?php echo $this->Form->error('User.form'); ?></p>
            </div>
            <?php endif; ?>
            <div>
                <table>
                    <tr <?php if (!empty($this->validationErrors['UserConfidential']['email'])) echo 'class="error"';?>>
                        <th><b>Email</b></th>
                        <td>
                            <?php echo $this->Form->input('UserConfidential.email', array('label' => false, 'div' => false, 'id' => false, 'type' => 'text', 'class' => 'span6', 'error'=>false)); ?>
                            <?php if (!empty($this->validationErrors['UserConfidential']['email'])): ?>
                                <span class="error"><?php echo $this->Form->error('UserConfidential.email');?></span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr <?php if (!empty($this->validationErrors['UserConfidential']['password'])) echo 'class="error"';?>>
                        <th><b>仮Password</b></th>
                        <td>
                            <?php echo $this->Form->input('UserConfidential.password', array('label' => false, 'div' => false, 'id' => false, 'type' => 'text', 'class' => 'span6', 'error'=>false)); ?>
                            <?php if (!empty($this->validationErrors['UserConfidential']['password'])): ?>
                                <span class="error"><?php echo $this->Form->error('UserConfidential.password');?></span>
                            <?php endif; ?>
                        </td>
                    </tr>
                     <tr <?php if (!empty($this->validationErrors['User']['name'])) echo 'class="error"';?>>
                        <th><b>名前</b></th>
                        <td>
                            <?php echo $this->Form->input('User.name', array('label' => false, 'div' => false, 'id' => false, 'type' => 'text', 'class' => 'span6', 'error'=>false)); ?>
                            <?php if (!empty($this->validationErrors['User']['name'])): ?>
                                <span class="error"><?php echo $this->Form->error('User.name');?></span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr <?php if (!empty($this->validationErrors['User']['nationality'])) echo 'class="error"';?>>
                        <th><b>国籍</b></th>
                        <td>
                            <?php echo $this->Form->input('User.nationality', array('label' => false, 'div' => false, 'id' => false, 'type' => 'text', 'class' => 'span6', 'error'=>false)); ?>
                            <?php if (!empty($this->validationErrors['User']['nationality'])): ?>
                                <span class="error"><?php echo $this->Form->error('User.nationality');?></span>
                            <?php endif; ?>
                        </td>
                    </tr>
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
                    <tr <?php if (!empty($this->validationErrors['User']['birthday'])) echo 'class="error"';?>>
                        <th><b>生年月日</b></th>
                        <td>
                            <?php echo $this->Form->input('User.birthday', array('label' => false, 'div' => false, 'id' => 'date', 'type' => 'text', 'class' => 'span2 date', 'error'=>false)); ?>
                            <?php if (!empty($this->validationErrors['User']['birthday'])): ?>
                                <span class="error"><?php echo $this->Form->error('User.birthday');?></span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr <?php if (!empty($this->validationErrors['User']['gender'])) echo 'class="error"';?>>
                        <th><b>性別</b></th>
                        <td>
                            <?php echo $this->Form->input('User.gender', array('label' => false, 'div' => false, 'id' => false, 'type' => 'select', 'class' => 'span6', 'error'=>false, 'options' => $GENDER, 'empty' => '----')); ?>
                            <?php if (!empty($this->validationErrors['User']['gender'])): ?>
                                <span class="error"><?php echo $this->Form->error('User.gender');?></span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr <?php if (!empty($this->validationErrors['Student']['grade'])) echo 'class="error"';?>>
                        <th><b>学年</b></th>
                        <td>
                            <?php echo $this->Form->input('Student.grade', array('label' => false, 'div' => false, 'id' => false, 'type' => 'select', 'class' => 'span6', 'error'=>false, 'options' => $GRADE, 'empty' => '----')); ?>
                            <?php if (!empty($this->validationErrors['Student']['grade'])): ?>
                                <span class="error"><?php echo $this->Form->error('Student.grade');?></span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr <?php if (!empty($this->validationErrors['Student']['department'])) echo 'class="error"';?>>
                        <th><b>学部(研究科)</b></th>
                        <td>
                            <?php echo $this->Form->input('Student.department', array('label' => false, 'div' => false, 'id' => false, 'type' => 'select', 'class' => 'span6', 'error'=>false, 'options' => $DEPARTMENT, 'empty' => '----')); ?>
                            <?php if (!empty($this->validationErrors['Student']['department'])): ?>
                                <span class="error"><?php echo $this->Form->error('Student.department');?></span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr <?php if (!empty($this->validationErrors['Student']['major'])) echo 'class="error"';?>>
                        <th><b>学科(専攻)</b></th>
                        <td>
                            <?php echo $this->Form->input('Student.major', array('label' => false, 'div' => false, 'id' => false, 'type' => 'select', 'class' => 'span6', 'error'=>false, 'options' => $MAJOR, 'empty' => '----')); ?>
                            <?php if (!empty($this->validationErrors['Student']['major'])): ?>
                                <span class="error"><?php echo $this->Form->error('Student.major');?></span>
                            <?php endif; ?>
                        </td>
                    </tr>
                     <tr <?php if (!empty($this->validationErrors['Student']['number'])) echo 'class="error"';?>>
                        <th><b>学籍番号</b></th>
                        <td>
                            <?php echo $this->Form->input('Student.number', array('label' => false, 'div' => false, 'id' => false, 'type' => 'text', 'class' => 'span6', 'error'=>false)); ?>
                            <?php if (!empty($this->validationErrors['Student']['number'])): ?>
                                <span class="error"><?php echo $this->Form->error('Student.number');?></span>
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
                        <th><b>保証人住所</b></th>
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
                    <tr <?php if (!empty($this->validationErrors['Student']['entrance_day'])) echo 'class="error"';?>>
                        <th><b>入学日</b></th>
                        <td>
                            <?php echo $this->Form->input('Student.entrance_day', array('label' => false, 'div' => false, 'id' => 'date', 'type' => 'text', 'class' => 'span2 date', 'error'=>false)); ?>
                            <?php if (!empty($this->validationErrors['Student']['entrance_day'])): ?>
                                <span class="error"><?php echo $this->Form->error('Student.entrance_day');?></span>
                            <?php endif; ?>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="row" style="padding-top: 30px;">
                <p>
                    <?php echo $this->Form->submit('追加する', array('class' => 'btn btn-primary', 'name' => 'confirm', 'div' => false)); ?>
                    <input type="hidden" name="token" value="<?php echo session_id();?>">
                </p>
            </div>
        </div>
    <?php echo $this->Form->end(); ?>
</div>