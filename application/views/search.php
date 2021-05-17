<div class="row">
    <div class="col-md-9">
            <h3>Resultado de pesquisas para: <b><?php print_r($searchQ); ?></b></h3>
            <div id="search_result_area" style="padding-top: 50px; margin: 30px;">
                    <div class="wrapper-preview">
                            <i class="fa fa-circle-o-notch fa-spin" style="font-size: 24px;"></i>
                    </div>
            </div>
    </div>
</div>

<script>
        $(document).ready(function(){
             var query_result = "<?php echo $searchQ; ?>";   

             $('#searchbar').val(query_result);

             loadResults(query_result, 1);

                function loadResults(query_result, page)
                {
                        $.ajax({
                                url: "<?php echo base_url() ?>index.php/search/searchAction",
                                method: "POST",
                                data: {queryRes:query_result, page:page},
                                success: function(data)
                                {
                                        $('#search_result_area').html(data);            
                                },
                                error: function(data)
                                {

                                }         
                        })     
                }

             $(document).on('click', '.request_button', function(){
                  var toId = $(this).data('userid');      

                  var action = 'send_request';

                  if ( toId > 0 )
                  {
                       $.ajax({
                           type: 'ajax',
                           method: 'POST',
                           url: '<?php echo base_url() ?>index.php/search/amgAction', 
                           data:{toID:toId, action:action},
                           beforeSend: function()
                           {
                                $('#add_request_'+toId).attr('disabled', 'disabled');
                                $('#add_request_'+toId).html('<i class="fa fa-circle-o-notch fa-spin"></i> Enviando...');
                           },
                           success: function()
                           {
                               $('#add_request_'+toId).html('<i class="fa fa-clock-o" aria-hidden="true"></i> Pedido Enviado');    
                           }
                       })
                  }
                  else
                  {

                  }
             });

        });       

</script>
