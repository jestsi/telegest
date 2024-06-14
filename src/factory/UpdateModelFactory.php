<?php

namespace Gest\Telegest\factory;

use Gest\Telegest\builders\UpdateModelMapBuilder;
use Gest\Telegest\interfaces\UpdateModelFactoryInterface;
use Gest\Telegest\types\UpdateType;

class UpdateModelFactory implements UpdateModelFactoryInterface
{
    protected $_modelMap;

    public function __construct(UpdateModelMapBuilder $updateModels)
    {
        $this->_modelMap = $updateModels;
    }

    public function create(UpdateType $type, array $data)
    {
        $modelMap = $this->_modelMap->build();
        
        if (isset($modelMap[$type->value])) {
            $modelClass = $modelMap[$type->value];
            return (new $modelClass($data));
        }

        return null;
    } 
}