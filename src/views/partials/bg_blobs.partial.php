<div id="noise" class="-z-10 overflow-hidden mix-blend-difference dark:mix-blend-screen"></div>

<div id='bg-blobs' class="fixed min-w-full min-h-screen max-w-full max-h-screen -z-20 overflow-hidden left-0 top-0 flex justify-center items-center">
    
    <svg xmlns="http://www.w3.org/2000/svg" height="100vh" width="100wv">
        <defs>
        <filter id="svg_filter" x="-20%" y="-20%" width="140%" height="140%" filterUnits="objectBoundingBox" primitiveUnits="userSpaceOnUse" color-interpolation-filters="sRGB">            
            <feColorMatrix type="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -8" x="0%" y="0%" width="100%" height="100%" in="blur" result="colormatrix"/>
            <feBlend mode="screen" x="0%" y="0%" width="100%" height="100%" in="SourceGraphic" in2="colormatrix" result="blend2"/>
        </filter>
        </defs>
    </svg>

    <img 
        src="/assets/images/bg_blobs/blob_cursor.png" 
        id="cursor_blob" 
        class="hidden xl:block h-auto absolute z-10 mix-blend-overlay dark:mix-blend-difference top-0 left-0 brightness-0 dark:brightness-100"
        alt=""
    />
        
    <img src="/assets/images/bg_blobs/blob_1.png" id="bg_blob_1" class="h-auto absolute z-0" alt=""/>

    <img src="/assets/images/bg_blobs/blob_2.png" id="bg_blob_2" class="h-auto absolute z-0" alt=""/>

    <img src="/assets/images/bg_blobs/blob_3.png" id="bg_blob_3" class="h-auto absolute z-0" alt=""/>

    <img src="/assets/images/bg_blobs/blob_4.png" id="bg_blob_4" class="h-auto absolute z-0" alt=""/>


</div>

<script defer>
    document.addEventListener("DOMContentLoaded", () => {
        blobMouseFollow()
    })

    function blobMouseFollow() {
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

            if (blobScale >= 1.25) isGrowing = false
            if (blobScale <= .75) isGrowing = true
        }
    }
</script>