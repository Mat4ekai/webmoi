<component name="common.page.document">
     <component name="components.breadcrumbs" $text1="Проверка данных"/>
     <h2 style="margin-left: 25px; margin-bottom: 25px">На этой странице мы проверим правильность введенных данных</h2>
     {{for $rows as $row}}
     <div class="row">
          <div class="col" style="margin-left: 35px">{{$row.email}}</div>
          <div class="col">{{$row.name}}</div>
          <div class="col">{{$row.subject}}</div>
          <button class="buttonpost" href="#openModal">edit</button>
        \\* необходимо оформить модальное окно к каждой строке с разными ид

          <hr width="1450" size="3" style="0 auto">
     </div><br>
     {{/for}}
</component>
