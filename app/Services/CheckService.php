<?php

namespace App\Services;

class CheckService
{
    public function checkById($model, int $id, string $message = null, $checkActive = false)
    {
        if (is_null($message)) $message = __('base.data_not_found');
        if ($checkActive) $model->active();
        $data = $model->find($id);
        if (!$data) throwError($message);
        return $data;
    }

    public function checkWithoutId($model, int $id, string $message = null, $checkActive = false)
    {
        if (is_null($message)) $message = __('base.data_already_exists');
        if ($checkActive) $model->active();
        $data = $model->find($id);
        if ($data) throwError($message);
        return $data;
    }

    public function checkManyById($model, array $ids, string $message = null, $checkActive = false)
    {
        if (is_null($message)) $message = __('base.data_not_found');
        if ($checkActive) $model->active();
        $data = $model->whereIn('id', $ids)->get();
        if ($data->count() !== count($ids)) throwError($message);
        return $data;
    }

    public function checkManyWithoutId($model, array $ids, string $message = null, $checkActive = false)
    {
        if (is_null($message)) $message = __('base.data_already_exists');
        if ($checkActive) $model->active();
        $data = $model->whereIn('id', $ids)->get();
        if ($data->count() > 0) throwError($message);
        return $data;
    }

    public function checkByKeyValue($model, string $key, $value, string $message = null, $checkActive = false)
    {
        if (is_null($message)) $message = __('base.data_not_found');
        if ($checkActive) $model->active();
        $data = $model->where($key, $value)->first();
        if (!$data) throwError($message);
        return $data;
    }

    public function checkWithoutKeyValue($model, string $key, $value, string $message = null, $checkActive = false)
    {
        if (is_null($message)) $message = __('base.data_already_exists');
        if ($checkActive) $model->active();
        $data = $model->where($key, $value)->first();
        if ($data) throwError($message);
        return $data;
    }

    public function checkManyByKeyValue($model, string $key, array $values, string $message = null, $checkActive = false)
    {
        if (is_null($message)) $message = __('base.data_not_found');
        if ($checkActive) $model->active();
        $data = $model->whereIn($key, $values)->get();
        if ($data->count() !== count($values)) throwError($message);
        return $data;
    }

    public function checkManyWithoutKeyValue($model, string $key, array $values, string $message = null, $checkActive = false)
    {
        if (is_null($message)) $message = __('base.data_already_exists');
        if ($checkActive) $model->active();
        $data = $model->whereIn($key, $values)->get();
        if ($data->count() > 0) throwError($message);
        return $data;
    }
}
