<?php
declare(strict_types=1);
/******************************************************************************/
/**                                 Personna                                 **/
/** Auteur: viduc@mail.fr                                                    **/
/** github: https://github.com/viduc/personna                                **/
/** Licence: Apache 2.0                                                      **/
/******************************************************************************/

namespace Viduc\Personna\Repository;

use Viduc\Personna\Interfaces\Ports\PortPersonnaDaoInterface;
use Viduc\Personna\Model\PersonnaModel;

class PersonnaRepository
{
    private PortPersonnaDaoInterface $port;

    public function __construct(PortPersonnaDaoInterface $port)
    {
        $this->port = $port;
    }

    final public function create(array $ptions): PersonnaModel
    {
        return $this->port->create($ptions);
    }

    final public function read(int $id): PersonnaModel
    {
        return new PersonnaModel();
    }

    final public function update(PersonnaModel $personna): PersonnaModel
    {
        return $personna;
    }

    final public function delete(PersonnaModel $personna): void
    {

    }
}