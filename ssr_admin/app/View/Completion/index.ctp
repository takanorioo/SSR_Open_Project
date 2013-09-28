
  <div class="container">
    <?php echo  $this->Session->flash(); ?>
    <div class="row">
        <div class="button_section">
          <div class="button_section2 span12"style="margin-bottom: 30px">
              <a href="/<?php echo $base_dir;?>/completion/student" class="btn btn-primary span2" style="float: right;">新規追加する</a>
          </div>
        </div>
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
