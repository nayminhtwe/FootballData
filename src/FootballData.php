<?php

namespace Naymin\FootballData;

use GuzzleHttp\Client;

class FootballData {

    protected $client;

    public function __construct(Client $client )
    {
        $this->client = $client;
    }

    public function getAllCompetitions($area = '')
    {
        $response = $this->client->get("competitions?areas={$area}")->getBody();
        return json_decode($response);
    }

    public function getCompetition($id)
    {
        $response = $this->client->get("competitions/{$id}")->getBody();
        return json_decode($response);
    }

    public function getTeamsfromCompetition($id,$stage='')
    {
        $response = $this->client->get("competitions/{$id}/teams?stage={$stage}")->getBody();
        return json_decode($response);
    }
    public function getStandingsfromCompetition($id)
    {
        $response = $this->client->get("competitions/{$id}/standings")->getBody();
        return json_decode($response);
    }
    public function getMatchesfromCompetition($id,$date_from='',$date_to='',$stage='',$status='',$matchday='',$group='')
    {
        $response = $this->client->get("competitions/{$id}/matches?dateFrom={$date_from}&dateTo={$date_to}&stage={$stage}&status={$status}&matchday={$matchday}&group={$group}")->getBody();
        return json_decode($response);
    }
    public function getMatches($id='',$start='', $end='',$status='') {
        $response = $this->client->get("matches/?competitions={$id}&dateFrom={$start}&dateTo={$end}&staus={$status}")->getBody();
        return json_decode($response);
    }

    public function getMatch($id) {
        $response = $this->client->get("matches/{$id}")->getBody();
        return json_decode($response);
    }

    public function getMatchesofTeam($id, $date_from='',$date_to='',$status='',$venue='') {
        $response = $this->client->get("teams/{$id}/matches?dateFrom={$date_from}&dateTo={$date_to}&status={$status}&venue={$venue}")->getBody();
        return json_decode($response);
    }

    public function getTeam($id) {
        $response = $this->client->get("teams/{$id}")->getBody();
        return json_decode($response);
    }


    public function getAreas() {
        $response = $this->client->get("areas")->getBody();
        return json_decode($response);
    }


    public function getArea($id) {
        $response = $this->client->get("areas/{$id}")->getBody();
        return json_decode($response);
    }
}