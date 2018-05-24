<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;

/**
 * Class UserRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return \App\User::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function store(array $input, $avatar)
    {

        $attr['email'] = $input['email'];
        $attr['name'] = $input['username'];
        $attr['password'] = bcrypt($input['password']);
        if ($avatar != "") {
            $attr['user_pic'] = $avatar;
        }
        if (parent::create($attr)) {
            return true;
        }
        return false;
    }


}
