@if(session('alert-section-info'))
<div class="alert alert-info alert-dismissible fade show" role="alert">
    <h4 class="alert-heading">جزئیات</h4>
    <hr>
    <p>{{ session('alert-section-info') }}</p>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif