<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attribute qabul qilinishi kerak.',
    'active_url' => ':attribute yaroqli URL manzil emas.',
    'after' => ':attribute :date dan keyingi sana boʻlishi kerak.',
    'after_or_equal' => ':attribute :datedan keyingi sana yoki unga teng boʻlishi kerak.',
    'alpha' => ':attribute faqat harflardan iborat boʻlishi kerak.',
    'alpha_dash' => ':attribute faqat harflar, raqamlar, tire va pastki chiziqdan iborat boʻlishi kerak.',
    'alpha_num' => ':attribute faqat harflar va raqamlardan iborat boʻlishi kerak.',
    'array' => ':attribute massiv boʻlishi kerak.',
    'before' => ':attribute :date dan oldingi sana boʻlishi kerak.',
    'before_or_equal' => ':attribute :datedan oldingi sana yoki unga teng boʻlishi kerak.',
    'between' => [
        'numeric' => ':attribute :min va :max orasida boʻlishi kerak.',
        'file' => ':attribute :min va :max kilobayt oraligʻida boʻlishi kerak.',
        'string' => ':attribute :min va :max belgilar orasida boʻlishi kerak.',
        'array' => ':attribute :min va :max oraligʻida boʻlishi kerak.',
    ],
    'boolean' => ':attribute maydoni rost yoki yolgʻon boʻlishi kerak.',
    'confirmed' => ':attributeni tasdiqlash mos kelmaydi.',
    'date' => ':attribute haqiqiy sana emas.',
    'date_equals' => ':attribute :date ga teng sana boʻlishi kerak.',
    'date_format' => ':attribute :format formatiga mos kelmaydi.',
    'different' => ':attribute va :oth har xil boʻlishi kerak.',
    'digits' => ':attribute :digits raqamlari boʻlishi kerak.',
    'digits_between' => ':attribute :min va :max raqamlari orasida boʻlishi kerak.',
    'dimensions' => ':attributeda rasm oʻlchamlari yaroqsiz.',
    'distinct' => ':attribute maydonida takroriy qiymat mavjud.',
    'email' => ':attribute yaroqli elektron pochta manzili boʻlishi kerak.',
    'ends_with' => ':attribute quyidagilardan biri bilan tugashi kerak: :values.',
    'exists' => 'Tanlangan :attribute yaroqsiz.',
    'file' => ':attribute fayl boʻlishi kerak.',
    'filled' => ':attribute maydonida qiymat boʻlishi kerak.',
    'gt' => [
        'numeric' => ':attribute :value dan katta boʻlishi kerak.',
        'file' => ':attribute :value kilobaytdan katta boʻlishi kerak.',
        'string' => ':attribute :value belgilaridan katta boʻlishi kerak.',
        'array' => ':attributeda :value dan ortiq element bo‘lishi kerak.',
    ],
    'gte' => [
        'numeric' => ':attribute :value dan katta yoki teng boʻlishi kerak.',
        'file' => ':attribute :value kilobaytdan katta yoki teng boʻlishi kerak.',
        'string' => ':attribute :value belgilaridan katta yoki teng boʻlishi kerak.',
        'array' => ':attributeda :value yoki undan koʻp element boʻlishi kerak.',
    ],
    'image' => ':attribute rasm boʻlishi kerak.',
    'in' => 'Tanlangan :attribute yaroqsiz.',
    'in_array' => ':attribute maydoni :other ichida mavjud emas.',
    'integer' => ':attribute butun son boʻlishi kerak.',
    'ip' => ':attribute toʻgʻri IP manzil boʻlishi kerak.',
    'ipv4' => ':attribute yaroqli IPv4 manzili boʻlishi kerak.',
    'ipv6' => ':attribute yaroqli IPv6 manzili boʻlishi kerak.',
    'json' => ':attribute yaroqli JSON qatori boʻlishi kerak.',
    'lt' => [
        'numeric' => ':attribute :value dan kichik boʻlishi kerak.',
        'file' => ':attribute :value kilobaytdan kichik boʻlishi kerak.',
        'string' => ':attribute :value belgilaridan kichik boʻlishi kerak.',
        'array' => ':attribute :value dan kam boʻlishi kerak.',
    ],
    'lte' => [
        'numeric' => ':attribute :value dan kichik yoki teng boʻlishi kerak.',
        'file' => ':attribute :value kilobaytdan kichik yoki teng boʻlishi kerak.',
        'string' => ':attribute :value belgilaridan kichik yoki teng boʻlishi kerak.',
        'array' => ':attributeda :value dan ortiq bo‘lmasligi kerak.',
    ],
    'max' => [
        'numeric' => ':attribute :max dan katta boʻlmasligi kerak.',
        'file' => ':attribute :max kilobaytdan oshmasligi kerak.',
        'string' => ':attribute :max belgilaridan oshmasligi kerak.',
        'array' => ':attributeda :max dan ortiq elementlar bo‘lmasligi kerak.',
    ],
    'mimes' => ':attribute :values tipidagi fayl boʻlishi kerak.',
    'mimetypes' => ':attribute :values tipidagi fayl boʻlishi kerak.',
    'min' => [
        'numeric' => ':attribute kamida :min boʻlishi kerak.',
        'file' => ':attribute kamida :min kilobayt boʻlishi kerak.',
        'string' => ':attribute kamida :min belgilardan iborat boʻlishi kerak.',
        'array' => ':attributeda kamida :min elementlar bo‘lishi kerak.',
    ],
    'multiple_of' => ':attribute :valuening karrali boʻlishi kerak.',
    'not_in' => 'Tanlangan :attribute yaroqsiz.',
    'not_regex' => ':attribute formati yaroqsiz.',
    'numeric' => ':attribute raqam boʻlishi kerak.',
    'password' => 'Parol notoʻgʻri.',
    'present' => ':attribute maydoni mavjud boʻlishi kerak.',
    'regex' => ':attribute formati yaroqsiz.',
    'required' => ':attribute maydoni talab qilinadi.',
    'required_if' => ':attribute maydoni :diger :value bo‘lganda talab qilinadi.',
    'required_unless' => 'Agar :values ichida :other boʻlmasa, :attribute maydoni talab qilinadi.',
    'required_with' => ':values mavjud boʻlganda :attribute maydoni talab qilinadi.',
    'required_with_all' => ':attribute maydoni :values mavjud boʻlganda talab qilinadi.',
    'required_without' => ':values mavjud boʻlmaganda :attribute maydoni talab qilinadi.',
    'required_without_all' => ':attribute maydoni :valuesdan hech biri mavjud boʻlmaganda talab qilinadi.',
    'prohibited' => ':attribute maydoni taqiqlangan.',
    'prohibited_if' => ':attribute maydoni :other :value bo‘lganda taqiqlanadi.',
    'prohibited_unless' => ':attribute maydoni, agar :values ichida :other boʻlmasa, taqiqlanadi.',
    'same' => ':attribute va :other mos kelishi kerak.',
    'size' => [
        'numeric' => ':attribute :size boʻlishi kerak.',
        'file' => ':attribute :size kilobayt boʻlishi kerak.',
        'string' => ':attribute :size belgilar boʻlishi kerak.',
        'array' => ':attributeda :size elementlari bo‘lishi kerak.',
    ],
    'starts_with' => ':attribute quyidagilardan biri bilan boshlanishi kerak: :values.',
    'string' => ':attribute satr boʻlishi kerak.',
    'timezone' => ':attribute yaroqli zona boʻlishi kerak.',
    'unique' => ':attribute allaqachon olingan.',
    'uploaded' => ':attribute yuklanmadi.',
    'url' => ':attribute formati yaroqsiz.',
    'uuid' => ':attribute haqiqiy UUID boʻlishi kerak.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'maxsus xabar',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
