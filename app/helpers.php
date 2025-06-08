<?php

use App\Models\Main\Admin;
use App\Models\Main\User;
use Filament\Facades\Filament;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

/*
 |--------------------------------------------------------------------------
 | LARAVEL
 |--------------------------------------------------------------------------
 */

if (! function_exists('urlIsActive')) {
    function urlIsActive(string $url): string
    {
        return rtrim($url, '/') === rtrim(request()->url(), '/') ? 'active' : '';
    }
}

function user(string $guard = 'web'): Admin|User|null
{
    return Auth::guard($guard)->user();
}

function user_id(string $guard = 'web'): int|string|null
{
    return Auth::guard($guard)->id();
}

function user_can(string $guard = 'web', array|string|null $abilities = null): bool
{
    return user($guard)->can($abilities);
}

function storage_url(?string $path = null): string
{
    if (empty($path)) {
        return '';
    }

    /** @var \Illuminate\Filesystem\FilesystemAdapter $disk */
    $disk = Storage::disk('public');

    return $disk->url($path);
}

function is_request_for_api(?Request $request = null): bool
{
    $request = $request ?: app(Request::class);

    $apiPath = config('base.route.api_path');

    return ($apiPath && $request->is('*'.$apiPath.'*'))
        || $request->getHost() == config('base.route.api_domain');
}

/*
 |--------------------------------------------------------------------------
 | FILAMENT
 |--------------------------------------------------------------------------
 */

function filament_user(): Admin|User|null
{
    return Filament::auth()->user();
}

function filament_user_id(): int|string|null
{
    return Filament::auth()->id();
}

/*
 |--------------------------------------------------------------------------
 | UTILS
 |--------------------------------------------------------------------------
 */

function setting_arr(string $key): mixed
{
    return json_decode(setting($key, '[]'), true);
}

function setting_file(string $key): mixed
{
    return storage_url(setting($key));
}

function str_slug(?string $text = null): string
{
    return \Illuminate\Support\Str::slug($text);
}

function trim_space(string $str): string
{
    return preg_replace('/\s+/', ' ', $str);
}

function array_mirror(Collection|array $array, bool $excludeEmpty = true): array
{
    $result = [];

    if ($array instanceof Collection) {
        $array = $array->toArray();
    }

    $arr = (array) $array;

    if (count($arr) == 1 && $arr[0] == null) {
        return [];
    }

    foreach ($arr ?: [] as $el) {
        if (empty($el) && $excludeEmpty) {
            continue;
        }
        $result[$el] = $el;
    }

    return $result;
}

function ribuan(
    null|int|float|string $amount,
    int $decimals = 0,
    bool $trim = true,
    string $prefix = '',
    string $suffix = '',
): string {
    //
    $ribuan = number_format((float) $amount, $decimals, ',', '.');

    $ribuan = $trim && $decimals ? preg_replace("/\,?0+$/", '', $ribuan) : $ribuan;

    return $prefix.$ribuan.$suffix;
}

function rupiah(
    int|float|string|null $amount = null,
    int $decimals = 2,
    bool $trim = true,
    bool $plusSymbol = false,
): string {
    //
    $prepend = floatval($amount) < 0 ? '-' : ($plusSymbol ? '+' : '');

    return ribuan(abs(floatval($amount)), $decimals, $trim, $prepend.'Rp ');
}

function re_ribuan(null|int|float|string $ribuan, bool $asInt = false): int|float
{
    $r1 = preg_replace('/[^0-9\.\,]/', '', (string) $ribuan);

    $r2 = str_replace('.', '', $r1);

    $r3 = str_replace(',', '.', $r2);

    return $asInt ? intval($r3) : floatval($r3);
}

function ribuan_en(
    null|int|float|string $amount,
    int $decimals = 0,
    bool $trim = true,
    string $prefix = '',
    string $suffix = '',
): string {
    //
    $ribuan = number_format((float) $amount, $decimals, '.', ',');

    $ribuan = $trim ? preg_replace("/\.?0+$/", '', $ribuan) : $ribuan;

    return $prefix.$ribuan.$suffix;
}

function rupiah_en(
    int|float|string|null $amount = null,
    int $decimals = 2,
    bool $trim = true,
    bool $plusSymbol = false,
): string {
    //
    $prepend = floatval($amount) < 0 ? '-' : ($plusSymbol ? '+' : '');

    return ribuan_en(abs(floatval($amount)), $decimals, $trim, $prepend.'Rp ');
}

function re_ribuan_en(null|int|float|string $ribuan, bool $asInt = false): int|float
{
    $r1 = preg_replace('/[^0-9\.\,]/', '', (string) $ribuan);

    $r2 = str_replace(',', '', $r1);

    return $asInt ? intval($r2) : floatval($r2);
}

