<?php namespace App\Services;

use GuzzleHttp\Client;

class AmadeusService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://test.api.amadeus.com',
        ]);
    }

    public function authenticate()
    {
        $response = $this->client->post('/v1/security/oauth2/token', [
            'form_params' => [
                'grant_type' => 'client_credentials',
                'client_id' => 'HMfiXIT9kjg8GFetqK2GIbaOGIjprrVh',
                'client_secret' => '0Q1vVFeRFmNJTbhm',
            ],
        ]);

       $data = json_decode($response->getBody(), true);
       return $data['access_token'];
    }

    public function searchHotels($cityCode)
    {
        $token = $this->authenticate();

        $response = $this->client->get('/v3/shopping/hotel-offers', [
            'headers' => [
                'Authorization' => "Bearer $token",
            ],
            'query' => [
                'hotelIds' => $cityCode,
            ],
        ]);
      
        return json_decode($response->getBody(), true);
    }
}
