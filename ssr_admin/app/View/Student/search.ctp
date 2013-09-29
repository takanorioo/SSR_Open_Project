<div class="container">
    <?php if(isset($query) > 0): ?>
    <ul class="breadcrumb ">
        <li class="active ">検索結果は<b><?php echo count($users)?>件</b>です。</li>
    </ul>
    <?php endif; ?>

<?php if(count($users) > 0): ?>
    <h2>検索在学生</h2>
    <div class="row">
      <table class="table table-striped">
        <thead>
              <tr>
                <th>名前</th>
                <th>性別</th>
                <th>生年月日</th>
                <th>学籍番号</th>
                <th>学年</th>
                <th>学部(研究科</th>
                <th>学科(専攻)</th>
                <th>入学日</th>
              </tr>
            </thead>
            <tbody>
              <?php for($i = 0; $i < count($users); $i++ ): ?>
              <tr>
                <td><a href="/<?php echo $base_dir;?>/student/show/<?php echo h($users[$i]['User']['id']) ?>"><?php echo h($users[$i]['User']['name']) ?></a></td>
                <td><?php echo h($GENDER[$users[$i]['User']['gender']]) ?></td>
                <td><?php echo h($users[$i]['User']['birthday']) ?></td>
                <td><?php echo h($users[$i]['Student']['number']) ?></td>
                <td><?php echo h($GRADE[$users[$i]['Student']['grade']]) ?></td>
                <td><?php echo h($DEPARTMENT[$users[$i]['Student']['department']]) ?></td>
                <td><?php echo h($MAJOR[$users[$i]['Student']['major']]) ?></td>
                <td><?php echo h($users[$i]['Student']['entrance_day']) ?></td>
              <tr>
              <?php endfor; ?>
            </tbody>
      </table>
  </div>
</div>
<?php endif; ?>

<div class="container">
    <?php echo  $this->Session->flash(); ?>
    <h2>検索条件</h2>
    <?php echo $this->Form->create(null, array('type' => 'GET', 'url' => array('action' => 'search'), 'class' => 'well')); ?>
    <div class="row">
        <div class="span5">
            <?php echo $this->Form->input('Search.name', array('label' => '名前')) ?>
            <br>
            <?php echo $this->Form->input('Search.number', array('label' => '学籍番号')) ?>
            <br>
            <?php echo $this->Form->input('Search.gender', array(
                'type' => 'select',
                'multiple' => 'checkbox',
                'label' => '性別',
                'options' => $GENDER
                ))
            ?>
            <br>
            <?php echo $this->Form->input('Search.grade', array(
                'type' => 'select',
                'multiple' => 'checkbox',
                'label' => '学年',
                'options' => $GRADE
                ))
            ?>
        </div>
        <div class="span5">
            <?php echo $this->Form->input('Search.department', array(
                'type' => 'select',
                'multiple' => 'checkbox',
                'label' => '学部（研究科）',
                'options' => $DEPARTMENT
                ))
            ?>
            <br>
             <?php echo $this->Form->input('Search.major', array(
                'type' => 'select',
                'multiple' => 'checkbox',
                'label' => '学部（研究科）',
                'options' => $MAJOR
                ))
            ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="button_section" style="margin-left: 450px;">
        <div class="button_section2 span3" style="margin-bottom: 30px;">
        <?php echo $this->Form->button('検索する', array('class' => 'btn btn-primary span3')); ?>
        </div>
    </div>
</div>
<?php echo $this->Form->end() ?>