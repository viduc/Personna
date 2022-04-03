<?php
declare(strict_types=1);
/******************************************************************************/
/**                                 Personna                                 **/
/** Auteur: viduc@mail.fr                                                    **/
/** github: https://github.com/viduc/personna                                **/
/** Licence: Apache 2.0                                                      **/
/******************************************************************************/

namespace Viduc\Personna\Controller;

use SebastianBergmann\CodeCoverage\Report\Xml\Node;
use Viduc\Personna\Exceptions\PersonnaRepositoryException;
use Viduc\Personna\Exceptions\PersonnaRequetesException;
use Viduc\Personna\File\File;
use Viduc\Personna\Interfaces\Controller\UseCaseInterface;
use Viduc\Personna\Interfaces\File\FileInterface;
use Viduc\Personna\Interfaces\Presenters\PresenterInterface;
use Viduc\Personna\Interfaces\Reponses\ReponseInterface;
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

    private RequeteInterface $requete;

    private ReponseInterface $reponse;

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
        $this->requete = $requete;
        switch ($requete->getAction()) {
            case 'create':
                $this->reponse = new ReponseCreate();
                $this->reponsePersonna('create', 'personna');
                break;
            case 'read':
                $this->reponse = new ReponseCreate();
                $this->reponsePersonna('read', 'id');
                break;
            case 'update':
                $this->reponse = new ReponseCreate();
                $this->reponsePersonna('update', 'personna');
                break;
            case 'delete':
                $this->reponse = new ReponseCreate();
                try {
                    $this->repository->delete($requete->getParam('personna'));
                } catch (PersonnaRepositoryException | PersonnaRequetesException $ex) {
                    $this->reponse->setErreur(
                        new ErreurModel($ex->getCode(), $ex->getMessage())
                    );
                }
                break;
        }
        $presenter->presente($this->reponse);

        return $presenter;
    }

    /**
     * @param string $action
     * @param string $param
     * @return void
     */
    private function reponsePersonna(string $action, string $param): void
    {
        try {
            $this->reponse->setPersonnaModel($this->repository->$action(
                $this->requete->getParam($param)
            ));
        } catch (PersonnaRepositoryException | PersonnaRequetesException $ex) {
            $this->reponse->setErreur(
                new ErreurModel($ex->getCode(), $ex->getMessage())
            );
        }
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