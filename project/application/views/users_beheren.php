

<script>
	
	function haalVoorstelOp ( id ) {
        $.ajax({type : "GET",
                url : site_url + "/Admin/haalAjaxOp_Voorstellen",
                data : { id : id },
                success : function(result){
                    $("#voorstel").html(result);
                },
                error: function (xhr, status, error) {
                    alert("-- ERROR IN AJAX --\n\n" + xhr.responseText);
                }
        });
    }

    function haalVoorstelDetailOp(voorstelId){
    	$.ajax({type : "GET",
                url : site_url + "/Admin/haalAjaxOp_Voorstel",
                data : { id : voorstelId },
                success : function(result){
                    $("#resultaat").html(result);
                    
                },
                error: function (xhr, status, error) {
                    alert("-- ERROR IN AJAX --\n\n" + xhr.responseText);
                }
        });
    }

    function haalWishOp(wishid){
    	$.ajax({type : "GET",
                url : site_url + "/Admin/haalAjaxOp_Wishes",
                data : { id : wishid },
                success : function(result){
                    $("#wishes").html(result);
                    
                },
                error: function (xhr, status, error) {
                    alert("-- ERROR IN AJAX --\n\n" + xhr.responseText);
                }
        });
    }

	$(document).ready(function(){

        $( "#user" ).change(function() {
            haalVoorstelOp( $( this ).val() );
        });
        
        $( "#users" ).click(function() {
            haalWishOp( $( this ).val() );
        });

        $( "#voorstel" ).click(function() {
            haalVoorstelDetailOp($(this).val());
        });
    }); 
</script>

<h3>Voorstellen</h3>

<div class="row">
    <div class="col-lg-4">
            <p><?php echo form_listboxpro('user', $users, 'id', 'voornaam', 0, array('class' => "form-control", "size" => "10", "id" => "user")); ?></p>

            <p>
            <?php echo form_listboxpro('voorstel', array(), 'id', 'titel', 0, array('id' => 'voorstel', 'size' => '10', 'class' => 'form-control')); ?>
        </p>
		</div>

  <div class="col-lg-8">
    <div id="resultaat"></div>
  </div>
</div>

<hr>

<h3>Wishes</h3>

<div class="row">
    <div class="col-lg-4">
            <p><?php echo form_listboxpro('users', $users, 'id', 'voornaam', 0, array('class' => "form-control", "size" => "10", "id" => "users")); ?></p>
		</div>

  <div class="col-lg-8">
    <div id="wishes"></div>
  </div>
</div>


