<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use Exception;

class Usuarios extends BaseController{

    public function getUsers()
    {
        $client = service('curlrequest');

        try {
            $response = $client->request('GET', 'http://localhost:3000/api/students');
            $listUsers = json_decode($response->getBody(), true);
            $data['users'] = array();
            foreach ($listUsers as $user) {
                $data['users'][] = array(
                    'id' => $user['id'],
                    'name' => $user['name'],
                    'email' => $user['email']
                );
            }

            return view('layout/users', $data);

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function deleteUsers()
    {
        $client = service('curlrequest');

        if ($this->request->getMethod() === 'post') {
            $userId = $this->request->getPost('user_id');

            try {
                $response = $client->request('DELETE', "http://localhost:3000/api/students/$userId");
            } catch (Exception $e) {
                echo $e->getMessage();
            }
            
        }

        return redirect()->to(base_url('/usuarios'));
    }

    public function pageCreateUser(){
        return view('layout/createUser');
    }

    public function createUser()
    {
        $client = service('curlrequest');

        if ($this->request->getMethod() === 'post') {
            $id = $this->request->getPost('id');
            $name = $this->request->getPost('name');
            $email = $this->request->getPost('email');

            $data = array(
                'id' => $id,
                'name' => $name,
                'email' => $email
            );

            try {
                $response = $client->request('POST', 'http://localhost:3000/api/students', [
                    'form_params' => $data
                ]);
            } catch (Exception $e) {
                echo $e->getMessage();
            }
            
        }

        return redirect()->to(base_url('/usuarios'));
    }

    public function pageEditUser(){

        $client = service('curlrequest');

            $userId = $this->request->getPost('user_id');

            try {
                $response = $client->request('GET', "http://localhost:3000/api/students/$userId");
                $user = json_decode($response->getBody(), true);
                $data['user'] = array(
                    'id' => $user['id'],
                    'name' => $user['name'],
                    'email' => $user['email']
                );

                return view('layout/editUser', $data);

            } catch (Exception $e) {
                echo $e->getMessage();
            }
    }

    public function updateUser()
    {
        $client = service('curlrequest');

        if ($this->request->getMethod() === 'post') {
            $id = $this->request->getPost('id');
            $name = $this->request->getPost('name');
            $email = $this->request->getPost('email');

            $data = array(
                'id' => $id,
                'name' => $name,
                'email' => $email
            );

            try {
                $response = $client->request('PUT', "http://localhost:3000/api/students/$id", [
                    'form_params' => $data
                ]);
            } catch (Exception $e) {
                echo $e->getMessage();
            }
            
        }

        return redirect()->to(base_url('/usuarios'));
    }
}
