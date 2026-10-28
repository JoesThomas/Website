<?php declare(strict_types=1);

class order
{
    function domailstuff($host, $port, $smtPauth, $username, $password, $emailto, $emailfrom, $fromfriendly, $subject, $msgbody)
    {
        try
        {
            require ("classes/PHPMailerAutoload.php");

            // lets create an instance of the php mailer class ready to send an email
            $mymail = new PHPMailer();

            // lets prepare a mail
            $mymail->isSMTP(); // we are using smtp

            // we want to add some debug info
            $mymail->SMTPDebug = 0;

            // this is our server connection details
            $mymail->Host = $host;
            $mymail->Port = $port;
            $mymail->SMTPSecure = 'tls'; // either tls or ssl (REMEBER TO GET CORRECT PORT NUMBER)
            $mymail->SMTPAuth = $smtPauth;
            $mymail->Username = $username;
            $mymail->Password = $password;

            // add a recipient of the email
            $mymail->addAddress($emailto);

            // set the from address
            $mymail->SetFrom($emailfrom, $fromfriendly);

            $mymail->isHTML(true);

            // create a message body
            $mymail->Subject = $subject;
            $mymail->Body = $msgbody;

            if ($mymail->send())
            {
                // email has been sent successfully
                return 1;
            }
            else
            {
                // we have a problem captain
                return $mymail->ErrorInfo;
            }
        }
        catch (Exception $e)
        {
            echo "We got an issue with our mail function: " . $e;
        }
    }
} 