<?php 

namespace Webdev\CrudApi\Api;

interface CrudInterface
{
    /**
    * Get custom table data
    *
    * @return array
    */
    public function getCustomTableData();

    /**
     * Get data from custom table by id
     *
     * @param int $id
     * @return Webdev\CrudApi\Api\Data\DataInterface
     */
    public function getDataById($id);
    
    /**
     * Save data to custom table
    
     * @return string
     */
    public function saveData();

    /**
     * Delete data by id from custom table
     *
     * @param int $id
     * @return string
     */
    public function deleteDataById($id);
}