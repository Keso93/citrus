<?php

namespace Entity;


class Admin
{
    private $id;
    private $name;
    private $password;


    public function getId()
    {
        return $this->id;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPassword()
    {
        $this->password;
    }
}