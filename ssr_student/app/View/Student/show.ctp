
  <div class="container">
    <div class="row">
        <?php echo  $this->Session->flash(); ?>
      <h3><?php echo $me['User']['name']; ?>さんのアカウント情報</h3>
      <table class="table table-striped">
        <thead>
<!--               <tr>
                <th>名前</th>
                <th>国籍</th>
                <th>住所</th>
                <th>電話番号</th>
                <th>職業</th>
                <th>生年月日</th>
                <th>性別</th>
                <th>学年</th>
                <th>学部</th>
                <th>研究科</th>
                <th>学籍番号</th>
                <th>保証人氏名</th>
                <th>保証人住所</th>
                <th>保証人連絡先</th>
                <th>入学日</th>
              </tr> -->
            </thead>
            <tbody>
              <tr>
                <td>名前</td>
                <td><?php echo h($user['User']['name']); ?></td>
              </tr>
              <tr>
                <td>国籍</td>
                <td><?php echo h($user['User']['nationality']); ?></td>
              </tr>
              <tr>
                <td>住所</td>
                <td><?php echo h($user['User']['adress']); ?></td>
              </tr>
              <tr>
                <td>電話番号</td>
                <td><?php echo h($user['User']['phone']); ?></td>
              </tr>
              <tr>
                <td>生年月日</td>
                <td><?php echo h($user['User']['birthday']); ?></td>
              </tr>
              <tr>
                <td>性別</td>
                <td><?php echo h($GENDER[$user['User']['gender']]); ?></td>
              </tr>
              <tr>
                <td>学年</td>
                <td><?php echo h($GRADE[$user['Student']['grade']]); ?></td>
              </tr>
              <tr>
                <td>学部(研究科)</td>
                <td><?php echo h($DEPARTMENT[$user['Student']['department']]); ?></td>
              </tr>
              <tr>
                <td>学科(専攻)</td>
                <td><?php echo h($MAJOR[$user['Student']['major']]); ?></td>
              </tr>
              <tr>
                <td>学籍番号</td>
                <td><?php echo h($user['Student']['number']); ?></td>
              </tr>
              <tr>
                <td>保証人氏名</td>
                <td><?php echo h($user['Student']['guarantor_name']); ?></td>
              </tr>
              <tr>
                <td>保証人住所</td>
                <td><?php echo h($user['Student']['guarantor_adress']); ?></td>
              </tr>
              <tr>
                <td>保証人連絡先</td>
                <td><?php echo h($user['Student']['guarantor_email']); ?></td>
              </tr>
              <tr>
                <td>入学日</td>
                <td><?php echo h($user['Student']['entrance_day']); ?></td>
              </tr>
            </tbody>
      </table>
    </div>
    <div class="row">
      <p>
        <a href="/<?php echo $base_dir;?>/student/edit"><button class="btn btn-large btn-primary" type="button">Edit Your Account</button></a>
      </p>
    </div>

  </div>
