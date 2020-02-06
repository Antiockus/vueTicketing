<?php

namespace Antiockus;

class App
{

    public function __construct()
    {
    }

    public function processRequest(Request $request)
    {
        //needs to return the response
        $response = '';
        if ($request->method == 'GET') {
            switch ($request->request) {
                case '/contact':
                    $response = Router::get($request->request, 'HomeController@contact');
                    break;
                case '/about':
                    $response = Router::get($request->request, 'HomeController@about');
                    break;
                case '/create_client':
                    $response = Router::get($request->request, 'ClientController@create_view');
                    break;
                case '/create_ticket':
                    $response = Router::get($request->request, 'TicketController@create_view');
                    break;
                case '/test':
                    $response = Router::get($request->request, 'HomeController@test');
                    break;
                case '/register':
                    $response = Router::get($request->request, 'UserController@register');
                    break;
                case '/login':
                    $response = Router::get($request->request, 'UserController@login');
                    break;
                case '/view_tickets':
                    $response = Router::get($request->request, 'TicketController@view_user_tickets');
                    break;
                case '/':
                case '':
                default:
                    $response = Router::get($request->request, 'HomeController@index');
                    break;
            }
        }
        echo $response;
    }
}
