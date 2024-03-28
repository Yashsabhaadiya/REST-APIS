<?php

declare(strict_types=1);

namespace Webdev\CrudApi\Model;

use Webdev\CrudApi\Api\CrudInterface;
use Webdev\CrudApi\Api\Data\DataInterface;
use Webdev\Helloworld\Model\DataFactory;
use Webdev\Helloworld\Model\ResourceModel\Data as DataResourceModel;
use Webdev\Helloworld\Model\ResourceModel\Data\CollectionFactory as DataCollectionFactory;
use Webdev\CrudApi\Model\Response\DataResponse;
use Magento\Framework\Webapi\Rest\Request;

class Crud implements CrudInterface
{
    /**
     * @var DataFactory
     */
    protected $dataFactory;

    /**
     * @var DataResourceModel
     */
    protected $dataResourceModel;

    /**
     * @var DataCollectionFactory
     */
    protected $dataCollectionFactory;

    /**
     * @var DataResponse
     */
    protected $dataResponse;

    /**
     * @var Request
     */
    protected $request;

    public function __construct(
        DataFactory $dataFactory,
        DataResourceModel $dataResourceModel,
        DataCollectionFactory $dataCollectionFactory,
        DataResponse $dataResponse,
        Request $request
    ) {
        $this->dataFactory = $dataFactory;
        $this->dataResourceModel = $dataResourceModel;
        $this->dataCollectionFactory = $dataCollectionFactory;
        $this->dataResponse = $dataResponse;
        $this->request = $request;
    }

    public function getCustomTableData()
    {
        $dataCollection = $this->dataCollectionFactory->create();
        $data = [];
        foreach ($dataCollection as $item) {
            $data[] = $item->getData();
        }
        return $data;
    }

    public function getDataById($id)
    {
        $dataCollection = $this->dataCollectionFactory->create();
        $dataCollection->addFieldToFilter('id', $id);
        $dataModel = $dataCollection->getFirstItem();
    
        if (!$dataModel->getId()) {
            throw new \Magento\Framework\Exception\NoSuchEntityException(__('Data with id '. $id . ' does not exist.', $id));
        }
    
        $this->dataResponse->setId((int)$dataModel->getId());
        $this->dataResponse->setName((string)$dataModel->getName());
        $this->dataResponse->setGender((string)$dataModel->getGender());
        $this->dataResponse->setEmail((string)$dataModel->getEmail());
        $this->dataResponse->setFeedback((string)$dataModel->getFeedback());
    
        return $this->dataResponse;
    }
    
    public function saveData()
    {
        $bodyParams = $this->request->getBodyParams();

        if (!empty($bodyParams['data'])) {
            foreach ($bodyParams['data'] as $item) {
                $dataModel = $this->dataFactory->create();
                $dataModel->setData([
                    'name' => (string)$item['name'],
                    'gender' => (string)$item['gender'],
                    'email' => (string)$item['email'],
                    'feedback' => (string)$item['feedback']
                ]);
        
                $this->dataResourceModel->save($dataModel);
            }

            return "Data added successfully";
        } else {
            return "No data to added";
        }
    }

    public function deleteDataById($id)
    {
        $dataCollection = $this->dataCollectionFactory->create();
        $dataModel = $dataCollection->getItemById($id);
    
        if (!$dataModel) {
            throw new \Magento\Framework\Exception\NoSuchEntityException(__('Data with id ' . $id . ' does not exist.', $id));
        }
    
        $this->dataResourceModel->delete($dataModel);
        return 'Data deleted successfully.';
    }

}