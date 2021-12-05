@if(session('alert-section-warning'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <h4 class="alert-heading">هشدار</h4>
    <hr>
    <p>{{ session('alert-section-warning') }}</p>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif