<div class="form-panel">
  <h3><?= $headline ?></h3>
  <?php
  if (isset($flash)) {
      echo $flash;
  }
   ?>
   <h4>Are you sure that you want to delete the lesson?</h4>
   <?php
   $attributes = array('class' => 'form-horizontal', 'id' => 'myform');
   echo form_open_multipart('lesson_schedules/delete_lesson_schedule/'.$lesson_id.'/'.$lesson_schedule_id, $attributes);
    ?>
    <fieldset>
      <div class="control-group" style="height: 200px;">
        <button type="submit" name="submit" class="btn btn-danger" value="delete">Yes - Delete Schedule</button>
        <button type="submit" name="submit" class="btn" value="cancel">Cancel</button>
      </div>
    </fieldset>
</div>
