<script>

    $(function(){
        $('#box').html('');
        $.ajax({
            url:"ajxListCrop",
            method:"post",
            data:{
            },
            dataType:"text",
            success:function(data){
                $('#box').html(data);
            },
            async:true,
        });

       /*
        var amount = 'expected_harvest';
        $('#sorts').change(function() {
            amount = $('#sorts :selected').attr('val');
        });
        

        })*/

    });


</Script>



    <div id="box" class="main-table">
        
    </div>