<?php 
namespace App\Controllers;

use CodeIgniter\Controller;

class Usuarios extends Controller{

    public function index()
    {
        $client = service('curlrequest');

        try {
            $response = $client->request('GET', 'https://jsonplaceholder.typicode.com/users');
            $listUsers = json_decode($response->getBody(), true);
            $data['users'] = array();
            foreach ($listUsers as $user) {
                $data['users'][] = array(
                    'name' => $user['name'],
                    'email' => $user['email']
                );
            }

            return view('layout/users', $data);

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
