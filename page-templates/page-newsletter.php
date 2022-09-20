<?php
/*
* Template Name: Newsletter
*/

get_header();



?>
<div class="ag-newsletter">
    <div class="newsletter__inner">
        <form class="newsletter__form row" method="post" action="/?na=s">
            <input type="hidden" name="nlang" value="pl-PL">
            <div class="col newsletter__content-wrapper">
                <div class="align-items-center">
                    <div class="col d-flex justify-content-center newsletter__subtitle-container">
                        <p class="newsletter__subtitle">Zapisz się do newslettera i bądź na bieżąco z nowościami i okazjami na Agrochem</p>
                    </div>
                </div>
                <div class="align-items-center newsletter__input-container">
                    <div class="col newsletter__label-container">
                        <label class="col-form-label" for="tnp-1">Adres e-mail</label>
                    </div>
                    <div class="col-auto email-input">
                        <input class="form-control" type="email" name="ne" id="tnp-1" value="" placeholder="" required>
                    </div>
                </div>
                <div class="align-items-center">
                    <div class="col d-flex justify-content-center">
                        <input class="btn btn-submit" type="submit" value="Kontynuuj">
                    </div>
                </div>
                <div class="align-items-center">
                    <div class="col d-flex justify-content-center">
                        <a class="btn btn-cancel" href="/">Anuluj</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php
get_footer();
