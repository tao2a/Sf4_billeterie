<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="ticket")
 * @ORM\Entity(repositoryClass="App\Repository\TicketRepository")
 */
class Ticket
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;




    /**
     * @var string
     *
     * @ORM\Column(name="civilities", type="string", length=5)
     */
    private $civilities;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="string", length=255)
     */
    private $firstName;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthDate", type="datetime")
     */
    private $birthDate;

    /**
     * @var bool
     *
     * @ORM\Column(name="specialRate", type="boolean")
     */
    private $specialRate;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=255)
     */
    private $country;
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Visit", inversedBy="tickets", cascade={"persist"})
     * @ORM\JoinColumn(unique=true)
     * @Assert\NotBlank()
     *
     */
    private $visit;

    /**
     * Ticket constructor.
     * @param Visit|null $visit
     */
    public function __construct(Visit $visit = null)
    {
        $this->date = new \Datetime();
        $this->visit = $visit;
    }


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set civilities
     *
     * @param string $civilities
     *
     */
    public function setCivilities($civilities)
    {
        $this->civilities = $civilities;

        return $this;
    }

    /**
     * Get civilities
     *
     * @return string
     */
    public function getCivilities()
    {
        return $this->civilities;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set birthDate
     *
     * @param \DateTime $birthDate
     *
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    /**
     * Get birthDate
     *
     * @return \DateTime
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * Set specialRate
     *
     * @param boolean $specialRate
     *
     */
    public function setSpecialRate($specialRate)
    {
        $this->specialRate = $specialRate;

        return $this;
    }

    /**
     * Get specialRate
     *
     * @return bool
     */
    public function getSpecialRate()
    {
        return $this->specialRate;
    }

    /**
     * Set country
     *
     * @param string $country
     *
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @return mixed
     */
    public function getVisit()
    {
        return $this->visit;
    }

    /**
     * @param mixed $visit
     */
    public function setVisit(Visit $visit)
    {
        $this->visit = $visit;
        return $this;
    }

}
