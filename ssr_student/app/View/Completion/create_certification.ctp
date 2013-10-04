
<div class="container">
    <?php echo  $this->Session->flash(); ?>
    <h2>証明書発行依頼</h2>

    <?php echo $this->Form->create(); ?>
        <div>
            <?php if (!empty($this->validationErrors['Certification']['form'])): ?>
            <div class="mypage_error_message">
                <p><?php echo $this->Form->error('Certification.form'); ?></p>
            </div>
            <?php endif; ?>
            <div>
                <table>
                    <tr <?php if (!empty($this->validationErrors['Certification']['type'])) echo 'class="error"';?>>
                        <th><b>発行する証明書の種類</b></th>
                        <td>
                            <?php echo $this->Form->input('Certification.type', array('label' => false, 'div' => false, 'id' => false, 'type' => 'select', 'class' => 'span2', 'error'=>false, 'options' => $CERTIFICATION_TYPE, 'empty' => '----')); ?>
                            <?php if (!empty($this->validationErrors['Certification']['type'])): ?>
                                <span class="error"><?php echo $this->Form->error('Certification.type');?></span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr <?php if (!empty($this->validationErrors['Certification']['count'])) echo 'class="error"';?>>
                        <th><b>発行枚数</b></th>
                        <td>
                            <?php echo $this->Form->input('Certification.count', array('label' => false, 'div' => false, 'id' => false, 'type' => 'select', 'class' => 'span2', 'error'=>false, 'options' => $CERTIFICATION_NUMBER, 'empty' => '----')); ?> 枚
                            <?php if (!empty($this->validationErrors['Certification']['count'])): ?>
                                <span class="error"><?php echo $this->Form->error('Certification.count');?></span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr <?php if (!empty($this->validationErrors['Certification']['purpose'])) echo 'class="error"';?>>
                        <th><b>使用目的</b></th>
                        <td>
                            <?php echo $this->Form->input('Certification.purpose', array('label' => false, 'div' => false, 'id' => false, 'type' => 'textarea', 'class' => 'span6', 'error'=>false)); ?>
                            <?php if (!empty($this->validationErrors['Certification']['purpose'])): ?>
                                <span class="error"><?php echo $this->Form->error('Certification.purpose');?></span>
                            <?php endif; ?>
                        </td>
                    </tr>
                   <tr <?php if (!empty($this->validationErrors['Certification']['other_address'])) echo 'class="error"';?>>
                        <th><b>発送先(住所と異なる場合)</b></th>
                        <td>
                            <?php echo $this->Form->input('Certification.other_address', array('label' => false, 'div' => false, 'id' => false, 'type' => 'text', 'class' => 'span6', 'error'=>false)); ?>
                            <?php if (!empty($this->validationErrors['Certification']['other_address'])): ?>
                                <span class="error"><?php echo $this->Form->error('Certification.other_address');?></span>
                            <?php endif; ?>
                        </td>
                    </tr>

                </table>
            </div>
            <div class="row" style="padding-top: 30px;">
                <p>
                    <?php echo $this->Form->submit('上記の内容で大学に依頼を出す', array('class' => 'btn btn-primary', 'name' => 'confirm', 'div' => false)); ?>
                    <input type="hidden" name="token" value="<?php echo session_id();?>">
                </p>
            </div>
        </div>
    <?php echo $this->Form->end(); ?>
</div>