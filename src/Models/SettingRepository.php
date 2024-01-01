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

    public function find($key)
    {
        $conditions['key'] = $key;
        return $this->model->where($conditions);
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

    public function search($key, $is_active = null)
    {
        $conditions['key'] = $key;
        if (!is_null($is_active))
            $conditions['is_active'] = $is_active;

        return $this->model->where($conditions)->get();
    }
}
