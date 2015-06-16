<?php

$PATA_CSS = '<link href="css/pata.css" rel="stylesheet">';

$PATA = '
    <div class="collapse" id="collapseAdminTool">
       <div class="obly-stin">
            <div class="rantl"></div>
        </div>
       <div class="container">
        <div class="row"><p>
            <div class="col-xs-12 col-sm-6 col-md-4 hidden-xs">
                <p>
                    <span class="glyphicon glyphicon-wrench" ></span>Stepsnet.cz&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-link" ></span><a href="http://www.stepsnet.cz">www.stepsnet.cz</a>
                </p>
                <p>
                    <span class="glyphicon glyphicon-envelope" aria-label="Email autora"></span><a href="mailto:info@stepsnet.cz">info@stepsnet.cz</a>&nbsp;&nbsp;&nbsp;
                    <span class="glyphicon glyphicon-earphone" aria-label="Telefon autora"></span>+420 605 225 610
                </p>
                <p>
                    <span class="glyphicon glyphicon-globe" aria-label="Adresa"></span>Jana Skácela 14, 568 02 Svitavy
                </p>
           </div>
           <div class="clearfix visible-xs-block"></div>
           <div class="col-xs-12 col-sm-6 col-md-4">
                <p>
                <span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> Zobrazit nápovědu k redakčnímu suystému.<br />
                </p>
                <p>
                    <span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span> Stáhnout manuál k redakčnímu systému (pdf).<br />
                </p>
                <p>
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Napiště nám. Děkujeme za zpětnou vazbu.<br />
                </p>
            </div>
            <div class="clearfix visible-xs-block"></div>
           <div class="col-xs-12 col-sm-6 col-md-4 hidden-sm hidden-xs reklama">
                <div class="row">
                  <div class="col-xs-6 col-sm-6 col-md-6">
                    <img src="images/StepsPortal.png" alt="StepsPortal" />
                    <p>Online Zakázkový systém.<br />
                     Mějte své objednávky a požadavky plně pod kontrolou.
                    </p>
                  </div>
                  <div class="col-xs-6 col-sm-6 col-md-6">
                    
                    <div id="carousel-AdminTool" class="carousel slide" data-ride="carousel">
                      <!-- Indicators -->
                      <ol class="carousel-indicators">
                        <li data-target="#carousel-AdminTool" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-AdminTool" data-slide-to="1"></li>
                        <li data-target="#carousel-AdminTool" data-slide-to="2"></li>
                        <li data-target="#carousel-AdminTool" data-slide-to="3"></li>
                      </ol>
                    
                      <!-- Wrapper for slides -->
                      <div class="carousel-inner" role="listbox">
                        <div class="item active">
                          <img src="images/StepsWeb.png" alt="StepsWeb" />
                          <div class="carousel-caption">
                            <p>Internetové stránky, prezentace a aplikace</p>
                          </div>
                        </div>
                        <div class="item">
                          <img src="images/StepsServis.png" alt="StepsServis" />
                          <div class="carousel-caption">
                            <p>Údržba počítačů a příslušenství, profylaktika</p>
                          </div>
                        </div>
                        <div class="item">
                          <img src="images/StepsSprava.png" alt="StepsSpráva" />
                          <div class="carousel-caption">
                            <p>Administrace sítí a správa počítačů</p>
                          </div>
                        </div>
                        <div class="item">
                          <img src="images/StepsPodpora.png" alt="StepsPodpora" />
                          <div class="carousel-caption">
                            <p>Uživatelská podpora pro firmy i domácnosti</p>
                          </div>
                        </div>
                      </div>
                    
                      
                    </div>
                    
                  </div>
                </div>
           </div>  
        </div>     
       </div>
        
    </div>
    <script>  
    function otoc180(prvek){
       var css_prvek = document.getElementById("AdminTool").className;     
       if (css_prvek.indexOf("rotate") == -1) {
            $(prvek).addClass("rotate");
        }
        else {
            $(prvek).removeClass("rotate");
       }
    }
    </script>
     <footer class="footer">
      <div class="container">        
        <p class="text-muted">
            <button type="button" id="AdminTool" onclick="otoc180(this);" class="btn-footer" data-toggle="collapse" data-target="#collapseAdminTool" aria-expanded="false" aria-controls="collapseAdminTool">
                <span class="glyphicon glyphicon-eject" aria-hidden="true"></span><span class="cr">&copy; 2015 StepsNet.cz</span>     
            </button> 
        </p>
      </div>
    </footer>';
?>
