<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Source
 *
 * @ORM\Table(name="source")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SourceRepository")
 */
class Source
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
        /**
     * @ORM\Column(type="string")
	*/
	private $code;

	    /**
     * @ORM\ManyToOne(targetEntity="Project", inversedBy="sources")
     * @ORM\JoinColumn(nullable=false)
     */
    private $project;


    /**
     * @ORM\OneToMany(targetEntity="Target", mappedBy="source")
     */
    private $targets;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->targets = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set code
     *
     * @param string $code
     *
     * @return Source
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set project
     *
     * @param \AppBundle\Entity\Project $project
     *
     * @return Source
     */
    public function setProject(\AppBundle\Entity\Project $project)
    {
        $this->project = $project;

        return $this;
    }

    /**
     * Get project
     *
     * @return \AppBundle\Entity\Project
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * Add target
     *
     * @param \AppBundle\Entity\Target $target
     *
     * @return Source
     */
    public function addTarget(\AppBundle\Entity\Target $target)
    {
        $this->targets[] = $target;

        return $this;
    }

    /**
     * Remove target
     *
     * @param \AppBundle\Entity\Target $target
     */
    public function removeTarget(\AppBundle\Entity\Target $target)
    {
        $this->targets->removeElement($target);
    }

    /**
     * Get targets
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTargets()
    {
        return $this->targets;
    }
}
