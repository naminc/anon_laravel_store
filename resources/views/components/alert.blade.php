@if (session('success') || session('error'))
    <script>
        Swal.fire({
            icon: '{{ session('success') ? 'success' : 'error' }}',
            title: '{{ session('success') ? 'Notification!' : 'Oops...' }}',
            text: @json(session('success') ?? session('error')),
        });
    </script>
@endif