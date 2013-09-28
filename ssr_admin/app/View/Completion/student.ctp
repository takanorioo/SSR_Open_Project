
  <div class="container">
    <?php echo  $this->Session->flash(); ?>
    <div class="row">
      <h3>修了学生にする生徒を選択してください</h3>
    </div>
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
                <td><a href="/<?php echo $base_dir;?>/completion/add/<?php echo h($users[$i]['User']['id']) ?>"><?php echo h($users[$i]['User']['name']) ?></a></td>
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