function whatsappable_url(string|int $number, ?string $text = null): string
{
    $number = preg_replace('/\D/', '', (string) $number); // digits only

    $phoneable = match (true) {
        str_starts_with($number, '62') => $number,
        str_starts_with($number, '0') => '62'.substr($number, 1),
        default => '62'.$number,
    };

    return "https://wa.me/{$phoneable}?text=".urlencode($text);
}

function shareable_facebook(string $url, string $title, string $source = ''): string
{
    [$fUrl, $fTitle] = [urlencode($url), urlencode($title)];

    $text = "https://www.facebook.com/sharer/sharer.php?u=$fUrl&t=$fTitle";
    $text = $source ? "{$text}&utm_source={$source}" : $text;

    return $text;
}

function shareable_twitter(string $url, string $title, array $hashtags = [], string $source = ''): string
{
    [$fUrl, $fTitle] = [urlencode($url), urlencode($title)];
    $fHashtags = implode(',', array_map(fn ($v) => urlencode($v), $hashtags));

    $text = "https://twitter.com/share?url={$url}&text={$fTitle}";
    $text = $hashtags ? "{$text}&hashtags={$fHashtags}" : $text;
    $text = $source ? "{$text}&utm_source={$source}" : $text;

    return $text;
}

function shareable_whatsapp_mobile(string $url, string $title): string
{
    $thetext = urlencode($url).' — '.urlencode($title);

    return "whatsapp://send?text={$thetext}";
}

function shareable_linkedin(string $url): string
{
    return 'https://www.linkedin.com/sharing/share-offsite/?url='.urlencode($url);
}

function shareable_instagram(string $url, string $title): string
{
    return 'https://www.instagram.com/create/story?url='.$url; //TODO: need fix
}

function shareable_telegram(string $url, string $title): string
{
    return 'https://t.me/share/url?url='.$url.'&text='.$title;
}

function shareable_mailto(string $to, string $subject, string $body): string
{
    return 'mailto:'.$to.'?subject='.$subject.'&body='.$body;
}

function shareable_mail(string $url, string $title): string
{
    $app = config('app.name');

    $body = "Hi, check this out: {$title} from {$app} at {$url}";

    return shareable_mailto('changeme@email.com', 'Change me the subject', $body);
}

function public_avatarable_url(string $name): string
{
    return "https://ui-avatars.com/api/?size=128&color=fff&background=111827&name={$name}";
}

function storage_avatarable_url(?string $path, ?string $fallbackstr): string
{
    if (empty($path)) {
        //
        $names = explode(' ', $fallbackstr);

        $name = count($names) > 1
              ? substr($names[0], 0, 1).substr($names[1], 0, 1)
              : substr($fallbackstr, 0, 2);

        return public_avatarable_url($name);

    }

    return storage_url($path);
}

/**
 * Credit to chatgpt, simplified by us.
 * https://github.com/lakuapik/greatmind.web.id/blob/master/src/helper/readingTime.js
 */
function reading_time(string $content, int $speed = 120, bool $raw = false, bool $second = false): string
{
    if (empty($content)) {
        return '0 '.($second ? 'detik' : 'menit');
    }

    $content = preg_replace('/(<([^>]+)>)/i', '', $content);
    preg_match_all('/[\p{L}\p{N}]+|\S+\s*/u', $content, $matches);
    $count = $matches ? count($matches[0]) : 0;

    if (! $second) {
        $min = ceil($count / $speed);

        return ! $raw ? "$min menit" : strval($min);
    }

    $min = floor($count / $speed);
    $sec = floor(($count % $speed) / ($speed / 60));

    if ($raw) {
        return strval($min * 60 + $sec);
    }

    return $min > 0 ? "$min menit, $sec detik" : "$sec detik";
}

function carbon_date_or_false(string $text): Carbon|bool
{
    return rescue(fn () => Carbon::parse($text ?: 'none'), false, false);
}

function preventXss(mixed $value): mixed
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function paginateFromCollection(
    mixed $items,
    int $perPage = 15,
    ?int $page = null,
    string $pageName = 'page',
    array $options = []
): LengthAwarePaginator {
    $page = $page ?: LengthAwarePaginator::resolveCurrentPage($pageName) ?: 1;
    $items = $items instanceof Collection ? $items : collect($items);

    return new LengthAwarePaginator(
        $items->forPage($page, $perPage),
        $items->count(),
        $perPage,
        $page,
        array_merge([
            'path' => LengthAwarePaginator::resolveCurrentPath(),
            'pageName' => $pageName,
        ], $options)
    );
}
