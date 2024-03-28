<?php

declare(strict_types=1);

namespace Webdev\CrudApi\Api\Data;

interface DataInterface
{
    /**
     * Set the id of the response.
     *  
     * @param int $id
     * @return $this
     */
    public function setId(int $id);

    /**
     * Get the id status of the response.
     *
     * @return int
     */
    public function getId(): int;

    /**
     * Set the name of the response.
     *
     * @param string $name
     * @return $this
     */
    public function setName(string $name);
    /**
     * Get the name status of the response.
     *
     * @return string
     */
    public function getName(): string;

    /**
     * Set the gender of the response.
     *
     * @param string $gender
     * @return $this
     */
    public function setGender(string $gender);

    /**
     * Get the gender status of the response.
     *
     * @return string
     */
    public function getGender(): string;

    /**
     * Set the email of the response.
     *
     * @param string $email
     * @return $this
     */
    public function setEmail(string $email);

    /**
     * Get the email status of the response.
     *
     * @return string
     */
    public function getEmail(): string;

    /**
     * Set the feedback of the response.
     *
     * @param string $feedback
     * @return $this
     */
    public function setFeedback(string $feedback);

    /**
     * Get the feedback status of the response.
     *
     * @return string
     */
    public function getFeedback(): string;

}