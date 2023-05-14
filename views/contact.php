<?php 
  $this->title = 'Contact';
?>
<h1>Contact</h1>
<form action="contact" method="POST">
  <div class="mb-3">
    <label for="subject">Subject</label>
    <input type="text" id="subject" name="subject" class="form-control">
  </div>
  <div class="mb-3">
    <label for="email">Email</label>
    <input type="email" id="email" name="email" class="form-control">
  </div>
  <div class="mb-3">
    <label for="body">Body</label>
    <textarea name="body" id="body" cols="30" rows="10" class="form-control"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
