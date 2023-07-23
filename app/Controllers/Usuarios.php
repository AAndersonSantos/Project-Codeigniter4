<?php 
namespace App\Controllers;

use CodeIgniter\Controller;

class Usuarios extends Controller{

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
}
