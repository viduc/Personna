<?php
declare(strict_types=1);
/******************************************************************************/
/**                                 Personna                                 **/
/** Auteur: viduc@mail.fr                                                    **/
/** github: https://github.com/viduc/personna                                **/
/** Licence: Apache 2.0                                                      **/
/******************************************************************************/

namespace Viduc\Personna\Model;

use Prophecy\Exception\Doubler\MethodNotFoundException;

/**
 * @method int getId()
 * @method self setId(int $id)
 * @method string getUsername()
 * @method self setUsername(string $username)
 * @method string getPrenom()
 * @method self setPrenom(string $prenom)
 * @method string getNom()
 * @method self setNom(string $nom)
 * @method int getAge()
 * @method self setAge(int $age)
 * @method string getLieu()
 * @method self setLieu(string $lieu)
 * @method int getAisanceNumerique()
 * @method self setAisanceNumerique(int $aisanceNumerique)
 * @method int getExpertiseDomaine()
 * @method self setExpertiseDomaine(int $expertiseDomaine)
 * @method int getFrequenceUsage()
 * @method self setFrequenceUsage(int $frequenceUsage)
 * @method string getMetier()
 * @method self setMetier(string $meier)
 * @method string getCitation()
 * @method self setCitation(string $citation)
 * @method string getHistoire()
 * @method self setHistoire(string $histoire)
 * @method string getButs()
 * @method self setButs(string $buts)
 * @method string getPersonnalite()
 * @method self setPersonnalite(string $buts)
 * @method string getUrlPhoto()
 * @method self setUrlPhoto(string $buts)
 * @method array getRoles()
 * @method self setRoles(array $roles)
 * @method bool getIsActive()
 * @method self setIsActive(bool $isActive)
 */
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
    private array $roles;
    private bool $isActive;

    public function __construct(array $options = null) {
        $this->id = $options['id'] ?? 0;
        $this->username = $options['username'] ?? 'username';
        $this->prenom = $options['prenom'] ?? 'prenom';
        $this->nom = $options['nom'] ?? 'nom';
        $this->age = $options['age'] ?? 0;
        $this->lieu = $options['lieu'] ?? 'lieu';
        $this->aisanceNumerique = $options['aisanceNumerique'] ?? 0;
        $this->expertiseDomaine = $options['expertiseDomaine'] ?? 0;
        $this->frequenceUsage = $options['frequenceUsage'] ?? 0;
        $this->metier = $options['metier'] ?? 'metier';
        $this->citation = $options['citation'] ?? 'citation';
        $this->histoire = $options['histoire'] ?? 'histoire';
        $this->buts = $options['buts'] ?? 'buts';
        $this->personnalite = $options['personnalite'] ?? 'personnalite';
        $this->urlPhoto = $options['urlPhoto'] ?? 'urlPhoto';
        $this->roles = $options['roles'] ?? ['ROLE_USER'];
        $this->isActive = $options['isActive'] ?? true;
    }

    /**
     * @param string $name
     * @param array $arguments
     * @return mixed
     */
    final public function __call(string $name, array $arguments): mixed
    {
        $property = lcfirst(str_replace(['get', 'set'], '', $name));
        if (isset($this->$property)) {
            if (str_contains($name, 'get')) {
                return $this->$property;
            }
            if (str_contains($name, 'set')) {
                $this->$property = $arguments[0];
                return $this;
            }
        }
        throw new MethodNotFoundException(
            "La méthode n'est pas disponible",
            PersonnaModel::class,
            $name,
        );
    }

    /**
     * @return bool
     */
    final public function isActive(): bool
    {
        return $this->isActive;
    }

    /**
     * Méthode de sérialisation pour json
     * @return array
     */
    final public function jsonSerialize() : array
    {
        return [
            'id' => $this->id,
            'username' => $this->username,
            'prenom' => $this->prenom,
            'nom' => $this->nom,
            'age' => $this->age,
            'lieu' => $this->lieu,
            'aisanceNumerique' => $this->aisanceNumerique,
            'expertiseDomaine' => $this->expertiseDomaine,
            'frequenceUsage' => $this->frequenceUsage,
            'metier' => $this->metier,
            'citation' => $this->citation,
            'histoire' => $this->histoire,
            'buts' => $this->buts,
            'personnalite' => $this->personnalite,
            'urlPhoto' => $this->urlPhoto,
            'roles' => implode('|', $this->roles),
            'isActive' => $this->isActive
        ];
    }

    /**
     * Permet de charger les informations récupérées depuis un fichier
     * @param mixed$json
     */
    final public function chargerDepuisJson(mixed $json) : void
    {
        $this->id = $json->id;
        $this->username = $json->username;
        $this->prenom = $json->prenom;
        $this->nom = $json->nom;
        $this->age = $json->age;
        $this->lieu = $json->lieu;
        $this->aisanceNumerique = $json->aisanceNumerique;
        $this->expertiseDomaine = $json->expertiseDomaine;
        $this->frequenceUsage = $json->frequenceUsage;
        $this->metier = $json->metier;
        $this->citation = $json->citation;
        $this->histoire = $json->histoire;
        $this->buts = $json->buts;
        $this->personnalite = $json->personnalite;
        $this->urlPhoto = $json->urlPhoto;
        $this->roles = explode('|', $json->roles);
        $this->isActive = $json->isActive;
    }
}