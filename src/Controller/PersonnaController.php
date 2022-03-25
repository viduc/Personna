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

class PersonnaController implements UseCaseInterface
{
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

                break;
            case 'read':

                break;
            case 'update':

                break;
            case 'delete':

                break;
        }
        return $presenter;
    }
}