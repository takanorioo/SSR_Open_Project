
  <div class="container">
    <?php echo  $this->Session->flash(); ?>
    <h3>イベント一覧</h3>
    <div class="row">
      <table class="table table-striped">
        <thead>
              <tr>
                <th>イベント名</th>
                <th>場所</th>
                <th>日時</th>
                <th>参加可否</th>
              </tr>
            </thead>
            <tbody>
              <?php for($i = 0; $i < count($events); $i++ ): ?>
              <tr>
                <td><?php echo h($events[$i]['Event']['name']) ?></td>
                <td><?php echo h($events[$i]['Event']['location']) ?></td>
                <td><?php echo h($events[$i]['Event']['date']) ?></td>
                <td>
                  <?php if(count($events[$i]['EventsUser']) > 0 ):?>
                    <?php $attend = false; ?>
                    <?php for($j = 0; $j < count($events[$i]['EventsUser']); $j++): ?>
                       <?php if($events[$i]['EventsUser'][$j]['user_id'] == $user_id):?>
                        <a href = "/<?php echo $base_dir;?>/event/delete/<?php echo $events[$i]['EventsUser'][$j]['id']?>" class = "btn btn-danger">参加を取り消す</a>
                        <?php $attend = true; ?>
                        <?php break; ?>
                       <?php endif; ?>
                    <?php endfor; ?>
                    <?php if($attend == false):?>
                      <a href = "/<?php echo $base_dir;?>/event/add/<?php echo $events[$i]['Event']['id']?>" class = "btn btn-primary">参加する</a>
                    <?php endif; ?>
                  <?php else: ?>
                    <a href = "/<?php echo $base_dir;?>/event/add/<?php echo $events[$i]['Event']['id']?>" class = "btn btn-primary">参加する</a>
                  <?php endif; ?>
                </td>
              <tr>
              <?php endfor; ?>
            </tbody>
      </table>
    </div>

  </div>
