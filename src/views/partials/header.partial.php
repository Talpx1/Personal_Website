<header class="flex flex-row justify-between items-center py-5">    
    <a href="/">
        <svg class="w-[50px] lg:w-[70px]" width="96" height="51" viewBox="0 0 96 51" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path class="stroke-dark dark:stroke-light" d="M1 49.2494C22 49.2494 24.0781 42.1243 34.5 27.7493C49 7.7493 72 -8.7506 95 7.74931C72 7.74931 72 26.2492 72 27.7492C72 29.2492 72 49.2492 95 49.2492" stroke="#FDFFFC" stroke-width="2" stroke-linecap="square" stroke-linejoin="bevel"/>
        </svg>
    </a>
    <div class="flex flex-row gap-5 items-center text-dark dark:text-light">
        <a href="/<?= app()->alternateLocale() ?>" class='uppercase'><?= app()->alternateLocale() ?></a>
        <button type="button" id="toggle-dark-mode" class="bg-transparent p-0 m-0 border-0">
            <svg class="hidden dark:block" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-sun"><circle cx="12" cy="12" r="5"></circle><line x1="12" y1="1" x2="12" y2="3"></line><line x1="12" y1="21" x2="12" y2="23"></line><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line><line x1="1" y1="12" x2="3" y2="12"></line><line x1="21" y1="12" x2="23" y2="12"></line><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line></svg>
            <svg class="block dark:hidden" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-moon"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path></svg>
        </button>
    </div>
</header>