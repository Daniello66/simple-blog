<?php

namespace App\Http\Repositories;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class Repository
{
    /**
     * Constructor.
     *
     * @param Model $model modelo.
     * @return void
     * @author Daniel Beltrán
     */
    public function __construct(protected Model $model) {}

    /**
     * Obtener todos los registros.
     *
     * @return Collection
     * @author Daniel Beltrán
     */
    public function getAll(Request $request): Collection {
        return $this->model->get();
    }

    /**
     * Obtener un registro.
     *
     * @param int $id ID del registro.
     * @return ?Model
     * @author Daniel Beltrán
     */
    public function getOne(int $id): ?Model {
        return $this->model->find($id);
    }

    /**
     * Guardar registro.
     *
     * @param array $data Datos a almacenar.
     * @return Model Registro creado.
     * @author Daniel Beltrán
     */
    public function save(array $data): Model {
        return $this->model->create($data);
    }

    /**
     * Actualizar registro.
     *
     * @param int $id ID del registro.
     * @param array $data Datos a actualizar.
     * @return Model Registro actualizado.
     * @author Daniel Beltrán
     */
    public function update(int $id, array $data): Model {
        $record = $this->model->find($id);
        $record->fill($data);
        return $record->save();
    }

    /**
     * Eliminar registro,
     *
     * @param int $id ID del registro.
     * @return void
     * @author Daniel Beltrán
     */
    public function delete(int $id): void {
        $this->model->find($id)->delete();
    }
}
