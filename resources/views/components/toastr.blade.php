<!-- resources/views/components/toastr.blade.php -->

<!-- Toastr CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
   toastr.options = {
      "closeButton": true,
      "progressBar": true,
      "positionClass": "toast-top-right",
   }

   @if (session('success'))
      toastr.success("{{ session('success') }}");
   @endif

   @if (session('error'))
      toastr.error("{{ session('error') }}");
   @endif

   @if (session('warning'))
      toastr.warning("{{ session('warning') }}");
   @endif

   @if (session('info'))
      toastr.info("{{ session('info') }}");
   @endif
</script>
