<?php

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

function throwErrors($errors, $code = 400)
{
    if (DB::transactionLevel()) DB::rollBack();
    throw new HttpResponseException(response_errors($errors, $code));
}

function throwError($message, int $code = 400)
{
    throwErrors(['success'=>false,'message'=>$message],$code);
}

function failedValidation($validator) {
  foreach ($validator->errors()->toArray() as $value) {
    throwError($value[0]);
  }
}

function success($data = null): JsonResponse
{
    if (is_null($data)) $data = ['success' => true];
    return response()->json($data);
}

function response_errors($errors, int $code = 400): JsonResponse
{
    return response()->json($errors, $code);
}

function translit($text, $lang = 'ru')
{
    $data = [
        'ru' => [
            'cyr' => ['А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я'],
            'lat' => ['A', 'B', 'V', 'G', 'D', 'E', 'YO', 'J', 'Z', 'I', 'Y', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'F', 'X', 'TS', 'CH', 'SH', 'SH', '', '', '', 'E', 'YU', 'YA']
        ],
        'oz' => [
            'cyr' => ["Ш", "Ч", "Ё", "А", "Б", "Д", "Э", "Ф", "Ғ", "Г", "Ҳ", "И", "Ж", "К", "Л", "М", "Н", "Ў", "О", "П", "Қ", "Р", "С", "Т", "У", "В", "Х", "Й", "З", "Ь"],
            'lat' => ["SH", "CH", "YO", "A", "B", "D", "E", "F", "G'", "G", "H", "I", "J", "K", "L", "M", "N", "O'", "O", "P", "Q", "R", "S", "T", "U", "V", "X", "Y", "Z", "'"]
        ]
    ];
    $text = mb_strtoupper($text);

    $text1 = str_replace($data[$lang]['cyr'], $data[$lang]['lat'], $text);
    $text2 = str_replace($data[$lang]['lat'], $data[$lang]['cyr'], $text);

    return [
        'lat' => $text1, 
        'cyr' => $text2
    ];
}
