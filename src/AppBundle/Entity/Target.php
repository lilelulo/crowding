<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Target
 *
 * @ORM\Table(name="target")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TargetRepository")
 */
class Target
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
     * @ORM\Column(type="text")
	*/
	private $content;


    /**
     * @ORM\ManyToOne(targetEntity="Source", inversedBy="targets")
     * @ORM\JoinColumn(nullable=false)
     */
    private $source;

    /**
     * @ORM\ManyToOne(targetEntity="Lang")
     * @ORM\JoinColumn(nullable=false)
     */
    private $lang;


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
     * Set content
     *
     * @param string $content
     *
     * @return Target
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set source
     *
     * @param \AppBundle\Entity\Source $source
     *
     * @return Target
     */
    public function setSource(\AppBundle\Entity\Source $source)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * Get source
     *
     * @return \AppBundle\Entity\Source
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * Set lang
     *
     * @param \AppBundle\Entity\Lang $lang
     *
     * @return Target
     */
    public function setLang(\AppBundle\Entity\Lang $lang)
    {
        $this->lang = $lang;

        return $this;
    }

    /**
     * Get lang
     *
     * @return \AppBundle\Entity\Lang
     */
    public function getLang()
    {
        return $this->lang;
    }
}
