<?php

namespace App\Repositories;

use App\Exceptions\RepositoryException;
use Exception;
use Illuminate\Container\Container;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BaseRepository
 * @package App\Repositories
 */
abstract class BaseRepository implements BaseRepositoryInterface
{
    //ЭТО property(свойство(а не перменная)) Класса BaseRepository
    /** @var Model */
    protected $model;

    //injecting обект класса Conteiner
    /**
     * BaseRepository constructor.
     * @param Container $container
     * @throws RepositoryException
     */
    public function __construct(Container $container)
    {
        //метод model() возвращает название класса(строку)
        //setting в перемнную модел название класса, обект которого нужно создать
        $model = $this->model();

        try {
            //сетим в свойство модел, созданый обект класса модел
            $this->model = $container->make($model);
        } catch (BindingResolutionException $exception) {
            throw new RepositoryException("The $model was not created. " . $exception->getMessage());
        }
    }

    /**
     * @param array $data
     * @return Model
     */
    public function create(array $data): Model
    {
        return $this->model->create($data);
    }

    /**
     * @param int $id
     * @param array $data
     * @return int
     */
    public function update(int $id, array $data): int
    {
        $model = $this->find($id);

        if (is_null($model)) {
          return 0;
        }

        return $model->update($data);
    }

    /**
     * @param int $id
     * @return int
     */
    public function delete(int $id): int
    {
        $entity = $this->find($id);

        if (is_null($entity)) {
           return false;
        }

        try {
            $deleted = (bool)$entity->delete();
        } catch (Exception $exception) {
            $deleted = false;
        }

        return $deleted;
    }

    /**
     * @param int $id
     * @return Model|null
     */
    public function find(int $id): ?Model
    {
        return $this->model->find($id);
    }

    /**
     * @return Builder
     */
    public function getBuilder(): Builder
    {
        return $this->model->newModelQuery();
    }

    //создаём прототип метода, чтоб в дальнейшом определить его в дочернем классе
    /**
     * @return string
     */
    abstract public function model(): string;
}
