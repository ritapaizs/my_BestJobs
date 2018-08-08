<?php
/**
 * Created by PhpStorm.
 * User: Rita
 * Date: 8/7/2018
 * Time: 1:51 PM
 */

namespace App\Model;
class JobSearch
{
    private $keyword;

    /**
     * @return mixed
     */
    public function getKeyword()
    {
        return $this->keyword;
    }

    /**
     * @param mixed $keyword
     */
    public function setKeyword($keyword): void
    {
        $this->keyword = $keyword;
    }
}
