<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass="App\Repository\VisitRepository")
 */
class Visit
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="visitDate", type="date")
     */
    private $visitDate;

    /**
     * @var bool
     *
     * @ORM\Column(name="alfDay", type="boolean")
     */
    private $alfDay;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Ticket", mappedBy="visit", cascade={"persist"})
     * @Assert\NotBlank()
     */
    private $tickets;

    public function __construct()
    {
        $this->tickets = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getTickets()
    {
        return $this->tickets;
    }

    /**
     * @param mixed $tickets
     */
    public function setTickets($tickets)
    {
        $this->tickets = $tickets;
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
     * Set visitDate
     *
     * @param \DateTime $visitDate
     *
     * @return visit
     */
    public function setVisitDate($visitDate)
    {
        $this->visitDate = $visitDate;

        return $this;
    }

    /**
     * Get visitDate
     *
     * @return \DateTime
     */
    public function getVisitDate()
    {
        return $this->visitDate;
    }

    /**
     * Set alfDay
     *
     * @param boolean $alfDay
     *
     * @return visit
     */
    public function setAlfDay($alfDay)
    {
        $this->alfDay = $alfDay;

        return $this;
    }

    /**
     * Get alfDay
     *
     * @return bool
     */
    public function getAlfDay()
    {
        return $this->alfDay;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return visit
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    public function addticket(Ticket $ticket)
    {

        $ticket->setVisit($this);
        $this->tickets->add($ticket);


    }

    public function removeticket(Ticket $ticket)
    {
        $this->tickets->removeElement($ticket);
    }

    public function setAllTicketsVisit()
    {
        foreach ($this->tickets as $ticket)
        {
            $ticket->setVisit($this);
        }
    }

}
