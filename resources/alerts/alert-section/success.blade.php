@if(session('alert-section-succsess'))
<div class="alert alert-succsess alert-dismissible fade show" role="alert">
    <h4 class="alert-heading">موفقیت آمیز</h4>
    <hr>
    <p>{{ session('alert-section-succsess') }}</p>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif