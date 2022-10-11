<?php

use Carbon\CarbonPeriod;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Modules\CommonModule\Emails\MailSender;

function return_msg(bool $status = false, string $msg = null, $data = null, $errors = [])
{
    return ['status' => $status, 'msg' => $msg, 'data' => $data, 'errors' => $errors];
}

function handleExceptionDD($exception)
{
    throw new Exception($exception->getMessage());
    return null;
}

function getCaseCollection($builder, array $data)
{
    if ($data['paginated'] ?? null) {
        return $builder->paginate($data['limit'] ?? 20);
    }
    return $builder->get();
}

function getCaseResource($items, array $data)
{
    if ($data['paginated'] ?? null) {
        return $items;
    }
    return $items['data'] ?? [];
}


function getAuthUser($guard)
{
    return auth($guard)->user();
}

function formatNumberArEn($str)
{
    if (app()->getLocale() == "ar") {
        $western_arabic = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
        $eastern_arabic = array('٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩');

        $str = str_replace($western_arabic, $eastern_arabic, $str);
        return $str;
    }
    return $str;
}

function custom_paginate($collection, $limit = 20)
{
    $currentPage = LengthAwarePaginator::resolveCurrentPage();
    $itemCollection = collect($collection);
    $perPage = $limit;
    $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->values();
    $collection = new LengthAwarePaginator($currentPageItems, count($itemCollection), $perPage);
    $collection->setPath(request()->url());

    return $collection;
}


function getDaysTitle()
{
    return ["الاحد",
        "الاثنين",
        "الثلاثاء",
        "الاربعاء",
        "الخميس",
        "الجمعة",
        "السبت",
    ];
}

function dateExplode($date)
{
    $date = explode('-', $date);
    return $date;
}

function stringToArray($str)
{
    $str = str_replace('-', '', $str);
    $str = str_split($str);
//    dd($str);
    return $str;
}

function send_sms($data)
{
    $sms_type = env('SMS_TYPE');
    if ($sms_type == 1) {
        return send_sms2($data);
    }

    $message = $data['message'];
    $phone = "965" . $data['phone'];
    $url = "https://www.smsbox.com/SMSGateway/Services/Messaging.asmx/Http_SendSMS";
//    $url ="http://smsbox.com/smsgateway/services/messaging.asmx/Http_SendSMS?username=egyconskwt&password=Your_Password&customerid=1423&sendertext=EGY CONSKWT&messagebody=$message&recipientnumbers=$phone&defdate=&isblink=false&isflash=false رابط بوابة الارسال (WebService)";
    $post_data = "username=egyconskwt&password=65837381&customerid=1423&sendertext=EGY CONSKWT&messagebody=$message&recipientnumbers=$phone&defdate=&isblink=false&isflash=false";

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_POST, count(explode('&', $post_data)));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);

    $output = curl_exec($ch);

    curl_close($ch);

    return $output;
}

function handleEmailFile($email, $url, $content_name)
{

    send_email([
        'to' => $email,
        'content' => [
            'attachment' => $url,
            'content_name' => $content_name,
        ],
        'template' => 'mails.file_attachment'
    ]);

}

function send_sms2(array $data = [])
{
    try {
        $sms_username = env('SmsUserName');
        $sms_password = env('SmsPassword');
        $sender = env('SmsSender');
        $apikey = env('SmsAPiKey');
        $sms_url = 'https://api.mpp-sms.com/api/send.aspx';

        $phone = "965" . $data['phone'];
        $message = str_replace(' ', '+', $data['message']);

        $postData = "?apikey=$apikey&language=2&sender=$sender&mobile=$phone&message=$message";
        $sms_url = $sms_url . $postData;
//        dd($sms_url);
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $sms_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
//        curl_setopt($ch, CURLOPT_POST, count(explode(' & ', $postData)));
//        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);

        $output = curl_exec($ch);

        curl_close($ch);
    } catch (\Exception $exception) {

    }

    return $output;
}


function send_email($data)
{

    try {
        Mail::to($data['to'])
            ->send(new MailSender($data['content'], $data['template'], $data['subject'], $data['attachment'] ?? null));
    } catch (\Exception $exception) {
        dd($exception->getMessage());
    }
}

function getSettingByName($name = null)
{
    if ($name) {
        return Setting::where('name', $name)->first();
    }
    return Setting::all();
}

