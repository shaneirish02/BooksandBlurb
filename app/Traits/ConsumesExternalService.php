<?php

namespace App\Traits;

use GuzzleHttp\Client;

trait ConsumesExternalService
{
    /**
     * Send a request to any service
     * @return string
     */
    public function performRequest($method, $requestUrl, $form_params = [], $headers = [])
    {
        $client = new Client(['base_uri' => $this->baseUri]);

        try {
            // Perform the request
            $response = $client->request($method, $requestUrl, [
                'form_params' => $form_params,
                'headers' => $headers,
            ]);

            // Return the response body contents
            return $response->getBody()->getContents();
        } catch (\Exception $e) {
            // Throw an exception on error
            throw new \Exception($e->getMessage());
        }

        if(isset($this->secret)) {
            $headers['Authorization'] = $this->secret;
        }

        // Perform the request (method, url, form parameters, headers)
        $response = $client->request($method, $requestUrl, ['form_params' =>
            $form_params, 'headers' => $headers]);

        // Return the response body contents
        return $response->getBody()->getContents();
    }
}
