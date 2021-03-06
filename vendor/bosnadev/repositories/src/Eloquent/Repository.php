<?php namespace Bosnadev\Repositories\Eloquent;

use Bosnadev\Repositories\Contracts\CriteriaInterface;
use Bosnadev\Repositories\Criteria\Criteria;
use Bosnadev\Repositories\Contracts\RepositoryInterface;
use Bosnadev\Repositories\Exceptions\RepositoryException;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Container\Container as App;

/**
 * Class Repository
 * @package Bosnadev\Repositories\Eloquent
 */
abstract class Repository implements RepositoryInterface, CriteriaInterface {

    /**
     * @var App
     */
    private $app;

    /**
     * @var
     */
    protected $model;

    /**
     * @var
     */
    protected $jrsHasMany;

    /**
     * @var Collection
     */
    protected $criteria;

    /**
     * @var bool
     */
    protected $skipCriteria = false;

    /**
     * @var string
     */
    protected $with = '';

    /**
     * @param App $app
     * @param Collection $collection
     * @throws \Bosnadev\Repositories\Exceptions\RepositoryException
     */
    public function __construct(App $app, Collection $collection) {
        $this->app = $app;
        $this->criteria = $collection;
        $this->resetScope();
        $this->makeModel();
        $this->jrsHasMany = $this->jrsHasMany();
    }

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public abstract function model();

    /**
     * Specify
     */
    public function jrsHasMany()
    {
        return;
    }

    /**
     * Specify Belongs To Many class name
     *
     * @return mixed
     */
    //public abstract function belongsToMany();

    /**
     * @param array $columns
     * @return mixed
     */
    public function all($columns = array('*')) {
        $this->applyCriteria();
        $this->newQuery()->eagerLoadRelations();
        return $this->model->get($columns);
    }

    /**
     * @param  string $value
     * @param  string $key
     * @return array
     */
    public function lists($value, $key = null) {
        $this->applyCriteria();
        return $this->model->lists($value, $key);
    }

    /**
     * @param int $perPage
     * @param array $columns
     * @return mixed
     */
    public function paginate($perPage = 1, $columns = array('*')) {
        $this->applyCriteria();
        $this->newQuery()->eagerLoadRelations();
        return $this->model->paginate($perPage, $columns);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data) {
        return $this->model->create($data);
    }

    /**
     * Magic Function Handle Basic CRUD Query
     *
     * @param array $data
     * @return mixed
     */
    public function jrsCRUD(array $data){

        //dd($this->jrsHasMany);

        $mdl = isset($data['id']) && !empty($data['id']) ? $this->model->find($data['id']) : $this->model;

        if(isset($data['DELETE']) && $data['DELETE'] == 'TRUE')
        {
            $return = $mdl->delete();
        }
        else
        {
            foreach($data as $key => $value)
            {
                if($key != '_token' && $key != 'id' && $key != '_method')
                {
                    $mdl->$key = $value;
                }
            }

            $ret_data['save'] = $mdl->save();

            $ret_data['id'] = $mdl->id;

            $return = $ret_data;
        }

        return $return;
    }

    /**
     * @param array $data
     * @param $id
     * @param string $attribute
     * @return mixed
     */
    public function update(array $data, $id, $attribute="id") {
        return $this->model->where($attribute, '=', $id)->update($data);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id) {
        return $this->model->destroy($id);
    }

    /**
     * @param $id
     * @param array $columns
     * @return mixed
     */
    public function find($id, $columns = array('*')) {
        $this->applyCriteria();
        return $this->model->find($id, $columns);
    }

    /**
     * @param $attribute
     * @param $value
     * @param array $columns
     * @return mixed
     */
    public function findBy($attribute, $value, $columns = array('*')) {
        $this->applyCriteria();
        return $this->model->where($attribute, '=', $value)->first($columns);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     * @throws RepositoryException
     */
    public function makeModel() {
        $model = $this->app->make($this->model());

        if (!$model instanceof Model)
            throw new RepositoryException("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");

        return $this->model = $model;
    }

    /**
     * @return $this
     */
    public function resetScope() {
        $this->skipCriteria(false);
        return $this;
    }

    /**
     * @param bool $status
     * @return $this
     */
    public function skipCriteria($status = true){
        $this->skipCriteria = $status;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCriteria() {
        return $this->criteria;
    }

    /**
     * @param Criteria $criteria
     * @return $this
     */
    public function getByCriteria(Criteria $criteria) {
        $this->model = $criteria->apply($this->model, $this);
        return $this;
    }

    /**
     * @param Criteria $criteria
     * @return $this
     */
    public function pushCriteria(Criteria $criteria) {
        $this->criteria->push($criteria);
        return $this;
    }

    /**
     * @return $this
     */
    public function  applyCriteria() {
        if($this->skipCriteria === true)
            return $this;

        foreach($this->getCriteria() as $criteria) {
            if($criteria instanceof Criteria)
                $this->model = $criteria->apply($this->model, $this);
        }

        return $this;
    }

    /**
     * @return $this
     */

    public function newQuery() {
        $this->model = $this->model->newQuery();

        return $this;
    }

    /**
     * @return $this
     */

    protected function eagerLoadRelations() {
        if(!empty($this->with)) {
            foreach ($this->with as $relation) {
                $this->model->with($relation);
            }
        }

        return $this;
    }

    /**
     * @param $relations
     * @return $this
     */

    public function with($relations) {
        if (is_string($relations)) $relations = func_get_args();

        $this->with = $relations;

        return $this;
    }
}