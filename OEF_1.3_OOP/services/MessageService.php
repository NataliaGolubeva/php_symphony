<?php


class MessageService
{
private $errors;
private $input_errors = "";
private $infos;

    /**
     * @return mixed
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * @param mixed $errors
     */
    public function setErrors($errors)
    {
        $this->errors = $errors;
    }

    /**
     * @return mixed
     */
    public function getInputErrors()
    {
        return $this->input_errors;
    }

    /**
     * @param mixed $input_errors
     */
    public function setInputErrors($input_errors)
    {
        $this->input_errors = $input_errors;
    }

    /**
     * @return mixed
     */
    public function getInfos()
    {
        return $this->infos;
    }

    /**
     * @param mixed $infos
     */
    public function setInfos($infos)
    {
        $this->infos = $infos;
    }

/// do we need to pass SESSION[usrID] to the functions below?
///
public function __construct() {
        $this->errors =  $_SESSION['errors'];
        $this->infos =  $_SESSION['msgs'];
        $this->input_errors =  $_POST['errors'];

}
public function CountErrors() {
    if (!isset($_SESSION['errors']))
    {
        $_SESSION['errors'] = 0;
    }
    else
    {
        ++$_SESSION['errors'];
    }
    return $_SESSION['errors'];
}
public function CountInputErrors() {
    if (!isset($_POST['errors']))
    {
        $_POST['errors'] = 0;
    }
    else
    {
        ++$_POST['errors'];
    }
    return $_POST['errors'];
}

public function CountInfos() {
    if (!isset($_SESSION['msgs']))
    {
        $_SESSION['msgs'] = 0;
    }
    else
    {
        ++$_SESSION['msgs'];
    }
    return $_SESSION['msgs'];
    }

    public function CountNewErrors() {

    }
    public function CountNewInputErrors() {

    }
    public function CountNewInfos() {

    }
    public function AddMessage( $type, $msg, $key = null ){

    }
    public function ShowErrors() {

    }
    public function ShowInfos() {

    }

}