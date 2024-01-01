<?php

namespace Amirsahra\Larasetting\Models;


class SettingRepository
{
    protected Larasetting $model;

    public function __construct(Larasetting $model)
    {
        $this->model = $model;
    }

    public function create(array $data)
    {
        if (is_null($data['is_active']))
            $data['is_active'] = false;
        return $this->model->create($data);
    }

    public function find($key,$is_active = null)
    {
        $conditions['key'] = $key;
        if (!is_null($is_active))
            $conditions['is_active'] = $is_active;
        return $this->model->where($conditions)->findOrFail();
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

    public function all($is_active = null)
    {
        $conditions = array();
        if (!is_null($is_active))
            $conditions['is_active'] = $is_active;

        return $this->model->where($conditions)->get();
    }

    public function search($key, $is_active = null)
    {
        $conditions['key'] = $key;
        if (!is_null($is_active))
            $conditions['is_active'] = $is_active;

        return $this->model->where($conditions)->get();
    }
}
