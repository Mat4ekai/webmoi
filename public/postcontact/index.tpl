<component name="common.page.document">

<main id="main">

<component name="components.breadcrumbs" $text1="Проверка данных"/>

     <h2 style="margin-bottom: 25px; margin-left: 25px">На этой странице мы проверим правильность введенных данных</h2>
     {{for $rows as $row}}
     <div class="row">
          <hr width="1250" size="5" style="0 auto">
          <div class="col-3" style="margin-left: 35px">{{$row.email}}</div>
          <div class="col">{{$row.name}}</div>
          <div class="col">{{$row.subject}}</div>
         <button data-id="{{$row.id}}" type="button" class="btn btn-edit btn-primary btn-sm" style="width: 100px; height: 30px; margin-bottom: 15px; margin-right: 20px">
              edit
          </button>
          <hr width="1250" size="5" >
     </div><br>
    {{/for}}

    <div class="modal fade" id="exampleModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Изменение данных</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Ваше имя" required maxlength="25">
                    </div>
                    <div>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Ваше имя" required maxlength="25">
                    </div>
                    <div>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Ваше имя" required maxlength="25">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                    <button type="button" class="btn btn-primary">Подтвердить</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(".btn-edit").click((e) => {
            let id = $(e.currentTarget).attr("data-id");
            $("#exampleModal .modal-body").html("<input type='text' name='id' class='form-control' id='" + id + "' placeholder='Поменяйте id'>")
            $("#exampleModal").modal("show");
        })
    </script>
</main>

</component>
