@if(session('alert-section-error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <h5 class="alert-heading">خطا</h5>
    <hr>
    <p>{{ session('alert-section-error') }}</p>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif