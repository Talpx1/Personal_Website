"use strict"

// ###########################################################
// ########################## SETUP ##########################
// ###########################################################
let keysPressed = []
document.addEventListener("DOMContentLoaded", () => {

    window.requestAnimationFrame =
        window.requestAnimationFrame ||
        window.mozRequestAnimationFrame ||
        window.webkitRequestAnimationFrame ||
        window.msRequestAnimationFrame;

    window.cancelAnimationFrame =
        window.cancelAnimationFrame || window.mozCancelAnimationFrame;


    document.onmousemove = (event) => {
        mouseX = event.clientX
        mouseY = event.clientY

        if (window.innerWidth >= 1280) {
            cursor()
            cursorIntersection()
        }
    }

    document.onkeydown = (event) => {
        keysPressed[event.key] = true

        if ((event.key === ' ' || event.key === 'Escape') && window.innerWidth >= 1280) {
            toggleMinigame(event.key === ' ')
        }
    }

    document.onkeyup = (event) => {
        keysPressed[event.key] = false
    }

    let isDark = shouldBeDark
    document.querySelector("#toggle-dark-mode").addEventListener("click", () => {
        isDark = !isDark
        document.documentElement.classList.toggle(darkClass, isDark)
    })

    blobMouseFollow()

})

window.addEventListener("resize", () => {
    fitMinigameToScreen()
})






// ###########################################################
// ######################### CURSOR ##########################
// ###########################################################
let mouseX = 0
let mouseY = 0

function cursor() {
    const cursor = document.querySelector("#cursor");

    const x = mouseX - cursor.getBoundingClientRect().width / 2
    const y = mouseY - cursor.getBoundingClientRect().height / 2

    cursor.style.transform = `translate(${x}px, ${y}px)`
}

function blobMouseFollow(event) {
    let blobX = 0
    let blobY = 0

    let blobRotation = 0
    let blobScale = 1
    let isGrowing = false

    const blob = document.querySelector("#cursor_blob");

    moveBlob()

    function moveBlob() {
        calculatePosition()
        calculateRotation()
        calculateScale()

        blob.style.transform = `translate(${blobX}px, ${blobY}px) rotateZ(${blobRotation}deg) scale(${blobScale})`
        requestAnimationFrame(moveBlob)
    }

    function calculatePosition() {
        const halfBlobWidth = blob.getBoundingClientRect().width / 2
        const halfBlobHeight = blob.getBoundingClientRect().height / 2

        const finalX = mouseX - halfBlobWidth
        const finalY = mouseY - halfBlobHeight

        blobX += (finalX - blobX) / 40
        blobY += (finalY - blobY) / 40

    }

    function calculateRotation() {
        blobRotation += .05;

        if (blobRotation === 360) {
            blobRotation = 0
        }
    }

    function calculateScale() {
        blobScale += .0005 * (isGrowing ? 1 : -1)

        if (blobScale >= 1.5) isGrowing = false
        if (blobScale <= .5) isGrowing = true
    }
}

function cursorIntersection() {
    const cursor = document.querySelector("#cursor");

    const interactables = [...document.body.querySelectorAll("a, button, .interactable")]
    const hover = document.querySelectorAll("a:hover, button:hover, .interactable:hover").item(0)

    cursor.classList.toggle("intersecting", interactables.includes(hover))

}





// ###########################################################
// ######################## MINIGAME #########################
// ###########################################################

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
