<?php


class MessageService
{
private $errors;
private $input_errors = "";
private $infos;

    public function __construct() {
       // $this->logger = $logger;
        $this->errors =  $_SESSION['errors'];
        $_SESSION['errors'] = [];

        $this->errors =  $_SESSION['input_errors'];
        $_SESSION['input_errors'] = [];

        $this->infos =  $_SESSION['msgs'];
        $_SESSION['msgs'] = [];

    }

    public function CountErrors()
    {
        return (isset($this->errors)) ? count($this->errors) : 0;
    }

    public function CountInputErrors()
    {
        return (isset($this->input_errors)) ? count($this->input_errors) : 0;
    }

    public function CountInfos()
    {
        return (isset($this->infos)) ? count($this->infos) : 0;
    }

    public function CountNewErrors() {
        return (isset($_SESSION['errors'])) ? count($_SESSION['errors']) : 0;
    }

    public function CountNewInputErrors() {
        return (isset($_SESSION['input_errors'])) ? count($_SESSION['input_errors']) : 0;
    }

    public function CountNewInfos() {
        return (isset($_SESSION['msgs'])) ? count($_SESSION['msgs']) : 0;

    }

    public function AddMessage( $type, $msg, $key = null ){
        if ($type === 'input_error') {
            array_push($_SESSION['input_errors'][$key . "_error"], $msg);
        } else {
            array_push($_SESSION('msgs'), $msg);
        }

    }
    public function GetInputErrors() {
        if ($this->CountInputErrors()) {
            return $this->input_errors;
        } else {
            return null;
        }
    }
    public function ShowErrors() {
        print "<p style='color:red'>$this->errors</p>";
    }

    public function ShowInfos() {
        print "<div class='msgs'>$this->infos</div>";
    }

}