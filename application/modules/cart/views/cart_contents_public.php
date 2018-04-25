<div class="row">
  <div class="col-md-10 col-md-offset-1">
    <table class="table table-striped table-bordered" style="margin-top: 36px;">
      <?php
      $grand_total = 0;
      if($query->num_rows() > 0){
      foreach ($query->result() as $row) {
        $sub_total = $row->boat_fee * $row->no_days;
        $sub_total_desc = number_format($sub_total, 2);
        $grand_total += $sub_total;
        ?>
        <tr style="margin-top: 12px;">
          <td>
            <?php
            if ($row->picture_name != '') {
              // echo $row->small_pic;

              ?>
              <img src="<?= base_url() ?>media/item_small_pics/<?= $row->picture_name ?>" title="<?= base_url() ?>media/item_small_pics/<?= $row->picture_name ?>">
              <?php
            } else {
              echo "No image preview available";
            }
            ?>
          </td>
          <td>
            Boat Id: <?= $row->boat_id ?><br>
            <b>Boat Name: <?= $row->boat_name ?></b><br>
            Rental Price: <?= $currency_symbol.$row->boat_fee ?><br><br>
            <?php
            echo anchor('boat_basket/remove/'.$row->id, "Remove");
            ?>
          </td>
          <td><?= $currency_symbol.$sub_total_desc ?></td>
        </tr>
        <?php
      }
    }
      ?>

    <?php
    if($lesson_query->num_rows() > 0){
    foreach ($lesson_query->result() as $row) {
      $sub_total = $row->lesson_fee * $row->booking_qty;
      $sub_total_desc = number_format($sub_total, 2);
      $grand_total += $sub_total;
      ?>
      <tr style="margin-top: 12px;">
        <td>
          <?php
          if ($row->picture_name != '') {
            // echo $row->small_pic;
            ?>
            <img src="<?= base_url() ?>media/lesson_small_pics/<?= $row->picture_name ?>" title="<?= base_url() ?>media/lesson_small_pics/<?= $row->picture_name ?>">
            <?php
          } else {
            echo "No image preview available";
          }
          ?>
        </td>
        <td>
          Lesson Id: <?= $row->lesson_id ?><br>
          <b>Lesson Name: <?= $row->lesson_name ?></b><br>
          Lesson Price: <?= $currency_symbol.$row->lesson_fee ?><br><br>
          Total Quantity: <?= $row->booking_qty ?><br><br>
          <?php
          echo anchor('lesson_basket/remove/'.$row->id, "Remove");
          ?>
        </td>
        <td><?= $currency_symbol.$sub_total_desc ?></td>
      </tr>
      <?php
    }
  }
    ?>
      <tr>
        <tr>
          <td colspan="2" style="font-weight: bold; text-align: right;">Total</td>
          <td style="font-weight: bold;"><?= $currency_symbol.number_format($grand_total, 2) ?></td>
        </tr>
      </table>
    </div>
  </div>
