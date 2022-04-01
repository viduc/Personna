<?php
declare(strict_types=1);
/******************************************************************************/
/**                                 Personna                                 **/
/** Auteur: viduc@mail.fr                                                    **/
/** github: https://github.com/viduc/personna                                **/
/** Licence: Apache 2.0                                                      **/
/******************************************************************************/

namespace Viduc\Personna\Controller;

use Viduc\Personna\Exceptions\PersonnaRepositoryException;
use Viduc\Personna\Exceptions\PersonnaRequetesException;
use Viduc\Personna\File\File;
use Viduc\Personna\Interfaces\Controller\UseCaseInterface;
use Viduc\Personna\Interfaces\File\FileInterface;
use Viduc\Personna\Interfaces\Presenters\PresenterInterface;
use Viduc\Personna\Interfaces\Requetes\RequeteInterface;
use Viduc\Personna\Model\ErreurModel;
use Viduc\Personna\Reponses\ReponseCreate;
use Viduc\Personna\Repository\PersonnaRepository;

class Personna implements UseCaseInterface
{
    /**
     * @var PersonnaRepository
     */
    private PersonnaRepository $repository;

    public function __construct(string $path)
    {
        $this->repository = new PersonnaRepository(new File($path));
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
                try {
                    $reponse->setPersonnaModel($this->repository->create(
                        $requete->getParam('personna')
                    ));
                } catch (PersonnaRepositoryException | PersonnaRequetesException $ex) {
                    $reponse->setErreur(
                        new ErreurModel($ex->getCode(), $ex->getMessage())
                    );
                }
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

    /**
     * @codeCoverageIgnore
     * @param FileInterface $file
     * @return void
     */
    final public function setFile(FileInterface $file): void
    {
        $this->repository->setFile($file);
    }

    /**
     * @codeCoverageIgnore
     * @param PersonnaRepository $repository
     * @return void
     */
    final public function setRepository(PersonnaRepository $repository): void
    {
        $this->repository = $repository;
    }
}