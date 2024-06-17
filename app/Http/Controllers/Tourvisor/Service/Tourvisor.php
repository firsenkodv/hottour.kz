<?php
namespace App\Http\Controllers\Tourvisor\Service;

use App\Models\TourvisorCountry;
use Domain\TourvisorCountry\ViewModels\TourvisorCountryViewModel;

class Tourvisor
{
    private $login = 'director@hottour.com';
    private $password = 'BM4foWz6wX48';
    private $url = 'https://tourvisor.ru/xml/';
    public $default = [];
    public $last_request = '';

    public function _get($query, $script){
        $url = $this->url . $script . "?authlogin=" . $this->login . "&authpass=". $this->password . "&format=json&" . http_build_query($query,"","&", PHP_QUERY_RFC1738);
        $this->last_request = $url;
        $result = file_get_contents($url);

        return json_decode($result);
    }

    public function getDepartureDefault(){
        $default = json_decode(file_get_contents(__DIR__. '/departure.json'), true);
        foreach($default as $departure){

            if(isset($departure['default'])) {
                return $departure;
            }
        }
        return false;
    }

    public function getDepartureName($id){

        $default = json_decode(file_get_contents(__DIR__. '/departure.json'), true);
        foreach($default as $departure){

            if(($departure['id'] == $id)) {
                return $departure['name'];
            }
        }
        return false;
    }



    public function getCountriesId(){

       //$default = json_decode(file_get_contents(__DIR__. '/countries.json'), true);
        $default = TourvisorCountryViewModel::make()->Countries();



        foreach($default as $departure){

            if(($departure['popular'])) {
                $cuntry_id[$departure['id']] =  $departure['id'];
            }
        }
        return $cuntry_id;
    }

    public function getCountries(){

       //$default = json_decode(file_get_contents(__DIR__. '/countries.json'), true);
        $default = TourvisorCountryViewModel::make()->Countries();

        return $default;
    }

    public function getCountryName($id){

        //$default = json_decode(file_get_contents(__DIR__. '/countries.json'), true);
        $default = TourvisorCountryViewModel::make()->Countries();
        foreach($default as $country){

            if(($country['country_id'] == $id)) {
                return $country['name'];
            }
        }
        return false;
    }

    public function getDeparture(){
        $query = ['type'=>'departure'];
        $result = $this->_get($query, 'list.php');
        $default = json_decode(file_get_contents(__DIR__. '/departure.json'), true);


        $_d = [];
        foreach($default as $departure){
            $_d[$departure['id']] = $departure;
            if(!empty($_REQUEST['departure']) && !empty($departure['default']) && $_REQUEST['departure'] != $departure['id']){
                $_d[$departure['id']]['default'] = false;
            } elseif (!empty($_REQUEST['departure']) && !empty($departure['default']) && $_REQUEST['departure'] == $departure['id']){
                $_d[$departure['id']]['default'] = true;
                $this->default['departure'] = $departure['id'];
            } elseif (!empty($_REQUEST['departure']) && $_REQUEST['departure'] == $departure['id']){
                $_d[$departure['id']]['default'] = true;
                $this->default['departure'] = $departure['id'];
            } elseif(!empty($departure['default'])){
                $this->default['departure'] = $departure['id'];
            }
        }

        $list = ['popular'=>[], 'other'=>[]];
        foreach($result->lists->departures->departure as $departure){
            if(isset($_d[$departure->id]) && $_d[$departure->id]['active']){
                if($_d[$departure->id]['popular']){
                    $list['popular'][] = $_d[$departure->id];
                } else {
                    $list['other'][] = $_d[$departure->id];
                }

            }
        }
        return $list;
    }

    public function getCountry($dep = false){
        if($dep === false) {

            $dep = ($this->default)?$this->default['departure']:[];
        }
        //$default = json_decode(file_get_contents(__DIR__.'/countries.json'), true);
        $default = TourvisorCountryViewModel::make()->Countries();
        $_d = [];

        foreach($default as $country){

            $_d[$country['country_id']] = $country;
            if(!empty($_REQUEST['country']) && !empty($country['default']) && $_REQUEST['country'] != $country['country_id']){

                $_d[$country['country_id']]['default'] = false;

            } elseif (!empty($_REQUEST['country']) && !empty($country['default']) && $_REQUEST['country'] == $country['country_id']){
                $_d[$country['country_id']]['default'] = true;
                $this->default['country'] = $country['country_id'];
            } elseif (!empty($_REQUEST['country']) && $_REQUEST['country'] == $country['country_id']){
                $_d[$country['country_id']]['default'] = true;
                $this->default['country'] = $country['country_id'];
            } elseif(!empty($country['default'])){
                $this->default['country'] = $country['country_id'];
            }

        }

        $query = ['type'=>'country'];
        if($dep){
            if(is_array($dep)) {
                $query['cndep'] = implode(",", $dep);
            }
            else {
                $query['cndep'] = $dep;
            }
        }

        $result = $this->_get($query, 'list.php');
        $tourv_countries = $result->lists->countries->country;
        $list = ['popular'=>[], 'other'=>[]];

        foreach ($default as $k => $c)
        {
            foreach ($tourv_countries as $country) {


                if($c['country_id'] == (int)$country->id) {

                    if(isset($_d[$country->id]) && $_d[$country->id]['active']){

                        if($_d[$country->id]['popular']){
                            $list['popular'][] = $_d[$country->id];
                        } else {
                            $list['other'][] = $_d[$country->id];
                        }
                    }

                }

            }

        }


        return $list;
    }

