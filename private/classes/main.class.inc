<?php
/**
     * Send email with swiftmailer class
     
*/

class email{

    public $priority = '1';
    public $request_receipt = true;
    public $subject;
    public $from;
    public $to ;
    public $message;

    protected $reciep_email = "webmaster@shamsbase.com";

    protected $stmt ;
    protected $stmt_usernames;
    protected $stmt_password;
    protected $stmt_host ;
    protected $stmt_port;
    protected $transports;

    public function __construct($stmt_host, $stmt_port, $stmt_usernames, $stmt_password)
    {
        $this->stmt_host = $stmt_host;
        $this->stmt_port = $stmt_port;
        $this->stmt_usernames = $stmt_usernames;
        $this->stmt_password = $stmt_password;
        
     $this->transports = $this->transport( $stmt_usernames, $stmt_password);
    }

    public function new_mail_instance(){

      $swift_mail = (new Swift_Message())
        ->setSubject($this->subject)
        ->setFrom($this->from)
        ->setTo($this->to)
        ->setBody($this->message, 'text/html');

        if($this->priority >= 1 && $this->priority <= 5){
            $swift_mail->setPriority($this->priority);
        }

        if($this->request_receipt){
            $swift_mail->setReadReceiptTo($this->reciep_email);
        }


     $this-> headers($swift_mail);

      return $swift_mail;
     
    }


    public function headers($swift_mail){

        $headers = $swift_mail->getHeaders();
        $headers->addIdHeader("Message-ID: <".time()." TheSystem@".$_SERVER['SERVER_NAME'].">\r\n");
        $headers->addTextHeader('MIME-Version', '1.0');
        $headers->addTextHeader( "X-Mailer: PHP v".phpversion()."\r\n");
        $headers->addParameterizedHeader('Content-type', 'text/html', ['charset' => 'utf-8']);
        return $headers;

    }


    public function transport(){

      $transport = ( new Swift_SmtpTransport($this->stmt_host, $this->stmt_port))
            ->setUsername($this->stmt_usernames)
            ->setPassword($this->stmt_password);

      return new Swift_Mailer($transport);

    }

    public function sendEmail(){

       try {
        $mailer = $this->new_mail_instance();
        $result =  $this->transports->send($mailer);

        return $result;
       } catch (Exception $e) {
           return "error:".$e->getMessage();
       }
    }


}
?>