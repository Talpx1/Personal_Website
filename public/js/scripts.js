"use strict"

const DESKTOP_WIDTH = 1280

let keysPressed = []
let mouseX = 0
let mouseY = 0

document.addEventListener("DOMContentLoaded", () => {

    window.requestAnimationFrame =
        window.requestAnimationFrame ||
        window.mozRequestAnimationFrame ||
        window.webkitRequestAnimationFrame ||
        window.msRequestAnimationFrame;

    window.cancelAnimationFrame =
        window.cancelAnimationFrame || window.mozCancelAnimationFrame;

    document.addEventListener("mousemove", (event) => {
        mouseX = event.clientX
        mouseY = event.clientY
    })

    document.onkeydown = (event) => {
        keysPressed[event.key] = true
    }

    document.onkeyup = (event) => {
        keysPressed[event.key] = false
    }

    let isDark = shouldBeDark
    document.querySelector("#toggle-dark-mode")?.addEventListener("click", () => {
        isDark = !isDark
        document.documentElement.classList.toggle(darkClass, isDark)
    })

})