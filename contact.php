<?php
$errors = array();
$messages = array();

// check if form is submitted
if(isset($_POST["submit"]))
{ 
    // check if the required fields are not empty
    if(!empty($_POST['name']))
    {
        $name = $_POST['name'];
    }
    else
    {
        $errors[] = "U heeft geen naam opgegeven";
    }
    
    if(!empty($_POST['email']))
    {
        $email = $_POST['email'];
    }
    else
    {
        $errors[] = "U heeft geen email opgegeven";
    }
    
    if(!empty($_POST['messageContent']))
    {
        $messageContent = $_POST['messageContent'];
    }
    else
    {
        $errors[] = "U heeft geen bericht toegevoegd";
    }
    
    if(isset($name) && isset($email) && isset($messageContent))
    {
        // email versturen
        $to = "info-25@dominuscervix-dordrecht.nl";
        $subject = "Bericht van dominus cervix dordrecht.nl";
        $message = "Naam: " . $name . "\n" . "Email: " .$email . "\n" . "Bericht: " . $messageContent;
        
        mail($to, $subject, $message);
        
        $messages[] = "Uw email is verstuurd";
        
        usleep(1000000);
        
        $name = "";
        $email = "";
        $messageContent = "";
    }
}
?>
            <?php include 'includes/header.php'; ?>
            
            <?php include 'includes/menu.php'; ?>
            
            <div id="content">
                <h1>Contact</h1>
                
                <img class="photo2 floatRight" src="images/martha2.jpg" alt="foto" />
                
                <p>
                    <span class="bold">Dominus Cervix Dordrecht</span> <br /> <br /> 
                    
                    Martha Stok <br /> 
                    Ockenburg 7 <br /> 
                    3328 TE Dordrecht <br /> <br /> 
                    
                    Tel: 06 - 13963013 <br /> 
                    Email: info-25@dominuscervix-dordrecht.nl <br /> <br /> 
                    
                    KvK-nummer: 54958652
                </p> 
                
                <div class="clearFix"></div>
                
                <hr />
                
                <p>
                    U kunt ook via het onderstaand formulier contact opnemen
                </p>
                
                <div id="contactForm">
                    <?php
                    if($errors != "")
                    {
                    ?>
                     <div id="error">
                         <?php
                         foreach($errors as $error)
                         {
                            echo "<p>$error</p>"; 
                         }
                        ?>
                     </div>
                    <?php
                    }
                    if($messages != "")
                    {
                    ?>
                    <div id="message">
                        <?php
                           foreach($messages as $message)
                           {
                              echo "<p>$message</p>"; 
                           }
                        ?>
                    </div>
                    <?php
                    }
                    ?>
                
                    <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
                        <fieldset>
                            <label for="name">Uw naam: <span class="required">*</span> </label>
                            <input id="name" type="text" name="name" value="<?php if(isset($name)){ echo $name; } ?>" /><br />

                            <label for="email">Emailadres: <span class="required">*</span> </label>
                            <input id="email" type="text" name="email" value="<?php if(isset($email)){ echo $email; } ?>" /><br />

                            <label for="messageContent">Bericht: <span class="required">*</span> </label>
                            <textarea id="messageContent" name="messageContent" rows="5" cols=""><?php if(isset($messageContent)){ echo $messageContent; } ?></textarea><br />

                            <input type="submit" value="Verzenden" name="submit" />
                       </fieldset>
                   </form>
                    
                </div>
                <br />
                <h2>Routebeschrijving</h2>
                <div id="maps">
                    <iframe width="790" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.nl/maps?source=s_q&amp;f=q&amp;hl=nl&amp;geocode=&amp;q=Ockenburg+7,+Dordrecht&amp;aq=0&amp;oq=Ockenburg&amp;sll=51.768707,4.752835&amp;sspn=0.17443,0.528374&amp;ie=UTF8&amp;hq=&amp;hnear=Ockenburg+7,+3328+TE+Sterrenburg+3,+Dordrecht,+Zuid-Holland&amp;t=m&amp;z=14&amp;ll=51.784834,4.670391&amp;output=embed"></iframe>
                </div>
            </div>
            
            <?php include 'includes/footer.php'; ?>
        </div>
    </body>
</html>
