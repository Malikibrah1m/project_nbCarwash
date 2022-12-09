<?php

use Firebase\JWT\JWT;

class LoginController extends ApiController
{

    use Request;
    public function postIndex()
    {
        header('Content-Type: application/json');
        $json = file_get_contents('php://input');
        $input = json_decode($json);
        $user = $this->user->where(['email' => $input->email])->get();
        // echo $password;
        if ($user) {
            $user = mysqli_fetch_assoc($user);
            if (password_verify($input->password, $user['password'])) {
                $payload = [
                    'email' => $input->email,
                ];
                $access_token = JWT::encode($payload, $_ENV['ACCESS_TOKEN_SECRET'],'HS256');
                $data = array(
                    'email'=> $input->email,
                    'nama' => $input->name,
                    'token' => $access_token
                );
                return $this->succesResponse($data);
            } else {
                return $this->errorResponse('Oopss');
            }
        }
        // return $this->succesResponse('Hello World');
    }
}
