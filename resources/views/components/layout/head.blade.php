<!doctype html>
<html lang="de" class="scroll-smooth overflow-y-scroll">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@seo_title</title>
<meta name="description" content="@seo_description">
<meta property="og:title" content="@seo_title">
<meta property="og:description" content="@seo_description">
<meta property="og:url" content="{{ url()->current()}} ">
<meta property="og:site_name" content="@seo_title">
<meta property="og:image" content="{{ url('/') }}opengraph.jpg">
<link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96" />
<link rel="icon" type="image/svg+xml" href="/favicon.svg" />
<link rel="shortcut icon" href="/favicon.ico" />
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
<meta name="apple-mobile-web-app-title" content="Aurea Reichenburg SZ" />
<link rel="manifest" href="/site.webmanifest" />
@vite('resources/css/app.css')
@livewireStyles
</head>
<body 
  class="antialiased font-adelle-sans text-black text-base md:text-md lg:text-lg tracking-normal leading-[1.45] flex min-h-full flex-col" 
  x-data="{ menu: false }">
