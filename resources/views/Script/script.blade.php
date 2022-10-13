@if (request()->routeIs('pegawai'))
    <script type="text/javascript">
        $('#skleton').hide();
        $.ajax({
            url: '{{ route('ajax.pegawai') }}',
            type: 'POST',
            dataType: 'JSON',
            data: {
                '_token': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function()
            {
                $('#table_pegawai').hide();
                $('#skleton').show();
            },
            complete: function()
            {
                $('#table_pegawai').show();
                $('#skleton').hide();
            },
            success: function(response_pegawai) {
                $('#table_pegawai').show();
                $('#skleton').hide();
                if (response_pegawai.status == 200) {
                    $('#module_pegawai').html(response_pegawai.listPegawai);
                } else {
                    $('#module_pegawai').html('');
                    console.log('error!');
                }
            },
            error: function() {
                console.log('Error!');
            }
        });
    </script>
@elseif(request()->routeIs('kontrak'))
    <script type="text/javascript">
    $('#skleton').hide();
        $.ajax({
            url: '{{ route('ajax.kontrak') }}',
            type: 'POST',
            dataType: 'JSON',
            data: {
                '_token': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function()
            {
                $('#table_kontrak').hide();
                $('#skleton').show();
            },
            complete: function()
            {
                $('#table_kontrak').show();
                $('#skleton').hide();
            },
            success: function(response_kontrak) {
                $('#table_kontrak').show();
                $('#skleton').hide();
                if (response_kontrak.status == 200) {
                    $('#module_kontrak').html(response_kontrak.listKontrak);
                } else {
                    $('#module_kontrak').html('');
                    console.log('error!');
                }
            },
            error: function() {
                console.log('Error!');
            }
        });
    </script>
@endif
