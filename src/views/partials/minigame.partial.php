<div id="minigame" class="min-w-full min-h-full max-h-full max-w-full absolute top-0 left-0 flex-col justify-between force-hidden p-5">
    <!-- UI -->
    <div class="flex justify-between items-center ">
        <div class="flex flex-row gap-2 items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart minigame_life fill-dark dark:fill-light"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart minigame_life fill-dark dark:fill-light"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart minigame_life fill-dark dark:fill-light"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>            
        </div>
        <div class="flex flex-row gap-2 items-center">
            <?= t("score") ?>
            <span id="minigame_score">0</span>
        </div>
        <div class="flex flex-row gap-2 items-center">
            <?= t("exit") ?>
            <div class="flex content-center items-center px-2 py-1 rounded-md border-dark dark:border-light border border-solid">ESC</div>
        </div>
    </div>
    <!-- GAME AREA -->
    <div id="minigame_game_area" class="grow self-center relative border border-b-0 border-solid border-dark dark:border-light mt-3 grid place-content-center">
        <!-- ball -->
        <div id="minigame_ball" class="w-4 aspect-square bg-dark dark:bg-light absolute top-0 left-1/2 rounded-full"></div>

        <!-- countdown -->
        <div id="minigame_countdown" class="grid place-content-center text-7xl"></div>

        <!-- gameover -->
        <div id="minigame_gameover" class="grid place-content-center gap-20">
            <div class="text-7xl text-center">Game Over!</div>
            <div class="text-2xl text-center"><?= t("score") ?>: <span id="minigame_gameover_score"></span></div>
            <div class="flex flex-row items-center justify-center gap-10">
                <div class="flex flex-col items-center justify-center gap-2">
                    <div class='text-xl'><?= t('retry') ?></div>
                    <button type="button" id="minigame_gameover_retry" class='px-2 py-1 text-dark dark:text-light bg-transparent border border-dark dark:border-light border-solid rounded-md text-lg'><?= t('SPACE') ?></button>
                </div>
                <div class="flex flex-col items-center justify-center gap-2">
                    <div class='text-xl'><?= t('exit') ?></div>
                    <button type="button" id="minigame_gameover_exit" class='px-2 py-1 text-dark dark:text-light bg-transparent border border-dark dark:border-light border-solid rounded-md text-lg'>ESC</button>
                </div>                
            </div>
        </div>

    </div>
    <!-- PLAYER AREA -->
    <div class="flex flex-row justify-between items-center">
        <!-- arrow left -->
        <div class="flex content-center items-center px-2 py-1 rounded-md border-dark dark:border-light border border-solid mr-5">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
        </div> 
        
        <!-- player -->
        <div class="grow" id="minigame_player_movement_area">
            <div id="minigame_player" class="w-16 h-1 bg-dark dark:bg-light"></div>
        </div>

        <!-- arrow right -->
        <div class="flex content-center items-center px-2 py-1 rounded-md border-dark dark:border-light border border-solid ml-5">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
        </div> 
        
    </div>   
        
</div>




