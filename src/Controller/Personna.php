<?php
declare(strict_types=1);
/******************************************************************************/
/**                                 Personna                                 **/
/** Auteur: viduc@mail.fr                                                    **/
/** github: https://github.com/viduc/personna                                **/
/** Licence: Apache 2.0                                                      **/
/******************************************************************************/

namespace viduc\personna\Controller;

use viduc\personna\Interfaces\Controller\UseCaseInterface;
use viduc\personna\Interfaces\Ports\PortPersonnaDaoInterface;
use viduc\personna\Interfaces\Presenters\PresenterInterface;
use viduc\personna\Interfaces\Requetes\RequeteInterface;
use viduc\personna\Reponses\ReponseCreate;
use viduc\personna\Repository\PersonnaRepository;

class Personna implements UseCaseInterface
{
    private PersonnaRepository $repository;

    public function __construct(PortPersonnaDaoInterface $port)
    {
        $this->repository = new PersonnaRepository($port);
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
                $reponse->setPersonnaModel(
                    $this->repository->read($requete->getParam('id'))
                );
                $presenter->presente($reponse);
                break;
            case 'update':
                $reponse = new ReponseCreate();
                $reponse->setPersonnaModel(
                    $this->repository->update($requete->getParam('personna'))
                );
                $presenter->presente($reponse);
                break;
            case 'delete':
                $reponse = new ReponseCreate();
                $this->repository->delete($requete->getParam('personna'));
                $presenter->presente($reponse);
                break;
        }

        return $presenter;
    }
}