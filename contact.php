<?php include "includes/header.php"; ?>
<?php 
if(isset($_POST['sendEmail']))
    {
        echo "Umer hurrah";
    $recipient_email    = "Geeimran16@gmail.com"; //recepient
    $sender_subject     = htmlentities($_POST['sender_subject']); //email subject line
    $sender_name        = htmlentities($_POST['sender_name']);

    $sender_email       = filter_var($_POST['sender_email'], FILTER_SANITIZE_STRING); //recepient
    $sender_message     = filter_var($_POST['sender_message'],FILTER_SANITIZE_STRING); //capture message
    $boundary = md5(uniqid(time()));
    $headers  = "MIME-Version: 1.0\r\n"; 
    $headers .= "From: <".$sender_email.">"."\r\n"; 
    $headers .= "Reply-To: <".$sender_email.">" . "\r\n";
    $headers .= "Content-Type: multipart/mixed; boundary = ".$boundary."\r\n\r\n"; 
    //message text
    $body = "--$boundary\r\n";
    $body .= "Content-Type: text/plain; charset=ISO-8859-1\r\n";
    $body .= "Content-Transfer-Encoding: base64\r\n\r\n"; 
    $body .= chunk_split(base64_encode($sender_message)); 
    //get file info

    $body .="Content-Transfer-Encoding: base64\r\n";
    $body .="X-Attachment-Id: ".rand(1000,99999)."\r\n\r\n";  
    //}
    // else{ //send plain email otherwise
    //    $headers = "From:".$from_email."\r\n".
    //     "Reply-To: ".$sender_email. "\n" .
    //     "X-Mailer: PHP/" . phpversion();
    //     $body = $sender_message;
    // }

     $sentMail = @mail($recipient_email, $sender_subject, $body, $headers);
    if($sentMail) //output success or failure messages
    {   
        $messageS = " Thank you for your email";
        echo $messageS;
        //header("Location: index.php?msgS={$messageS}");
    }
    else{
        $messageF =  "Could not send mail! Please Contact administrator.";
        echo $messageF;
        //header("Location: index.php?msgF={$messageF}");
    }
  }
?>
?>
<!-- Main content -->
<div id="wrap-body" class="p-t-lg-30">
    <div class="container">
        <div class="wrap-body-inner">
            <!-- Contact -->
            <section class="block-contact m-t-lg-30 m-t-xs-0 p-b-lg-50">
                <div class="">
                    <div class="row">
                        <!-- Contact form -->
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="heading">
                                <h3>Contact Form</h3>
                            </div>
                            <div class="contact-form p-lg-30 p-xs-15 bg-gray-fa bg1-gray-2">
                                <form method="POST">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-item" placeholder="Name" name="sender_name">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control form-item" placeholder="Email" name="sender_email">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-item" placeholder="Subject" name="sender_subject">
                                    </div>
                                    <textarea class="form-control form-item h-200 m-b-lg-10" placeholder="Content" rows="3" name="sender_message"></textarea>
                                    <button type="submit" class="ht-btn ht-btn-default" name="sendEmail">Submit</button>
                                </form>
                            </div>
                        </div>
                        <!-- Contact info -->
                        <div class="col-sm-6 col-md-6 col-lg-6 m-b-xs-30">
                            <div class="heading">
                                <h3>Contact info</h3>
                            </div>
                            <div class="contact-info p-lg-30 p-xs-15 bg-gray-fa bg1-gray-2">
                                <div class="content">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod temp incidunt ut labore et dolore magna
                                        aliqua uat enim ad minim veniama quis nostrud ullamco lab oris nisi ut aliqu.</p>
                                    <ul class="list-default">
                                        <li><span>Address: </span>Jammu Kashmir, Jammu</li>
                                        <li><span>Mobile: </span>+91 9874561232</li>
                                        <li><span>Email: </span></span>Geeimran16@gmail.com</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<?php include "includes/footer.php"; ?>
