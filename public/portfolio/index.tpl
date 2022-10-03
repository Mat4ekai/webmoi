<component name="common.page.document">

<main id="main">

<component name="components.breadcrumbs" $text1="Наши работы" $text2="Главная" $text3="Наши работы"/>

<section id="portfolio" class="portfolio">
    <div class="container">
        <div class="row portfolio-container">
            {{for $images as $img}}
            <component name="portfolio.portfoliophoto" img={$img}/>
            {{/for}}
        </div>
    </div>
</section>

</main>

</component>
