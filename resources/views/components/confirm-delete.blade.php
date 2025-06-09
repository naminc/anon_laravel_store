<script>
    function confirmDelete(event, element) {
        event.preventDefault();
        Swal.fire({
            title: 'Are you sure you want to delete?',
            text: "This action cannot be undone!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#aaa',
            confirmButtonText: '<i class="fa fa-trash"></i> Delete',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                if (element.closest('form')) {
                    element.closest('form').submit();
                } else {
                    window.location.href = element.getAttribute('href');
                }
            }
        });
    }
</script>