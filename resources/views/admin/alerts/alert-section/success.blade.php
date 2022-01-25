@if(session('alert-section-success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <h5 class="alert-heading">موفقیت آمیز</h5>
    <hr>
    <p>{{ session('alert-section-success') }}</p>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif