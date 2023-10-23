<footer class="flex flex-col justify-between py-5 content-center items-center gap-10">
    <div class="flex flex-row gap-2 items-center content-center">
        <?= t("pssst... press") ?>
        <div class="flex content-center items-center px-2 py-1 rounded-md border-light border border-solid"> <?= t("SPACE") ?></div>        
    </div>
    <nav class="flex flex-row justify-between items-center w-full">
        <div title="email" class="flex flex-row gap-1 content-center items-center text-light flex-1 justify-start">
            <?php loadSvg("/assets/icons/mail.svg", "w-[15px]") ?>
            <a href="mailto:hello@simonecerruti.com">hello@simonecerruti.com</a>
            <?php loadSvg("/assets/icons/external-link.svg", "w-[12px]") ?>
        </div>
        <div title="GitHub" class="flex flex-row gap-1 content-center items-center text-light flex-1 justify-center">
            <?php loadSvg("/assets/icons/github.svg", "w-[15px]") ?>
            <a href="https://github.com/Talpx1">Talpx1</a>
            <?php loadSvg("/assets/icons/external-link.svg", "w-[12px]") ?>
        </div>
        <div title="LinkedIn" class="flex flex-row gap-1 content-center items-center text-light flex-1 justify-end">
            <?php loadSvg("/assets/icons/linkedin.svg", "w-[15px]") ?>
            <a href="https://www.linkedin.com/in/simone-cerruti/">Simone Cerruti</a>
            <?php loadSvg("/assets/icons/external-link.svg", "w-[12px]") ?>
        </div>
    </nav>
</footer>