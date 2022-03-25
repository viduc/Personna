<?php
declare(strict_types=1);
/******************************************************************************/
/**                                 Personna                                 **/
/** Auteur: viduc@mail.fr                                                    **/
/** github: https://github.com/viduc/personna                                **/
/** Licence: Apache 2.0                                                      **/
/******************************************************************************/

namespace viduc\personna\src\Controller;

use viduc\personna\src\Interfaces\Controller\UseCaseInterface;
use viduc\personna\src\Interfaces\Presenters\PresenterInterface;
use viduc\personna\src\Interfaces\Requetes\RequeteInterface;
use viduc\personna\src\Reponses\ReponseCreate;
use viduc\personna\src\Repository\PersonnaRepository;

class PersonnaController implements UseCaseInterface
{
    private PersonnaRepository $repository;

    public function __construct()
    {
        $this->repository = new PersonnaRepository();
    }

    /**
     * @param RequeteInterface $requete
     * @param PresenterInterface $presenter
     * @return PresenterInterface
     */
    final public function execute(
        RequeteInterface $requete,
        PresenterInterface $presenter
    ): PresenterInterface {
        switch ($requete->getAction()) {
            case 'create':
                $reponse = new ReponseCreate();
                $reponse->setPersonnaModel($this->repository->create([]));
                $presenter->presente($reponse);
                break;
            case 'read':
                $reponse = new ReponseCreate();
                $reponse->setPersonnaModel($this->repository->read(0));
                $presenter->presente($reponse);
                break;
            case 'update':

                break;
            case 'delete':

                break;
        }

        return $presenter;
    }
}