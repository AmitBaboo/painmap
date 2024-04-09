<?php

namespace App\Http\Controllers;

use App\Models\PageContent;
use App\Models\PostCode;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function assignTherapistToCustomer(string $postCode, $number = 1, $method = 'other')
    {
        $distanceArray = ($method == 'other')
            ? $this->getLatLongDistanceArray($postCode)
            : $this->getDistanceArray($postCode);
         
        $nearestTherapists = $this->getMinimumData($distanceArray);

        if (count($nearestTherapists) > 0) {
            return ($number == 1) ? array_rand($nearestTherapists, $number) : array_keys($nearestTherapists);
        } else {
            return 0;
        }
    }

    private function getDistance($start, $end)
    {
        // Google Map API which returns the distance between 2 postcodes
        $postcode1 = preg_replace('/\s+/', '', $start);
        $postcode2 = preg_replace('/\s+/', '', $end);

        $url = "http://maps.googleapis.com/maps/api/distancematrix/json?origins=$postcode1&destinations=$postcode2&mode=driving&language=en-EN&sensor=false";

        $data   = @file_get_contents($url);
        $result = json_decode($data, true);

        $meter = $result["rows"][0]["elements"][0]["distance"]["value"];

        return [
            "meters" => $meter,
            "kilometers" => $meter / 1000,
            "yards" => $meter * 1.0936133,
            "miles" => $meter * 0.000621371
        ];
    }

    private function getDistanceArray(string $postCode)
    {
        $distanceArray = [];
        $therapists = User::select('id', 'post_code')->pluck('post_code', 'id')->toArray();

        foreach ($therapists as $key => $value) {
            $distanceArray[$key] = $this->getDistance($postCode, $value)['miles'];
        }
        return $distanceArray;
    }

    public function getLatLongDistanceArray(string $postCode)
    {
        $distanceArray = [];
        $customerPoint = PostCode::getLongitudeLatitude($postCode);

        $therapists = User::select('id', 'post_code')
            ->where('account_type', 2)
            ->where('status', 2)
            ->pluck('post_code', 'id'); 
 

        if (count($customerPoint) > 0) {
            foreach ($therapists as $key => $value) {
                $therapistPostCodeArray = explode(",", $value);

               
                foreach ($therapistPostCodeArray as $t => $tValue) {
                    $therapistPoint = PostCode::getLongitudeLatitude(trim($tValue));
                    if (count($therapistPoint) > 0) {
                        $distance = $this->getDistanceUsingLongLat($customerPoint, $therapistPoint);
                        // Get therapist within 15 mile radius
                        if ($distance <= 15) { 
                            $distanceArray[$key] = $distance;
                        }
                    }
                }
            }
        }

        return $distanceArray;
    }

    private function getMinimumData(array $dataArray)
    {
        $minArray = [];

        if (count($dataArray)) {
            $min = min(array_values($dataArray));

            foreach ($dataArray as $key => $value) {
                if ($value == $min) {
                    $minArray[$key] = $value;
                }
            }
        }

        return $minArray;
    }

    private function getDistanceUsingLongLat($start, $end)
    {
        // print_r($start);
        $earthRadius      = 3958;      // Earth's earthRadius (miles)
        $degreePerRadian = 57.29578;  // Number of degrees/radian (for conversion)

        $distance = ($earthRadius * pi() * sqrt(
            ($start['latitude'] - $end['latitude'])
                * ($start['latitude'] - $end['latitude'])
                + cos($start['latitude'] / $degreePerRadian)  // Convert these to
                * cos($end['latitude'] / $degreePerRadian)  // radians for cos()
                * ($start['longitude'] - $end['longitude'])
                * ($start['longitude'] - $end['longitude'])
        ) / 180);

        return $distance;  // Returned using the units used for $earthRadius.
    }

    public static function formlizeProductData(string $product_string, string $host_name = "")
    {
        $p = [];
        if (strlen($product_string) > 0) {
            $products = explode(',', $product_string);
            foreach ($products as $key => $value) {
                $new_value = PageContent::select('title', 'file_path', 'file_caption')->where('id', $value)->first();
                if ($new_value->file_path != '' || $new_value->file_path != null) {
                    $new_value->file_path = $host_name . $new_value->file_path;
                }
                array_push($p, $new_value);
            }
        }

        return $p;
    }
}
