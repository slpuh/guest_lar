<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['name', 'email', 'message'];

    public function addRecord($request)
    {
        $data = $request->except('_token');
        $this->fill($data)->save();

        return ['status' => 'Запись добавлена'];
    }

    public function deleteRecord($id)
    {
        $record = $this->get()->firstWhere('id', $id);

        if ($record->delete()) {
            return ['status' => 'Запись удалена'];
        }
    }

    public function updateRecord($request, $id)
    {
        $data = $request->except('_token');
        
        if (empty($data)) {
            return ['error' => 'Нет данных'];
        }

        $record = $this->get()->firstWhere('id', $id);
        $record->fill($data);
        if ($record->update()) {
            return ['status' => 'Запись обновлена'];
        }
    }
}
