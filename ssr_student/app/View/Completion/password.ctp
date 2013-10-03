<div class="container">
    <?php echo  $this->Session->flash(); ?>
    <div class="row">
        <h2>パスワード変更</h2>
        <?php echo $this->Form->create(null, array()); ?>
        <table>
            <tr class="hr <?php if (!empty($this->validationErrors['UserConfidential']['old_password'])) echo 'error';?>">
                <th>現在のパスワード</th>
                <td>
                    <?php
                    if (!empty($this->validationErrors['UserConfidential']['old_password'])) {
                            echo $this->Form->input('UserConfidential.old_password', array('type' => 'password', 'class' => 'middle error', 'label' => false));
                    } else {
                        echo $this->Form->input('UserConfidential.old_password', array('type' => 'password', 'class' => 'middle', 'label' => false));
                    }
                    ?>
                </td>
            </tr>
            <tr <?php if (!empty($this->validationErrors['UserConfidential']['password'])) echo 'class="error"';?>>
                <th>新しいパスワード</th>
                <td>
                <?php
                if (!empty($this->validationErrors['UserConfidential']['password'])) {
                      echo $this->Form->input('UserConfidential.password', array('type' => 'password', 'class' => 'middle error', 'label' => false));
                } else {
                    echo $this->Form->input('UserConfidential.password', array('type' => 'password', 'class' => 'middle', 'label' => false));
                }
                ?>
                </td>
            </tr>
        </table>
        <div>
            <?php echo $this->Form->submit('変更する', array('name' => 'confirm', 'div' => false, 'class' => 'btn btn-primary')); ?>
            <input type="hidden" name="token" value="<?php echo session_id();?>">
        </div>
    <?php echo $this->Form->end(); ?>
    </div>
</div>
