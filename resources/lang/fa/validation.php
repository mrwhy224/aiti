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

    'accepted' => 'فیلد :attribute باید پذیرفته شود.',
    'active_url' => 'فیلد :attribute یک URL معتبر نیست.',
    'after' => 'فیلد :attribute باید تاریخی بعد از :date باشد.',
    'after_or_equal' => 'فیلد :attribute باید تاریخی مساوی یا بعد از :date باشد.',
    'alpha' => 'فیلد :attribute فقط می‌تواند شامل حروف باشد.',
    'alpha_dash' => 'فیلد :attribute فقط می‌تواند شامل حروف، اعداد، خط تیره و زیرخط باشد.',
    'alpha_num' => 'فیلد :attribute فقط می‌تواند شامل حروف و اعداد باشد.',
    'array' => 'فیلد :attribute باید یک آرایه باشد.',
    'before' => 'فیلد :attribute باید تاریخی قبل از :date باشد.',
    'before_or_equal' => 'فیلد :attribute باید تاریخی مساوی یا قبل از :date باشد.',
    'between' => [
        'numeric' => 'فیلد :attribute باید بین :min و :max باشد.',
        'file' => 'فیلد :attribute باید بین :min و :max کیلوبایت باشد.',
        'string' => 'فیلد :attribute باید بین :min و :max کاراکتر باشد.',
        'array' => 'فیلد :attribute باید بین :min و :max آیتم داشته باشد.',
    ],
    'boolean' => 'فیلد :attribute فقط می‌تواند true یا false باشد.',
    'confirmed' => 'تاییدیه فیلد :attribute مطابقت ندارد.',
    'date' => 'فیلد :attribute یک تاریخ معتبر نیست.',
    'date_equals' => 'فیلد :attribute باید تاریخی مساوی با :date باشد.',
    'date_format' => 'فیلد :attribute با فرمت :format مطابقت ندارد.',
    'different' => 'فیلد :attribute و :other باید متفاوت باشند.',
    'digits' => 'فیلد :attribute باید :digits رقم باشد.',
    'digits_between' => 'فیلد :attribute باید بین :min و :max رقم باشد.',
    'dimensions' => 'فیلد :attribute دارای ابعاد تصویر نامعتبر است.',
    'distinct' => 'فیلد :attribute دارای مقدار تکراری است.',
    'email' => 'فیلد :attribute باید یک آدرس ایمیل معتبر باشد.',
    'ends_with' => 'فیلد :attribute باید با یکی از مقادیر زیر پایان یابد: :values.',
    'exists' => 'فیلد انتخاب شده :attribute نامعتبر است.',
    'file' => 'فیلد :attribute باید یک فایل باشد.',
    'filled' => 'فیلد :attribute باید مقدار داشته باشد.',
    'gt' => [
        'numeric' => 'فیلد :attribute باید بزرگتر از :value باشد.',
        'file' => 'فیلد :attribute باید بزرگتر از :value کیلوبایت باشد.',
        'string' => 'فیلد :attribute باید بزرگتر از :value کاراکتر باشد.',
        'array' => 'فیلد :attribute باید بیشتر از :value آیتم داشته باشد.',
    ],
    'gte' => [
        'numeric' => 'فیلد :attribute باید بزرگتر یا مساوی :value باشد.',
        'file' => 'فیلد :attribute باید بزرگتر یا مساوی :value کیلوبایت باشد.',
        'string' => 'فیلد :attribute باید بزرگتر یا مساوی :value کاراکتر باشد.',
        'array' => 'فیلد :attribute باید :value آیتم یا بیشتر داشته باشد.',
    ],
    'image' => 'فیلد :attribute باید یک تصویر باشد.',
    'in' => 'فیلد انتخاب شده :attribute نامعتبر است.',
    'in_array' => 'فیلد :attribute در :other وجود ندارد.',
    'integer' => 'فیلد :attribute باید یک عدد صحیح باشد.',
    'ip' => 'فیلد :attribute باید یک آدرس IP معتبر باشد.',
    'ipv4' => 'فیلد :attribute باید یک آدرس IPv4 معتبر باشد.',
    'ipv6' => 'فیلد :attribute باید یک آدرس IPv6 معتبر باشد.',
    'json' => 'فیلد :attribute باید یک رشته JSON معتبر باشد.',
    'lt' => [
        'numeric' => 'فیلد :attribute باید کمتر از :value باشد.',
        'file' => 'فیلد :attribute باید کمتر از :value کیلوبایت باشد.',
        'string' => 'فیلد :attribute باید کمتر از :value کاراکتر باشد.',
        'array' => 'فیلد :attribute باید کمتر از :value آیتم داشته باشد.',
    ],
    'lte' => [
        'numeric' => 'فیلد :attribute باید کمتر یا مساوی :value باشد.',
        'file' => 'فیلد :attribute باید کمتر یا مساوی :value کیلوبایت باشد.',
        'string' => 'فیلد :attribute باید کمتر یا مساوی :value کاراکتر باشد.',
        'array' => 'فیلد :attribute نباید بیشتر از :value آیتم داشته باشد.',
    ],
    'max' => [
        'numeric' => 'فیلد :attribute نباید بزرگتر از :max باشد.',
        'file' => 'فیلد :attribute نباید بزرگتر از :max کیلوبایت باشد.',
        'string' => 'فیلد :attribute نباید بزرگتر از :max کاراکتر باشد.',
        'array' => 'فیلد :attribute نباید بیشتر از :max آیتم داشته باشد.',
    ],
    'mimes' => 'فیلد :attribute باید فایلی از نوع :values باشد.',
    'mimetypes' => 'فیلد :attribute باید فایلی از نوع :values باشد.',
    'min' => [
        'numeric' => 'فیلد :attribute باید حداقل :min باشد.',
        'file' => 'فیلد :attribute باید حداقل :min کیلوبایت باشد.',
        'string' => 'فیلد :attribute باید حداقل :min کاراکتر باشد.',
        'array' => 'فیلد :attribute باید حداقل :min آیتم داشته باشد.',
    ],
    'not_in' => 'فیلد انتخاب شده :attribute نامعتبر است.',
    'not_regex' => 'فرمت فیلد :attribute نامعتبر است.',
    'numeric' => 'فیلد :attribute باید یک عدد باشد.',
    'password' => 'رمز عبور نادرست است.',
    'present' => 'فیلد :attribute باید وجود داشته باشد.',
    'regex' => 'فرمت فیلد :attribute نامعتبر است.',
    'required' => 'فیلد :attribute الزامی است.',
    'required_if' => 'فیلد :attribute زمانی که :other برابر با :value است، الزامی است.',
    'required_unless' => 'فیلد :attribute الزامی است مگر اینکه :other در :values باشد.',
    'required_with' => 'فیلد :attribute زمانی که :values وجود دارد، الزامی است.',
    'required_with_all' => 'فیلد :attribute زمانی که :values وجود دارند، الزامی است.',
    'required_without' => 'فیلد :attribute زمانی که :values وجود ندارد، الزامی است.',
    'required_without_all' => 'فیلد :attribute زمانی که هیچ یک از :values وجود ندارند، الزامی است.',
    'same' => 'فیلد :attribute و :other باید مطابقت داشته باشند.',
    'size' => [
        'numeric' => 'فیلد :attribute باید :size باشد.',
        'file' => 'فیلد :attribute باید :size کیلوبایت باشد.',
        'string' => 'فیلد :attribute باید :size کاراکتر باشد.',
        'array' => 'فیلد :attribute باید شامل :size آیتم باشد.',
    ],
    'starts_with' => 'فیلد :attribute باید با یکی از مقادیر زیر شروع شود: :values.',
    'string' => 'فیلد :attribute باید یک رشته باشد.',
    'timezone' => 'فیلد :attribute باید یک منطقه زمانی معتبر باشد.',
    'unique' => 'این :attribute قبلا ثبت شده است.',
    'uploaded' => 'آپلود :attribute ناموفق بود.',
    'url' => 'فرمت فیلد :attribute نامعتبر است.',
    'uuid' => 'فیلد :attribute باید یک UUID معتبر باشد.',

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
            'rule-name' => 'custom-message',
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

    'attributes' => [
        'company_name' => 'نام شرکت',
        'company_id' => 'شناسه ملی شرکت',
        'first_name' => 'نام',
        'last_name' => 'نام خانوادگی',
        'national_code' => 'کد ملی',
        'mobile' => 'شماره تلفن همراه',
        'role_id' => 'سمت',
        'password' => 'رمز عبور',
    ],

];