    public function getRegions($country = false){

        if(!$country){
            $country = $this->default['country'];
        }
        $query = ['type'=>'region', 'regcountry' => $country];

        $result = $this->_get($query, 'list.php');
        return $result;

    }

    public function getHotels($country = false, $regions = false, $addparams = []){
        if(!$country){
            $country = $this->default['country'];
        }
        $query = ['type'=>'hotel', 'hotcountry' => $country];
        if($regions){
            if(is_array($regions)) {
                $query['cndep'] = implode(",", $regions);
            }
            else {
                $query['hotregion'] = $regions;
            }
        }
        if($addparams){
            foreach($addparams as $key => $value){
                if(is_array($value)) {
                    $query[$key] = implode(",", $value);
                }
                else {
                    $query[$key] = $value;
                }
            }
        }
        $result = $this->_get($query, 'list.php');
        return $result;

    }

    public function getFlag($name){
        $name = str_replace(" ", '_', mb_strtolower($name));
        $simbol = ['а','б','в','г','д','е','ж','з','и','й','к','л','м','н','о','п','р','с','т','у','ф','х','ц','ч','щ','ш','ъ','ь','э','ю','я','ы'];
        $repeat = ['a','b','v','g','d','e','z','z','i','y','k','l','m','n','o','p','r','s','t','u','f','h','c','c','c','s','','','e','u','i','y'];
        return str_replace($simbol, $repeat, $name);
    }

    /**
     * Горячие туры
     */
    public function getHotTours($city, $country)
    {
        $query = ['city'=> $city, 'items' => '100', 'sort' => 1, 'countries' => $country , 'picturetype' => 1, 'currency' => 3];
        $result = $this->_get($query, 'hottours.php');
        return $result;

    }
    /**
     * Для корнсольной команды tourvisorhotel
     */
    public function _getHotel($query, $script)
    {
        $url = $this->url . $script . "?authlogin=" . $this->login . "&authpass=" . $this->password . "&" . $query;

        $result = (file_get_contents($url))?:null;
        if($result) {
            return json_decode($result);
        }
        return null;
    }

    public function getHotel($id)
    {
        $url = 'https://tourvisor.ru/xml/hotel.php?format=json&hotelcode=' . $id . '&imgbig=1&authlogin=' . $this->login . '&authpass=' . $this->password;
        $result = (file_get_contents($url))?:null;
        if($result) {
            return json_decode($result);
        }
        return null;
    }
    /**
     * Для корнсольной команды tourvisorhotel
     */
    /**
     * Для корнсольной команды mainhotels
     */
    public function getRequestid($params, $script = 'search.php')
    {
        /**
         * date 7 days +
         */
        $time7 = strtotime('+7 days', time());
        $d7 =  date('d.m.Y', $time7);
        $time1 = strtotime('+1 days', time());
        $d1 =  date('d.m.Y', $time1);


        $url = $this->url . $script . "?authlogin=" . $this->login . "&authpass=" . $this->password . "&format=json&departure=".$params['departure'] ."&country=". $params['country_id'] ."&hotels=". $params['id'] ."&nightsfrom=6&nightsto=12&adults=".$params['adults']."&currency=3&action=searchTour&regions=".$params['region_id']."&datefrom=".$d1."&dateto=".$d7."&priceto=10000000&pricefrom=0&child=". $params['child'];

        $result = file_get_contents($url);
        return json_decode($result);

    }

    public function getToursForHotel($requestid, $script = 'result.php')
    {

        $url = $this->url . $script . "?authlogin=" . $this->login . "&authpass=" . $this->password . "&format=json&requestid=". $requestid ."&type=result";

             $result = file_get_contents($url);
            return json_decode($result);


    }
    /**
     * Для корнсольной команды mainhotels
     */
}
