<?php

namespace App\Controllers\Services;

use App\Models\User;
use CodeIgniter\Model;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class Users extends ResourceController
{
    use ResponseTrait;

    var $model;

    function __construct()
    {
        $this->model = new \App\Models\UserRepository();
    }


    public function getAll(): \CodeIgniter\HTTP\Response
    {

        $data['data'] = $this->model->findAll();

        return $this->respond($data);
    }

    public function insert(): \CodeIgniter\HTTP\Response
    {
        $json = $this->request->getJSON();

        $id = $this->model->nextId();

        $reccord = new User(
            $id,
            $json->username,
            $json->password,
            $json->firstName,
            $json->lastName,
            $json->email
        );

        $this->model->insert($reccord);

        $data['data'] = $this->model->findAll();

        return $this->respondCreated($data);
    }

    public function getBy($id): \CodeIgniter\HTTP\Response
    {

        $data['data'] = $this->model->findUserOfId($id);


        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('record no found');
        }
    }

    public function update($id = NULL)
    {

        $user = $this->model->findUserOfId($id);

        if ($user) {

            $json = $this->request->getJSON();

            $user->setUsername($json->username);
            $user->setFirstName($json->firstName);
            $user->setLastName($json->lastName);
            $user->setEmail($json->email);

            $this->model->update($id, $user);

            $data['data'] = $this->model->findAll();

            return $this->respond($data);


        } else {
            return $this->failNotFound('record no found');
        }

    }

    public function password($id = null)
    {
        $this->model->delete($id);

        $data['data'] = $this->model->findAll();

        return $this->respond($data);
    }

    public function delete($id = null)
    {
        $this->model->delete($id);

        $data['data'] = $this->model->findAll();

        return $this->respond($data);
    }


}