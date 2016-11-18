<!-- Twitter Graph -->
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:site" content="{{ '@' .  config('site.twitter') }}" />
<meta name="twitter:creator" content="{{ '@' .  config('site.creator') }}" />
<!-- /Twitter Graph -->
<meta property="fb:admins" content="{{ config('site.fb_admin') }}" />
<meta property="fb:app_id" content="{{ config('site.fb_id') }}" />
<meta property="og:locale" content="ht_HT" />
<meta property="og:type" content="website" />
<meta property="og:site_name" content="{{ config('site.name') }}" />


@section('seo')

<link rel="canonical" href="{{ config('site.url') }}" />

<!-- Open Graph -->
<meta property="og:url" content="{{ config('site.url') }}" />
<meta property="og:title" content="{{ config('site.name') . ' &mdash; ' . config('site.slug') }}" />
<meta property="og:description" content="{{ config('site.description') }}" />
<meta property="og:image" content="{{ TKPM::asset(config('site.logo')) }}" />
<!-- / Open Graph -->
@show