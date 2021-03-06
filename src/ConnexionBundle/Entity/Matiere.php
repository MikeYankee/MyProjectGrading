<?php

namespace ConnexionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Matiere
 *
 * @ORM\Table(name="Matiere")
 * @ORM\Entity(repositoryClass="ConnexionBundle\Repository\MatiereRepository")
 */
class Matiere
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
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;

    /**
     * @var float
     *
     * @ORM\Column(name="nbHeuresMaquetteCours", type="float")
     */
    private $nbHeuresMaquetteCours;

    /**
     * @var float
     *
     * @ORM\Column(name="nbHeuresMaquetteTD", type="float")
     */
    private $nbHeuresMaquetteTD;

    /**
     * @var float
     *
     * @ORM\Column(name="nbHeuresMaquetteExam", type="float")
     */
    private $nbHeuresMaquetteExam;

    /**
     * @var float
     *
     * @ORM\Column(name="nbHeuresMaquetteSoutenance", type="float")
     */
    private $nbHeuresMaquetteSoutenance;

    /**
     * One Matiere has Many Cours.
     * @ORM\OneToMany(targetEntity="Cours", mappedBy="matiere")
     */
    private $lesCours;

    /**
     * Many Matieres have One Promotion.
     * @ORM\ManyToOne(targetEntity="Promotion", inversedBy="lesMatieres")
     */
    private $promotion;

    /**
     * Many Matieres have Many Users.
     * @ORM\ManyToMany(targetEntity="User", inversedBy="lesMatieres")
     */
    private $lesEnseignants;

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
     * Set libelle
     *
     * @param string $libelle
     * @return Matiere
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string 
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set nbHeuresMaquetteCours
     *
     * @param float $nbHeuresMaquetteCours
     * @return Matiere
     */
    public function setNbHeuresMaquetteCours($nbHeuresMaquetteCours)
    {
        $this->nbHeuresMaquetteCours = $nbHeuresMaquetteCours;

        return $this;
    }

    /**
     * Get nbHeuresMaquetteCours
     *
     * @return float 
     */
    public function getNbHeuresMaquetteCours()
    {
        return $this->nbHeuresMaquetteCours;
    }

    /**
     * Set nbHeuresMaquetteTD
     *
     * @param float $nbHeuresMaquetteTD
     * @return Matiere
     */
    public function setNbHeuresMaquetteTD($nbHeuresMaquetteTD)
    {
        $this->nbHeuresMaquetteTD = $nbHeuresMaquetteTD;

        return $this;
    }

    /**
     * Get nbHeuresMaquetteTD
     *
     * @return float 
     */
    public function getNbHeuresMaquetteTD()
    {
        return $this->nbHeuresMaquetteTD;
    }

    /**
     * Set nbHeuresMaquetteExam
     *
     * @param float $nbHeuresMaquetteExam
     * @return Matiere
     */
    public function setNbHeuresMaquetteExam($nbHeuresMaquetteExam)
    {
        $this->nbHeuresMaquetteExam = $nbHeuresMaquetteExam;

        return $this;
    }

    /**
     * Get nbHeuresMaquetteExam
     *
     * @return float 
     */
    public function getNbHeuresMaquetteExam()
    {
        return $this->nbHeuresMaquetteExam;
    }

    /**
     * Set nbHeuresMaquetteSoutenance
     *
     * @param float $nbHeuresMaquetteSoutenance
     * @return Matiere
     */
    public function setNbHeuresMaquetteSoutenance($nbHeuresMaquetteSoutenance)
    {
        $this->nbHeuresMaquetteSoutenance = $nbHeuresMaquetteSoutenance;

        return $this;
    }

    /**
     * Get nbHeuresMaquetteSoutenance
     *
     * @return float 
     */
    public function getNbHeuresMaquetteSoutenance()
    {
        return $this->nbHeuresMaquetteSoutenance;
    }

    /**
     * Set lesCours
     *
     * @param string $lesCours
     * @return Matiere
     */
    public function setLesCours($lesCours)
    {
        $this->lesCours = $lesCours;

        return $this;
    }

    /**
     * Get lesCours
     *
     * @return string 
     */
    public function getLesCours()
    {
        return $this->lesCours;
    }

    /**
     * Set promo
     *
     * @param string $promotion
     * @return Matiere
     */
    public function setPromo($promotion)
    {
        $this->promotion = $promotion;

        return $this;
    }

    /**
     * Get promo
     *
     * @return string 
     */
    public function getPromotion()
    {
        return $this->promotion;
    }

    /*
     * * Add user
     *
     * @param \ConnexionBundle\Entity\User $user
     * @return Matiere
     */
    public function addLesEnseignant(\ConnexionBundle\Entity\User $lesEnseignants) {
        $this->lesEnseignants[] = $lesEnseignants;

        return $this;
    }

    /*
     * * Set user
     *
     * @param $users
     * @return Matiere
     */
    public function setLesEnseignants($enseignants) {
        $this->lesEnseignants = $enseignants;

        return $this;
    }

    /*
     * Remove user
     *
     * @param \ConnexionBundle\Entity\User $user
     */
    public function removeLesEnseignant(\ConnexionBundle\Entity\User $user) {
        $this->users->removeElement($user);
    }

    /**
     * Get lesEnseignants
     *
     * @return string 
     */
    public function getLesEnseignants()
    {
        return $this->lesEnseignants;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->lesCours = new \Doctrine\Common\Collections\ArrayCollection();
        $this->lesEnseignants = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add lesCours
     *
     * @param \ConnexionBundle\Entity\Cours $lesCours
     * @return Matiere
     */
    public function addLesCour(\ConnexionBundle\Entity\Cours $lesCours)
    {
        $this->lesCours[] = $lesCours;

        return $this;
    }

    /**
     * Remove lesCours
     *
     * @param \ConnexionBundle\Entity\Cours $lesCours
     */
    public function removeLesCour(\ConnexionBundle\Entity\Cours $lesCours)
    {
        $this->lesCours->removeElement($lesCours);
    }

    /**
     * Set promotion
     *
     * @param \ConnexionBundle\Entity\Promotion $promotion
     * @return Matiere
     */
    public function setPromotion(\ConnexionBundle\Entity\Promotion $promotion = null)
    {
        $this->promotion = $promotion;

        return $this;
    }

    /**
     * To string
     *
     * @return string
     */
    public function __toString()
    {
        return $this->libelle;
    }
}
