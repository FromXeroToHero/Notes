<?php

namespace App\Controllers;
use App\Models\UserModel;
use CodeIgniter\Controller;

class RegisterController extends Controller
{
    public function index()
    {
        $captcha_data = $this->generateCaptcha();

        $data['captcha_image'] = $captcha_data['image'];
        $data['captcha_code'] = $captcha_data['code'];

        return view('register', $data);
    }

    public function process()
    {
        $captcha_input = $this->request->getPost('captcha');
        $captcha_code = session()->get('captcha');

        if ($captcha_input && $captcha_code && $captcha_input === $captcha_code) {

            $myusername = $this->request->getPost('myusername');
            $model = new UserModel();
            $existingUser = $model->where('username', $myusername)->first();
            if ($existingUser) {
                $data['errMsg'] = 'There is already a user with this username!';
                $captcha_data = $this->generateCaptcha();

                $data['captcha_image'] = $captcha_data['image'];
                $data['captcha_code'] = $captcha_data['code'];
                return view('register', $data);
            }

            $mypassword = $this->request->getPost('mypassword');
            $mypasswordrepeated = $this->request->getPost('mypasswordrepeated');

            if ($mypassword !== $mypasswordrepeated) {
                $data['errMsg'] = "The passwords don't match!";
                $captcha_data = $this->generateCaptcha();

                $data['captcha_image'] = $captcha_data['image'];
                $data['captcha_code'] = $captcha_data['code'];
                return view('register', $data);
            }

            $user = [
                'username' => $myusername,
                'password' => $mypassword,
            ];

            $model->insert($user);

            return redirect()->to('/login');
        } else {
            $captcha_data = $this->generateCaptcha();
            $data['captcha_image'] = $captcha_data['image'];
            $data['captcha_code'] = $captcha_data['code'];
            $data['errMsg'] = 'Invalid CAPTCHA!';
            return view('register', $data);
        }
    }

    private function generateCaptcha()
    {
        $captcha_width = 200;
        $captcha_height = 50;
        $num_characters = 6;
        $font_size = 20;
        $font_path = 'monofont.ttf';

        $captcha_code = '';
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        for ($i = 0; $i < $num_characters; $i++) {
            $captcha_code .= $characters[rand(0, strlen($characters) - 1)];
        }

        session()->set('captcha', $captcha_code);

        $image = imagecreatetruecolor($captcha_width, $captcha_height);
        $bg_color = imagecolorallocate($image, 255, 255, 255);
        $text_color = imagecolorallocate($image, 0, 0, 0);

        imagefilledrectangle($image, 0, 0, $captcha_width, $captcha_height, $bg_color);
        imagettftext($image, $font_size, 0, 10, $captcha_height - 15, $text_color, $font_path, $captcha_code);

        for ($i = 0; $i < 10; $i++) {
            imageline($image, rand(0, $captcha_width), rand(0, $captcha_height), rand(0, $captcha_width), rand(0, $captcha_height), $text_color);
        }

        for ($i = 0; $i < 100; $i++) {
            imagesetpixel($image, rand(0, $captcha_width), rand(0, $captcha_height), $text_color);
        }

        ob_start();
        imagepng($image);
        $captcha_image = ob_get_clean();

        imagedestroy($image);

        return [
            'image' => $captcha_image,
            'code' => $captcha_code
        ];
    }
}
