<?php
$urlUri = $_SERVER['REQUEST_URI'];  
?>
<!DOCTYPE html>
<html>
    <head>
    <?php include_once("head.php");?>
    </head>

    <body>
        <div id="container">
            <header id="header" class="row">
                <?php if($urlUri!= ('/user-destroy.html'))
                { ?>
                    
                    <?php include_once("header.php");  
                }
                else{?>
                    <div id="deconnexion" class="col-xs-6 col-md-6 col-lg-6 col-lg-push-4 writeZone">Vous êtes déconnecté</div>
                    <?php } ?>

            </header>
            <?php if($urlUri == '/'){ ?>
                <div class="mainIndex">
            <?php } ?>
            <?php if($urlUri != '/'){ ?>
                <div class="mainOther">
            <?php } ?>

                <div id="wrap" class="wrapper">
                    <div id="content-wrap">
                      <section id="main" class="row">
                        <?php if ($users->hasFlash()) echo '<p style="text-align: center;">', $users->getFlash(), '</p>'; ?>

                        <?= $content ?>
                      </section>
                    </div>
                </div>  

            <?php if($urlUri != '/'){ ?>
                </div>
            <?php } ?>
            <?php if($urlUri == '/'){ ?>
                </div>
            <?php } ?>
            <footer>
            <?php include_once("footer.php"); ?>
            </footer>
           
            
        </div>
    </body>

    
</html>