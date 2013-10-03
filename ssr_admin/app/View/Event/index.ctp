
  <div class="container">
    <?php echo  $this->Session->flash(); ?>
    <div class="row">
        <div class="button_section">
          <div class="button_section2 span12"style="margin-bottom: 30px">
              <a href="/<?php echo $base_dir;?>/event/add" class="btn btn-primary span2" style="float: right;">新規イベントの登録</a>
          </div>
        </div>
      <table class="table table-striped">
        <thead>
              <tr>
                <th>イベント名</th>
                <th>場所</th>
                <th>日時</th>
                <th>参加予定人数</th>
              </tr>
            </thead>
            <tbody>
              <?php for($i = 0; $i < count($events); $i++ ): ?>
              <tr>
                <td><a href="/<?php echo $base_dir;?>/event/show/<?php echo h($events[$i]['Event']['id']) ?>"><?php echo h($events[$i]['Event']['name']) ?></a></td>
                <td><?php echo h($events[$i]['Event']['location']) ?></td>
                <td><?php echo h($events[$i]['Event']['date']) ?></td>
                <td><?php echo h(count($events[$i]['EventsUser'])) ?>人</td>
              <tr>
              <?php endfor; ?>
            </tbody>
      </table>
    </div>

  </div>
