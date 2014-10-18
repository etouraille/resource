<?php
namespace OP\Message;

class Main
{
    public function addMessage($message)
    {
        $_SESSION['message']= $message;
    }

    public function getMessage()
    {
        $message = $_SESSION['message'];
        unset($_SESSION['message']);
        return $message;
    }

    public function isThereAMessage()
    {
        return isset($_SESSION['message']);
    }
}