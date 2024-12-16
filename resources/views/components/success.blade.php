@if(session()->has('success'))
<div class="flash fixed bg-white bottom-2 right-2 rounded-lg border border-gray-200 box-shadow-i z-10" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 2000)">
    <div class="success flex gap-2 p-4">
        <div class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48" fill="none">
                <path opacity="1"
                    d="M44 24C44 35.0457 35.0457 44 24 44C12.9543 44 4 35.0457 4 24C4 12.9543 12.9543 4 24 4C35.0457 4 44 12.9543 44 24Z"
                    class="fill-main" />
                <path
                    d="M32.0607 17.9393C32.6464 18.5251 32.6464 19.4749 32.0607 20.0607L22.0607 30.0607C21.4749 30.6464 20.5251 30.6464 19.9393 30.0607L15.9393 26.0607C15.3536 25.4749 15.3536 24.5251 15.9393 23.9393C16.5251 23.3536 17.4749 23.3536 18.0607 23.9393L21 26.8787L25.4697 22.409L29.9393 17.9393C30.5251 17.3536 31.4749 17.3536 32.0607 17.9393Z"
                    fill="#fff" />
            </svg>
        </div>
        <div class="message">
            <div class="title">
                <h5 class="text-base md:text-[1.125rem] lg:text-[1.125rem] xl:text-[1.125rem] font-semibold">{{ session('success') }}</h5>
            </div>
            <div class="description">
                <p class="text-sm text-main font-medium">Successfull!</p>
            </div>
        </div>
    </div>
</div>
@endif