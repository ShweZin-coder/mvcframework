<?php 
  $this->title = 'Login';
?>
<h1>Login</h1>
<?php 
  $form = \app\core\form\Form::begin('login','post');
?>
  <?php 
    echo $form->field($model,'email');
    echo $form->field($model,'password')->passwordField();
  ?>
   <button type="submit" class="btn btn-primary">Register</button>
<?php 
  echo \app\core\form\Form::end(); 
?>