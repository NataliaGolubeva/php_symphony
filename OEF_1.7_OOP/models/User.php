<?php

class User extends AbstractUser
{

    private $voornaam;
    private $naam;

    /**
     * @return mixed
     */
    public function getVoornaam()
    {
        return strtoupper( $this->voornaam );
    }

    /**
     * @param mixed $voornaam
     */
    public function setVoornaam($voornaam): void
    {
        $this->voornaam = $voornaam;
    }

    /**
     * @return mixed
     */
    public function getNaam()
    {
        return strtoupper( $this->naam );
    }

    /**
     * @param mixed $naam
     */
    public function setNaam($naam): void
    {
        $this->naam = $naam;
    }

}