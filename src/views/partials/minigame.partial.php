<div id="minigame" class="min-w-full min-h-full max-h-full max-w-full absolute top-0 left-0 flex-col justify-between hidden p-5">
    <!-- UI -->
    <div class="flex justify-between items-center ">
        <div class="flex flex-row gap-2 items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart minigame_life fill-light"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart minigame_life fill-light"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart minigame_life fill-light"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>            
        </div>
        <div class="flex flex-row gap-2 items-center">
            <?= t("Score") ?>
            <span id="minigame_score">0</span>
        </div>
        <div class="flex flex-row gap-2 items-center">
            <?= t("Exit") ?>
            <div class="flex content-center items-center px-2 py-1 rounded-md border-light border border-solid">ESC</div>
        </div>
    </div>
    <!-- GAME AREA -->
    <div id="minigame_game_area" class="grow self-center relative border border-b-0 border-solid border-light mt-3">
        <div id="minigame_ball" class="w-4 aspect-square bg-light absolute top-0 left-1/2 rounded-full"></div>
        <div id="minigame_countdown" class="absolute top-1/2 left-1/2 text-7xl"></div>
    </div>
        <!-- PLAYER AREA -->
        <div class="flex flex-col">
            <div class="flex flex-row justify-between items-center">
            <!-- arrow left -->
            <div class="flex content-center items-center px-2 py-1 rounded-md border-light border border-solid mr-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
            </div> 
            
            <!-- player -->
            <div class="grow" id="minigame_player_movement_area">
                <div id="minigame_player" class="w-16 h-1 bg-light"></div>
            </div>

            <!-- arrow right -->
            <div class="flex content-center items-center px-2 py-1 rounded-md border-light border border-solid ml-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
            </div> 
            
        </div>   
        
        <!-- DEATH AREA-->
        <div id="minigame_death_area" class="w-full h-1 bg-transparent"></div>
    </div>
        
</div>