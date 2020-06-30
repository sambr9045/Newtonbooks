<div class="p-2">
<form id="commentForm" autocomplete="on">
  
  <div class="form-row" >
    <div class="col-md-6 mb-3">
      <label for="validationServer01">First name</label>
      <input type="text" class="form-control" id="validationServer01" placeholder="First name"  require>
     
    </div>
    <div class="col-md-6 mb-3">
      <label for="lastName">Last name</label>
      <input type="text" class="form-control is-valid" id="lastName" placeholder="Last name"  >
      <div class="invalid-feedback">
        Looks good!
      </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-6 mb-6">
      <label for="validationServer03">City</label>
      <input type="text" class="form-control is-invalid" id="validationServer03" placeholder="City" required>
      <div class="invalid-feedback">
        Please provide a valid city.
      </div>
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationServer04">State</label>
      <input type="text" class="form-control is-invalid" id="validationServer04" placeholder="State" required>
      <div class="invalid-feedback">
        Please provide a valid state.
      </div>
    </div>
    
  </div>
  <div class="form-group">
    <div class="form-check">
     input
      <label class="form-check-label" for="invalidCheck3">
        Agree to terms and conditions
      </label>
      <div class="invalid-feedback">
        You must agree before submitting.
      </div>
    </div>
  </div>
  <button class="btn btn-primary" type="submit">Submit form</button>
</form>
</div>
<script>

  $("#commentForm").validate({


})
</script>