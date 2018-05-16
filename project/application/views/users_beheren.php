

<?php
/**
 * @file users_beheren.php
 * 
 * View waar de admin voorstellen en wensen kan zien van de users en de users kan verwijderen en het e-mailadres ervan aanpassen
 * - krijgt een $users-object binnen
 */
?>

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
            <?php echo form_listboxpro('voorstel', array(), 'id', 'titel', 0, array('id' => 'voorstel', 'size' => '10', 'class' => 'form-control'));  ?>
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

<hr>

<h3>Users</h3>

<?php

$extraButton1 =  array('class' => 'btn btn-success btn-xs btn-round','data-toggle' => 'tooltip', 'title' => 'User aanpassen');
$button1 =  form_button("knopnieuw", "<span class='glyphicon glyphicon-edit'></span>", $extraButton1);

$extraButton2 =  array('class' => 'btn btn-danger btn-xs btn-round','data-toggle' => 'tooltip', 'title' => 'User verwijderen');
$button2 =  form_button("knopnieuw", "<span class='glyphicon glyphicon-remove-sign'></span>", $extraButton2);


?>
<table class="table table-condensed">
    <thead>
      <tr>
        <th>Voornaam</th>
        <th>Achternaam</th>
        <th>E-mail</th>
      </tr>
    </thead>
        <tbody>
    <?php
foreach ($users as $user) {

    if ($user->voornaam == "Admin" || $user->voornaam == "No supervisor") {
        
    }
    else{
        echo '<tr><td>';
        echo $user->voornaam;
        echo '</td><td>';
        echo $user->achternaam;
        echo '</td><td>';
        echo form_input(array('name' => 'u'.$user->id, 'id' => 'u'.$user->id, 'value' => $user->email, 'size' => '35', 'class' => 'form-control form-control-lg rounded-2'));
        echo '</td><td>';
        echo form_submit('save', 'Save', "class='knop btn btn-success' id='". $user->id."'");
        echo '</td><td>';
        echo "<td>" . anchor ('admin/deleteUser/'.$user->id,'Delete', "class='btn btn-danger' style='margin-bottom:20px'");
        echo '</td></tr>';
        }
}
?>
  </tbody>
</table>

<script>
$(document).ready(function(){
    $(".knop").click(function(){
        var id = $(this).attr('id');
        var user = $("#u" + id).val();
        var encoded = encodeURIComponent(user);
        window.location.href = '/PHPproject/project/index.php/Admin/bewaar/' + id + '/' + encoded;
    });
});
</script>




