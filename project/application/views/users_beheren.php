

<script>
	
	function haalVoorstelOp (id){
		$.ajax({type : "GET",
				url : site_url + "Admin/haalAjaxOp_Voorstel",
				data : {id : id},
				success : function(result){
					$("#resultaat").html(result);
				},
				error: function (xhr, status, error) {
					alert("-- ERROR IN AJAX -- \n \n" + xhr.responseText);
				}
	});
	}

	$(document).ready(function(){

        $( "#id" ).change(function() {
            haalVoorstelOp( $( this ).val() );
        });
        
    });

</script>


<div class="row">
    <div class="col-lg-4">
            <?php echo form_listboxpro('id', $users, 'id', 'voornaam', 0, array('class' => "form-control", "size" => "10", "id" => "id")); ?>
		</div>
  <div class="col-lg-8">
    <div id="resultaat"></div>
  </div>
</div>


