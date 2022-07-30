@if(session('toast-error'))

<section id="myToast" class="toast" data-delay="5000">
    <section class="toast-body py-3 d-flex bg-danger text-white">
        <strong class="ml-auto">{{ session('toast-error') }}</strong>
        <button type="button" class="mr-2 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </section>
</section>

<script>
    $(document).ready(function() {
        $('#myToast').toast('show');
    })
</script>
@endif
