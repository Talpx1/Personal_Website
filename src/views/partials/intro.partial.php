<section class="grid place-content-center text-dark dark:text-light  bg-light dark:bg-dark font-primary place-items-center gap-8 fixed top-0 left-0 z-40 w-full border-8 border-dark dark:border-light border-solid duration-500" id="intro">
    <svg class="w-3/4 lg:w-full h-auto" width="96" height="51" viewBox="0 0 96 51" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path class="stroke-dark dark:stroke-light" d="M1 49.2494C22 49.2494 24.0781 42.1243 34.5 27.7493C49 7.7493 72 -8.7506 95 7.74931C72 7.74931 72 26.2492 72 27.7492C72 29.2492 72 49.2492 95 49.2492" stroke="#FDFFFC" stroke-width="2" stroke-linecap="square" stroke-linejoin="bevel"/>
    </svg>

    <div class="text-2xl lg:text-5xl">Simone Cerruti</div>
</section>

<script>
    window.addEventListener("load", () => {
        const intro = document.querySelector("#intro")
        setTimeout(()=>{
            intro.style.top = '-150%'
        },1000)
    })
</script>