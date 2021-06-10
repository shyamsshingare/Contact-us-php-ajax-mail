<?php



include_once 'class.phpmailer.php';
include_once 'class.smtp.php';

  if(isset($_POST['Subject']))
{
    $Name = $_POST['Name'];
    $Email = $_POST['Email'];
    $Subject = $_POST['Subject'];
    $Message = $_POST['Message'];

    date_default_timezone_set('Asia/Kolkata');
    $reg_date = date('Y-m-d H:i:s');

    //Check  Required Field
    if (!empty($Name) && !empty($Email) && !empty($Subject) && !empty($Message))
    {
        

             $mail = new PHPMailer();
            $mail->IsSMTP();
            $mail->Host = "smtp.hostinger.in"; // Your Domain Name
            $mail->SMTPAuth = true;
            $mail->Port = 587; //port can be different
            $mail->Username = "example@example.com"; // Your Email ID
            $mail->Password = "example123"; // Password of your email id
            
            $mail->From = "example@example.com"; // Your Email ID
            $mail->FromName = "xyz";
            $mail->AddAddress ("example_1@domain.com");  // On which email id you want to get the message
            $mail->ClearReplyTos();
            $mail->addReplyTo($Email, $Name);
            $mail->IsHTML(true);
            
            $mail->Subject = "Contact via contact us page"; // This is your subject

            $mail->Body = "<!DOCTYPE html>
            <html>
            <head>
            </head>
            <body>
            <center>
            <h2 style='color:skyblue;'>
                <strong> Contact Message...!</strong></h2>

            <table class='editorDemoTable' style='height: 160px; width: 100%;' border='1'>
            <tbody>
            <tr>
            <td align='center' bgcolor='#fbfcfd'>

            <font face='Arial, Helvetica, sans-serif' size='4' color='#57697e' style='font-size: 15px;'>

            <table width='90%' border='0' cellspacing='0' cellpadding='0'>
                <tr>
                    <td><br/><br/>
                        Here Are Your Mail From  (Contact Us):<br/><br/>

                       Name: $Name<br/><br/>
                        Email: $Email<br/><br/>
                        Subject : $Subject<br/><br/>
                        Message :$Message<br/><br/>

                    </td>
                </tr>
            <tr>
           
            </tbody>
            </table>
            </center>
            </table>
            </div>
            </center>
            </body>
            </html>";
            
            if(!$mail->send()) 
            {
              $error = "Mailer Error: " . $mail->ErrorInfo;
              echo '<p>'.$error.'</p>';
          }
          else 
          {
             echo "sccesss";
          }          
      }
  }
  ?>