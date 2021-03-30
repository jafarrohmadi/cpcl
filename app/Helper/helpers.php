<?php

if (!function_exists('numberFormat')) {
    /**
     * @param $angka
     * @return int|string
     */
    function numberFormat($angka)
    {
        return  $angka ? 'Rp. '.number_format($angka, 0, ',', '.') : 'Rp. 0';
    }
}

if (!function_exists('uploadFile')) {
    /**
     * @param $file
     * @return string
     */
    function uploadFile($file)
    {
        $md5Name        = md5_file($file->getRealPath());
        $guessExtension = $file->guessExtension();

        $file->storeAs('upload', $md5Name . '.' . $guessExtension, 'path');

        return $md5Name . '.' . $guessExtension;

    }
}

if (!function_exists('getFile')) {
    /**
     * @param $file
     * @return string
     */
    function getFile($file)
    {
        return "<a href='" . asset("upload/$file") . "' target='_blank'>Download File</a> ";
    }
}
if (!function_exists('getFileLink')) {
    /**
     * @param $file
     * @return string
     */
    function getFileLink($file)
    {
        return asset("upload/$file");
    }
}

if (!function_exists('endDateRed')) {
    /**
     * @param $date
     * @return string
     * @throws Exception
     */
    function endDateRed($date)
    {
        $date1 = new DateTime(date('Y-m-d'));
        $date2 = new DateTime($date);

        $diff = $date1->diff($date2);

        return $diff->days < 12 && $diff->days > 1 ? "style=background:red" : '';
    }
}
