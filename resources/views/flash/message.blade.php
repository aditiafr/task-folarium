@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '{{ Session::get('success') }}',
        })
    </script>
@elseif(session('warning'))
    <script>
        Swal.fire({
            icon: 'warning',
            title: 'Attetion!',
            text: '{{ Session::get('warning') }}',
        })
    </script>
@elseif(session('info'))
    <script>
        Swal.fire({
            icon: 'info',
            title: 'Success',
            text: '{{ Session::get('info') }}',
        })
    </script>
@elseif(session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'oopss..',
            text: '{{ Session::get('error') }}',
        })
    </script>
@elseif(session('update'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '{{ Session::get('update') }}',
        })
    </script>
@elseif (session('delete'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '{{ Session::get('delete') }}',
        })
    </script>
@endif
