<?php

namespace tegar\Freshmarket\App;

class View
{

    public static function render(string $view, $model,$variant)
    {
     
        if($variant == 'auth-mode'){
            require __DIR__ . '/../View/layout/auth/header.php';

            require __DIR__ . '/../View/' . $view . '.php';
            require __DIR__ . '/../View/layout/auth/footer.php';

        }else if($variant == 'dasboard-mode') {
            require __DIR__ . '/../View/layout/dasboard/header.php';
            require __DIR__ . '/../View/layout/dasboard/content.php';
            require __DIR__ . '/../View/layout/dasboard/sidebar.php';
            require __DIR__ . '/../View/layout/dasboard/navbar.php';
            require __DIR__ . '/../View/' . $view . '.php';
            require __DIR__ . '/../View/layout/dasboard/footer.php';

        }else if($variant == 'main-mode') {
            require __DIR__ . '/../View/layout/main/header.php';
            require __DIR__ . '/../View/' . $view . '.php';
            require __DIR__ . '/../View/layout/main/footer.php';
        }
        else{

            require __DIR__ . '/../View/' . $view . '.php';
        }
      
  
    }
    public static function redirect(string $url)
    {
        header("Location: $url");
        if (getenv("mode") != "test") {
            exit();
        }
    }
    // public static function redirect(string $url)
    // {
    //     header("Location: $url");
    //     if (getenv("mode") != "test") {
    //         exit();
    //     }
    // }
}
