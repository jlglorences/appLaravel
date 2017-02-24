<?php
/**
 * Created by PhpStorm.
 * User: jlorences
 * Date: 24/02/2017
 * Time: 11:20
 */

namespace TeachMe\Repositories;


abstract class BaseRepository{

    /**
     * @return \TeachMe\Entities\Entity
     */

    abstract public function getModel();

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function newQuery()
    {
        return $this->getModel()->newQuery();
    }

    public function findOrFail($id)
    {
        return $this->newQuery()->findOrFail($id);
    }
}