<script defer>
    document.addEventListener("DOMContentLoaded", () => {
        document.addEventListener("keydown", (event) =>{
            if (!(event.key === ' ' || event.key === 'Escape') || window.innerWidth < DESKTOP_WIDTH) { return } 
            
            toggleMinigame(event.key === ' ')            
        })
    })

    window.addEventListener("resize", () => {
        fitMinigameToScreen()
    })

    //TODO: animate UI
    //TODO: on exit slide intro/stinger in
    //TODO: on start slide intro/stinger in

    const COUNTDOWN_SECONDS = 3
    const INITIAL_PLAYER_SPEED = 7
    const INITIAL_BALL_VELOCITY = 3
    const BALL_VELOCITY_INCREASE_FACTOR = .2
    const MAX_BALL_VELOCITY = 10
    const PLAYER_VELOCITY_INCREASE_FACTOR = .2
    const MAX_PLAYER_VELOCITY = 10
    const INITIAL_LIVES_COUNT = 3

    let ballX = 0
    let ballY = 0
    let ballVelocityY = 0
    let ballVelocityX = 0
    let playerVelocity = INITIAL_BALL_VELOCITY

    let score = 0
    let lives = INITIAL_LIVES_COUNT
    let isGameover = false

    let minigameAnimation = null

    function toggleMinigame(active) {
        const minigameContainer = document.querySelector("#minigame")

        document.querySelectorAll("body > *:not(#minigame)").forEach(e => e.classList.toggle('force-hidden', active))
        minigameContainer.classList.toggle('force-hidden', !active)
        minigameContainer.classList.toggle('flex', active)

        active ? startMinigame() : stopMinigame()
    }

    function startMinigame() {
        resetMinigame()

        countdown()

        setTimeout(minigameLoop, (COUNTDOWN_SECONDS * 1000))
    }

    function stopMinigame() {
        cancelAnimationFrame(minigameAnimation)
    }

    function minigameLoop() {
        moveBall()
        movePlayer()
        checkBallIntersections()

        if (!isGameover) {
            minigameAnimation = requestAnimationFrame(minigameLoop)
        }
    }

    function countdown() {
        const countdownElement = document.querySelector("#minigame_countdown")
        countdownElement.textContent = COUNTDOWN_SECONDS
        countdownElement.style.display = 'grid'

        let interval
        let seconds = COUNTDOWN_SECONDS - 1

        interval = setInterval(() => {
            if (seconds <= 0) {
                countdownElement.style.display = 'none'
                clearInterval(interval)
            }

            countdownElement.textContent = seconds
            --seconds
        }, 1000)
    }

    function generateRandomBallVelocities() {
        return {
            y: INITIAL_BALL_VELOCITY + parseFloat((Math.random() / 4).toFixed(2)),
            x: (Math.round(Math.random()) === 1 ? INITIAL_BALL_VELOCITY : -(INITIAL_BALL_VELOCITY)) + (parseFloat((Math.random() / 2).toFixed(2)) * (Math.round(Math.random()) === 1 ? 1 : -1))
        }
    }

    function resetMinigame() {
        setScore(0)
        lives = INITIAL_LIVES_COUNT
        isGameover = false

        document.querySelectorAll(".minigame_life.minigame_life_lost").forEach(e => e.classList.remove("minigame_life_lost"))
        document.querySelector("#minigame_gameover").style.display = 'none'

        fitMinigameToScreen()

        resetMinigamePositions()
        resetMinigameVelocities()
    }

    function fitMinigameToScreen() {
        const playerAreaWidth = document.querySelector("#minigame_player_movement_area").getBoundingClientRect().width

        document.querySelector("#minigame_game_area").style.width = `${playerAreaWidth}px`
        document.querySelector("#minigame_player").style.width = `${playerAreaWidth / 20}px`
    }

    function setScore(newScore) {
        score = newScore
        document.querySelector("#minigame_score").textContent = newScore
    }

    function resetMinigamePositions() {
        ballX = 0
        ballY = 0

        const playerAreaWidth = document.querySelector("#minigame_player_movement_area").getBoundingClientRect().width
        const player = document.querySelector("#minigame_player")
        const ball = document.querySelector("#minigame_ball")

        player.style.transform = `translateX(${((playerAreaWidth / 2) - (player.getBoundingClientRect().width / 2))}px)`
        ball.style.transform = `translate(0px, 0px)`
    }

    function resetMinigameVelocities() {
        let randomVel = generateRandomBallVelocities()
        ballVelocityY = randomVel.y
        ballVelocityX = randomVel.x

        playerVelocity = INITIAL_PLAYER_SPEED
    }

    function minigameGameover() {
        stopMinigame()

        document.querySelector('#minigame_gameover_score').textContent = score

        document.querySelector("#minigame_gameover").style.display = 'grid'

    }

    function removeLife() {
        const remainingLives = [...document.querySelectorAll(".minigame_life:not(.minigame_life_lost)")]

        remainingLives.pop().classList.add("minigame_life_lost")

        if (--lives === 0) isGameover = true

    }

    function movePlayer() {
        const player = document.querySelector("#minigame_player")
        const playerArea = document.querySelector("#minigame_player_movement_area")

        const MAX_TRANSLATE = playerArea.getBoundingClientRect().width - player.getBoundingClientRect().width

        let playerPos = player.getBoundingClientRect().x - playerArea.getBoundingClientRect().x + (keysPressed['ArrowRight'] ? playerVelocity : 0) + (keysPressed['ArrowLeft'] ? -playerVelocity : 0)

        if (playerPos > MAX_TRANSLATE) playerPos = MAX_TRANSLATE

        if (playerPos < 0) playerPos = 0

        player.style.transform = `translateX(${playerPos}px)`
    }


    function moveBall() {
        const ball = document.querySelector("#minigame_ball")
        const gameArea = document.querySelector("#minigame_game_area")
        const gameAreaBorderWidth = parseFloat(getComputedStyle(gameArea).borderLeftWidth.replace("px", ""))
        const gameAreaWidth = gameArea.getBoundingClientRect().width - (gameAreaBorderWidth * 2)
        const WALL_X_POS = (gameAreaWidth / 2) - ball.getBoundingClientRect().width

        ballX += ballVelocityX
        ballY += ballVelocityY

        if (ballX <= -(WALL_X_POS) || ballX >= WALL_X_POS) ballVelocityX = -ballVelocityX
        if (ballY <= 0) ballVelocityY = -ballVelocityY

        ball.style.transform = `translate(${ballX}px, ${ballY}px)`
    }

    function checkBallIntersections() {

        if (isBallIntersectingPlayer()) {
            increaseBallVelocity()
            increasePlayerVelocity()
            setScore(++score)
        }

        if (isBallInDeathArea()) {
            removeLife()
            isGameover ? minigameGameover() : resetMinigamePositions()
        }
    }

    function isBallIntersectingPlayer() {
        const ball = document.querySelector("#minigame_ball").getBoundingClientRect();
        const player = document.querySelector("#minigame_player").getBoundingClientRect();

        const isOnTopOfPlayer = [player.top, player.top - 1, player.top + 1].includes(Math.round(ball.bottom))

        return isOnTopOfPlayer &&
            (ball.left >= player.left || ball.right >= player.left) &&
            (ball.left <= player.right)

    }

    function isBallInDeathArea() {
        const ball = document.querySelector("#minigame_ball").getBoundingClientRect();
        const player = document.querySelector("#minigame_player").getBoundingClientRect();

        return ball.top >= player.bottom
    }

    function increaseBallVelocity() {
        ballVelocityX += BALL_VELOCITY_INCREASE_FACTOR * (ballVelocityX >= 0 ? 1 : -1)
        ballVelocityY = -ballVelocityY - BALL_VELOCITY_INCREASE_FACTOR

        if (Math.abs(ballVelocityX) > MAX_BALL_VELOCITY) ballVelocityX = MAX_BALL_VELOCITY * (ballVelocityX >= 0 ? 1 : -1)
        if (Math.abs(ballVelocityY) > MAX_BALL_VELOCITY) ballVelocityY = -MAX_BALL_VELOCITY
    }

    function increasePlayerVelocity() {
        playerVelocity += PLAYER_VELOCITY_INCREASE_FACTOR

        if (playerVelocity > MAX_BALL_VELOCITY) playerVelocity = MAX_PLAYER_VELOCITY
    }

</script>