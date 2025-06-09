<script>
    function confirmLogout(e, el) {
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure you want to logout?',
            text: "Your session will be terminated.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#aaa',
            confirmButtonText: '<i class="fa fa-sign-out"></i> Logout',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = el.getAttribute('href');
            }
        });
    }
</script>