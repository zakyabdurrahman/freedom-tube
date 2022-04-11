<?php 
namespace App\Http\Helpers;

class Utils {
    
    //will fetch mp4a and webm audio links from streamlinks collection
    public static function AudioGetter($array) {
        
        $audios = array();
        foreach ($array as $object) {
            $mimeType = $object->mimeType;
            if ($mimeType === "audio/mp4; codecs=\"mp4a.40.2\"") {
                array_push($audios, $object);
            } else if ($mimeType === "audio/webm; codecs=\"opus\"" && $object->audioQuality === "AUDIO_QUALITY_MEDIUM") {
                array_push($audios, $object);
            }
        }
        return $audios;
    }

}

?>