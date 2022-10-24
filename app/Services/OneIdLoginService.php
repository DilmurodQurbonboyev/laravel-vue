<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class OneIdLoginService
{
    public string $authorizationUrl;
    public $clientId;
    public string $responseType;
    public $redirectUrl;
    public string $scope;
    public $clientSecret;
    public string $state;

    public function __construct()
    {
        $this->authorizationUrl = "https://sso.egov.uz/sso/oauth/Authorization.do";
        $this->clientId = config('app.oneId_client_id');
        $this->responseType = "one_code";
        $this->redirectUrl = config('app.redirect_admin');
        $this->scope = 'legal';
        $this->clientSecret = config('app.oneId_client_secret');
        $this->state = 'testState';
    }

    public function getOneId(): string
    {
        return $this->authorizationUrl . '?' . http_build_query([
                'response_type' => $this->responseType,
                'client_id' => $this->clientId,
                'redirect_uri' => $this->redirectUrl,
                'scope' => $this->scope,
                'state' => $this->state,
            ]);
    }

    public function getAccessToken($request)
    {
        $response = Http::asForm()->post($this->authorizationUrl, [
            'grant_type' => 'one_authorization_code',
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
            'redirect_uri' => $this->redirectUrl,
            'code' => $request->query('code'),
        ]);
        return $response->json();
    }

    public function sendAccessToken($accessToken): string
    {
        $result = Http::asForm()->post($this->authorizationUrl, [
            'grant_type' => 'one_access_token_identify',
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
            'access_token' => $accessToken,
            'scope' => $this->scope
        ]);
        return $result->body();
    }
}
