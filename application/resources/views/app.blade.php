@php
    // I know, blasphmey right? :)
    $file = file_get_contents(public_path('build/.vite/manifest.json'))
        ? file_get_contents(public_path('build/.vite/manifest.json'))
        : throw new \Exception("Manifest file does not exist");

    $manifest = json_decode($file, true);
    $appjs = array_key_exists('app.js', $manifest)
        ? $manifest['app.js']
        : throw new \Exception("manifest file does not have app.js key");

    $file = $appjs
        ? $appjs['file']
        : throw new \Exception("manifest file does not have filename set");

    $stylesheets = $appjs ? $appjs['css'] : [];
@endphp
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    @foreach($stylesheets as $css)
        <link rel="preload" as="style" href="/build/{{ $css }}">
        <link rel="stylesheet" href="/build/{{ $css }}">
    @endforeach
    <link rel="modulepreload" href="/build/{{ $file }}">
    <script type="module" src="/build/{{ $file }}"></script>

    @inertiaHead
  </head>
  <body>
    @inertia
  </body>
</html>
