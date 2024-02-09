<?php

namespace Amirsahra\Larasetting\Models;


use Amirsahra\Larasetting\Exceptions\SettingRecordNotFoundException;

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
        return $this->model->create($data)->toArray();
    }

    /**
     * @throws SettingRecordNotFoundException
     */
    public function find($key, $is_active = null)
    {
        $conditions['key'] = $key;
        if (!is_null($is_active))
            $conditions['is_active'] = $is_active;

        $result = $this->model->where($conditions)->first();

        if (is_null($result))
            throw new SettingRecordNotFoundException($key);
        return $result->toArray();
    }

    /**
     * @throws SettingRecordNotFoundException
     */
    public function update($key, array $data)
    {
        $conditions['key'] = $key;
        $result = $this->model->where($conditions)->first();

        if (is_null($result))
            throw new SettingRecordNotFoundException($key);

        $result->update($data);
        return $result->toArray();
    }

    /**
     * @throws SettingRecordNotFoundException
     */
    public function delete($key): bool
    {
        $conditions['key'] = $key;
        $result = $this->model->where($conditions)->first();

        if (is_null($result))
            throw new SettingRecordNotFoundException($key);

        $result->delete();
        return true;
    }

    public function all($is_active = null)
    {
        $conditions = array();
        if (!is_null($is_active))
            $conditions['is_active'] = $is_active;

        return $this->model->where($conditions)->get()->toArray();
    }

    public function search($key, $is_active = null)
    {
        $conditions['key'] = $key;
        if (!is_null($is_active))
            $conditions['is_active'] = $is_active;

        return $this->model->where($conditions)->get()->toArray();
    }
}
