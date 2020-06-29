<?php
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
  if(!validateText("password"))
  {
     return false;
  }

  $("form#taskForm").submit();
 }

     );
 }


     );
</script>
<?php
if(empty($_SESSION['uid'])){
 ?>
<form id="taskForm" class="needs-validation" action="/login/login/">
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="name">Имя пользователя<span class="red">*</span></label>
      <input type="text" class="form-control" id="name" name="name" placeholder="Имя" required>

    </div>
    <div class="col-md-4 mb-3">
      <label for="password">Пароль<span class="red">*</span></label>
      <input type="password" class="form-control" id="password" name="password" placeholder="Пароль" required>

    </div>
    <div class="form-group">
      <span class="red"><?php echo $data; ?></span>
    </div>
  </div>
  <button type="submit" class="btn btn-primary" id="submitbutton">Войти</button>
</form>
<?php } else { ?>
  <div class="form-group">
    <span class="green"><?php echo $data; ?></span>
  </div>
<?php } ?>
