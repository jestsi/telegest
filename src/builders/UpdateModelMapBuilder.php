<?php

namespace Gest\Telegest\builders;

use Gest\Telegest\models\BaseModel;
use Gest\Telegest\types\UpdateType;

class UpdateModelMapBuilder
{
    protected $modelMap = [];

    /**
     * Добавляет новую ассоциацию типа обновления с моделью.
     *
     * @param UpdateType $type Тип обновления.
     * @param string $modelClass Класс модели.
     * @return self
     */
    public function addMapping(UpdateType $type, string $modelClass): self
    {
        $this->modelMap[$type->value] = $modelClass;
        return $this;
    }

    /**
     * Возвращает массив ассоциаций типов обновлений с моделями.
     *
     * @return array
     */
    public function build(): array
    {
        return $this->modelMap;
    }
}