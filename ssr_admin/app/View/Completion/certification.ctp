
  <div class="container">
    <?php echo  $this->Session->flash(); ?>
    <div class="row">
      <h3>下記の修了生から証明書の依頼が届いています</h3>
    </div>
    <div class="row">
      <table class="table table-striped">
        <thead>
              <tr>
                <th>名前</th>
                <th>学籍番号</th>
                <th>修了日</th>
                <th>種類</th>
                <th>発行枚数</th>
                <th>使用目的</th>
                <th>発送先(住所と異なる場合)</th>
              </tr>
            </thead>
            <tbody>
              <?php for($i = 0; $i < count($users); $i++ ): ?>
              <tr>
                <td><a href="/<?php echo $base_dir;?>/completion/show/<?php echo h($users[$i]['User']['id']) ?>"><?php echo h($users[$i]['User']['name']) ?></a></td>
                <td><?php echo h($users[$i]['User']['Student']['number']) ?></td>
                <td><?php echo h($users[$i]['User']['Completion']['completion_day']) ?></td>
                <td><?php echo h($CERTIFICATION_TYPE[$users[$i]['Certification']['type']]) ?></td>
                <td><?php echo h($users[$i]['Certification']['count']) ?></td>
                <td><?php echo h($users[$i]['Certification']['purpose']) ?></td>
                <td><?php echo h($users[$i]['Certification']['other_address']) ?></td>
              <tr>
              <?php endfor; ?>
            </tbody>
      </table>
  </div>
