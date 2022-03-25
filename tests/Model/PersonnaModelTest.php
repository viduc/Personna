<?php
declare(strict_types=1);
/******************************************************************************/
/**                                 Personna                                 **/
/** Auteur: viduc@mail.fr                                                    **/
/** github: https://github.com/viduc/personna                                **/
/** Licence: Apache 2.0                                                      **/
/******************************************************************************/

namespace viduc\personna\tests\Model;

use PHPUnit\Framework\TestCase;
use viduc\personna\src\Model\PersonnaModel;

class PersonnaModelTest extends TestCase
{

    final public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * @test
     * @return void
     */
    final public function personnaModel(): void
    {
        $personna = new PersonnaModel();
        $attendu = $this->genererModelStandard();
        self::assertEquals($attendu->id, $personna->getId());
        self::assertEquals($attendu->username, $personna->getUsername());
        self::assertEquals($attendu->prenom, $personna->getPrenom());
        self::assertEquals($attendu->nom, $personna->getNom());
        self::assertEquals($attendu->age, $personna->getAge());
        self::assertEquals($attendu->lieu, $personna->getLieu());
        self::assertEquals($attendu->aisanceNumerique, $personna->getAisanceNumerique());
        self::assertEquals($attendu->expertiseDomaine, $personna->getExpertiseDomaine());
        self::assertEquals($attendu->frequenceUsage, $personna->getFrequenceUsage());
        self::assertEquals($attendu->metier, $personna->getMetier());
        self::assertEquals($attendu->citation, $personna->getCitation());
        self::assertEquals($attendu->histoire, $personna->getHistoire());
        self::assertEquals($attendu->buts, $personna->getButs());
        self::assertEquals($attendu->personnalite, $personna->getPersonnalite());
        self::assertEquals($attendu->urlPhoto, $personna->getUrlPhoto());
        self::assertEquals($attendu->roles, $personna->getRoles());
        self::assertEquals($attendu->isActive, $personna->isActive());
    }

    private function genererModelStandard(): \stdClass
    {
        $model = new \stdClass();
        $model->id = 0;
        $model->username = 'username';
        $model->prenom = 'prenom';
        $model->nom = 'nom';
        $model->age = 0;
        $model->lieu = 'lieu';
        $model->aisanceNumerique = 0;
        $model->expertiseDomaine = 0;
        $model->frequenceUsage = 0;
        $model->metier = 'metier';
        $model->citation = 'citation';
        $model->histoire = 'histoire';
        $model->buts = 'buts';
        $model->personnalite = 'personnalite';
        $model->urlPhoto = 'urlphoto';
        $model->roles = ['ROLE_USER'];
        $model->isActive = true;

        return $model;
    }
}