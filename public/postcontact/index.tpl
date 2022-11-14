<component name="common.page.document">

<main id="main">

<component name="components.breadcrumbs" $text1="Проверка данных"/>

     <h2 style="margin-bottom: 25px; margin-left: 25px">На этой странице мы проверим правильность введенных данных</h2>
     {{for $rows as $row}}
     <div class="row">
          <hr width="700" size="5">
          <div data-id2="{{$row.email}}" class="col-3 email-edit" style="margin-left: 35px">{{$row.email}}</div>
          <div data-id3="{{$row.name}}" class="col name-edit">{{$row.name}}</div>
          <div data-id4="{{$row.subject}}" class="col subject-edit">{{$row.subject}}</div>
         <button data-email="{{$row.email}}" data-name="{{$row.name}}" data-subject="{{$row.subject}}"  type="button" class="btn btn-edit btn-primary btn-sm" style="width: 100px; height: 30px; margin-bottom: 15px; margin-right: 20px">
              edit
          </button>
          <hr width="700" size="5" >
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
                    <form method="POST" action="" value="SendForm">
                        <input type="hidden" name="action">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <div class="modal-body1"></div>
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <div class="modal-body2"></div>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <div class="modal-body3"></div>
                        </div>
                        <div class="text-center"><button type="submit" name = "edit" value="edit" style="margin-top: 50px" class="btn btn-danger">Отправить сообщение</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(".btn-edit").click(
            function() {
            var email = $(this).attr('data-email');
            var name = $(this).attr('data-name');
            var subject = $(this).attr('data-subject');

            $("#exampleModal .modal-body1").html("<input type='text' name='email' class='form-control' style='margin-top: 15px' id='" + email + "' placeholder='Поменяйте почту'>");
            $("#exampleModal .modal-body2").html("<input type='text' name='name' class='form-control' style='margin-top: 15px' id='" + name + "' placeholder='Поменяйте имя'>");
            $("#exampleModal .modal-body3").html("<input type='text' name='subject' class='form-control' style='margin-top: 15px' id='" + subject + "' placeholder='Поменяйте тему'>");
            $("#exampleModal").modal("show");
        })
    </script>
</main>

</component>
