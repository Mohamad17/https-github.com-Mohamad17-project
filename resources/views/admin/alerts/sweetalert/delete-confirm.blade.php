<script>
 $(document).ready(function () {
        var className = '{{ $className }}';
        var element = $('.' + className);

        element.on('click', function(e){

            e.preventDefault();
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-outline-success mx-2', cancelButton: 'btn btn-outline-danger'},
                buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'آیا مطمئن هستید این آیتم حذف شود؟',
            text: "شما می توانید این از این عملیات صرف نظر کنید",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'بله، حذف شود',
            cancelButtonText: 'نه، عملیات لغو شود',
            reverseButtons: true
        }).then((result) => {
            if (result.value==true) {
                $(this).parent().submit();
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                swalWithBootstrapButtons.fire({
                    title: 'عملیات لغو شد',
                    icon: 'error',
                    confirmButtonText: 'باشه'
                })
            }
        })
    })

})
   
</script>
