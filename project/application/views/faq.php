
<?php
/**
 * @file faq.php
 * 
 * View waar alle users veelgestelde vragen kunnen bekijken met het antwoord erop
 * - gebruikt Bootstrap-accordion
 */
?>
<div class="container">
  <div id="accordion">
    <div class="card">
      <div class="card-header">
        <h4 class="collapsed card-link" data-toggle="collapse" href="#collapseOne">
          Do I have to log in as a guest?
        </h4>
      </div>
      <div id="collapseOne" class="collapse" data-parent="#accordion">
        <div class="card-body">
            Yes, if you log in as a guest you have the ability to add your wishes you want during your stay in Belgium and change them if needed and you can submit your proposal for your speech.
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
        <h4 class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
        Do I have to log in as a student?
      </h4>
      </div>
      <div id="collapseTwo" class="collapse" data-parent="#accordion">
        <div class="card-body">
            No, as a student you get a link to the planning on your Toledo. That's the only thing a student can do with the application.
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
        <h4 class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
          Do I have to log in as a lecturer?
        </h4>
      </div>
      <div id="collapseThree" class="collapse" data-parent="#accordion">
        <div class="card-body">
            Yes, as a lecturer you have to submit yourself to supervice a speaker's speech.
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
        <h4 class="collapsed card-link" data-toggle="collapse" href="#collapseFour">
          Who can I contact for more questions?
        </h4>
      </div>
      <div id="collapseFour" class="collapse" data-parent="#accordion">
        <div class="card-body">
            For more questions you can contact Tinne Van Echelpoel by mail: <a href="mailto:tinne.vanechelpoel@thomasmore.be">tinne.vanechelpoel@thomasmore.be</a>
        </div>
      </div>
    </div>
  </div>
</div>

