<?php
declare(strict_types=1);
/******************************************************************************/
/**                                 Personna                                 **/
/** Auteur: viduc@mail.fr                                                    **/
/** github: https://github.com/viduc/personna                                **/
/** Licence: Apache 2.0                                                      **/
/******************************************************************************/

namespace Viduc\Personna\Reponses;

use Viduc\Personna\Interfaces\Reponses\ReponsePersonnaInterface;
use Viduc\Personna\Model\PersonnaModel;

class ReponsePersonna extends Reponse implements ReponsePersonnaInterface
{
    /**
     * @var PersonnaModel[]
     */
    private array $personnas;

    public function __construct(array $personnas = null)
    {
        parent::__construct();
        $this->personnas = $personnas ?? [];
    }

    /**
     * @param PersonnaModel[] $personnas
     * @return void
     */
    final public function setPersonnas(array $personnas): void
    {
        $this->personnas = $personnas;
    }

    /**
     * @return PersonnaModel[]
     */
    final public function getPersonnas(): array
    {
        return $this->personnas;
    }

    /**
     * @param PersonnaModel $personnaModel
     * @return void
     */
    final public function addPersonna(PersonnaModel $personnaModel): void
    {
        $this->personnas[] = $personnaModel;
    }
}