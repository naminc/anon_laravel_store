{{-- resources/views/components/alert.blade.php --}}
@if (session('success') || session('error'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            icon: '{{ session('success') ? 'success' : 'error' }}',
            title: '{{ session('success') ? 'Notification!' : 'Oops...' }}',
            text: @json(session('success') ?? session('error')),
        });
    </script>
@endif
