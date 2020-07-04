<div class="p-2">
<form id="commentForm" autocomplete="on">
  
<div class="form-row">
    <div class="col-md-6 mb-6">
      <label for="firstname">Firstname</label>
      <input type="text" class="form-control" id="firstname" placeholder="First name" required>
      
    </div>
    <div class="col-md-6 mb-3">
      <label for="lastname">State</label>
      <input type="text" class="form-control" id="lastname" placeholder="Last name" required>
     
    </div>

  <div class="form-row">
    <div class="col-md-6 mb-6">
      <label for="Email">E-mail</label>
      <input type="email" class="form-control is-invalid" id="Email" placeholder="E-mail" required>
     
    </div>
    <div class="col-md-6 mb-3">
      <label for="phonenumber">Phone Number</label>
      <input type="text" class="form-control is-invalid" id="phonenumber" placeholder="State" required>
      <div class="invalid-feedback">
        Please provide a valid state.
      </div>
    </div>

</form>
</div>
<script>

  $("#commentForm").validate({


})
</script>