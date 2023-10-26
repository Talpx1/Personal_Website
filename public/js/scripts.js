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

        cursor()
        cursorIntersection()
    }

    document.onkeydown = (event) => {
        keysPressed[event.key] = true

        if (event.key === ' ' || event.key === 'Escape') {
            minigame(event.key === ' ')
        }
    }

    document.onkeyup = (event) => {
        keysPressed[event.key] = false
    }

    blobMouseFollow()
    movePlayer()

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

//TODO: rebuild game loop to use only one loop for ball and player
//TODO: improve ball/death area interaction -> trigger as soon as ball touches death area
//TODO: fix player/ball collision detection -> now if the ball hits the side of player while it is moving, the ball clips in player causing weird behaviors
//TODO: animate UI
//TODO: remove alert and create proper gameover
//TODO: after losing life do countdown again
//TODO: after losing game, do countdown again
//TODO: stop animations on exit
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

let ballAnimation
let playerAnimation

let ballX = 0
let ballY = 0
let ballVelocityY = 0
let ballVelocityX = 0
let playerVelocity = INITIAL_BALL_VELOCITY

let score = 0
let lives = INITIAL_LIVES_COUNT

function minigame(start) {
    const minigameContainer = document.querySelector("#minigame")
    document.querySelectorAll("body > *:not(#minigame)").forEach(e => e.classList.toggle('hidden', start))
    minigameContainer.classList.toggle('hidden', !start)
    minigameContainer.classList.toggle('flex', start)

    resetMinigame()

    if (!start) return;

    countdown()

    setTimeout(moveBall, (COUNTDOWN_SECONDS * 1000))
}

function countdown() {
    const countdownElement = document.querySelector("#minigame_countdown")
    countdownElement.textContent = COUNTDOWN_SECONDS

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
        y: INITIAL_BALL_VELOCITY + (Math.random() / 4),
        x: (Math.round(Math.random()) === 1 ? INITIAL_BALL_VELOCITY : -(INITIAL_BALL_VELOCITY)) + ((Math.random() / 2) * (Math.round(Math.random()) === 1 ? 1 : -1))
    }
}

function resetMinigame() {
    setScore(0)
    lives = INITIAL_LIVES_COUNT

    document.querySelector("#minigame_score").textContent = score

    const playerArea = document.querySelector("#minigame_player_movement_area")
    document.querySelector("#minigame_game_area").style.width = `${playerArea.getBoundingClientRect().width}px`

    document.querySelectorAll(".minigame_life.minigame_life_lost").forEach(e => e.classList.remove("minigame_life_lost"))

    resetMinigamePositions()
    resetMinigameVelocities()
}

function setScore(newScore) {
    score = newScore
    document.querySelector("#minigame_score").textContent = newScore
}

function resetMinigamePositions() {
    ballX = 0
    ballY = 0

    const playerAreaWidth = document.querySelector("#minigame_player_movement_area").getBoundingClientRect().width

    document.querySelector("#minigame_player").style.transform = `translateX(${(playerAreaWidth / 2)}px)`
    document.querySelector("#minigame_ball").style.transform = `translate(0px, 0px)`
}

function resetMinigameVelocities() {
    let randomVel = generateRandomBallVelocities()
    ballVelocityY = randomVel.y
    ballVelocityX = randomVel.x

    playerVelocity = INITIAL_PLAYER_SPEED
}

function removeLife() {
    const remaining_lives = [...document.querySelectorAll(".minigame_life:not(.minigame_life_lost)")]

    remaining_lives.pop().classList.add("minigame_life_lost")

    if (--lives === 0) {
        alert("Game Over!")
        resetMinigame()
    }

}

function movePlayer() {
    const player = document.querySelector("#minigame_player")
    const playerArea = document.querySelector("#minigame_player_movement_area")

    const MAX_TRANSLATE = playerArea.getBoundingClientRect().width - player.getBoundingClientRect().width

    let playerPos = player.getBoundingClientRect().x - playerArea.getBoundingClientRect().x + (keysPressed['ArrowRight'] ? playerVelocity : 0) + (keysPressed['ArrowLeft'] ? -playerVelocity : 0)

    if (playerPos > MAX_TRANSLATE) playerPos = MAX_TRANSLATE

    if (playerPos < 0) playerPos = 0

    player.style.transform = `translateX(${playerPos}px)`

    playerAnimation = requestAnimationFrame(movePlayer)
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

    checkBallIntersections()

    ballAnimation = requestAnimationFrame(moveBall)
}

function checkBallIntersections() {

    if (isBallIntersectingPlayer()) {
        increaseBallVelocity()
        increasePlayerVelocity()
        setScore(++score)
    }

    if (isBallInDeathArea()) {
        removeLife()
        resetMinigamePositions()
    }
}

function isBallIntersectingPlayer() {
    const ball = document.querySelector("#minigame_ball").getBoundingClientRect();
    const player = document.querySelector("#minigame_player").getBoundingClientRect();

    return !(
        ((ball.y + ball.height) < (player.y)) ||
        (ball.y > (player.y + player.height)) ||
        ((ball.x + ball.width) < player.x) ||
        (ball.x > (player.x + player.width))
    )
}

function isBallInDeathArea() {
    const ball = document.querySelector("#minigame_ball").getBoundingClientRect();
    const death = document.querySelector("#minigame_death_area").getBoundingClientRect();

    return ball.top >= death.bottom
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
