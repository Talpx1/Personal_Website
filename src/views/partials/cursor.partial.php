<div id="cursor" class="
    hidden xl:flex
    absolute justify-center items-center border-[2px] border-solid border-dark dark:border-light rounded-full w-[25px] aspect-square top-0 left-0 pointer-events-none
    content-none after:w-1/3 after:aspect-square after:block after:bg-dark dark:after:bg-light after:rounded-full after:transition-all after:duration-150" >
</div>

<script defer>
    document.addEventListener("DOMContentLoaded", () => {
        document.addEventListener("mousemove", (event) => {
            if (window.innerWidth < DESKTOP_WIDTH) { return }

            cursor()
            cursorIntersection()            
        })
    })

    function cursor() {
        const cursor = document.querySelector("#cursor");

        const x = mouseX - cursor.getBoundingClientRect().width / 2
        const y = mouseY - cursor.getBoundingClientRect().height / 2

        cursor.style.transform = `translate(${x}px, ${y}px)`
    }

    function cursorIntersection() {
        const cursor = document.querySelector("#cursor");

        const interactables = [...document.body.querySelectorAll("a, button, .interactable")]
        const hover = document.querySelectorAll("a:hover, button:hover, .interactable:hover").item(0)

        cursor.classList.toggle("intersecting", interactables.includes(hover))

    }

</script>