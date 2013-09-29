<div class="container">
    <?php if(isset($query) > 0): ?>
    <ul class="breadcrumb ">
        <li class="active ">検索結果は<b><?php echo count($users)?>件</b>です。</li>
    </ul>
    <?php endif; ?>

<?php if(count($users) > 0): ?>

    <?php echo  $this->Session->flash(); ?>
    <div class="row">
      <table class="table table-striped">
        <thead>
              <tr>
                <th>名前</th>
                <th>性別</th>
                <th>生年月日</th>
                <th>学籍番号</th>
                <th>卒業日</th>
                <th>卒業後業種</th>
                <th>卒業後所属</th>
              </tr>
            </thead>
            <tbody>
              <?php for($i = 0; $i < count($users); $i++ ): ?>
              <tr>
                <td><a href="/<?php echo $base_dir;?>/completion/show/<?php echo h($users[$i]['User']['id']) ?>"><?php echo h($users[$i]['User']['name']) ?></a></td>
                <td><?php echo h($GENDER[$users[$i]['User']['gender']]) ?></td>
                <td><?php echo h($users[$i]['User']['birthday']) ?></td>
                <td><?php echo h($users[$i]['Student']['number']) ?></td>
                <td><?php echo h($users[$i]['Completion']['completion_day']) ?></td>
                <td><?php echo h($BUSINESSTYPE[$users[$i]['Completion']['GraduationCourse']['business_type']]) ?></td>
                <td><?php echo h($users[$i]['Completion']['GraduationCourse']['department']) ?></td>
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