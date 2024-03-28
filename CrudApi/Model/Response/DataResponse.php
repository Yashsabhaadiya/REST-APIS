<?php

declare(strict_types=1);

namespace Webdev\CrudApi\MOdel\Response;

use Webdev\CrudApi\Api\Data\DataInterface;

class DataResponse implements DataInterface
{
    protected $id;

    public function setId(int $id){
        $this->id = $id;
        return $this;
    }

    public function getId(): int
    {
        return 
        $this->id;
    }

    protected $name;

    public function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    protected $gender;

    public function setGender(string $gender)
    {
        $this->gender = $gender;
        return $this;
    }

    public function getGender(): string
    {
        return $this->gender;
    }

    protected $email;

    public function setEmail(string $email)
    {
        $this->email = $email;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    protected $feedback;

    public function setFeedback(string $feedback)
    {
        $this->feedback = $feedback;
        return $this;
    }

    public function getFeedback(): string
    {
        return $this->feedback;
    }

}