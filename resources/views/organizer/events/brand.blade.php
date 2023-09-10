@extends('layouts.layout')
@section('title')
    {{ $navbar->title }} | EventSync
@endsection

@section('content')
    @include('components.organizer_navbar')
    @include('organizer.events.event_navbar')

    <div class="w-9/12 mx-auto my-16 flex gap-16">
        <div class="w-1/2 p-8 bg-white rounded border shadow-md">
            <p class="form_label text-xl mb-4">Event Logo *</p>
            @error('logo')
                <p class="text-sm text-red-500 mb-1">{{ $message }}</p>
            @enderror
            @if ($brand && $brand->logo)
                <img src="{{ asset('storage/' . $brand->logo) }}" class="h-80 aspect-auto mx-auto">
                <button id="selectLogo" class="button float-right mt-8">Update Logo</button>
                <form id="logoUpload" action="{{ route('brand.logo') }}" method="POST" enctype="multipart/form-data"
                    style="display: none">
                    @csrf
                    <input type="hidden" name="event_id" value="{{ $navbar->id }}">
                    <input type="file" name="logo" id="logo" />
                </form>
                <script>
                    const selectLogo = document.getElementById("selectLogo");
                    const logoUpload = document.getElementById("logoUpload");
                    const logo = document.getElementById("logo");
                    selectLogo.addEventListener("click", () => {
                        logo.click();
                    });
                    logo.addEventListener("change", () => {
                        logoUpload.submit();
                    });
                </script>
            @else
                <form action="{{ route('brand.logo') }}" id="logoUpload" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="event_id" value="{{ $navbar->id }}">
                    <label for="logo"
                        class="flex flex-col items-center justify-center h-64 border-2 border-gray-300 border-dashed rounded cursor-pointer bg-[#f8f8f8]">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                            </svg>
                            <p class="mb-2 text-gray-500"><span class="font-semibold">Click to upload</span> or drag and
                                drop
                            </p>
                            <p class="text-sm text-gray-500">SVG, PNG, or JPG (5 MB max)</p>
                        </div>
                        <input id="logo" type="file" name="logo" class="hidden" />
                    </label>
                </form>
                <script>
                    const logoUpload = document.getElementById("logoUpload");
                    const logo = document.getElementById("logo");
                    logo.addEventListener("change", () => {
                        logoUpload.submit();
                    });
                </script>
            @endif
        </div>
        <div class="w-1/2 p-8 bg-white rounded border shadow-md">
            <p class="form_label text-xl mb-4">Event Banner *</p>
            @error('banner')
                <p class="text-sm text-red-500 mb-1">{{ $message }}</p>
            @enderror
            @if ($brand && $brand->banner)
                <img src="{{ asset('storage/' . $brand->banner) }}" class="h-80 aspect-auto mx-auto">
                <button id="selectBanner" class="button float-right mt-8">Update Banner</button>
                <form id="bannerUpload" action="{{ route('brand.banner') }}" method="POST" enctype="multipart/form-data"
                    style="display: none">
                    @csrf
                    <input type="hidden" name="event_id" value="{{ $navbar->id }}">
                    <input type="file" name="banner" id="banner" />
                </form>
                <script>
                    const selectBanner = document.getElementById("selectBanner");
                    const bannerUpload = document.getElementById("bannerUpload");
                    const banner = document.getElementById("banner");
                    selectBanner.addEventListener("click", () => {
                        banner.click();
                    });
                    banner.addEventListener("change", () => {
                        bannerUpload.submit();
                    });
                </script>
            @else
                <form action="{{ route('brand.banner') }}" id="bannerUpload" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="event_id" value="{{ $navbar->id }}">
                    <label for="banner"
                        class="flex flex-col items-center justify-center h-64 border-2 border-gray-300 border-dashed rounded cursor-pointer bg-[#f8f8f8]">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                            </svg>
                            <p class="mb-2 text-gray-500"><span class="font-semibold">Click to upload</span> or drag and
                                drop
                            </p>
                            <p class="text-sm text-gray-500">SVG, PNG, or JPG (5 MB max)</p>
                        </div>
                        <input id="banner" type="file" name="banner" class="hidden" />
                    </label>
                </form>
                <script>
                    const bannerUpload = document.getElementById("bannerUpload");
                    const banner = document.getElementById("banner");
                    banner.addEventListener("change", () => {
                        bannerUpload.submit();
                    });
                </script>
            @endif
        </div>
    </div>
@endsection
