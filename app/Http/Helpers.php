<?php

namespace App\Http;

use App;
use Carbon\Carbon;
use Faker\Provider\DateTime;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Helpers
{

    public static function getTranslatedSlugRu($text)
    {
        $str = Str::slug($text, '-');
        return $str;
    }

    public static function getMonthName($number)
    {
        $lang = App::getLocale();

        if ($lang == 'ru') {
            $monthAr = array(
                1 => array('Январь', 'Января'),
                2 => array('Февраль', 'Февраля'),
                3 => array('Март', 'Марта'),
                4 => array('Апрель', 'Апреля'),
                5 => array('Май', 'Мая'),
                6 => array('Июнь', 'Июня'),
                7 => array('Июль', 'Июля'),
                8 => array('Август', 'Августа'),
                9 => array('Сентябрь', 'Сентября'),
                10 => array('Октябрь', 'Октября'),
                11 => array('Ноябрь', 'Ноября'),
                12 => array('Декабрь', 'Декабря'),
            );
        } else if ($lang == 'kz') {
            $monthAr = array(
                1 => array('Қаңтар', 'Қаңтар'),
                2 => array('Ақпан', 'Ақпан'),
                3 => array('Наурыз', 'Наурыз'),
                4 => array('Сәуір', 'Сәуір'),
                5 => array('Мамыр', 'Мамыр'),
                6 => array('Маусым', 'Маусым'),
                7 => array('Шілде', 'Шілде'),
                8 => array('Тамыз', 'Тамыз'),
                9 => array('Қыркүйек', 'Қыркүйек'),
                10 => array('Қазан', 'Қазан'),
                11 => array('Қараша', 'Қараша'),
                12 => array('Желтоқсан', 'Желтоқсан'),
            );
        } else {
            $monthAr = array(
                1 => array('January', 'January'),
                2 => array('February', 'February'),
                3 => array('March', 'March'),
                4 => array('April', 'April'),
                5 => array('May', 'May'),
                6 => array('June', 'June'),
                7 => array('July', 'July'),
                8 => array('August', 'August'),
                9 => array('September', 'September'),
                10 => array('October', 'October'),
                11 => array('November', 'November'),
                12 => array('December', 'December'),
            );
        }
        if (!isset($monthAr[(int) $number][1])) {
            return '';
        }
        return $monthAr[(int) $number][1];
    }

    public static function getDateFormat($date_param)
    {
        $date = Carbon::parse($date_param);
        return $date->day . ' ' . Helpers::getMonthName($date->month) . ', ' . $date->year;
    }

    public static function simpleDate($date)
    {
        $simple_date = date('d.m.Y', strtotime($date));
        return $simple_date;
    }

    public static function storeImg($name, $disk_name, $request)
    {
        $image = $request->file($name);
        $image_name = $image->getClientOriginalName();
        $extension = $image->getClientOriginalExtension();
        $destinationPath = $request->disk . '/' . date('Y') . '/' . date('m') . '/' . date('d');
        $image_name = $destinationPath . '/' . $image_name;

        if (Storage::disk($disk_name)->exists($image_name)) {
            $now = \DateTime::createFromFormat('U.u', microtime(true));
            $image_name = $destinationPath . '/' . $now->format("Hisu") . '.' . $extension;
        }

        Storage::disk($disk_name)->put($image_name, File::get($image));

        if ($disk_name == 'avatar') {
            $result = '/media_avatar' . $image_name;
        } else {
            $result = '/media' . $image_name;
        }

        return $result;
    }

    public static function storeImages($name, $disk_name, $request)
    {
        $cover = $request->file($name);
        $resultall = "";
        foreach ($cover as $coverone) {
            $file_name = $coverone->getClientOriginalName();
            $extension = $coverone->getClientOriginalExtension();

            $destinationPath = $request->disk . '/' . date('Y') . '/' . date('m') . '/' . date('d');

            $file_name = $destinationPath . '/' . $file_name;

            if (Storage::disk($disk_name)->exists($file_name)) {
                $now = \DateTime::createFromFormat('U.u', microtime(true));
                $file_name = $destinationPath . '/' . $now->format("Hisu") . '.' . $extension;
            }

            Storage::disk($disk_name)->put($file_name, File::get($coverone));
            $resultall .= '\'/media' . $file_name . '\',';
        }
        $result = substr($resultall, 0, -1);

        return $result;
    }

    public static function storeBase64Images($name, $disk_name, $request)
    {
        $resultall = "";
        foreach ($request->input($name) as $coverone) {

            $real_file_name = date("d-m-Y_H-i-s"); 

            if (Storage::disk($disk_name)->exists($real_file_name)) {
                // $real_file_name .= rand(1, 500);
                continue;
            }

            Storage::disk($disk_name)->put($real_file_name, base64_encode($coverone));
            $resultall .= $real_file_name . ',';
        }
        $result = substr($resultall, 0, -1);

        return $result;
    }

    public static function storeFile($name, $disk_name, $request)
    {
        $cover = $request->file($name);
        $resultall = "";
        foreach ($cover as $coverone) {
            $file_name = $coverone->getClientOriginalName();
            $extension = $coverone->getClientOriginalExtension();

            $destinationPath = $request->disk . '/' . date('Y') . '/' . date('m') . '/' . date('d');

            $file_name = $destinationPath . '/' . $file_name;

            if (Storage::disk($disk_name)->exists($file_name)) {
                $now = \DateTime::createFromFormat('U.u', microtime(true));
                $file_name = $destinationPath . '/' . $now->format("Hisu") . '.' . $extension;
            }

            Storage::disk($disk_name)->put($file_name, File::get($coverone));
            $resultall .= '\'/media_doc' . $file_name . '\',';
        }
        $result = substr($resultall, 0, -1);

        return $result;
    }

}
