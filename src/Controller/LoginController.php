<?php

namespace App\Controller;

use Cake\Mailer\Mailer;
use Cake\Routing\Route\Route;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;

/***
 *
 * @property \App\Model\Table\UserTable $user
 */
class LoginController extends AppController
{
    public function index() {
        if ($this->request->is('post')) {
            $email = $this->request->getData('email');
            $password = $this->request->getData("password");
            if (empty($email) || empty($password)) {
                $return_data = [
                    "code" => 1,
                    "msg"  => "Please enter your email or password"
                ];
            } else {
                $user = $this->getTableLocator()->get('User');
                $userInfo = $user->find()->where(["email =" => $email])->first();
                if (empty($userInfo)) {
                    $return_data = [
                        "code" => 1,
                        "msg"  => "email does not exist"
                    ];
                } else {
                    $md5_password = md5($password . $userInfo["salt"]);
                    if ($md5_password == $userInfo["password"]) {
                        //generate session
                        $_SESSION["logininfo"] = [
                            "email" => $userInfo["email"],
                            "rule"  => $userInfo["rule"]
                        ];
                        $return_data = [
                            "code" => 0,
                            "msg"  => "Sign in success",
                            "data" => [
                                "is_admin" => $userInfo["rule"] == "admin" ? 1 : 2
                            ]
                        ];
                    } else {
                        $return_data = [
                            "code" => 1,
                            "msg"  => "wrong password"
                        ];
                    }
                }
            }

            return $this->returnJson($return_data);
        }
    }

    public function register() {
        if ($this->request->is('post')) {
            $email = $this->request->getData('email');
            $password = $this->request->getData("password");
            if (empty($email) || empty($password)) {
                $return_data = [
                    "code" => 1,
                    "msg"  => "Please enter your email or password"
                ];
            } else {
                $user = $this->getTableLocator()->get('User');
                $userInfo = $user->find()->where(["email =" => $email])->first();
                if (empty($userInfo)) {
                    $salt = $this->generateSalt(6);
                    $insert_data = [
                        "email"     => $email,
                        "password"  =>  md5($password . $salt),
                        "salt"      => $salt,
                        "dt_add"    => time()
                    ];
                    $user->query()->insert(["email", "password", "salt", "dt_add"])->values($insert_data)->execute();
                    $return_data = [
                        "code" => 0,
                        "msg"  => ""
                    ];
                } else {
                    $return_data = [
                            "code" => 1,
                            "msg"  => "email already exist"
                        ];
                    }
                }
            return $this->returnJson($return_data);
        }
    }

    public function signout() {
        unset($_SESSION["logininfo"]);
        $this->redirect('/login');
    }

    public function sendMail() {
        $email = $this->request->getData('email');
        if (empty($email)) {
            $return_data = [
                "code" => 1,
                "msg"  => "please enter your email"
            ];
        } else {
            //Check Email exist
            $user = $this->getTableLocator()->get('User');
            $userInfo = $user->find()->where(["email =" => $email])->first();
            if (empty($userInfo)) {
                $return_data = [
                    "code" => 1,
                    "msg"  => "email is invalid"
                ];
            } else {
                //Generate Reset code, 24 hours expired time
                $reset_code = $this->generateSalt(6);
                $reset_data = [
                    "reset_code"    => $reset_code,
                    "expire_time"   => time() + 86400,
                    "code_status"   => 1
                ];
                $user->query()->update()->set($reset_data)->where(["id" => $userInfo["id"]])->execute();
                $mailer = new Mailer('default');
                $reset_link = Router::url("login/resetpassword?code=" . $reset_code, true);
                $mailer->setFrom(['Jims Healing' => 'My Site'])
                    ->setTo($email)
                    ->setSubject('Retrieve Password')
                    ->deliver("Please click the link to reset your password，{$reset_link}");
                $return_data = [
                    "code" => 0,
                    "msg"  => ""
                ];
            }
        }
        return $this->returnJson($return_data);
    }

    public function resetpassword() {
        $code = $this->request->getQuery('code');
        if ($this->request->is('post')) {
            $code = $this->request->getData('code');
            $password = $this->request->getData('password');
            $rpassword = $this->request->getData('rpassword');
            if (empty($password) || empty($rpassword)) {
                $return_data = [
                    "code" => 1,
                    "msg"  => "please enter your password"
                ];
            } else if ($password != $rpassword) {
                $return_data = [
                    "code" => 1,
                    "msg"  => "the passwords are inconsistent"
                ];
            } else {
                //Check Reset Code
                $user = $this->getTableLocator()->get('User');
                $codeInfo = $user->find()->where(["reset_code =" => $code, "code_status =" => 1])->first();
                if ($codeInfo) {
                    $salt = $this->generateSalt(6);
                    $new_password = md5($password . $salt);
                    $update_data = [
                        "password"      => $new_password,
                        "salt"          => $salt,
                        "code_status"   => 2
                    ];
                    $user->query()->update()->set($update_data)->where(["id" => $codeInfo["id"]])->execute();
                    $return_data = [
                        "code" => 0,
                        "msg"  => ""
                    ];
                } else {
                    $return_data = [
                        "code" => 1,
                        "msg"  => "invalid url"
                    ];
                }
            }
            return $this->returnJson($return_data);
        }
        $this->set(compact('code'));
    }

    protected function returnJson($data) {
        return $this->response->withType('application/json')
            ->withStringBody(json_encode($data));
    }

    protected function generateSalt($num) {
        $slat = '';
        $word = array(
            "0", "1", "2", "3", "4", "5", "6", "7", "8", "9",
            "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M",
            "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z",
            "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m",
            "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y"
        );
        $count = count($word) - 1;
        for ($i = 1; $i < $num; $i++) {
            $slat .= $word[rand(0, $count)];
        }
        return $slat;
    }
}
