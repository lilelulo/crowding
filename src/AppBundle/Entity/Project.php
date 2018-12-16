<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Project
 *
 * @ORM\Table(name="project")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProjectRepository")
 */
class Project
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
     * @ORM\Column(type="string", length=5)
	*/
	private $name;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="projects")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="Source", mappedBy="project")
     */
    private $sources;

    /**
     * @ORM\ManyToOne(targetEntity="Lang")
     * @ORM\JoinColumn(nullable=false)
     */
    private $originalLang;

    /**
     * @ORM\ManyToMany(targetEntity="Lang", cascade={"persist"})
     **/
    private $langs;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->sources = new \Doctrine\Common\Collections\ArrayCollection();
        $this->langs = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     *
     * @return Project
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Project
     */
    public function setUser(\AppBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add source
     *
     * @param \AppBundle\Entity\Source $source
     *
     * @return Project
     */
    public function addSource(\AppBundle\Entity\Source $source)
    {
        $this->sources[] = $source;

        return $this;
    }

    /**
     * Remove source
     *
     * @param \AppBundle\Entity\Source $source
     */
    public function removeSource(\AppBundle\Entity\Source $source)
    {
        $this->sources->removeElement($source);
    }

    /**
     * Get sources
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSources()
    {
        return $this->sources;
    }

    /**
     * Set originalLang
     *
     * @param \AppBundle\Entity\Lang $originalLang
     *
     * @return Project
     */
    public function setOriginalLang(\AppBundle\Entity\Lang $originalLang)
    {
        $this->originalLang = $originalLang;

        return $this;
    }

    /**
     * Get originalLang
     *
     * @return \AppBundle\Entity\Lang
     */
    public function getOriginalLang()
    {
        return $this->originalLang;
    }

    /**
     * Add lang
     *
     * @param \AppBundle\Entity\Lang $lang
     *
     * @return Project
     */
    public function addLang(\AppBundle\Entity\Lang $lang)
    {
        $this->langs[] = $lang;

        return $this;
    }

    /**
     * Remove lang
     *
     * @param \AppBundle\Entity\Lang $lang
     */
    public function removeLang(\AppBundle\Entity\Lang $lang)
    {
        $this->langs->removeElement($lang);
    }

    /**
     * Get langs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLangs()
    {
        return $this->langs;
    }
}
