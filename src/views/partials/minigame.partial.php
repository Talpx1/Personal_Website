<div id="minigame" class="min-w-full min-h-full max-h-full max-w-full absolute top-0 left-0 flex-col justify-between force-hidden p-5">
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
    <div id="minigame_game_area" class="grow self-center relative border border-b-0 border-solid border-light mt-3 grid place-content-center">
        <!-- ball -->
        <div id="minigame_ball" class="w-4 aspect-square bg-light absolute top-0 left-1/2 rounded-full"></div>

        <!-- countdown -->
        <div id="minigame_countdown" class="grid place-content-center text-7xl"></div>

        <!-- gameover -->
        <div id="minigame_gameover" class="grid place-content-center gap-20">
            <div class="text-7xl text-center">Game Over!</div>
            <div class="text-2xl text-center">Score: <span id="minigame_gameover_score"></span></div>
            <div class="flex flex-row items-center justify-center gap-10">
                <div class="flex flex-col items-center justify-center gap-2">
                    <div class='text-xl'><?= t('Retry') ?></div>
                    <button type="button" id="minigame_gameover_retry" class='px-2 py-1 text-light bg-transparent border border-light border-solid rounded-md text-lg'><?= t('SPACE') ?></button>
                </div>
                <div class="flex flex-col items-center justify-center gap-2">
                    <div class='text-xl'><?= t('Exit') ?></div>
                    <button type="button" id="minigame_gameover_exit" class='px-2 py-1 text-light bg-transparent border border-light border-solid rounded-md text-lg'><?= t('ESC') ?></button>
                </div>                
            </div>
        </div>

    </div>
    <!-- PLAYER AREA -->
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
        
</div>