<script>
        $(document).ready(function(){
            setTimeout(function(){
                $('#status').addClass('d-none');
            },5000);

            $('#productos_tbl').DataTable();
        });
        btn_oculto = null;
        $('.link-show').click(function(){
            $.ajax({
                type: 'GET',
                url: $(this).attr('data-url'),
                success:function(data){
                    $('#modal-show-info').html(data)
                    console.log(data);
                    $('#modal-show').modal();
                }
            });
        });

        $('.link-destroy').click(function(){
            var data_id = $(this).attr('data-id');

            $('.'+data_id).addClass('d-none');
            $('.c-'+data_id).removeClass('d-none');

           
        });

        $('.cancelar').click(function(){
            
            var data_id = $(this).attr('data-id');

            $('.c-'+data_id).addClass('d-none');
            $('.'+data_id).removeClass('d-none');


        })
    </script>