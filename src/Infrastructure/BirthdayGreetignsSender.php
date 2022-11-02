<?php

namespace BirthdayGreetingsKata\Infrastructure;

use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

class BirthdayGreetignsSender
{
    public function send(EmployeeRepository $employee, $smtpHost, $smtpPort){
        $email = $employee->getEmail();
        $body = sprintf('Happy Birthday, dear %s!', $employee->getFirstName());
        $subject = 'Happy Birthday!';
        $this->sendMessage($smtpHost, $smtpPort, 'sender@here.com', $subject, $body, $email);
    }

    private function sendMessage($smtpHost, $smtpPort, $sender, $subject, $body, $recipient): void
    {
        // Create a mailer
        $mailer = new Swift_Mailer(
            new Swift_SmtpTransport($smtpHost, $smtpPort)
        );

        // Construct the message
        $msg = new Swift_Message($subject);
        $msg
            ->setFrom($sender)
            ->setTo([$recipient])
            ->setBody($body)
        ;

        // Send the message
        $mailer->send($msg);
    }
}