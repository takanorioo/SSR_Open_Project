
<div class="container">
    <?php echo  $this->Session->flash(); ?>
    <h2>修了生の情報を変更する</h2>

    <?php echo $this->Form->create(); ?>
        <div>
            <?php if (!empty($this->validationErrors['User']['form'])): ?>
            <div class="mypage_error_message">
                <p><?php echo $this->Form->error('User.form'); ?></p>
            </div>
            <?php endif; ?>
            <div>
                <table>
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
                            <?php echo $this->Form->input('User.birthday', array('label' => false, 'div' => false, 'id' => false, 'type' => 'text', 'class' => 'span2 date', 'error'=>false)); ?>
                            <?php if (!empty($this->validationErrors['User']['birthday'])): ?>
                                <span class="error"><?php echo $this->Form->error('User.birthday');?></span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr <?php if (!empty($this->validationErrors['User']['gender'])) echo 'class="error"';?>>
                        <th><b>性別</b></th>
                        <td>
                            <?php echo $this->Form->input('User.gender', array('label' => false, 'div' => false, 'id' => false, 'type' => 'select', 'class' => 'span6', 'error'=>false, 'options' => $GENDER)); ?>
                            <?php if (!empty($this->validationErrors['User']['gender'])): ?>
                                <span class="error"><?php echo $this->Form->error('User.gender');?></span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr <?php if (!empty($this->validationErrors['Student']['grade'])) echo 'class="error"';?>>
                        <th><b>最終学年</b></th>
                        <td>
                            <?php echo $this->Form->input('Student.grade', array('label' => false, 'div' => false, 'id' => false, 'type' => 'select', 'class' => 'span6', 'error'=>false, 'options' => $GRADE)); ?>
                            <?php if (!empty($this->validationErrors['Student']['grade'])): ?>
                                <span class="error"><?php echo $this->Form->error('Student.grade');?></span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr <?php if (!empty($this->validationErrors['Student']['department'])) echo 'class="error"';?>>
                        <th><b>最終学部(研究科)</b></th>
                        <td>
                            <?php echo $this->Form->input('Student.department', array('label' => false, 'div' => false, 'id' => false, 'type' => 'select', 'class' => 'span6', 'error'=>false, 'options' => $DEPARTMENT)); ?>
                            <?php if (!empty($this->validationErrors['Student']['department'])): ?>
                                <span class="error"><?php echo $this->Form->error('Student.department');?></span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr <?php if (!empty($this->validationErrors['Student']['major'])) echo 'class="error"';?>>
                        <th><b>最終学科(専攻)</b></th>
                        <td>
                            <?php echo $this->Form->input('Student.major', array('label' => false, 'div' => false, 'id' => false, 'type' => 'select', 'class' => 'span6', 'error'=>false, 'options' => $MAJOR)); ?>
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
                            <?php echo $this->Form->input('Student.entrance_day', array('label' => false, 'div' => false, 'id' => false, 'type' => 'text', 'class' => 'span2 date', 'error'=>false)); ?>
                            <?php if (!empty($this->validationErrors['Student']['entrance_day'])): ?>
                                <span class="error"><?php echo $this->Form->error('Student.entrance_day');?></span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr <?php if (!empty($this->validationErrors['Completion']['completion_day'])) echo 'class="error"';?>>
                        <th><b>卒業日</b></th>
                        <td>
                            <?php echo $this->Form->input('Completion.completion_day', array('label' => false, 'div' => false, 'id' => false, 'type' => 'text', 'class' => 'span2 date', 'error'=>false)); ?>
                            <?php if (!empty($this->validationErrors['Completion']['completion_day'])): ?>
                                <span class="error"><?php echo $this->Form->error('Completion.completion_day');?></span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr <?php if (!empty($this->validationErrors['Completion']['GraduationCourse']['business_type'])) echo 'class="error"';?>>
                        <th><b>卒業後業種</b></th>
                        <td>
                            <?php echo $this->Form->input('Completion.GraduationCourse.business_type', array('label' => false, 'div' => false, 'id' => false, 'type' => 'select', 'class' => 'span6',  'options' => $BUSINESSTYPE, 'error'=>false)); ?>
                            <?php if (!empty($this->validationErrors['Completion']['GraduationCourse']['business_type'])): ?>
                                <span class="error"><?php echo $this->Form->error('Completion.GraduationCourse.business_type');?></span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr <?php if (!empty($this->validationErrors['Completion']['GraduationCourse']['department'])) echo 'class="error"';?>>
                        <th><b>卒業後所属</b></th>
                        <td>
                            <?php echo $this->Form->input('Completion.GraduationCourse.department', array('label' => false, 'div' => false, 'id' => false, 'type' => 'text', 'class' => 'span6', 'error'=>false)); ?>
                            <?php if (!empty($this->validationErrors['Completion']['GraduationCourse']['department'])): ?>
                                <span class="error"><?php echo $this->Form->error('Completion.GraduationCourse.department');?></span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr <?php if (!empty($this->validationErrors['Completion']['GraduationCourse']['role'])) echo 'class="error"';?>>
                        <th><b>卒業後役職</b></th>
                        <td>
                            <?php echo $this->Form->input('Completion.GraduationCourse.role', array('label' => false, 'div' => false, 'id' => false, 'type' => 'text', 'class' => 'span6', 'error'=>false)); ?>
                            <?php if (!empty($this->validationErrors['Completion']['GraduationCourse']['role'])): ?>
                                <span class="error"><?php echo $this->Form->error('Completion.GraduationCourse.role');?></span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr <?php if (!empty($this->validationErrors['Completion']['GraduationCourse']['remark'])) echo 'class="error"';?>>
                        <th><b>その他特記事項</b></th>
                        <td>
                            <?php echo $this->Form->input('Completion.GraduationCourse.remark', array('label' => false, 'div' => false, 'id' => false, 'type' => 'text', 'class' => 'span6', 'error'=>false)); ?>
                            <?php if (!empty($this->validationErrors['Completion']['GraduationCourse']['remark'])): ?>
                                <span class="error"><?php echo $this->Form->error('Completion.GraduationCourse.remark');?></span>
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