<?php
declare(strict_types=1);
/******************************************************************************/
/**                                 Personna                                 **/
/** Auteur: viduc@mail.fr                                                    **/
/** github: https://github.com/viduc/personna                                **/
/** Licence: Apache 2.0                                                      **/
/******************************************************************************/

namespace Viduc\Personna\Model;

class PersonnaModel
{
    private int $id;
    private string $username;
    private string $prenom;
    private string $nom;
    private int $age;
    private string $lieu;
    private int $aisanceNumerique;
    private int $expertiseDomaine;
    private int $frequenceUsage;
    private string $metier;
    private string $citation;
    private string $histoire;
    private string $buts;
    private string $personnalite;
    private string $urlPhoto;
    private array $roles = [];
    private bool $isActive;

    public function __construct() {
        $this->id = 0;
        $this->username = 'username';
        $this->prenom = 'prenom';
        $this->nom = 'nom';
        $this->age = 0;
        $this->lieu = 'lieu';
        $this->aisanceNumerique = 0;
        $this->expertiseDomaine = 0;
        $this->frequenceUsage = 0;
        $this->metier = 'metier';
        $this->citation = 'citation';
        $this->histoire = 'histoire';
        $this->buts = 'buts';
        $this->personnalite = 'personnalite';
        $this->urlPhoto = 'urlphoto';
        $this->roles = ['ROLE_USER'];
        $this->isActive = true;
    }

    /**
     * @return int
     */
    final public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return $this
     */
    final public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    final public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     * @return $this
     */
    final public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @return string
     */
    final public function getPrenom(): string
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     * @return $this
     */
    final public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * @return string
     */
    final public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     * @return $this
     */
    final public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return int
     */
    final public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @param int $age
     * @return $this
     */
    final public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    /**
     * @return string
     */
    final public function getLieu(): string
    {
        return $this->lieu;
    }

    /**
     * @param string $lieu
     * @return $this
     */
    final public function setLieu(string $lieu): self
    {
        $this->lieu = $lieu;

        return $this;
    }

    /**
     * @return int
     */
    final public function getAisanceNumerique(): int
    {
        return $this->aisanceNumerique;
    }

    /**
     * @param int $aisanceNumerique
     * @return $this
     */
    final public function setAisanceNumerique(int $aisanceNumerique): self
    {
        $this->aisanceNumerique = $aisanceNumerique;

        return $this;
    }

    /**
     * @return int
     */
    final public function getExpertiseDomaine(): int
    {
        return $this->expertiseDomaine;
    }

    /**
     * @param int $expertiseDomaine
     * @return $this
     */
    final public function setExpertiseDomaine(int $expertiseDomaine): self
    {
        $this->expertiseDomaine = $expertiseDomaine;

        return $this;
    }

    /**
     * @return int
     */
    final public function getFrequenceUsage(): int
    {
        return $this->frequenceUsage;
    }

    /**
     * @param int $frequenceUsage
     * @return $this
     */
    final public function setFrequenceUsage(int $frequenceUsage): self
    {
        $this->frequenceUsage = $frequenceUsage;

        return $this;
    }

    /**
     * @return string
     */
    final public function getMetier(): string
    {
        return $this->metier;
    }

    /**
     * @param string $metier
     * @return $this
     */
    final public function setMetier(string $metier): self
    {
        $this->metier = $metier;

        return $this;
    }

    /**
     * @return string
     */
    final public function getCitation(): string
    {
        return $this->citation;
    }

    /**
     * @param string $citation
     * @return $this
     */
    final public function setCitation(string $citation): self
    {
        $this->citation = $citation;

        return $this;
    }

    /**
     * @return string
     */
    final public function getHistoire(): string
    {
        return $this->histoire;
    }

    /**
     * @param string $histoire
     * @return $this
     */
    final public function setHistoire(string $histoire): self
    {
        $this->histoire = $histoire;

        return $this;
    }

    /**
     * @return string
     */
    final public function getButs(): string
    {
        return $this->buts;
    }

    /**
     * @param string $buts
     * @return $this
     */
    final public function setButs(string $buts): self
    {
        $this->buts = $buts;

        return $this;
    }

    /**
     * @return string
     */
    final public function getPersonnalite(): string
    {
        return $this->personnalite;
    }

    /**
     * @param string $personnalite
     * @return $this
     */
    final public function setPersonnalite(string $personnalite): self
    {
        $this->personnalite = $personnalite;

        return $this;
    }

    /**
     * @return string
     */
    final public function getUrlPhoto(): string
    {
        return $this->urlPhoto;
    }

    /**
     * @param string $urlPhoto
     * @return $this
     */
    final public function setUrlPhoto(string $urlPhoto): self
    {
        $this->urlPhoto = $urlPhoto;

        return $this;
    }

    /**
     * @return string[]
     */
    final public function getRoles() : array {
        if (empty($this->roles)) {
            return ['ROLE_USER'];
        }
        return $this->roles;
    }

    /**
     * @param string $role
     * @return $this
     */
    final function addRole(string $role): self
    {
        $this->roles[] = $role;

        return $this;
    }

    /**
     * @param array $role
     * @return $this
     */
    final function setRoles(array $role): self
    {
        $this->roles = $role;

        return $this;
    }

    /**
     * @param bool $isActive
     * @return $this
     */
    final function setIsActive(bool $isActive): self
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * @return bool
     */
    final function isActive(): bool
    {
        return $this->isActive;
    }

    /**
     * @return bool
     */
    final function getIsActive(): bool
    {
        return $this->isActive;
    }
}