<?php
use Illuminate\Support\Str;
use function PHPUnit\Framework\matches;

    if(!function_exists('sideActiveLink')){
        function sideActiveLink(array $routes){
            foreach($routes as $r){
                if(request()->routeIs($r)){
                    return 'active';
                }
            }
            return null;
        }
    }

    if(!function_exists('getYtThumbnail')){
        function getYtThumbnail(string $url){
            $pattern='/[?&]v=([a-zA-Z0-9_-]{11})/';
            // https://www.youtube.com/watch?v=-ov6mGTTdKM&list=PLm8sgxwSZofeRumeNFZQAbo7ZVZUjx0JD&index=3
            // image api id =>  v=-ov6mGTTdKM
            //matches={[0]=>v=-ov6mGTTdKM,[1]=>-ov6mGTTdKM}
            //mqdefault means medium quality image
            if(preg_match($pattern,$url,$matches)){
                $id=$matches[1];
                return "https://img.youtube.com/vi/$id/mqdefault.jpg";
            }
            return null;
        }
    }

    if(!function_exists('truncate')){
        function truncate(string $text,int $limit=30){
            return Str::of($text)->limit($limit);
        }
    }

    if(!function_exists('unlimitedOrNot')){
        function unlimitedOrNot(string $value){
            if($value==-1){
                return "Unlimited";
            }
            else{
                return $value;
            }
        }
    }

?>