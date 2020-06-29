<?php
foreach ($data as $value) {
  $name = $value['name'];
  $email = $value['email'];
  $text = $value['text'];
  $status = $value['status'];
  $task_id = $value['id'];
  $result = $value['result'];
}
 ?>
 <script type="text/javascript">
 function validateText(id)
 {
   if($("#"+id).val()==null || $("#"+id).val()=="")
   {
        var div = $("#"+id);
        div.removeClass("form-control is-valid");
        div.addClass("form-control is-invalid");
        return false;
   }
   else{
       var div = $("#"+id);
       div.removeClass("form-control is-invalid");
       div.addClass("form-control is-valid");
       return true;
   }
 }

 function validateEmail(id)
 {
     var email_regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;
     if(!email_regex.test($("#"+id).val()))
     {
        var div = $("#"+id);
        div.removeClass("form-control is-valid");
        div.addClass("form-control is-invalid");
        return false;
     }else{
        var div = $("#"+id);
        div.removeClass("form-control is-invalid");
        div.addClass("form-control is-valid");
        return true;
     }

 }

 $(document).ready(
 function()
 {
 $("#submitbutton").click(function()
 {
  if(!validateText("name"))
  {
     return false;
  }
  if(!validateEmail("email"))
  {
     return false;
  }
  if(!validateText("exampleFormControlTextarea"))
  {
     return false;
  }

  $("form#taskForm").submit();
 }

     );
 }


     );
</script>
<form id="taskForm" class="needs-validation" action="/addtask/savetask/">
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="name">Имя пользователя<span class="red">*</span></label>
      <input type="text" class="form-control" id="name" name="name" placeholder="Имя" value="<?php echo $name; ?>" required>

    </div>
    <div class="col-md-4 mb-3">
      <label for="email">E-mail<span class="red">*</span></label>
      <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $email; ?>" required>

    </div>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea">Описание задачи<span class="red">*</span></label>
    <textarea class="form-control" id="exampleFormControlTextarea" name="exampleFormControlTextarea" rows="3"><?php echo $text; ?></textarea>

  </div>
  <div class="form-check">
      <input class="form-check-input" type="checkbox" id="status" name="status" <?php echo $status == 1 ? 'checked': ''; ?>>
      <label class="form-check-label" for="status">Выполнено</label>
    </div>
  <input type="text" id="task_id" name="task_id" value="<?php echo $task_id; ?>" hidden>
  <button type="submit" class="btn btn-primary" id="submitbutton">Сохранить</button>
</form>
<div class="form-row">
  <?php echo $result; ?>
</div>
