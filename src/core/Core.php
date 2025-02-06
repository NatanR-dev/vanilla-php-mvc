<?php

Class Core 
{
    public function run($routes)
    {
        $url = '/';

        isset($_GET['url']) ? $url .= $_GET['url'] : '';

        foreach($routes as $path => $controller){
            $pattern = '#^'.preg_replace('/{id}/', '([\w+])', $path).'$#'; // Escapa caracteres especiais na URL

            if(preg_match($pattern, $url, $matches)){
                array_shift($matches);
                
                [$currentController, $action] = explode('@', $controller);

                require_once __DIR__."/../controllers/$currentController.php";
                
                $newController = new $currentController();
                $newController->$action(...$matches); // Passando os parâmetros corretamente
            }
        }

        // Se nenhuma rota corresponder, você pode adicionar um tratamento de erro aqui
        // echo "404 Not Found"; // Exemplo de mensagem de erro
    }
}