<?php
declare(strict_types=1);
/******************************************************************************/
/**                                 Personna                                 **/
/** Auteur: viduc@mail.fr                                                    **/
/** github: https://github.com/viduc/personna                                **/
/** Licence: Apache 2.0                                                      **/
/******************************************************************************/

namespace Viduc\Personna\Tests\Model;

use PHPUnit\Framework\TestCase;
use Prophecy\Exception\Doubler\MethodNotFoundException;
use Viduc\Personna\Model\PersonnaModel;

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
        $this->validerModel($this->genererModelStandard(), new PersonnaModel());
    }

    /**
     * @test
     * @return void
     */
    final public function personnaModelWithOptions(): void
    {
        $options['id'] = 666;
        $options['username'] = 'test';
        $model = new PersonnaModel($options);
        self::assertEquals(666, $model->getId());
        self::assertEquals('test', $model->getUsername());
        self::assertEquals('nom', $model->getNom());
    }

    /**
     * @test
     * @return void
     */
    final public function jsonSerialize(): void
    {
        $personna = new PersonnaModel();
        $attendu = $this->genererModelStandard();
        foreach ($personna->jsonSerialize() as $key => $value) {
            if ($key !== 'roles') {
                self::assertEquals($attendu->$key, $value);
            } else {
                self::assertEquals(implode('|', $attendu->$key), $value);
            }
        }
    }

    /**
     * @test
     * @return void
     */
    final public function chargerDepuisJson(): void
    {
        $personna = new PersonnaModel();
        $json = $this->genererModelStandard();
        $json->roles = 'ROLE_USER';
        $personna->chargerDepuisJson($json);
        $this->validerModel($this->genererModelStandard(), $personna);
    }

    /**
     * @test
     * @return void
     */
    final public function methodNotAllow(): void
    {
        try {
            $personna = new PersonnaModel();
            $personna->getTest();
        } catch (MethodNotFoundException $ex) {
            self::assertEquals(
                "La méthode n'est pas disponible",
                $ex->getMessage()
            );
        }
    }

    /**
     * @return \stdClass
     */
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
        $model->urlPhoto = 'urlPhoto';
        $model->roles = ['ROLE_USER'];
        $model->isActive = true;

        return $model;
    }

    private function validerModel(mixed $attendu, PersonnaModel $personna): void
    {
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
}