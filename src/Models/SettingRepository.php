<?php

namespace Amirsahra\Larasetting\Models;

use Illuminate\Database\Eloquent\Collection;

class SettingRepository
{
    protected Larasetting $model;

    public function __construct(Larasetting $model)
    {
        $this->model = $model;
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function update($id, array $data)
    {
        $record = $this->model->findOrFail($id);
        $record->update($data);
        return $record;
    }

    public function delete($id)
    {
        $record = $this->model->findOrFail($id);
        return $record->delete();
    }

    public function all(): Collection
    {
        return $this->model->all();
    }
}
