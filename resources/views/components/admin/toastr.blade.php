@if (session('success') || session('error'))
    <script>
        $(document).ready(function () {
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                "positionClass": "toast-bottom-right",
                "timeOut": "3000"
            };
            @if (session('success'))
                toastr.success(@json(session('success')));
            @elseif (session('error'))
                toastr.error(@json(session('error')));
            @endif
        });
    </script>
@endif
