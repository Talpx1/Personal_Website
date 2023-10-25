let mouseX = 0
let mouseY = 0

document.addEventListener("DOMContentLoaded", () => {

    document.onmousemove = (event) => {
        mouseX = event.clientX
        mouseY = event.clientY

        cursor()
        cursorIntersection()
    }

    blobMouseFollow()
})

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

    const interactables = [...document.body.querySelectorAll("a, button")]
    const hover = document.querySelectorAll("a:hover,button:hover").item(0)

    cursor.classList.toggle("intersecting", interactables.includes(hover))

}
