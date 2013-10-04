
<div class="container">
    <?php echo  $this->Session->flash(); ?>
    <h2>イベントの編集</h2>

    <?php echo $this->Form->create(); ?>
        <div>
            <?php if (!empty($this->validationErrors['Event']['form'])): ?>
            <div class="mypage_error_message">
                <p><?php echo $this->Form->error('Event.form'); ?></p>
            </div>
            <?php endif; ?>
            <div>
                <table>
                    <tr <?php if (!empty($this->validationErrors['Event']['name'])) echo 'class="error"';?>>
                        <th><b>イベント名</b></th>
                        <td>
                            <?php echo $this->Form->input('Event.name', array('label' => false, 'div' => false, 'id' => false, 'type' => 'text', 'class' => 'span6', 'error'=>false)); ?>
                            <?php if (!empty($this->validationErrors['Event']['name'])): ?>
                                <span class="error"><?php echo $this->Form->error('Event.name');?></span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr <?php if (!empty($this->validationErrors['Event']['location'])) echo 'class="error"';?>>
                        <th><b>イベント場所</b></th>
                        <td>
                            <?php echo $this->Form->input('Event.location', array('label' => false, 'div' => false, 'id' => false, 'type' => 'text', 'class' => 'span6', 'error'=>false)); ?>
                            <?php if (!empty($this->validationErrors['Event']['location'])): ?>
                                <span class="error"><?php echo $this->Form->error('Event.location');?></span>
                            <?php endif; ?>
                        </td>
                    </tr>
                     <tr <?php if (!empty($this->validationErrors['Event']['date'])) echo 'class="error"';?>>
                        <th><b>時間帯</b></th>
                        <td>
                            <?php echo $this->Form->input('Event.date', array('label' => false, 'div' => false, 'id' => false, 'type' => 'text', 'class' => 'span2 date', 'error'=>false)); ?>
                            <?php if (!empty($this->validationErrors['Event']['date'])): ?>
                                <span class="error"><?php echo $this->Form->error('Event.date');?></span>
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