

<?php include 'inc/header.php'; ?>

<style>

    #here{
		
		margin-left:-100px;
		
		margin-top:20px;
		
        height: 200px;
		
		overflow-y: auto;
		
		width:500px;
		
    }
	
    #here li{
		
        display: block;
        font-size:20px;
        background:#f9f2f4;
    }
	
    #here li:hover{
        background:#faebcc;
    }
	
</style>


<div class="container">
    <h1>Live Search</h1>
    <div class="col-md-4">
        <input class="form-control" type="search" name="search" id="search" placeholder="search">
        <div id="here">

        </div>
    </div>
</div>



<?php include 'inc/footer.php'; ?>

<script>
    $(document).ready(function(){
        $('#search').on('input',function(){
            var x = $(this).val();
            /*if(x.length>0){
                $.ajax({
                    type: "GET",
                    url:'search.php',
                    data:'search=' +x,
                    success:function(data){
                        $('#here').fadeIn();
                        $('#here').html(data);
                    }
                });
            }else{
                $('#here').html('');
            }
			*/
			data={'search': x};
			$.post('search.php',data,function(result){
				$('#here').fadeIn();
				$('#here').html(result);
			});

        });

        $(document).on('click','li',function(){
            $('#search').val($(this).text());
           $('#here').fadeOut('fast');
        });
    });
</script>
