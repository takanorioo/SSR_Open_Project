
  <div class="container">
    <?php echo  $this->Session->flash(); ?>
    <h2>イベント参加者一覧</h2>
    <div class="row">
    <?php if(count($users) > 0): ?>
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
                <td><?php echo h($users[$i]['User']['Student']['number']) ?></td>
                <td><?php echo h($users[$i]['User']['Completion']['completion_day']) ?></td>
                <td><?php echo h($BUSINESSTYPE[$users[$i]['User']['Completion']['GraduationCourse']['business_type']]) ?></td>
                <td><?php echo h($users[$i]['User']['Completion']['GraduationCourse']['department']) ?></td>
              <tr>
              <?php endfor; ?>
            </tbody>
      </table>
    <?php else: ?>
      <h4 style="text-align: center;padding: 20px;">※参加者はいません</h4>
    <?php endif; ?>
    </div>
        <div class="button_section">
        <div class="button_section2 span10"style="margin-bottom: 30px;margin-left: 270px;">
            <a href="/<?php echo $base_dir;?>/event/edit/<?php echo h($event_id); ?>" class="btn btn-primary span2">イベントを編集する</a>
            <a href="/<?php echo $base_dir;?>/event/delete/<?php echo h($event_id); ?>" class="btn btn-danger span2">イベントを削除する</a>
        </div>
    </div>
  </div>
