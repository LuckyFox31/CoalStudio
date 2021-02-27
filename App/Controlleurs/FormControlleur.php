<?php

namespace App\Controlleurs;

class FormControlleur {

    public $error = "";
    public $mail;
    public $password;

    /**
     * pseudo function
     *
     * @param string $pseudo
     * @return string $user_name 
     */
    public function pseudo(string $pseudo) {
        $user_name = substr(htmlspecialchars($pseudo), 0, 255);

        return $user_name;
    }

    /**
     * mail function
     *
     * @param string $mail
     * @return void
     */
    public function mail($mail) {
        $mail_replace = htmlspecialchars(str_replace(" ", "", $mail));

        if(filter_var($mail_replace, FILTER_VALIDATE_EMAIL)) {
            $this->mail = $mail_replace;
            return $this->mail;
        } else {
            return $this->error = "Vos ID ne sont pas correcte.";
        }
    }

    /**
     * password function
     *
     * @param string $password
     * @return void
     */
    public function password($password) {
        $pass = htmlspecialchars($password);

        $password_hash = password_hash($pass,  PASSWORD_BCRYPT);

        return $this->password = $password_hash;
    }

    public function verif_password($password, $pass_fetch) {
        $pass = htmlspecialchars($password);

        if(password_verify($pass, $pass_fetch)) {
            return true;
        }

        return false;
    }

}