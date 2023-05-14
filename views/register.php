<?php 
  $this->title = 'Register';
?>
<h1>Register</h1>
<?php 
  $form = \app\core\form\Form::begin('register','post');
?>
  <?php 
    echo $form->field($model,'first_name');
    echo $form->field($model,'last_name');
    echo $form->field($model,'email');
    echo $form->field($model,'password')->passwordField();
    echo $form->field($model,'confirm_password')->passwordField();
  ?>
   <button type="submit" class="btn btn-primary">Register</button>
<?php 
  echo \app\core\form\Form::end(); 
?>