function getDaysOfWeek()
{
    $days = ['SUNDAY', 'MONDAY', 'TUESDAY', 'WEDNESDAY', 'THURSDAY', 'FRIDAY', 'SATURDAY'];

    $vacation_weekly = getSettingByName('vacation_weekly')->value;
    $vacation_weekly_array = explode(",", $vacation_weekly);
    return array_diff($days, $vacation_weekly_array);
}

function getFullPath($path, $file_name)
{
    if (!$file_name) {
        $path = "/$path";
    } else {
        $path = "/$path/";
    }
    return env('AWS_BUCKET_URL') . "/" . env('AWS_PROJECT') . "$path" . $file_name;
//    Storage::disk('s3')->put(env('AWS_PROJECT')."/".$path."/".$file_name, $file);
}

function uploadFile($file, $path, $resize = false)
{
    $data['name'] = uniqid() . "-" . $file->getClientOriginalName();
    $data['mime_type'] = $file->getClientMimeType();
    $data['extension'] = $file->getClientOriginalExtension();
    $data['size'] = $file->getSize();
    $data['placeholder'] = $file->getClientOriginalName();

    if ($resize) {
        $new_file = Image::make($file)->resize(400, null, function ($constraint) {
            $constraint->aspectRatio();
        })->encode($file->getClientOriginalExtension(), 50);
        Storage::disk('s3')->put(env('AWS_PROJECT') . "/$path/" . $data['name'], $new_file->getEncoded());
    } else {
        Storage::disk('s3')->put(env('AWS_PROJECT') . "/$path/" . $data['name'], file_get_contents($file));
    }

//    $file->move(storage_path('files/' . $path), $data['name']);
    return $data;
}

function return_response($response)
{
    if ($response['status'] ?? null) {
        return response()->json($response, 200, []);
    }
    return response()->json($response, 400, []);
}

function sendPushNotification($tokens, $message, $data = [], $title = 'خيركم')
{
    $tokens = collect($tokens)->chunk(200);

    foreach ($tokens as $token) {
        $optionBuilder = new OptionsBuilder();
        $optionBuilder->setTimeToLive(60 * 20);

        $notificationBuilder = new PayloadNotificationBuilder($title);

        $notificationBuilder->setBody($message)
            ->setSound('default');
        $dataBuilder = new PayloadDataBuilder();

        if (count($data) > 0) {
            $dataBuilder->addData($data);
        }

        $option = $optionBuilder->build();
        $notification = $notificationBuilder->build();
        $data = $dataBuilder->build();
        $downstreamResponse = FCM::sendTo($token->toArray(), $option, $notification, $data);
//        return true;
    }

}

function sendPushNotificationTopic($message, $data = [], $title = 'خيركم')
{
    $optionBuilder = new OptionsBuilder();
    $optionBuilder->setTimeToLive(60 * 20);

    $notificationBuilder = new PayloadNotificationBuilder($title);

    $notificationBuilder->setBody($message)
        ->setSound('default');
    $dataBuilder = new PayloadDataBuilder();

    if (count($data) > 0) {
        $dataBuilder->addData($data);
    }

    $option = $optionBuilder->build();
    $notification = $notificationBuilder->build();

    $data = $dataBuilder->build();

    $topic = new Topics();
    $topic->topic('public');
    $topicResponse = FCM::sendToTopic($topic, $option, $notification, $data);

    return true;

}

function __notification(array $data)
{
    return (new \Modules\NotificationModule\Services\Notification\NotificationService())->create($data);
}

function arabicDate($date)
{
    $numbers_ar = ["٠", "١", "٢", "٣", "٤", "٥", "٦", "٧", "٨", "٩"];
    $numbers_en = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

    return str_replace($numbers_en, $numbers_ar, $date);
}

function getActorTypes()
{
    return \Modules\AdminModule\Entities\Admin::ADMIN_TYPES;
    return [
        "admin",
        "supervisor",
        "trainer",
        "resident",
        "secretory",
    ];
}

function nColor($type)
{
    $color = [
        'dashboard' => [
            "bgColor" => "bg-light-primary border-primary",
            "iconColor" => "svg-icon-primary",
        ],
    ];
    return $color[$type] ?? [
            "bgColor" => "bg-light-primary border-primary",
            "iconColor" => "svg-icon-primary",
        ];
}
?>
