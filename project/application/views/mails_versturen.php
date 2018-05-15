<script>
    function toonSjabloon ( onderwerp ) {
        $.ajax({type : "GET",
                url : site_url + "/mail/mailsjabloonAjax",
                data : { onderwerp : onderwerp },
                success : function(result){
                    $("#mailsjabloon").html(result);
                },
                error: function (xhr, status, error) {
                    alert("-- ERROR IN AJAX --\n\n" + xhr.responseText);
                }
        });
    }
    
    function toonUsers ( zoekstring ) {
        $.ajax({type : "GET",
                url : site_url + "/mail/mailusersAjax",
                data : { zoekstring : zoekstring },
                success : function(result){
                    $("#userSearchResult").html(result);
                },
                error: function (xhr, status, error) {
                    alert("-- ERROR IN AJAX --\n\n" + xhr.responseText);
                }
        });
    }
    
    function voegOntvangersToe ( users, type) {
        $.ajax({type : "GET",
                url : site_url + "/mail/mailOntvangersAjax",
                data : { users : users ,type : type},
                success : function(result){
                    $("#test").html(result);
//                    $("#test").show();
//                    alert($tester);
                },
                error: function (xhr, status, error) {
                    alert("-- ERROR IN AJAX --\n\n" + xhr.responseText);
                }
        });
    }
   
    $(document).ready(function(){
        $( "#mailsjablonen" ).change(function() {
            toonSjabloon( $( this ).val() );
        });
        
        $("#userName").keyup(function(){
            toonUsers($(this).val());
        });
    });
</script>

<h1>Send mail</h1>

<div class="w-50 mx-0 d-inline-block">
    <div>
    <?php
    $tester = "fail";
    $ontvangers = array();
    $mailsjablonen["New"] = 'Empty template';
    $js = 'id ="mailsjablonen"';
        foreach($sjablonen as $sjabloon){
            $mailsjablonen[$sjabloon->onderwerp] = $sjabloon->onderwerp;
        }
        echo form_label('Select a template', 'mailsjablonen');
        echo "</br>";
        echo form_dropdown('mailsjablonen',$mailsjablonen,'0',$js);
        
        echo "</div>";
        echo "<div>";
        
        echo form_label('Subject', 'subject'); 
        echo form_input(array('name' => 'subject', 'id' => 'subject', 'size' => '100%', 'class' => 'form-control form-control-lg rounded-2', 'required' =>'true'));
?>
    </div>
    <div id="mailsjabloon">
        <?php
        echo form_label('Mail content', 'mailsjabloon');
        echo form_textarea(array('name' => 'mailsjabloon', 'id' => 'mailsjabloon','value' => '', 'rows'=>'10', 'size' => '35', 'class' => 'form-control form-control-lg rounded-2', 'required' =>'true')); 
        ?>
    </div>
</div>
<div class="w-50 mx-0 d-inline-block">
    <div id="test">
    <p>Selected users</p>
    <textarea class="w-100" rows="5" readonly>No receivers selected</textarea>
    </div>
    
    <?php
    echo form_label('Add user', 'userName'); 
    echo form_input(array('name' => 'userName', 'id' => 'userName', 'size' => '100%', 'class' => 'form-control form-control-lg rounded-2', 'placeholder' => 'Search user by name'));
    ?>
    <div id="userSearchResult"></div>
</div>